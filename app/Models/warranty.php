<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warranty extends Model
{
    use HasFactory;
    protected $table = 'warranty';
    protected $PrimaryKey = 'id';
    protected $fillable = ['id', 'quantity', 'warranty', 'order_date', 'inventory_id', 'buy_price', 'created_at','updated_at'];

    public function inventory()
    {
        return $this->belongsTo(inventory::class, 'inventory_id','id');
    }
}
