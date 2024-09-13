<?php

namespace App\Http\Controllers;
use App\Models\Operator;
use App\Models\Area;
use Illuminate\Http\Request;

class SharedController extends Controller
{
    public function getOperators(){
        $operators = Operator::select('id', 'EMPLOYEE_ID', 'NAME', 'AGE', 'BIRTHDATE', 'CATEGORY', 'PHOTO', 'IsActive')->where('IsActive', 1)->orderBy('EMPLOYEE_ID')->get();
        return view('operators')->with('operators', $operators);
    }

    public function addOperatorView(){
        $areas = Area::select('id', 'NAME')->get();
        return view('add-operator')->with('areas', $areas);
    }

    public function addOperator(Request $r){
        if (!is_null($r->operatorId))
            $operator = Operator::find($r->operatorId);
        else
            $operator = new Operator();
        $operator->CREATED_BY = auth()->user()->id;
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

    public function editOperatorView($id){
        $operator = Operator::select('id', 'EMPLOYEE_ID', 'AREA_ID', 'NAME', 'AGE', 'BIRTHDATE', 'CATEGORY', 'PHOTO')->where('id', $id)->first();
        $areas = Area::select('id', 'NAME')->get();
        return view('edit-operator')->with('operator', $operator)->with('areas', $areas);
    }

    public function changeToInactive($id){
        $operator = Operator::select('id', 'IsActive')->where('id', $id)->first();
        $operator->IsActive = 0;
        $operator->save();
        return redirect()->route('operatorsView');
    }
}
