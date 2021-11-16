<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
