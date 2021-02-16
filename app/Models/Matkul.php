<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $fillable = [
        'jadwal_id',
        'nama_matakuliah',
        'sks'
    ];

    public function jadwal()
    {
        return $this->belongsTo('App\Models\Matkul');
    }
}
