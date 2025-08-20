<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'price'];
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
