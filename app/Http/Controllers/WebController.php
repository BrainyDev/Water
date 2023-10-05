<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //return word press landing page
    public function landing()
    {
        // return view('web.landing');
    }

    //return word press e-visa application page
    public function eVisa($origin)
    {
        if($origin == 'Normal'){
            $types = Service::all();
            return view('web.apply_evisa', compact(
                'types'
            ));
        }else{
            // return view('web.emergency_evisa');
        }
        
    }

}
