<?php
namespace Loaders;

use Models\Customer;

class CustomerLoader
{
    public static function load(string $filepath): array
    {
        $customers = [];
        if (!file_exists($filepath)) return $customers;

        $file = fopen($filepath, 'r');
        if ($file === false) return $customers;

        fgetcsv($file); // skip header
        while (($row = fgetcsv($file)) !== false) {
            $customers[$row[0]] = new Customer(
                $row[0],
                $row[1],
                $row[2] ?? 'BASIC',
                $row[3] ?? 'ZONE1',
                $row[4] ?? 'EUR'
            );
        }

        fclose($file);
        return $customers;
    }
}
