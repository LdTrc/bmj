<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $PrimaryKey = 'id';
    protected $fillable = ['id', 'supplierid', 'namabarang', 'kualitas', 'satuan', 'price', 'created_at','updated_at'];

    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'supplierid','id');
    }
}
