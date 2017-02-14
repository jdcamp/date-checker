<?php

require_once "src/Calendar.php";
class CalendarTest extends PHPUnit_Framework_TestCase
{
    function test_June14th1899()
    {
       // Arrange
       $inputDay = 14;
       $inputMonth = "June";
       $inputYear = 1899;
       $testCalendar = new Calendar;

       //Act
       $result = $testCalendar->calculateDate($inputYear,$inputMonth,$inputDay);

       //assert
       $this->assertEquals("Wednesday",$result);
    }

    function test_Feb14th2017()
    {
       // Arrange
       $inputDay = 14;
       $inputMonth = "February";
       $inputYear = 2017;
       $testCalendar = new Calendar;

       //Act
       $result = $testCalendar->calculateDate($inputYear,$inputMonth,$inputDay);

       //assert
       $this->assertEquals("Tuesday",$result);
    }
    function test_Feb29th2016()
    {
       // Arrange
       $inputDay = 29;
       $inputMonth = "February";
       $inputYear = 2016;
       $testCalendar = new Calendar;

       //Act
       $result = $testCalendar->calculateDate($inputYear,$inputMonth,$inputDay);

       //assert
       $this->assertEquals("Monday",$result);
    }

}
 ?>
