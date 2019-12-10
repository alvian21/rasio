<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rasio extends Model
{
    protected $table = 'rasios';

    protected $fillable = ['name','tipe_rasio'];
}
