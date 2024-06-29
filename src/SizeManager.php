<?php

namespace Ispahbod\SizeManager;

class SizeManager
{
    public function convertToMegabytes($input)
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
    
    public function megabytesToKilobytes($megabytes, $withUnit = false)
    {
        $result = $megabytes * 1024;
        return $withUnit ? $result . ' KB' : $result;
    }

    public function kilobytesToMegabytes($kilobytes, $withUnit = false)
    {
        $result = $kilobytes / 1024;
        return $withUnit ? $result . ' MB' : $result;
    }

    public function megabytesToGigabytes($megabytes, $withUnit = false)
    {
        $result = $megabytes / 1024;
        return $withUnit ? $result . ' GB' : $result;
    }

    public function gigabytesToMegabytes($gigabytes, $withUnit = false)
    {
        $result = $gigabytes * 1024;
        return $withUnit ? $result . ' MB' : $result;
    }

    public function kilobytesToBytes($kilobytes, $withUnit = false)
    {
        $result = $kilobytes * 1024;
        return $withUnit ? $result . ' B' : $result;
    }

    public function bytesToKilobytes($bytes, $withUnit = false)
    {
        $result = $bytes / 1024;
        return $withUnit ? $result . ' KB' : $result;
    }

    public function gigabytesToTerabytes($gigabytes, $withUnit = false)
    {
        $result = $gigabytes / 1024;
        return $withUnit ? $result . ' TB' : $result;
    }

    public function terabytesToGigabytes($terabytes, $withUnit = false)
    {
        $result = $terabytes * 1024;
        return $withUnit ? $result . ' GB' : $result;
    }
}
