<?php


namespace App\Http\Controllers;
use DB;


class Sleep
{
    //properties
    private $UserID;
    private $Notes;
    private $startTime;
    private $endTime;

    function __construct($newUserID, $newNotes, $newStartTime, $newEndTime) {
        $this->UserID = (int)filter_var($newUserID, FILTER_SANITIZE_STRING);
        $this->Notes = filter_var($newNotes, FILTER_SANITIZE_STRING);
        $this->startTime = $newStartTime;
        $this->endTime = $newEndTime;
    }
    function save(){
        DB::select('CALL add_sleep(?,?,?,?)',array($this->UserID, $this->Notes,$this->startTime,$this->endTime));
    }
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

}
