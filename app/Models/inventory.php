<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $PrimaryKey = 'id';
    protected $fillable = ['id', 'quantity', 'sell_price', 'product_id', 'created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id','id');
    }
}
