<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $guarded = ['id'];

    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }
    public function coches() {
        return $this->belongsTo(Coche::class);
    }
}
