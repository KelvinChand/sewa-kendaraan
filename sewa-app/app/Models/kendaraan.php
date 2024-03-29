<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class kendaraan extends Model
{
    use HasFactory;

    protected $table = 'table_master_kendaraan';

    protected $fillable = [
        "plat_kendaraan",
        "nama_kendaraan"
    ];

    protected $primaryKey = 'id_kendaraan';

    public $timestamps = false;
    
    public function transaksis() : BelongsTo  {
        return $this->belongsTo(transaksi::class);
    }
}
