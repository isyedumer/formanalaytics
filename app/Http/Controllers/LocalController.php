<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormSetting;
use App\Models\SaveFormRecord;

class LocalController extends Controller
{
    public function local()
    {
        $shopName = Auth::user()->name;
        $fieldsRecords = Local::where('shopName', $shopName)->orderBy('position', 'ASC')->get();
        return view('page-one', compact('fieldsRecords'));
    }
    public function getRecords()
    {
        $shopName = Auth::user()->name;
        // $formRecords = SaveFormRecords::where('shopName', $shopName)->orderBy('id', 'ASC')->get();
        $formRecords = SaveFormRecord::where('shopName', $shopName)->distinct('sessionId')->get(['sessionId']);


        return view('page-two', compact('formRecords'));
    }

    public function getRecordsBySessionId(Request $request)
    {
        $shopName = Auth::user()->name;
        $sessionId = $request->id;
        $sessionIdRecords = SaveFormRecord::where(['sessionId' => $sessionId, 'shopName' => $shopName])->get();
        return view('page-three', compact('sessionIdRecords'));
    }


    public function saveFormFields(Request $request)
    {
        $shopName = Auth::user()->name;

        $fieldRecords = $request->json()->all();
        // echo "<pre>";
        // print_r($fieldRecords);
        // dd('die');
        $deletePrviousRecords = Local::where('shopName', $shopName)->delete();
        foreach ($fieldRecords as $field) {
            Local::create([
                'title' => $field['title'],
                'type' => $field['type'],
                'options' => $field['options'],
                'position' => $field['position'],
                'shopName' => $shopName,
            ]);
        }
        return response()->json(['status' => 200, 'message' => 'Records saved successfully']);
    }
    public function getFormFields(Request $request)
    {
        // dd($request->shopifyId);
        // $sessionIdRecords = SaveFormRecords::where('shopName',$request->shopName)->get();
        $customFields = Local::where(['shopName' => $request->shopName])->orderBy('position', 'ASC')->get();
        $designSettings = FormSetting::where('shop_name',$request->shopName)->first();
        return response()->json(['status' => 200, 'forms' => $customFields,'settings' => $designSettings]);
    }
    public function submitFieldsForm(Request $request)
    {
        $fields = (array)$request->all();
        unset($fields['shopName']); // unset from array
        unset($fields['sessionId']); // unset from array
        $shopName = $request['shopName'];
        $sessionId = $request['sessionId'];
        // echo "<pre>";
        // print_r($fields);
        // dd($sessionId);
        
        $sessionCheckFirst = SaveFormRecord::where(['sessionId' => $sessionId, 'shopName' => $shopName])->delete();
        
       
        $sessionCheck = SaveFormRecord::where(['sessionId' => $sessionId, 'shopName' => $shopName])->distinct('sessionId')->first(['sessionId']);

        if ($sessionCheck == null) {  // for first time save
            foreach ($fields as $title => $value) {
                if (is_array($value) == true) {   // this is just for checkbox values implode
                    $value = implode(',', $value);
                }

                $index = explode('^', $title);
                $indexCount = count($index);
                if ($indexCount != 3) {
                    continue;
                }

                $customFields = Local::where(['id' => $index[2], 'shopName' => $shopName])->first();
                // dd($index[2]." -dfdfsd");
                SaveFormRecord::create([
                    'title' => str_replace("_", " ", $index[0]), // for title
                    'value' => $value,
                    'options' => ($customFields->options == null ? null : $customFields->options),
                    'type' => $index[1],
                    'sessionId' => $sessionId,
                    'shopName' => $shopName,
                ]);
            }

            return response()->json(['status' => 200, 'message' => 'Records saved successfully']);
        } else {
            foreach ($fields as $title => $value) {
                if (is_array($value) == true) {   // this is just for checkbox values implode
                    $value = implode(',', $value);
                }

                $index = explode('^', $title);
                $indexCount = count($index);
                if ($indexCount != 3) {
                    continue;
                }

                $customFields = SaveFormRecord::where(['id' => $index[2], 'shopName' => $shopName])->first();
                // dd($customFields);
                SaveFormRecord::updateOrCreate(['id' => $index[2]], [
                    'title' => str_replace("_", " ", $index[0]), // for title
                    'value' => $value,
                    'options' => ($customFields->options == null ? null : $customFields->options),
                    'type' => $index[1],
                    'sessionId' => $sessionId,
                    'shopName' => $shopName,
                ]);
            }

            return response()->json(['status' => 201, 'message' => 'Records updated successfully']);
        }
    }

