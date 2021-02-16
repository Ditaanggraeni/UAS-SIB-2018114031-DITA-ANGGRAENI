<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak_matakuliah extends Model
{
    use HasFactory;
    protected $fillable = [
        'mahasiswa_id',
        'semester_id'
    ];
}
