<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viewUsers extends Model
{
    //
    protected $table = 'view_users'; // setting up the table name or else laravel will call it ViewSleep
    protected $primaryKey = 'id';
}
