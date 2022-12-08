<?php
declare(strict_types=1);

namespace Data_Processor\Interface\DataEncoderInterface;

interface DataEncoderInterface
{
    public static function encodeData(array $data): string;
}