<?php
namespace Services;

use Models\Customer;
use Models\Order;
use Models\Product;
use Models\ShippingZone;
use Models\Promotion;

class OrderCalculator
{
    const TAX = 0.2;
    const SHIPPING_LIMIT = 50;
    const HANDLING_FEE = 2.5;
    const MAX_DISCOUNT = 200;
    const LOYALTY_RATIO = 0.01;

    /**
     * Calcule les totaux pour un client
     */
    public static function calculateTotals(
        Customer $customer,
        array $orders,
        array $products,
        array $shippingZones,
        array $promotions
    ): array {
        $totals = [
            'subtotal' => 0.0,
            'discount' => 0.0,
            'tax' => 0.0,
            'shipping' => 0.0,
            'handling' => 0.0,
            'grandTotal' => 0.0,
            'loyaltyPoints' => 0,
            'weight' => 0.0
        ];

        $weight = 0.0;
        $loyaltyPoints = 0;

        foreach ($orders as $order) {
            $product = $products[$order->getProductId()] ?? null;
            if (!$product) continue;

            $lineTotal = $order->getQty() * $product->getPrice();

            // Promotion
            $promo = $promotions[$order->getPromoCode()] ?? null;
            if ($promo && $promo->isActive()) {
                if ($promo->getType() === 'PERCENTAGE') {
                    $lineTotal *= 1 - $promo->getValue()/100;
                } elseif ($promo->getType() === 'FIXED') {
                    $lineTotal -= $promo->getValue() * $order->getQty();
                }
            }

            // Points fidélité
            $loyaltyPoints += $lineTotal * self::LOYALTY_RATIO;

            $totals['subtotal'] += $lineTotal;
            $weight += $product->getWeight() * $order->getQty();
        }

        $totals['loyaltyPoints'] = floor($loyaltyPoints);
        $totals['weight'] = $weight;

        return $totals;
    }
}
