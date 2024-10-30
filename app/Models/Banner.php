<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi, definisikan di sini
    protected $table = 'banner';

    // Jika Anda memiliki fillable, tambahkan ini juga
    protected $fillable = ['isi_konten', 'gambar'];
}

