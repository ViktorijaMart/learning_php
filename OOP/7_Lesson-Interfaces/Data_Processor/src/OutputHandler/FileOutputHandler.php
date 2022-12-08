<?php
declare(strict_types=1);

namespace Data_Processor\OutputHandler;

use Data_Processor\Interface\DataOutputHandlerInterface\DataOutputHandlerInterface;

class FileOutputHandler implements DataOutputHandlerInterface
{
    private const JSON_FILE_PATH = 'src/File/data.json';
    private const XML_FILE_PATH = 'src/File/data.xml';

    public static function outputData(string $data, string $format = ''): void
    {
        if ($format === 'json') {
            file_put_contents(self::JSON_FILE_PATH, $data);
        }

        if ($format === 'xml') {
            file_put_contents(self::XML_FILE_PATH, $data);
        }
    }
}