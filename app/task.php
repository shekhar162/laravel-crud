<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //
    protected $fillable = ['title', 'shortDesc'];
    # protected $guarded = [];
}