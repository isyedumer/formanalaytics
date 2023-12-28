<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackeFormRecords;

class FormController extends Controller
{
    public function index(Request $request) {

        $submittedForms = TrackeFormRecords::all();
        $totalFormViews = 0;
        $totalFormsFill = 0;
        $totalunfinishedSubmissions = 0;
        $totalFormSubmissions = 0;
        $fillConversionsRate = 0;
        $completeConversionsRate = 0;
        $forms = [];
        foreach ($submittedForms as $key => $submittedForm) {

            if($submittedForm['form_type'] == "/contact#ContactForm"){
                $formsName = "Contact Form" ;
            } else if($submittedForm['form_type'] == "/account"){
                $formsName = "Registration Form" ;
            } else {
                continue;
            }
            $totalFormViews = $totalFormViews + 1;

            if($submittedForm->number_of_filled_fields != null){
                $totalFormsFill = $totalFormsFill + 1;
            }

            if($submittedForm->number_of_filled_fields != null && $submittedForm->form_submitted == false){
                $totalunfinishedSubmissions = $totalunfinishedSubmissions + 1;
            }

            if($submittedForm->number_of_filled_fields != null && $submittedForm->form_submitted == true){
                $totalFormSubmissions = $totalFormSubmissions + 1;
            }
            
            if(isset($forms[$formsName])){
                 $form[$formsName] = $form[$formsName] + 1;
            } else{
                $forms[$formsName] = 1;
            }
        }

        if($totalFormViews != 0){
            $fillConversionsRate = ( $totalFormsFill / $totalFormViews) * 100;
        }

        if($totalFormsFill != 0){
            $completeConversionsRate = ( $totalFormSubmissions / $totalFormsFill) * 100;
        }
         
        return view('welcome', ['totalFormViews' => $totalFormViews, 'totalFormsFill' => $totalFormsFill, 'totalunfinishedSubmissions' => $totalunfinishedSubmissions,
        'totalFormSubmissions' => $totalFormSubmissions, 'fillConversionsRate' => $fillConversionsRate, 'completeConversionsRate' => $completeConversionsRate,
        'forms' => $forms]);


    }

    public function formDetails(Request $request) {

        if($request->form == "Contact Form"){
            $name = "/contact#ContactForm";
        } else if($request->form == "Registration Form"){
            $name = "/account";
        }
        $submittedForms = TrackeFormRecords::where("form_type",$name)->get();
        $totalFormViews = 0;
        $totalFormsFill = 0;
        $totalunfinishedSubmissions = 0;
        $totalFormSubmissions = 0;
        $fillConversionsRate = 0;
        $completeConversionsRate = 0;
        $totalConsentCheck = 0;
        $consentConversion = 0;
        $fields = [];
        foreach ($submittedForms as $key => $submittedForm) {

            $totalFormViews = $totalFormViews + 1;

            if($submittedForm->number_of_filled_fields != null){
                $totalFormsFill = $totalFormsFill + 1;
            }

            if($submittedForm->number_of_filled_fields != null && $submittedForm->form_submitted == false){
                $totalunfinishedSubmissions = $totalunfinishedSubmissions + 1;
            }

            if($submittedForm->number_of_filled_fields != null && $submittedForm->form_submitted == true){
                $totalFormSubmissions = $totalFormSubmissions + 1;
            }
            
            if(true){
                $totalConsentCheck =  $totalConsentCheck + 1;
            }
            $formValues = explode(",",$submittedForm->fields_value);
            foreach ($formValues as $key => $formValue) {
                $value = explode("^", $formValue);
                if($value[1] != ""){
                    if(isset($fields[$value[0]] )){
                        $fields[$value[0]] = $fields[$value[0]] + 1;
                    } else {
                        $fields[$value[0]] = 1;
                    } 
                }   
            }
        }

        if($totalFormViews != 0){
            $fillConversionsRate = ( $totalFormsFill / $totalFormViews) * 100;
        }

        if($totalFormsFill != 0){
            $completeConversionsRate = ( $totalFormSubmissions / $totalFormsFill) * 100;
        }

        if($totalFormsFill != 0){
            $consentConversion = ( $totalConsentCheck / $totalFormsFill) * 100;
        }
         
        return view('form_details_page', ['totalFormViews' => $totalFormViews, 'totalFormsFill' => $totalFormsFill, 'totalunfinishedSubmissions' => $totalunfinishedSubmissions,
        'totalFormSubmissions' => $totalFormSubmissions, 'fillConversionsRate' => $fillConversionsRate, 'completeConversionsRate' => $completeConversionsRate,
        'totalConsentCheck' => $totalConsentCheck, 'consentConversion'=>$consentConversion,'fields' => $fields]);

    }
}
