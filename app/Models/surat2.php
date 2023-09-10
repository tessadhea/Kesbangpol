<?php

namespace App\Models;

use App\Models\penelitian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class surat2 extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function penelitian(){


        return $this->belongsTo(penelitian::class);
    }
}
