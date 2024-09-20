<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Certification;
use App\Models\File;
use App\Models\Operator;
use App\Models\Station;
use App\Models\Video;
use Illuminate\Http\Request;

class HRController extends Controller
{
    public function getStations(){
        $stations = Station::all();
        $areas = Area::select('id', 'NAME')->get();
        return view('stations')->with('stations', $stations)->with('areas', $areas);
    }

    public function addStation(Request $r){
        $station = new Station();
        $station->AREA_ID = $r->area;
        $station->NAME = $r->stationame;
        $station->save();
        return redirect()->route('stationsView');
    }

    public function getContent($id){
        $certInfo = Certification::select('id', 'NAME')->where('id', $id)->first();
        $files = File::select('FILE_NAME')->where('CERTIFICATION_ID', $id)->get();
        $videos = Video::select('VIDEO')->where('CERTIFICATION_ID', $id)->get();
        return view('content')->with('files', $files)->with('videos', $videos)->with('certInfo', $certInfo);
    }

    public function addfile(Request $r){
        $file = new File();
        $file->CERTIFICATION_ID = $r->id;
        $r->file('file-input')->storeAs('public/files', $r->file('file-input')->getClientOriginalName());
        $file->FILE_NAME = $r->file('file-input')->getClientOriginalName();
        $file->save();
        return redirect()->route('content', $r->id);
    }
}
