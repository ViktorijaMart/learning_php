<?php
declare(strict_types=1);

namespace Data_Processor\Interface\DataOutputHandlerInterface;

interface DataOutputHandlerInterface
{
    public static function outputData(string $data): void;
}