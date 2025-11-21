<?php
namespace Models;

class Order
{
    private string $id;
    private string $customerId;
    private string $productId;
    private int $qty;
    private float $unitPrice;
    private string $date;
    private string $promoCode;
    private string $time;

    public function __construct(
        string $id,
        string $customerId,
        string $productId,
        int $qty,
        float $unitPrice,
        string $date = '',
        string $promoCode = '',
        string $time = '12:00'
    ) {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->productId = $productId;
        $this->qty = $qty;
        $this->unitPrice = $unitPrice;
        $this->date = $date;
        $this->promoCode = $promoCode;
        $this->time = $time;
    }

    public function getId(): string { return $this->id; }
    public function getCustomerId(): string { return $this->customerId; }
    public function getProductId(): string { return $this->productId; }
    public function getQty(): int { return $this->qty; }
    public function getUnitPrice(): float { return $this->unitPrice; }
    public function getDate(): string { return $this->date; }
    public function getPromoCode(): string { return $this->promoCode; }
    public function getTime(): string { return $this->time; }

    public function setQty(int $qty): void { $this->qty = $qty; }
    public function setUnitPrice(float $price): void { $this->unitPrice = $price; }
}
