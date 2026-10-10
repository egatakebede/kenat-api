<?php

namespace App\Services;

use InvalidArgumentException;


class EthiopianCalendar
{
    public static function isLeapYear(int $year): bool
    {
        return ($year % 4) === 3;
    }
    public static function daysInMonth(int $year, int $month): int

    {
        if ($month < 1 || $month > 13) {
            throw new InvalidArgumentException('Month must be between 1 and 13.');
        }
        if ($month < 13) {
            return 30;
        }
        return self::isLeapYear($year) ? 6 : 5;
    }
}
