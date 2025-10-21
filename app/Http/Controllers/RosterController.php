<?php

namespace App\Http\Controllers;

use Laravel\Roster\Roster;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $roster = Roster::scan(base_path());
        $packages = $roster->packages();
        echo __('Get only packages that will be used in production: ') . PHP_EOL;
        $packagesInProduction = $packages->production();
        $index = 1;
        foreach ($packagesInProduction as $value) {
            echo ($index++) . '. ' . $value->rawName() . ':' . $value->version() . PHP_EOL;
        }
        echo __('Get only packages that will be used in development: ') . PHP_EOL;
        $packagesInDev = $packages->dev();
        $index = 1;
        foreach ($packagesInDev as $key => $value) {
            echo ($index++) . '. ' . $value->rawName() . ':' . $value->version() . PHP_EOL;
        }
    }
}
