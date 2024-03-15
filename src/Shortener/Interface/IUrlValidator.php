<?php

namespace App\Shortener\Interface;

/**
 * [Description IUrlDecoder]
 */
interface IUrlValidator
{
    
    public static function isValidUrl(string $url): bool;

    public static function isExistsUrl(string $url): bool;
}