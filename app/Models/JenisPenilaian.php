<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenilaian extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'jenis_penilaian_id');
    }
}
