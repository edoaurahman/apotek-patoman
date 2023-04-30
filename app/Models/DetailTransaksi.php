<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $guarded = 'id';


    public function obat()
    {
        return $this->belongsTo(Obat::class,'kode_obat');
    }
}
