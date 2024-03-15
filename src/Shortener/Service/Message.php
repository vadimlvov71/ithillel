<?php

namespace App\Shortener\Service;

use  App\Shortener\Entity\Messages;

class Message
{
   
    public static function getMessage(string $type, string $url): string
    {
        $return_value = match ($type) {
            'no_valid' => Messages::No_valid->value. "" . $url,
            'no_exists' => Messages::No_exists->value. "" . $url,
            'encode'  => Messages::Encode->value. "" . $url,
            'decode'  => Messages::Decode->value. "" . $url,
        };
        return $return_value;
    }
}