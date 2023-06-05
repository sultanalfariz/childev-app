<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Pengguna extends Model
=======
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
>>>>>>> 02dba0f (add login feature)
{
    protected $table = 'user';

    protected $primaryKey = 'uid';

    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap', 'nik', 'tanggal_lahir', 'alamat', 'jenis_kelamin', 'no_hp', 'email',
        'password', 'confirm_password', 'foto_profil', 'role'
    ];
}
