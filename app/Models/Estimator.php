<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estimator extends Model
{
    use HasFactory;


    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
