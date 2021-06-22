<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_number'];


    // public function getStatusLabelAttribute()
    // {
    //     if ($this->status = 0) {
    //         return '<span class="text-red">Masyarakat</span>';
    //     }
    //     return '<span  class="text-green">Mahasiswa</span>';
    // }
}
