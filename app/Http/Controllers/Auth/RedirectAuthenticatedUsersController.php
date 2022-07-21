<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MedicalInformation;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()->role == 'admin') {



            return redirect('/admin/dashboard');
        }
        elseif(auth()->user()->role == 'user'){
             $info = MedicalInformation::where('user_id',auth()->user()->id)->first();
            if ($info) {
                $data =1;
            }else{
                $data = 0;
            }

           
            session(['med_info' => $data]);

            return redirect('/');
        }
        elseif(auth()->user()->role == 'emt'){
            return redirect('/emt/dashboard');
        }
        else{
            return auth()->logout();
        }
    }
}