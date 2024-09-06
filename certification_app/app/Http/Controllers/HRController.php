<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Operator;
use Illuminate\Http\Request;

class HRController extends Controller
{
    public function getOperators(){
        $operators = Operator::select('EMPLOYEE_ID', 'NAME', 'AGE', 'BIRTHDATE', 'CATEGORY', 'PHOTO')->get();
        return view('operators')->with('operators', $operators);
    }

    public function addOperatorView(){
        $areas = Area::select('id', 'NAME')->get();
        $userId = auth()->user()->id;
        return view('add-operator')->with('areas', $areas)->with('userId', $userId);
    }

    public function addOperator(Request $r){
        $operator = new Operator();
        $operator->CREATED_BY = $r->userId;
        $operator->AREA_ID = $r->area;
        $operator->EMPLOYEE_ID = $r->employee_id;
        $operator->NAME = $r->name;
        $operator->AGE = $r->age;
        $operator->BIRTHDATE = $r->birthdate;
        $operator->CATEGORY = $r->category;
        if (!is_null($r->photo)){
            $r->file('photo')->storeAs('public/photos', $r->name.'.'.$r->file('photo')->getClientOriginalExtension());
            $operator->PHOTO = $r->name.'.'.$r->file('photo')->getClientOriginalExtension();
        }
        $operator->save();
        return redirect()->route('operatorsView');
    }
}
