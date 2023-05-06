<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function allCalculators()
    {

        $pageTitle = __('All calculators');

        return view('web.all-calculators', compact('pageTitle'));
    }

    public function calorie()
    {

        $pageTitle = __('Calorie calculator');

        return view('web.calcs.calorie-calc', compact('pageTitle'));
    }

    public function pregnancy()
    {

        $pageTitle = __('When will you give birth?');

        return view('web.calcs.pregnancy-calc', compact('pageTitle'));
    }

    public function bmi()
    {

        $pageTitle = __('Bmi calculator');

        return view('web.calcs.bmi-calc', compact('pageTitle'));
    }

    public function heartRate()
    {

        $pageTitle = __('Heart Rate calculator');

        return view('web.calcs.heart-rate-calc', compact('pageTitle'));
    }

    public function calorieBurnCalculator()
    {

        $pageTitle = __('Calorie Burn calculator');

        return view('web.calcs.calorie-burn-calc', compact('pageTitle'));
    }

    public function ovulationPeriodCalculator()
    {

        $pageTitle = __('Ovulation Period Calculator');

        return view('web.calcs.ovulation-period-calc', compact('pageTitle'));
    }

    public function babyDevelopmentCalculator()
    {

        $pageTitle = __('Baby Development Calculator');

        return view('web.calcs.baby-development-calc', compact('pageTitle'));
    }

    public function babyGrowthCalculator()
    {

        $pageTitle = __('Baby Growth Calculator');

        return view('web.calcs.baby-growth-calc', compact('pageTitle'));
    }
}
