<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPoint extends Model
{
    use HasFactory;

    protected $fillable = ['kecepatan_maks', 'konsumsi_bb', 'tipe_kendaraan'];
}
