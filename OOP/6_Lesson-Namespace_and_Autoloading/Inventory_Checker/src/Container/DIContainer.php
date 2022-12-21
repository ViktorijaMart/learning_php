<?php
declare(strict_types=1);

namespace Inventory_Checker\Container;

use RuntimeException;
use Inventory_Checker\Validator\InputValidator;
use Inventory_Checker\Service\InventoryService;

class DIContainer
{
    private array $entries = [];

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new RuntimeException('Class ' . $id . 'not found in container.');
        }
        $entry = $this->entries[$id];

        return $entry($this);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $callable): void
    {
        $this->entries[$id] = $callable;
    }

    public function loadDependencies()
    {
        $this->set(
            InputValidator::class,
            function (DIContainer $container) {
                return new InputValidator();
            }
        );
        $this->set(
            InventoryService::class,
            function (DIContainer $container) {
                return new InventoryService();
            }
        );
    }
}