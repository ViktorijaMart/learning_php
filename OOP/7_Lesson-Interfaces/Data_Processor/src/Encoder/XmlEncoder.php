<?php
declare(strict_types=1);

namespace Data_Processor\Encoder;

use Data_Processor\Interface\DataEncoderInterface\DataEncoderInterface;

class XmlEncoder implements DataEncoderInterface
{

    public static function encodeData(array $data): string
    {
        $dataInXml = new \DOMDocument('1.0');
        $dataInXml->formatOutput = true;

        $categories =$dataInXml->createElement('categories');
        $dataInXml->appendChild($categories);

        foreach ($data as $categoryKey => $category) {
            $categoryName = $dataInXml->createElement($categoryKey);

            $categoryType = $dataInXml->createElement('type', $category['type']);
            $categoryName->appendChild($categoryType);

            $categoryItems = $dataInXml->createElement('items');

            foreach ($category['items'] as $itemKey => $item) {
                $itemName = $dataInXml->createElement($itemKey);

                $itemCount = $dataInXml->createElement('count', strval($item['count']));
                $itemName->appendChild($itemCount);

                $itemPrice = $dataInXml->createElement('price', strval($item['price']));
                $itemName-> appendChild($itemPrice);

                $categoryItems->appendChild($itemName);
            }

            $categoryName->appendChild($categoryItems);

            $categories->appendChild($categoryName);
        }

        return $dataInXml->saveXML();
    }
}