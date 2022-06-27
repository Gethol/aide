<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            return redirect('/dashboard');
        }
        elseif(auth()->user()->role == 'emt'){
            return redirect('/emt/dashboard');
        }
        else{
            return auth()->logout();
        }
    }
}