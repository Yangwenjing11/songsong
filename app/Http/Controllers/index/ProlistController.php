<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProlistController extends Controller
{
    public function prolist()
    {
        return view('index.prolist');
    }
}
