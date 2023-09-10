<?php

namespace App\Models;

use App\Models\ormas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class surat3 extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function ormas(){


        return $this->belongsTo(ormas::class);
    }
}
