<?php

namespace App;

use App\Reservation;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    //
    protected $fillable = ['name'];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    public function name() {
        return $this->name;
    }
}
