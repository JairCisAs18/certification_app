<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationHasCertification extends Model
{
    use HasFactory;
    protected $table = 'station_has_certification';

    public function getCertifications(){
        $cert = Certification::select('id', 'NAME')->where('id', $this->CERTIFICATION_ID);
        return $cert;
    }
}
