<?php

namespace App\Helpers;

use Carbon\Carbon;
// use IntlCurrency;
// use IntlNumber;

class Helper
{
    /*
    |--------------------------------------------------------------------------
    | Date & Time functions
    |--------------------------------------------------------------------------
    |
    */

    public static function shortDateFromDatetime($datetime, $separator = '/')
    {
        return Carbon::parse($datetime)->format("m${separator}d${separator}Y");
    }

    public static function humanDiffFromDatetime($datetime)
    {
        return Carbon::parse($datetime)->diffForHumans();
    }

    public static function longDatetimeFromDatetime($datetime, $separator = '/')
    {
        return Carbon::parse($datetime)->format("m${separator}d${separator}Y H:m:s");
    }

    /*
    |--------------------------------------------------------------------------
    | Money and Number functions
    |--------------------------------------------------------------------------
    |
    */
   
    // public static function currencyFromInt($amount, $countryCode = 'USD')
    // {
    //     return IntlCurrency::format($amount / 100, $countryCode);
    // }

    // public static function percentFromInt($number)
    // {
    //     return IntlNumber::percent($number / 100);
    // }

    /*
    |--------------------------------------------------------------------------
    | Debug functions
    |--------------------------------------------------------------------------
    |
    */
   
    public static function ddBacktrace()
    {
        dd(debug_backtrace());
    }

    public static function ddWhere($data = [], $heading = true, $headingOnly = false, $simple = true, $hr = false, $box = false, $sublime = false)
    {
        $backtrace = debug_backtrace();

        $file = $backtrace[1]["file"];
        $fileArr = explode("/", $file);
        $line = $backtrace[1]["line"];
        $func = $backtrace[1]["function"];
        $class = $backtrace[1]["class"];
        $obj = $backtrace[1]["object"];


        $fileArrLocal = $fileArr;
        array_forget($fileArrLocal, [0, 1, 2, 3, 4]);
        $relativeFilePath = implode($fileArrLocal, "/");

        $localAppPath = "/mnt/sdb1/Development/repos/whitesunrise_backup/respondable-platform";
        $localFilePath = $localAppPath . '/' . $relativeFilePath;


        $diedAt = "Died: <strong>$class@<u>$func</u></strong> on <em>line <strong>$line</strong></em>";

        $sublimeTextLink = $localFilePath . ':' . $line;
        $whereLink = "$class@$func:$line";

        $arr = [
            'WHERE' => $whereLink,
            'file' => $file,
            // 'fileArr' => $fileArr,
            'relativeFilePath' => $relativeFilePath,
            // 'fileArrLocal' => $fileArrLocal,
            // 'localFilePath' => $localFilePath,
            'class' => $class,
            'function' => $func,
            'line' => $line,
            'object' => $obj,
            'sublimeTextLink' => $sublimeTextLink,
            'data' => $data
        ];


        if ($heading) {
            echo "<h2>$whereLink</h2>";
            if ($headingOnly) {
                dd();
            }
        }

        if ($simple) {
            dd($arr);
        }


        if ($hr) {
            echo "<hr>";
        }

        if ($box) {
            echo "<div class='debug-box' style='
            margin: 10px; padding: 8px 10px; width: auto; height: auto; clear: both;  
            border: 2px solid red; background:rgba(255,255,255,0.9);
            box-shadow: 2px 4px 4px -2px rgba(0,0,0,.8)'>";
        }

        echo $diedAt . "<br>";


        if ($sublime) {
            echo "<a href='file://$sublimeTextLink' target='_blank'>file://" . $sublimeTextLink . "</a>";
        }


        if ($box) {
            echo "</div>";
        }

        if ($hr) {
            echo "<hr>";
        }
    }


    public static function object_to_array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = array();
            foreach ($data as $key => $value)
            {
                $result[$key] = object_to_array($value);
            }
            return $result;
        }
        return $data;
    }
}
