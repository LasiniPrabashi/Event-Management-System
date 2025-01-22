<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
  
    protected $table = 'events';

    protected $guarded = [];

     protected $fillable = ['user_id','event_name','description','location','start_date','end_date','start_time','is_active',];


}
