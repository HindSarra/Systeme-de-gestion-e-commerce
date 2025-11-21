<?php
namespace Loaders;

use Models\product;

class ProductLoader
{
    public static function load(string $filepath): array
    {
        $products = [];
        if (!file_exists($filepath)) return $products;

        $file = fopen($filepath, 'r');
        fgetcsv($file); // skip header
        while (($row = fgetcsv($file)) !== false) {
            $products[$row[0]] = new Product(
                $row[0],
                $row[1],
                $row[2],
                floatval($row[3]),
                floatval($row[4] ?? 1.0),
                ($row[5] ?? 'true') === 'true'
            );
        }
        fclose($file);
        return $products;
    }
}
