<?php

namespace App\Models;

use App\Models\surat4;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class keramaian extends Model
{
    use HasFactory;
    protected $guarded =['id'];
  
    public function User(){

        return $this->belongsTo(User::class);
 }
 public function reject2(){
    return $this->hasMany(reject2::class);
 }
 public function surat4(){
    return $this->hasOne(surat4::class);
 }
}
