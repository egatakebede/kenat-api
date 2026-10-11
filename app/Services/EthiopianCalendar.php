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
    public static function gregorianToJdn(int $year, int $month, int $day): int
    {
        $a = intdiv(14 - $month, 12);
        $y = $year + 4800 - $a;
        $m = $month + 12 * $a - 3;

        return $day
            + intdiv(153 * $m + 2, 5)
            + 365 * $y
            + intdiv($y, 4)
            - intdiv($y, 100)
            + intdiv($y, 400)
            - 32045;
    }
}
