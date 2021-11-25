<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }

    public function delete()
    {
        // delete related data simple version
        $this->item()->delete();

        // delete the office
        return parent::delete();
    }
}
