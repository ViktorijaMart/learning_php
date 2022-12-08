<?php
declare(strict_types=1);

namespace Data_Processor\OutputHandler;

use Data_Processor\Interface\DataOutputHandlerInterface\DataOutputHandlerInterface;

class TerminalOutputHandler implements DataOutputHandlerInterface
{

    public static function outputData(string $data): void
    {
        print_r($data);
    }
}