<?php

namespace App\Models;

use App\Models\surat3;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ormas extends Model
{
    use HasFactory;
    protected $guarded =['id'];
  
    public function User(){

        return $this->belongsTo(User::class);
 }
 public function rejected(){

    return $this->hasMany(rejected::class);
}
public function surat3(){

    return $this->hasOne(surat3::class);
}

}
