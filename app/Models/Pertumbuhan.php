<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertumbuhan extends Model
{
    use HasFactory;

    protected $table = 'pertumbuhan';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_anak', 'tinggi', 'berat', 'lingkar_kepala', 'usia'
    ];
}
