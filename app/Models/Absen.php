<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $fillable = ['waktu_absen', 'mahasiswa_id', 'matakuliah_id', 'keterangan'];
}
