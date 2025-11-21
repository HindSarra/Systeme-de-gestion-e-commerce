<?php
namespace Models;

class Product
{
    private string $id;
    private string $name;
    private string $category;
    private float $price;
    private float $weight;
    private bool $taxable;

    public function __construct(
        string $id,
        string $name,
        string $category,
        float $price,
        float $weight = 1.0,
        bool $taxable = true
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->weight = $weight;
        $this->taxable = $taxable;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getCategory(): string { return $this->category; }
    public function getPrice(): float { return $this->price; }
    public function getWeight(): float { return $this->weight; }
    public function isTaxable(): bool { return $this->taxable; }

    // Setters
    public function setPrice(float $price): void { $this->price = $price; }
    public function setWeight(float $weight): void { $this->weight = $weight; }
    public function setTaxable(bool $taxable): void { $this->taxable = $taxable; }
}
