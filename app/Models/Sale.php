<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $fillable = ['customer_id', 'total_amount', 'sale_date'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }



}