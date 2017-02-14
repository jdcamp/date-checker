<?php

    class Calendar
    {

        // FORMULA:
        // Day = d+e+f+g+(g/4) mod 7
        // e = modifier from monthArray, f= lookup from Year Table based on c %4, where c is year % 100
        // g=last two digits of year.  If (m==1|m==2), g-=1;
        // week starts with Sunday =1

        function calculateDate($year, $month, $day) {
            $monthArray = array('January' => 0, 'February' => 3, 'March' => 2, 'April' => 5, 'May' => 0, 'June' => 3, 'July' => 5, 'August' => 1, 'September' => 4, 'October' => 6, 'November' => 2, 'December' => 4);
            $yearArray = array(0 => 0, 1 => 5, 2 => 3, 4=> 1);
            $dayOfWeekArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
            $monthModifier = $monthArray[$month]; //e value
            $centuryModifier = 0;
            $yearEndDigits = $year;
            //d is $day
            if ($month == 'January' || $month == "February"){
                if($year > 100) {
                    $yearEndDigits = ($year % 100)-1;
                    $centuryModifier = floor(($year-1)/100);
                } else {
                    $yearEndDigits = $year -1;
                }
            } else {
                if($year > 100) {
                    $yearEndDigits = $year % 100;
                    $centuryModifier = floor($year/100);
                }
            }

            $yearModifier = $yearArray[$centuryModifier%4];

            $dayLookup = $day + $monthModifier + $yearModifier + $yearEndDigits + floor($yearEndDigits/4);

            $output = $dayOfWeekArray[$dayLookup%7];

            return $output;
        }
    }




?>

$day = 14;
$month = "June";
$year = 1899;

    $monthArray = array('January' => 1, 'February' => 4, 'March' => 4, 'April' => 0, 'May' => 2, 'June' => 5, 'July' => 0, 'August' => 3, 'September' => 6, 'October' => 1, 'November' => 4, 'December' => 6);
    $yearArray = array(0 => 0, 1 => 5, 2 => 3, 4=> 1);
    $dayOfWeekArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    $monthModifier = $monthArray[$month]; //e value
    $centuryModifier = 0;
    $yearEndDigits = $year;
    //d is $day
    if ($month == 'January' || $month == "February"){
        if($year > 100) {
            $yearEndDigits = ($year % 100)-1;
            $centuryModifier = floor(($year-1)/100);
        } else {
            $yearEndDigits = $year -1;
        }
    } else {
        if($year > 100) {
            $yearEndDigits = $year % 100;
            $centuryModifier = floor($year/100);
        }
    }

    $yearModifier = $yearArray[$centuryModifier%4];

    $dayLookup = $day + $monthModifier + $yearModifier + $yearEndDigits + floor($yearEndDigits/4);
    echo $monthModifier;
    echo $yearModifier;
    echo $yearEndDigits;
    echo floor($yearEndDigits/4);


    $output = $dayOfWeekArray[$dayLookup%7];

    echo $output;
