<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $PrimaryKey = 'id';
    protected $fillable = ['id','nama','telp','alamat','kecpengiriman', 'tdiskon', 'pelayanan', 'garansi', 'keaslian', 'tpembayaran','created_at','updated_at'];

    public function scopeFilter($query)
    {
        if(request('cari')){
            return $query->where('nama', 'like', '%' . request('cari') . '%')
                      ->orwhere('telp', 'like', '%' . request('cari') . '%');
        }
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'supplierid', 'id');
    }
}
