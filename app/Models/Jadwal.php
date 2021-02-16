<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal', 'matakuliah_id'
    ];

    public function matkul()
    {
        return $this->hasMany('App\Models\Matkul');
    }
}
