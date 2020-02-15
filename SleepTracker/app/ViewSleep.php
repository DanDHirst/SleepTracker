<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewSleep extends Model
{
    //
    protected $table = 'view_sleep'; // setting up the table name or else laravel will call it ViewSleep
    protected $primaryKey = 'Sleep_ID';
}
