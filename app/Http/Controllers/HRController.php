<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Certification;
use App\Models\File;
use App\Models\Operator;
use App\Models\Station;
use App\Models\StationHasCertification;
use App\Models\Video;
use Illuminate\Http\Request;

class HRController extends Controller
{
    private function saveCertifications($id){
        $cert = Certification::select('id')->get();
        foreach ($cert as $c){
            $shc = new StationHasCertification();
            $shc->STATION_ID = $id;
            $shc->CERTIFICATION_ID = $c->id;
            $shc->save();
        }
    }

    public function getStations(){
        $areas = Area::select('id', 'NAME')->get();
        return view('stations')->with('areas', $areas);
    }

    public function addStation(Request $r){
        $station = new Station();
        $station->AREA_ID = $r->area;
        $station->NAME = $r->stationame;
        $station->save();
        $this->saveCertifications($station->id);
        return redirect()->route('stationsView');
    }

}
