<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $primaryKey = ['id'];

    public $incrementing = false;

    public function history()
    {
        return $this->hasMany(History_ownership::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'employees', 'length' => 7, 'prefix' => 'EMP-', 'reset_on_prefix_change'=>true]);
        });
    }

    public function delete()
    {
        // delete related data simple version
        $this->history()->delete();

        // delete the employee
        return parent::delete();
    }
}
