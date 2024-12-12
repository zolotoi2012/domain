<?php

namespace App\Services;

class Registry
{
    private array $services = [];

    public function register(string $id, object $service): void
    {
        $this->services[$id] = $service;
    }

    public function get(string $id): object
    {
        if (!isset($this->services[$id])) {
            throw new \LogicException(sprintf('Service with id "%s" not found', $id));
        }

        return $this->services[$id];
    }
}
