<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = ['kode','supplier_id', 'nama_obat','produsen','stok', 'foto', 'harga','tgl_kadaluarsa'];
    public $incrementing = false;
    protected $primaryKey = 'kode';

    public function detail_transaksi(){
        return $this->belongsTo(DetailTransaksi::class, 'kode_obat');
    }
}
