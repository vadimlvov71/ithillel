<?php

namespace App\Shortener\Validation;


class UrlValidation
{
    /**
     * @param string $url
     * 
     * @return bool
     */
    public static function isValidUrl(string $url): bool
    {
        $result = false;
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    /**
     * @param string $url
     * 
     * @return bool
     */
    public static function isExistsUrl(string $url): bool
    {
        return true;
    }
}