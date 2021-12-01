<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class History_ownership extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'history_ownerships', 'length' => 12, 'prefix' => 'TRN'.date('my').'-', 'reset_on_prefix_change'=>true]);
        });
    }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
