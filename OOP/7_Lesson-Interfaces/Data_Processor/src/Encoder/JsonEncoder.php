<?php
declare(strict_types=1);

namespace Data_Processor\Encoder;

use Data_Processor\Interface\DataEncoderInterface\DataEncoderInterface;

class JsonEncoder implements DataEncoderInterface
{

    public static function encodeData(array $data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}