<?php
namespace Models;

class ShippingZone
{
    private string $zone;
    private float $base;
    private float $perKg;

    public function __construct(string $zone, float $base, float $perKg = 0.5)
    {
        $this->zone = $zone;
        $this->base = $base;
        $this->perKg = $perKg;
    }

    public function getZone(): string { return $this->zone; }
    public function getBase(): float { return $this->base; }
    public function getPerKg(): float { return $this->perKg; }

    public function setBase(float $base): void { $this->base = $base; }
    public function setPerKg(float $perKg): void { $this->perKg = $perKg; }
}
