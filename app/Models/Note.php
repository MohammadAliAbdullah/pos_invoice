<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['notable_id', 'notable_type', 'content'];
    public function notable()
    {
        return $this->morphTo();
    }
}