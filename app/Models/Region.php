<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Region extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function office()
    {
        return $this->hasMany(Office::class);
    }

    // public function delete()
    // {
    //     // delete all related data 
    //     $this->item()->delete();
    //     $this->office()->delete();
    //     // as suggested by Dirk in comment,
    //     // it's an uglier alternative, but faster
    //     // Photo::where("user_id", $this->id)->delete()

    //     // delete the user
    //     return parent::delete();
    // }

    public static function boot()
    {
        parent::boot(); 

        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'regions', 'length' => 12, 'prefix' => 'REG'.date('my').'-', 'reset_on_prefix_change'=>true]);
        });

        static::deleting(function ($region) {
            //deleting region->item->history
            $region->item->each->delete();
            // $region->item->each(function ($item) {
            //     $item->delete();
            // });
            //delete related data to region from office
            $region->office->delete();
        });
    }
}
