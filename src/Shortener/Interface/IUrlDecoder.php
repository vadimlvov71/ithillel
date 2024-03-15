<?php

namespace App\Shortener\Interface;

/**
 * [Description IUrlDecoder]
 */
interface IUrlDecoder
{
    /**
     * @param string $code
     * @throws \InvalidArgumentException
     * @return string 
     */
    public function decode(string $code): array;
}