<?php

namespace Structure;

class ByteFormatStructure{

    const BYTE = ' B ';
    const KILOBYTE = ' KB ';
    const MEGABYTE = ' MB ';
    const GIGABYTE = ' GB ';
    const TERABYTE = ' TB ';
    const PETABYTE = ' PB ';
    const EXABYTE = ' EB ';
    const ZETTABYTE = ' ZT ';
    const YOTTABYTE = ' YT ';
    const HELLABYTE = 'HB ';

    /**
     * @param $key
     * @return string
     */
    public function getByteFormat($key): string
    {
        switch ($key) {
            case 0:
               return self::KILOBYTE;
            case 1:
                return self::MEGABYTE;
            case 2:
                return self::GIGABYTE;
            case 3:
                return self::TERABYTE;
            case 4:
                return self::PETABYTE;
            case 5:
                return self::EXABYTE;
            case 6:
                return self::ZETTABYTE;
            case 7:
                return self::YOTTABYTE;
            case 8:
                return self::HELLABYTE;
            default:
                return self::BYTE;
        }
    }

}