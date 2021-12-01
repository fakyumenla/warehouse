<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = ['id'];

    public $incrementing = false;

    public function type()
    {
        return $this->belongsTo(Type::class,'type_id','id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class,'office_id','id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }

    public function history()
    {
        return $this->hasMany(History_ownership::class);
    }

    public function delete()
    {
        // delete all related data
        $this->history()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }

    public static function boot()
    {
        parent::boot(); 

        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'employees', 'length' => 12, 'prefix' => 'ITM'.date('my').'-', 'reset_on_prefix_change'=>true]);
        });

        static::deleting(function ($item) {
            //continuation deleting region->item->history
            $item->history->each(function ($history) {
                $history->delete();
            });
        });
    }
}
