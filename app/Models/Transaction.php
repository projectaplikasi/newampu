<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'name_customer',
        'phone_customer',
        'email_customer',
        'address_customer',
        'type_customer',
        'tanggal_sewa',
        'tanggal_kembali',
        'jumlah',
        'total_biaya'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
