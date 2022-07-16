<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EMTController extends Controller
{




    public function view(Request $request)
    {
       $data2 =[
             'user' => [],
        ];

        if ($request->isMethod('post')) {
            // code...           
            $query = $request->get('search');

            if($query != '')
            {

                $data = DB::table('medical_information')
                ->join('users','users.id','=','medical_information.user_id')
                ->select('users.firstName', 'users.secondName','medical_information.*')      
                ->where('national_id',$query)
                ->first();

                $data2 = [
                    'user' => $data,
                ];
            }


            return view('emt.findPatient', $data2);
        }
        else{
            return view('emt.findPatient', $data2);
        }
    }



    

}
