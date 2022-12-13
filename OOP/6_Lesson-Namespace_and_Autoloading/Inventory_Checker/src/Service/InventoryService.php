<?php

declare(strict_types=1);

namespace Inventory_Checker\Service;

use Inventory_Checker\Exception\InventoryException;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class InventoryService
{
    private const INVENTORY_FILE_PATH = './src/File/Inventory/inventory.json';
    private const LOG_FILE_PATH = './src/File/Logs/log.txt';
    private const PRODUCT_ID_POSITION = 0;
    private const PRODUCT_QUANTITY_POSITION = 1;

    public function checkInventory(string $products): void
    {
        $checkId = $this->checkId($products);
        $checkQuantity = $this->checkQuantity($products);
        $now = date('Y-m-d H:i:s');
        $log = new Logger('inventory error');
        $log->pushHandler(new StreamHandler(self::LOG_FILE_PATH, Level::Error));

        if (!empty($checkId)) {
//            file_put_contents(self::LOG_FILE_PATH, $now . ' ' . $checkId . "\n", FILE_APPEND);
            $log->error($checkId);
            throw new InventoryException($checkId);
        }

        if (!empty($checkQuantity)) {
//            file_put_contents(self::LOG_FILE_PATH, $now . ' ' . $checkQuantity . "\n", FILE_APPEND);
            $log->error($checkQuantity);
            throw new InventoryException($checkQuantity);
        }

        echo 'all products have the requested quantity in stock';
    }

    public function checkId(string $products): string
    {
        $inventory = $this->getInventory();
        $productsArray = $this->explodeProducts($products);
        $inventoryIds = [];
        $productsIds = [];
        $errorMessage = '';

        foreach ($inventory as $item) {
            $inventoryIds[] = $item["product_id"];
        }

        foreach ($productsArray as $product) {
            $productsIds[] = $product[self::PRODUCT_ID_POSITION];
        }

        foreach ($productsIds as $productsId) {
            if (!in_array($productsId, $inventoryIds)) {
                $errorMessage = 'Product "'. $productsId . '" is not in the inventory';
            }
        }

        return $errorMessage;
    }

    private function checkQuantity(string $products): string
    {
        $inventory = $this->getInventory();
        $productsArray = $this->explodeProducts($products);
        $errorMessage = '';

        foreach ($inventory as $item) {
            foreach ($productsArray as $product) {
                if (
                    $item['product_id'] == $product[self::PRODUCT_ID_POSITION]
                    &&
                    $item['quantity'] < $product[self::PRODUCT_QUANTITY_POSITION]
                ) {
                    $errorMessage .= 'product "' . $item['product_id'] . '" only has ' . $item['quantity'] . ' items in the inventory';
                }
            }
        }

        return $errorMessage;
    }

    private function getInventory(): array
    {
        return json_decode(file_get_contents(self::INVENTORY_FILE_PATH), true);
    }

    private function explodeProducts(string $products): array
    {
        $productsArray = explode(',', $products);
        $productsArrayExploded = [];

        foreach ($productsArray as $product) {
            $productsArrayExploded[] = explode(':', $product);
        }

        return $productsArrayExploded;
    }
}
