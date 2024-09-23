<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';

    public function getStationsByArea(){
        $s = Station::select('id', 'NAME')->where('AREA_ID', $this->id)->get();
        return $s;
    }

    public function getOperatorsByArea(){
        $o = Operator::select('id', 'EMPLOYEE_ID', 'AREA_ID', 'CATEGORY_ID', 'NAME', 'AGE', 'BIRTHDATE', 'HIRING_DATE', 'PHOTO', 'IsActive')->where('IsActive', 1)->where('AREA_ID', $this->id)->orderBy('EMPLOYEE_ID')->get();
        return $o;
    }
}
