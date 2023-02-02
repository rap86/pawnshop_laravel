<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComputationsController extends Controller
{
    public function convertToYearMonthDay($sum) {
        $years  = floor($sum / 365);
        $months = floor(($sum - ($years * 365))/30.5);
        $days   = floor($sum - ($years * 365) - ($months * 30.5));

        $dateDiff['date']['year'] = $years;
        $dateDiff['date']['month'] = $months;
        $dateDiff['date']['day'] = $days;

        return $dateDiff;
    }
}
