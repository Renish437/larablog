<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    //
    public function __construct(Request $request)
    {
          $setting = \App\Models\GeneralSetting::first();
          View::share([
            'setting' => $setting
          ]);
        
    }
}
