<?php

namespace App\Utils;

use Carbon\Carbon;

class TimeManager
{
    protected Carbon $dateTime;

    function __construct($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    function timeChanger(): string
    {
        $times = ['00', '03', '06', '09', '12', '15', '18', '21', '24'];
        $input_time = $this->dateTime->format('H');
        $chosen_time = '';

        if (in_array($input_time, $times)) {
            $chosen_time = $input_time;
        } else {
            foreach ($times as $index => $time) {
                if ($time > $input_time) {
                    $chosen_time = $times[$index - 1];
                    break;
                }
            }
        }

        $originalDate = $this->dateTime->toDateString();
        $customizedDateTime = Carbon::parse($originalDate)->toDateTimeString();
        return Carbon::parse($customizedDateTime)->hour($chosen_time)->toDateTimeString();
    }
}


