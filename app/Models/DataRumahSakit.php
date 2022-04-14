<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRumahSakit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function datapasien()
    {
        return $this->hasMany(DataPasien::class);
    }
    
}


