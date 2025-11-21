<?php
namespace Loaders;

use Models\Promotion;

class PromotionLoader
{
    public static function load(string $filepath): array
    {
        $promotions = [];
        if (!file_exists($filepath)) return $promotions;

        $file = fopen($filepath, 'r');
        fgetcsv($file); // skip header
        while (($row = fgetcsv($file)) !== false) {
            $promotions[$row[0]] = new Promotion(
                $row[0],                // code
                $row[1],                // type
                floatval($row[2]),      // value
                ($row[3] ?? 'true') !== 'false' // active
            );
        }

        fclose($file);
        return $promotions;
    }
}
