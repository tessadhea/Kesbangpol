<?php

namespace App\Models;

use App\Models\ibadah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rejected_ibadah extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function ibadah(){


        return $this->belongsTo(ibadah::class);
    }
}