    public function getFormSettingsForm(){
        $shop = Auth::user();
        $settings = FormSetting::where('shop_name',$shop->name)->first();
        // dd($settings->toArray());
        return view('form-settings',compact('settings'));
    }
    public function saveFormSettings(Request $request){
        // dd($request->all());
        $shop = Auth::user(); 
        $saveSettings = FormSetting::updateOrCreate(
            ['shop_name' => $shop->name],
            [   
                'logo_link' => $request->logo_link,
                'logo_alignment' => $request->logo_alignment,


                'form_title' => $request->form_title,
                'title_text_size' => $request->title_text_size,
                'title_text_alignment' => $request->title_text_alignment,
                'title_text_color' => $request->title_text_color,

                'form_desc' => $request->form_desc,
                'desc_text_size' => $request->desc_text_size,
                'desc_text_alignment' => $request->desc_text_alignment,
                'desc_text_color' => $request->desc_text_color,


                'body_background_color' => $request->body_background_color,
                'body_background_opacity' => $request->body_background_opacity,

                'form_background_type' => $request->form_background_type,
                'form_background_color' => $request->form_background_color,
                'form_background_opacity' => $request->form_background_opacity,
                'form_background_image_link' => $request->form_background_image_link,
                'form_fields_title_text_color' => $request->form_fields_title_text_color,
                'form_fields_border_color' => $request->form_fields_border_color,
                

                'btn_background_color' => $request->btn_background_color,
                'btn_text' => $request->btn_text,
                'btn_text_color' => $request->btn_text_color,
                'btn_alignment' => $request->btn_alignment,
            ]
        ); 
        return response()->json([
            'status' => 200,
            'response' => $saveSettings,
            'message' => "Settings updated Successfully"
        ]
        );
    }
    public function generateCSV(){
       $shop = Auth::user();
        //Open the CSV file for writing
      try{
      umask(0);
      $timevalue = time();
      $publicPath = public_path();
      $customFileName = 'Custom-form-data-' . $timevalue . '.csv';
      $filePath = $publicPath . '/files/' . $customFileName;
      $handle = fopen($filePath, 'w');
      // Write the header row

    //   fputcsv($handle, ['Order', 'Date', 'Products(s)', 'Revenue', 'COGS', 'Extra Products Cost', 'Refunds', 'Gateway', 'Shipping Fees', 'Transaction Fees', 'Agency Fees', 'Profit Margin', 'Profit']);
        // $finalRecordsArray = [
        //     [1,2,3,4,5],
        //     [6,7,8,9,10]
        // ];


        $formRecords = SaveFormRecord::where('shopName', $shop->name)->get();
        $groupedArray = [];
        foreach ($formRecords as $record) {
            $sessionId = $record['sessionId'];
            $value = $record['value'];
            if ($value !== null && $value !== '') {
                if (!isset($groupedArray[$sessionId])) {
                    $groupedArray[$sessionId] = [];
                }
                $groupedArray[$sessionId][] = $value;
            }
        }

        $groupedArray = array_filter($groupedArray);

        $frontArray = array_values($groupedArray);

        // dd($frontArray);





      // If a customer was found, write their data to the CSV file
      if (count($frontArray) != 0) {
        foreach ($frontArray as $record) {
          fputcsv($handle, $record);
        }
      }


      // Close the CSV file
      fclose($handle);
    } catch (\Throwable $th) {
      throw $th;
    }

    return response()->json($customFileName);
    }
}