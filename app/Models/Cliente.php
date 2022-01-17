<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function alquilers() {
        return $this->hasMany(Alquiler::class);
    }
    public function getEdadAttribute($value){
        return Carbon::parse($this->f_nacimiento)->age;
    }
}
