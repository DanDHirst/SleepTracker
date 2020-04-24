<?php

namespace Tests\Unit;

use App\Http\Controllers\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $event = new Event(1,"bday","mine","2020-03-15 10:55:00","2020-03-16 20:00:00");
        $this->assertEquals(1,$event->UserID,"test to see if Event class property Userid stores correct value");
        $this->assertEquals("bday",$event->Title,"test to see if Event class property title stores correct value");
        $this->assertEquals("mine",$event->description,"test to see if Event class property description stores correct value");
        $this->assertEquals("2020-03-15 10:55:00",$event->startTime,"test to see if Event class property starttime stores correct value");
        $this->assertEquals("2020-03-16 20:00:00",$event->endTime,"test to see if Event class property endTime stores correct value");
    }
}
