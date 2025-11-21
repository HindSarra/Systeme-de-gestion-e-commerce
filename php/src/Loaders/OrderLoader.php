<?php
namespace Loaders;

use Models\Order;

class OrderLoader{

    public static function load(string $filepath): array
    {
        $orders = [];
        if (!file_exists($filepath)) return $orders;

        $file = fopen($filepath, 'r');
        fgetcsv($file); // skip header
        while (($row = fgetcsv($file)) !== false) {
            $orders[] = new Order(
                $row[0],
                $row[1],
                $row[2],
                intval($row[3]),
                floatval($row[4]),
                $row[5] ?? '',
                $row[6] ?? '',
                $row[7] ?? '12:00'
            );
        }

        fclose($file);
        return $orders;
    }
}
