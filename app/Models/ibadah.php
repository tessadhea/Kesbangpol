<?php

namespace App\Models;
use App\Models\rejected_ibadah;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ibadah extends Model
{
    use HasFactory;
    protected $guarded =['id'];
  
    public function User(){

        return $this->belongsTo(User::class);
 }
 public function rejected_ibadah(){

    return $this->hasMany(rejected_ibadah::class);
 }
 public function surat1(){

    return $this->hasOne(surat1::class);
 }
}
