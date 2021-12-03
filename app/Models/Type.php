<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Type extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'types', 'length' => 12, 'prefix' => 'TYP'.date('my').'-', 'reset_on_prefix_change'=>true]);
        });

        static::deleting(function ($type) {
            //deleting region->item->history
            $type->item->each->delete();
            // $region->item->each(function ($item) {
            //     $item->delete();
            // });
            //delete related data to region from office
        });
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
