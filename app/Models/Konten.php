<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi, definisikan di sini
    protected $table = 'konten';

    // Jika Anda memiliki fillable, tambahkan ini juga
    protected $fillable = ['judul_konten', 'isi_konten'];
}

