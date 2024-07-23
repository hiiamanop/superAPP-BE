<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'NIP',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'Role_Id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
