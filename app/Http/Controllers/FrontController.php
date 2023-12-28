<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackeFormRecords;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function allFromsRecords(Request $request)
    {
        $shopName = $request->shopName;
        // $records = TrackeFormRecords::create();
        $customerId = $request->customerId;
        $sessionId = $request->sessionId;
        $formsData = $request->formData;
        foreach ($formsData as $rec) {
            $records = [];
            $records['customer_id'] = ($customerId == null ? '' : $customerId);
            $records['session_id'] = $sessionId;
            $records['form_type'] = $rec['action'];
            $fieldsData = [];
            foreach ($rec['fields'] as $field) {
                $fieldsData[] = $field['name'];
                // $fieldsData[] = $field['name'] . ' (' . $field['type'] . ')';
            }

            $records['form_fields'] = implode(', ', $fieldsData);
            $records['number_of_total_fields'] = $rec['length'];
            $records['shopName'] = $shopName;
            // add a shopName after add a attribute in database
            $AddRecord = TrackeFormRecords::updateOrCreate(['form_type' => $rec['action'], 'shopName' => $shopName], $records); // also add shopname
        }

        return response()->json(['message' => 'Data Added Successfully']);
    }

    public function saveFieldsRecords(Request $request)
    {
        $shopName = $request->shopName;

        $records['shopName'] = $shopName;

        $records['number_of_filled_fields'] = $request->NoOfFilledFields;
        $records['fields_value'] = $request->FieldsValueObj;

        $AddFieldRecord = TrackeFormRecords::updateOrCreate(['form_type' => $request->formAction, 'shopName' => $shopName], $records);

        return response()->json(['message' => 'Field Added Successfully']);
    }

    public function submitFormFieldsRecords(Request $request)
    {
        $shopName = $request->shopName;

        $records['shopName'] = $shopName;

        $records['number_of_filled_fields'] = $request->NoOfFilledFields;
        $records['fields_value'] = $request->FieldsValueObj;
        $records['form_content'] = ($request->FormContent == true ? 1 : 0);

        $AddSubmitFormFieldRecord = TrackeFormRecords::updateOrCreate(['form_type' => $request->formAction, 'shopName' => $shopName], $records);

        return response()->json(['message' => 'From Submit Successfully']);
    }

    public function getSettings()
    {
        return response()->json(['data' => 'setting not saved']);
    }
}
