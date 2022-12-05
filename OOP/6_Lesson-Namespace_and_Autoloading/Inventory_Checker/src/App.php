<?php
declare(strict_types=1);

namespace Inventory_Checker;

use Inventory_Checker\Validator\InputValidator;
use Inventory_Checker\Service\InventoryService;
use Inventory_Checker\Exception\InventoryException;
use Inventory_Checker\Exception\InputValidationException;

class App
{
    public function execute(): void
    {
        try {
            $inputValidator = new InputValidator();
            $inputValidator->validator("3z:4,2:2,4:1");
            $inventoryChecker = new InventoryService();
            $inventoryChecker->checkInventory("3z:4,2:2,4:1");
        } catch (InventoryException | InputValidationException $exception) {
            echo $exception->getMessage();
        }
    }
}

