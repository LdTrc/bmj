<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $PrimaryKey = 'id';
    protected $fillable = ['id','nama','telp','alamat','created_at','updated_at'];


    public function product()
    {
        return $this->hasMany(Product::class, 'supplierid', 'id');
    }
}
