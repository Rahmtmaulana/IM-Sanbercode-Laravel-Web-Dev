<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['name', 'product_id', 'qty', 'type'];

public function product()
{
    return $this->belongsTo(Product::class);
}
}
