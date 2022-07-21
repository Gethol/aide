<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\MedicalInformation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MedicalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('create-med-info');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        print_r(Auth::id());
        //dd($request);
         $request->validate([
            'national_id' => 'required|string|unique:App\Models\MedicalInformation,national_id|max:8|min:6',
            'emergency_contact' => 'required',
            'emergency_contact_name' => 'required|string|max:255',
            'blood_type' => 'required|string|max:3',
            'yob' => 'date',
            'medical_conditions' => 'string|required',
            'allergies' => 'string|required',
            'other' => 'string',

        ]);



        $medInfo=  MedicalInformation::create([
            'user_id' => Auth::id(),
            'national_id'=>$request->national_id,
            'emergency_contact' => $request->emergency_contact,
            'emergency_contact_name' => $request->emergency_contact_name,
            'yob' => $request->yob,
            'blood_type' => $request->blood_type,
            'medical_conditions' => $request->medical_conditions,
            'allergies' => $request->allergies,
            'other' => $request->other
        ]);

       if($medInfo)
        {   
            session(['med_info' => '1']);
            return redirect('/');
        }else{
            return redirect()->back()->with('status', 'Medical Information Failed');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $info = MedicalInformation::where('user_id',Auth::id())->first();
        echo "<pre>";
        print_r($info);
        echo "</pre>";

        //re
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $med_info = MedicalInformation::where('user_id',$id)->first(); 

        /*echo "<pre>";
        print_r($med_info);*/

        return view('edit-med-info')->with('medical_information',$med_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'national_id' => 'required|string|max:8|min:6|'.Rule::unique('medical_information', 'national_id')->ignore(Auth::id(),'user_id'),
            'emergency_contact' => 'required',
            'emergency_contact_name' => 'required|string|max:255',
            'blood_type' => 'required|string|max:3',
            'yob' => 'date',
            'medical_conditions' => 'string|required',
            'allergies' => 'string|required',
            'other' => 'string',

        ]);



        $info = MedicalInformation::where('user_id',Auth::id())
                            ->update([
                        'national_id'=>$request->national_id,
                        'emergency_contact' => $request->emergency_contact,
                        'emergency_contact_name' => $request->emergency_contact_name,
                        'yob' => $request->yob,
                        'blood_type' => $request->blood_type,
                        'medical_conditions' => $request->medical_conditions,
                        'allergies' => $request->allergies,
                        'other' => $request->other

                ]);


        if($info)
        {

            return redirect('/');
        }else{
            return redirect()->back()->with('status', 'Update Failed');
        }  



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
