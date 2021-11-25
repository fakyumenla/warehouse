<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function history()
    {
        return $this->hasMany(History_ownership::class);
    }

    public function delete()
    {
        // delete related data simple version
        $this->history()->delete();

        // delete the employee
        return parent::delete();
    }
}
