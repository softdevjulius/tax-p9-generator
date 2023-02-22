<?php

namespace Repo;

class MonthHelper
{
    public static function getMonthName($month_number)
    {
        return self::months()[$month_number-1];
    }

    private static function months()
    {
        return [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
    }
}
