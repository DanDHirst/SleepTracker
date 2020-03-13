<?php


namespace App\Http\Controllers;
use DB;


class UserModel
{
    //properties
    private $UserID;
    private $name;
    private $email;
    private $country;
    private $age;
    private $gender;

    function __construct($newUserID, $newName, $newEmail, $newCountry,$newAge,$newGender) {
        $this->UserID = (int)filter_var($newUserID, FILTER_SANITIZE_STRING);
        $this->name = filter_var($newName, FILTER_SANITIZE_STRING);
        $this->email = filter_var($newEmail, FILTER_SANITIZE_STRING);
        $this->country = filter_var($newCountry, FILTER_SANITIZE_STRING);
        $this->age = filter_var($newAge, FILTER_SANITIZE_STRING);
        $this->gender = filter_var($newGender, FILTER_SANITIZE_STRING);

    }
    function update(){
        DB::select('CALL update_user(?,?,?,?,?,?)',array($this->UserID, $this->name,$this->email,$this->country,$this->age,$this->gender));
    }
}
