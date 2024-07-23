<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['mapel_id', 'jenis_penilaian_id', 'code_assignment'];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function jenisPenilaian()
    {
        return $this->belongsTo(JenisPenilaian::class, 'jenis_penilaian_id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

}
