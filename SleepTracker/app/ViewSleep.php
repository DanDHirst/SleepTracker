<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viewSleep extends Model
{
    //
    protected $table = 'view_sleep'; // setting up the table name or else laravel will call it Pub_Products
    protected $primaryKey = 'Sleep_ID';
}
