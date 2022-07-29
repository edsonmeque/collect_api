<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function searchContainersToDistrictEnable(Request $request)
    {
        $data = Container::where('district_id','=', $request->district_id)
        ->Where('status','=',1)->count('id')->get();
        return $data;
    }

    public function searchContainersToDistrictDesibled(Request $request)
    {
        $data = Container::where('district_id','=', $request->district_id)
        ->Where('status','=',0)->count('id')->get();
        return $data;
    }

    public function searchContainersToDistrictToll(Request $request)
    {
        $data = Container::where('district_id','=', $request->district_id)->count('id')->get();
        return $data;
    }
}
