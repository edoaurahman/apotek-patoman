<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeranjang extends Model
{
    use HasFactory;
    protected $table = 'detail_keranjang';
    protected $guarded = 'id';

    public function obat()
    {
        return $this->belongsTo(Obat::class,'kode_obat');
    }
}
