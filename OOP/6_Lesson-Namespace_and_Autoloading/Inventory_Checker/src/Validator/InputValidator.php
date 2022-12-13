<?php

declare(strict_types=1);

namespace Inventory_Checker\Validator;

use Inventory_Checker\Exception\InputValidationException;

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
