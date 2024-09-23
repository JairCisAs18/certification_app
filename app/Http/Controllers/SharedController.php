<?php

namespace App\Http\Controllers;
use App\Models\Operator;
use App\Models\Area;
use App\Models\Category;
use App\Models\Certification;
use App\Models\File;
use App\Models\Video;
use Illuminate\Http\Request;

class SharedController extends Controller
{
    public function getOperators(){
        $areas = Area::select('id', 'NAME')->get();
        return view('operators')->with('areas', $areas);
    }

    public function addOperatorView(){
        $areas = Area::select('id', 'NAME')->get();
        $categories = Category::select('id', 'CATEGORY')->get();
        return view('add-operator')->with('areas', $areas)->with('categories', $categories);
    }

    public function addOperator(Request $r){
        if (!is_null($r->operatorId))
            $operator = Operator::find($r->operatorId);
        else
            $operator = new Operator();
        $operator->CREATED_BY = auth()->user()->id;
        $operator->AREA_ID = $r->area;
        $operator->CATEGORY_ID = $r->category;
        $operator->EMPLOYEE_ID = $r->employee_id;
        $operator->NAME = $r->name;
        $operator->AGE = $r->age;
        $operator->BIRTHDATE = $r->birthdate;
        $operator->HIRING_DATE = $r->hiringdate;
        if (!is_null($r->photo)){
            $r->file('photo')->storeAs('public/photos', $r->name.'.'.$r->file('photo')->getClientOriginalExtension());
            $operator->PHOTO = $r->name.'.'.$r->file('photo')->getClientOriginalExtension();
        }
        $operator->save();
        return redirect()->route('operatorsView');
    }

    public function editOperatorView($id){
        $operator = Operator::select('id', 'EMPLOYEE_ID', 'AREA_ID', 'CATEGORY_ID', 'NAME', 'AGE', 'BIRTHDATE', 'PHOTO')->where('id', $id)->first();
        $areas = Area::select('id', 'NAME')->get();
        $categories = Category::select('id', 'CATEGORY')->get();
        return view('edit-operator')->with('operator', $operator)->with('areas', $areas)->with('categories', $categories);
    }

    public function changeToInactive($id){
        $operator = Operator::select('id', 'IsActive')->where('id', $id)->first();
        $operator->IsActive = 0;
        $operator->save();
        return redirect()->route('operatorsView');
    }
}
