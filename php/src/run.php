<?php
//appeler toute mes fichier 
require_once __DIR__ .'/models/customer.php';
require_once __DIR__ .'/models/product.php';
require_once __DIR__ .'/models/order.php';
require_once __DIR__ .'/models/shipping_zone.php';
require_once __DIR__ .'/models/promotion.php';

require_once __DIR__ .'/Loaders/CustomerLoader.php';
require_once __DIR__ .'/Loaders/ProductLoader.php';
require_once __DIR__ .'/Loaders/OrderLoader.php';
require_once __DIR__ .'/Loaders/ShippingZoneLoader.php';
require_once __DIR__ .'/Loaders/PromotionLoader.php';



use Loaders\CustomerLoader;
use Loaders\ProductLoader;
use Loaders\OrderLoader;
use Loaders\ShippingZoneLoader;
use Loaders\PromotionLoader;


// Chemins des CSV
$base = __DIR__ . '/../legacy/data/';
$customersCsv = $base . 'customers.csv';
$productsCsv = $base . 'products.csv';
$ordersCsv = $base . 'orders.csv';
$shippingZonesCsv = $base . 'shipping_zones.csv';
$promotionsCsv = $base . 'promotions.csv';

// Chargement des données
$customers = CustomerLoader::load($customersCsv);
$products = ProductLoader::load($productsCsv);
$orders = OrderLoader::load($ordersCsv);
$shippingZones = ShippingZoneLoader::load($shippingZonesCsv);
$promotions = PromotionLoader::load($promotionsCsv);

// Test : afficher les clients
echo "=== Customers ===\n";
foreach ($customers as $c) {
    echo sprintf("%s: %s, Level: %s, Zone: %s, Currency: %s\n",
        $c->getId(),
        $c->getName(),
        $c->getLevel(),
        $c->getShippingZone(),
        $c->getCurrency()
    );
}

// Test : afficher quelques produits
echo "\n=== Products ===\n";
foreach ($products as $p) {
    echo sprintf("%s: %s, Category: %s, Price: %.2f, Weight: %.2f, Taxable: %s\n",
        $p->getId(),
        $p->getName(),
        $p->getCategory(),
        $p->getPrice(),
        $p->getWeight(),
        $p->isTaxable() ? 'Yes' : 'No'
    );
}

// Test : afficher quelques commandes
echo "\n=== Orders ===\n";
foreach ($orders as $o) {
    echo sprintf("%s: Customer %s ordered %d x %s at %.2f, Promo: %s, Date: %s\n",
        $o->getId(),
        $o->getCustomerId(),
        $o->getQty(),
        $o->getProductId(),
        $o->getUnitPrice(),
        $o->getPromoCode(),
        $o->getDate()
    );
}

// Test : afficher zones de livraison
echo "\n=== Shipping Zones ===\n";
foreach ($shippingZones as $z) {
    echo sprintf("%s: Base %.2f, Per Kg %.2f\n",
        $z->getZone(),
        $z->getBase(),
        $z->getPerKg()
    );
}

// Test : afficher promotions
echo "\n=== Promotions ===\n";
foreach ($promotions as $p) {
    echo sprintf("%s: Type %s, Value %.2f, Active: %s\n",
        $p->getCode(),
        $p->getType(),
        $p->getValue(),
        $p->isActive() ? 'Yes' : 'No'
    );
}