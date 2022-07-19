<?php

namespace App\Http\Controllers;
use App\Models\FirstAidInstruction;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('index');
    }

}

