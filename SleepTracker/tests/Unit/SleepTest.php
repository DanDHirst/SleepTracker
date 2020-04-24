<?php

namespace Tests\Unit;

use App\Http\Controllers\Sleep;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SleepTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testSleepModelInput()
    {
        $sleep = new Sleep(1,"good","2020-03-15 10:55:00","2020-03-16 20:00:00");
        $this->assertEquals(1,$sleep->UserID,"test to see if Sleep class property Userid stores correct value");
        $this->assertEquals("good",$sleep->Notes,"test to see if Sleep class property notes stores correct value");
        $this->assertEquals("2020-03-15 10:55:00",$sleep->startTime,"test to see if Sleep class property starttime stores correct value");
        $this->assertEquals("2020-03-16 20:00:00",$sleep->endTime,"test to see if Sleep class property endTime stores correct value");

    }
}
