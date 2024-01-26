<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'table_master_transaksi';

    protected $primaryKey = 'id_transaksi';

    public $timestamps = false;

    protected $fillable = [
        'nama_customer',
        'id_kendaraan',
        'tanggal_mulai_sewa',
        'tanggal_selesai_sewa',
        'harga_sewa',
    ];

    public function kendaraans (): HasOne {
        return $this -> hasOne(kendaraan::class);
    }
}
