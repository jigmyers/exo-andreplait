<?php

use Structure\ByteFormatStructure;

class CyclomaticComplexity
{
    /**
     * @var ByteFormatStructure
     */
    private ByteFormatStructure $byteFormatStructure;

    /**
     * @param ByteFormatStructure $byteFormatStructure
     */
    public function __construct(ByteFormatStructure $byteFormatStructure){
        $this->byteFormatStructure = $byteFormatStructure;
    }

    /**
     * @param $bytes
     * @param $precision
     * @return string
     */
    private function convertSize($bytes, $precision = 2): string
    {
        $key = 0;

        while (($bytes / 1024) < 1024) {
            $bytes = $bytes / 1024;
            $key++;
        }

        return round($bytes, $precision) . $this->byteFormatStructure->getByteFormat($key);
    }
}

/*
 * J'ai préféré passé par des constantes et donc une structure pour ce qui est du format,
 * et passer par une boucle plutôt que des if/else en série
 */