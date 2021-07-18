<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'transactions';

    public function kota()
    {
        return $this->belongsTo(Kota::class,'kota_id','id');
    }

    public function provinsi()
    {
        // return $this->belongsTo(Kota::class,'kota_id','id');

        return $this->belongsToThrough(Provinsi::class, Kota::class,'provinsi_id','id');
    }
}
