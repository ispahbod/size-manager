<?php

namespace Ispahbod\SizeManager;

class SizeManager
{
    public static function convertToMegabytes(string $input): float
    {
        $units = [
            'B' => 1 / (1024 * 1024),
            'KB' => 1 / 1024,
            'MB' => 1,
            'GB' => 1024,
            'TB' => 1024 * 1024
        ];
        preg_match('/([\d.]+)\s*([a-zA-Z]+)/', $input, $matches);
        if (count($matches) !== 3) {
            throw new \InvalidArgumentException("Invalid input format");
        }
        $value = (float)$matches[1];
        $unit = strtoupper($matches[2]);
        if (!isset($units[$unit])) {
            throw new \InvalidArgumentException("Invalid unit");
        }
        return $value * $units[$unit];
    }
    
    public static function megabytesToKilobytes(float $megabytes, bool $withUnit = false): string|float
    {
        $result = $megabytes * 1024;
        return $withUnit ? $result . ' KB' : $result;
    }

    public static function kilobytesToMegabytes(float $kilobytes, bool $withUnit = false): string|float
    {
        $result = $kilobytes / 1024;
        return $withUnit ? $result . ' MB' : $result;
    }

    public static function megabytesToGigabytes(float $megabytes, bool $withUnit = false): string|float
    {
        $result = $megabytes / 1024;
        return $withUnit ? $result . ' GB' : $result;
    }

    public static function gigabytesToMegabytes(float $gigabytes, bool $withUnit = false): string|float
    {
        $result = $gigabytes * 1024;
        return $withUnit ? $result . ' MB' : $result;
    }

    public static function kilobytesToBytes(float $kilobytes, bool $withUnit = false): string|float
    {
        $result = $kilobytes * 1024;
        return $withUnit ? $result . ' B' : $result;
    }

    public static function bytesToKilobytes(float $bytes, bool $withUnit = false): string|float
    {
        $result = $bytes / 1024;
        return $withUnit ? $result . ' KB' : $result;
    }

    public static function gigabytesToTerabytes(float $gigabytes, bool $withUnit = false): string|float
    {
        $result = $gigabytes / 1024;
        return $withUnit ? $result . ' TB' : $result;
    }

    public static function terabytesToGigabytes(float $terabytes, bool $withUnit = false): string|float
    {
        $result = $terabytes * 1024;
        return $withUnit ? $result . ' GB' : $result;
    }
}
