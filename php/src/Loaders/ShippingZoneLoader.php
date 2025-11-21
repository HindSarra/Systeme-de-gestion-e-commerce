<?php
namespace Loaders;

use Models\ShippingZone;

class ShippingZoneLoader
{
    public static function load(string $filepath): array
    {
        $zones = [];
        if (!file_exists($filepath)) return $zones;

        $file = fopen($filepath, 'r');
        fgetcsv($file); // skip header
        while (($row = fgetcsv($file)) !== false) {
            $zones[$row[0]] = new ShippingZone(
                $row[0],
                floatval($row[1]),
                floatval($row[2] ?? 0.5)
            );
        }

        fclose($file);
        return $zones;
    }
}
