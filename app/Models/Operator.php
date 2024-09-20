<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $table = 'operators';

    public function getArea(){
        $area = Area::select('NAME')->where('id', $this->AREA_ID)->first();
        return $area->NAME;
    }

    public function getCategory(){
        $category = Category::select('CATEGORY')->where('id', $this->CATEGORY_ID)->first();
        return $category->CATEGORY;
    }
}
