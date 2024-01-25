<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'table_master_transaksi';
    public function kendaraans (): HasOne {
        return $this -> hasOne(kendaraan::class);
    }
}
