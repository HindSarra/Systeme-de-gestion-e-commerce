<?php
namespace Models;

class Customer
{
    private string $id;
    private string $name;
    private string $level;
    private string $shippingZone;
    private string $currency;

    public function __construct(
        string $id,
        string $name,
        string $level = 'BASIC',
        string $shippingZone = 'ZONE1',
        string $currency = 'EUR'
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
        $this->shippingZone = $shippingZone;
        $this->currency = $currency;
    }

    // Getters et setters
    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getLevel(): string { return $this->level; }
    public function getShippingZone(): string { return $this->shippingZone; }
    public function getCurrency(): string { return $this->currency; }

    public function setName(string $name): void { $this->name = $name; }
    public function setLevel(string $level): void { $this->level = $level; }
    public function setShippingZone(string $zone): void { $this->shippingZone = $zone; }
    public function setCurrency(string $currency): void { $this->currency = $currency; }
}
