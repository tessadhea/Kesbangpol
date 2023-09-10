<?php

namespace App\Models;

use App\Models\keramaian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class surat4 extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function keramaian(){


        return $this->belongsTo(keramaian::class);
    }
}
