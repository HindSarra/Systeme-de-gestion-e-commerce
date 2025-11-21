<?php
namespace Models;

class Promotion
{
    private string $code;
    private string $type;
    private float $value;
    private bool $active;

    public function __construct(string $code, string $type, float $value, bool $active = true)
    {
        $this->code = $code;
        $this->type = $type;
        $this->value = $value;
        $this->active = $active;
    }

    public function getCode(): string { return $this->code; }
    public function getType(): string { return $this->type; }
    public function getValue(): float { return $this->value; }
    public function isActive(): bool { return $this->active; }

    public function setActive(bool $active): void { $this->active = $active; }
}
