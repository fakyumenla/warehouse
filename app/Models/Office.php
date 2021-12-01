<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Office extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = ['id'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'offices', 'length' => 12, 'prefix' => 'OFI'.date('my').'-', 'reset_on_prefix_change'=>true]);
        });
    }

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
