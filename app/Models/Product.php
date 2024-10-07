<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'spesifikasi',
        'stok',
        'harga',
        'merk',
        'deskripsi',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->kode_produk = $model->kode_produk ?: Uuid::uuid4()->toString();
        });
    }

    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'product_id');
    }
}
