<?php
declare(strict_types=1);

spl_autoload_register(function ($classname)
{
    if ($classname === 'Data_Processor\Interface\DataEncoderInterface\DataEncoderInterface') {
        require 'src/Interface/DataEncoderInterface/DataEncoderInterface.php';
    }

    if ($classname === 'Data_Processor\Interface\DataOutputHandlerInterface\DataOutputHandlerInterface') {
        require 'src/Interface/DataOutputHandlerInterface/DataOutputHandlerInterface.php';
    }

    if ($classname === 'Data_Processor\Encoder\JsonEncoder') {
        require 'src/Encoder/JsonEncoder.php';
    }

    if ($classname === 'Data_Processor\Encoder\XmlEncoder') {
        require 'src/Encoder/XmlEncoder.php';
    }

    if ($classname === 'Data_Processor\OutputHandler\FileOutputHandler') {
        require 'src/OutputHandler/FileOutputHandler.php';
    }

    if ($classname === 'Data_Processor\OutputHandler\TerminalOutputHandler') {
        require 'src/OutputHandler/TerminalOutputHandler.php';
    }

    if ($classname === 'Data_Processor\Processor\DataProcessor') {
        require 'src/Processor/DataProcessor.php';
    }

    if ($classname === 'Data_Processor\App') {
        require 'src/App.php';
    }
});

use Data_Processor\App;

$appObj = new App();
$appObj->execute();

