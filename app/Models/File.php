<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
}
