<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /** @use HasFactory<\Database\Factories\InvitationFactory> */
    use HasFactory;

    protected $guarded = [];

     public function event()
    {
        return $this->belongsTo(Event::class);
    }
 
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
