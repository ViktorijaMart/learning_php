<?php
declare(strict_types=1);

namespace Data_Processor\Processor;

use Data_Processor\Interface\DataEncoderInterface\DataEncoderInterface;
use Data_Processor\Interface\DataOutputHandlerInterface\DataOutputHandlerInterface;
use Data_Processor\Encoder\JsonEncoder;
use Data_Processor\Encoder\XmlEncoder;
use Data_Processor\OutputHandler\FileOutputHandler;
use Data_Processor\OutputHandler\TerminalOutputHandler;

class DataProcessor
{
    public function __construct(private array $data)
    {
    }

    public function process(string $format, string $output): void
    {
        $dataInJson = JsonEncoder::encodeData($this->data);
        $dataInXml = XmlEncoder::encodeData($this->data);

        if ($format === 'json' && $output === 'file') {
            FileOutputHandler::outputData($dataInJson, $format);
        }

        if ($format === 'xml' && $output === 'file') {
            FileOutputHandler::outputData($dataInXml, $format);
        }

        if ($format === 'json' && $output === 'terminal') {
            TerminalOutputHandler::outputData($dataInJson);
        }

        if ($format === 'xml' && $output === 'terminal') {
            TerminalOutputHandler::outputData($dataInXml);
        }
    }
}