<?php

namespace App;

use App\Studio;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     protected $fillable = ['studio_id'];
     public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
    
    public function studioName() {
        return $this->studio()->get()->first()->name;
    }
    
    public function timePretty() {
        $t = date("g:i A", strtotime($this->time));
        return $t;
    }
}
