<?php
declare(strict_types=1);

class InventoryException extends Exception {};
class InputValidationException extends Exception {};

class InventoryChecker
{
    private const INVENTORY_FILE_PATH = './inventory.json';
    private const LOG_FILE_PATH = './log.txt';
    private const PRODUCT_ID_POSITION = 0;
    private const PRODUCT_QUANTITY_POSITION = 1;

    public function checkInventory(string $products): void
    {
        $checkId = $this->checkId($products);
        $checkQuantity = $this->checkQuantity($products);
        $now = date('Y-m-d H:i:s');

       if(!empty($checkId)) {
           file_put_contents(self::LOG_FILE_PATH, $now . ' ' . $checkId . "\n", FILE_APPEND);
           throw new InventoryException($checkId);
       }

        if(!empty($checkQuantity)) {
            file_put_contents(self::LOG_FILE_PATH, $now . ' ' . $checkQuantity . "\n", FILE_APPEND);
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

try {
    $inputValidator = new InputValidator();
    $inputValidator->validator("3z:4,2:2,4:1");
    $inventoryChecker = new InventoryChecker();
    $inventoryChecker->checkInventory("3:4,2:2,4:1");
} catch (Exception $exception) {
    echo $exception->getMessage();
}


/*
2.1 Parašykite įrankį inventoriaus tikrinimui. Inventorių rasite faile "./inventory.json"
Programa turėtų veikti paduodant jai produkto id ir kiekio poras, atskirtas dvitaškiu. Pačios poros atskirtos kableliais:
Pvz.: php -f 2_inventory_checker.php "1:3,2:2,4:1" - reiškia, kad mes norime patikrinti, ar inventoriuje egzistuoja:
- produktas, kurio id yra 1, o kiekis 3
- produktas, kurio id yra 2, o kiekis 2
- produktas, kurio id yra 4, o kiekis 1
Jeigu paduotas produkto id neegzistuoja, arba nepakanka kiekio, į terminalą išspausdinkite pranešimą:
- product "15" is not in the inventory
- product "5" only has 0 items in the inventory
Pakaks spausdinti tik vieną klaidą apie inventoriaus neatitikimus, net jeigu tikrinami keli nevalidūs produktai.
Šalia klaidos pranešimo spausdinimo taip pat, įrašykite pranešimą apie šį įvykį į log'ą (log.txt)
Log'o įrašo formatas: 2020-01-01 15:15:15 product "15" is not in the inventory
Užduočiai įgyvendinti panaudokite exception'us.
Klasė, tikrinanti inventorių, turi mesti exception'us, o ją kviečiantis kodas - gaudyti. Naudokite savo custom
exception'o klasę (pvz.: InventoryException).
Programos kvietimo pavyzdys:
php -f 2_inventory_checker.php "1:3,2:2,5:1"
product "5" only has 0 items in the inventory
php -f 2_inventory_checker.php "1:3,2:2"
all products have the requested quantity in stock
*/

class InputValidator
{
    public function validator(string $input): void
    {
        $inputArray = explode(',', $input);

        foreach ($inputArray as $inputItem) {
            if (!preg_match('/\d(:)\d/', $inputItem)) {
                throw new InputValidationException('Invalid input "' . $input . '". Format: id:quantity,id:quantity');
            }
        }
    }
}

/*
2.2 Patobulinkite 2.1 užduoties įrankį - pridėkite inputo validatorių (atskira klasė)
Šis validatorius turi užfiksuoti, kad šie inputai nėra validūs:
- "q:3,2:2,5:1"
- "-:3,2:2,5:1"
- "3,2:2,5:1"
Kai užfiksuojamas nevalidus inputas, programa turi į komandinę eilutę išspausdinti šį pranešimą:
Invalid input "3,2:2,5:1". Format: id:quantity,id:quantity
Klaidingo inputo atveju į log'ą rašyti pranešimo nereikia.
Svarbu: Abi klasės (inventoriy checkeris ir input validatorius) turi būti kviečiami tame pačiame "try" bloke.
Naudokite savo custom exception'o klasę (pvz.: InputValidationException).
Programos kvietimo pavyzdys:
php -f 2_inventory_checker.php "3,2:2,5:1"
Invalid input "3,2:2,5:1". Format: id:quantity,id:quantity
*/