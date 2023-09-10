<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rejected extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function ormas(){


        return $this->belongsTo(ormas::class);
    }
}
