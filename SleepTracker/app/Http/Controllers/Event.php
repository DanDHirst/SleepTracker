<?php


namespace App\Http\Controllers;
use DB;


class Event
{
    //properties
    private $UserID;
    private $Title;
    private $description;
    private $startTime;
    private $endTime;

    function __construct($newUserID, $newTitle, $newDesc, $newStartTime, $newEndTime) {
        $this->UserID = (int)filter_var($newUserID, FILTER_SANITIZE_STRING);
        $this->Title = filter_var($newTitle, FILTER_SANITIZE_STRING);
        $this->description = filter_var($newDesc, FILTER_SANITIZE_STRING);
        $this->startTime = $newStartTime;
        $this->endTime = $newEndTime;
    }
    function save(){
        DB::select('CALL add_event(?,?,?,?,?)',array($this->UserID, $this->Title,$this->description,$this->startTime,$this->endTime));
    }
    function toString()
    {
        $Fields = "User id: ".$this->UserID." Title: ".$this->Title." Description: ".$this->description." starttime ".$this->startTime." endtime: ".$this->endTime;
        return $Fields;
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
