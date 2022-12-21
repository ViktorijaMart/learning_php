<?php

declare(strict_types=1);

namespace Inventory_Checker;

use Inventory_Checker\Validator\InputValidator;
use Inventory_Checker\Service\InventoryService;
use Inventory_Checker\Exception\InventoryException;
use Inventory_Checker\Exception\InputValidationException;

class App
{
    // Adding DIContainer from 10th lesson
    public function __construct(
        private InputValidator $inputValidator,
        private InventoryService $inventoryService
    )
    {
    }

    public function execute(): void
    {
        try {
//            $inputValidator = new InputValidator();
//            Adding DIContainer from 10th lesson
            $this->inputValidator->validator("3:24,2:2,4:1");
//            $inventoryChecker = new InventoryService();
//            Adding DIContainer from 10th lesson
            $this->inventoryService->checkInventory("3:24,2:2,4:1");
        } catch (InventoryException | InputValidationException $exception) {
            echo $exception->getMessage();
        }
    }
}
