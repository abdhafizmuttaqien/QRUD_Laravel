<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qtasnim_Tabel extends Model
{
    use HasFactory;

    protected $table = 'qtasnim_tabel';
    protected $fillable = ['nama_barang','stok','jumlah_terjual','jenis_barang'];
}
