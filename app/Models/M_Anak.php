<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nama_anak', 'uid', 'tanggal_lahir', 'jenis_kelamin', 'cara_lahir'
    ];
}
