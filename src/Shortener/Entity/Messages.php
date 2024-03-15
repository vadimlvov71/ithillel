<?php

namespace App\Shortener\Entity;


enum Messages: string
{
    case No_valid = "this url is not valid";
    case No_exists = "this url is not exists";
    case Encode = "this url was encoded to: ";
    case Decode = "this url was decoded to: ";
}