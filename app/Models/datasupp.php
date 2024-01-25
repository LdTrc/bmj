<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datasupp extends Model
{
    use HasFactory;
    protected $table = 'datasupp';
    protected $PrimaryKey = 'id';
    protected $fillable = ['id','namasupp','notelp','alamat','kota', 'lokasi', 'pengiriman', 'diskon', 'garansi','created_at','updated_at'];

    public function scopeFilter($query)
    {
        if(request('cari')){
            return $query->where('namasupp', 'like', '%' . request('cari') . '%')
                      ->orwhere('notelp', 'like', '%' . request('cari') . '%');
        }
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'supplierid', 'id');
    }
}
