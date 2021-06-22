<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksis extends Model
{
    use HasFactory;
    protected $table='transaksis';
    protected $fillable = ['name_bk', 'id_member', 'nama_member', 'nama_buku', 'tgl_pinjam', 'tgl_kembali'];

    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'id_member');
    }

    public function Buku()
    {
        return $this->belongsTo('App\Models\Buku', 'id_buku');
    }
    
}
