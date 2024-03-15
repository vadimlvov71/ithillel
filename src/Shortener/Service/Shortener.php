<?php

namespace App\Shortener\Service;

use App\Shortener\Interface\IUrlDecoder;
use App\Shortener\Interface\IUrlEncoder;
use App\Shortener\Validation\UrlValidation;
use App\Shortener\Service\Helper;

class Shortener implements IUrlDecoder, IUrlEncoder
{
    public function __construct(
        protected string $length,
        protected string $filename
    ) {
        $this->length = $length;
        $this->filename = $filename;
    }
    
    public function encode(string $url): string
    {
        $url_array = explode("://", $url);
        $url_to_be_encoded = $url_array[1];
        $url_without_dot = str_replace('.', '', $url_to_be_encoded);
        return mb_strcut(str_shuffle($url_without_dot), 0, 8);
    }
     public function decode(string $code): array
     {
        $result = Helper::getDataFromFile($this->filename);
        
        $array = explode("=", $result["content"]);
        $result["url"] = $array[1];
        $result["message"] .= Message::getMessage("decode", $result["url"]);
        return $result;
     }
     public function setUrl(string $url): array
     {
        $result = [];
        $result["status"] = "error";
        if (UrlValidation::isValidUrl($url) === false) {
            $result["message"] = Message::getMessage("no_valid", $url);
        } else if (UrlValidation::isExistsUrl($url) === false) {
            $result["message"] = Message::getMessage("no_exists", $url);
        } else {
            $encode_url = $this->encode($url);
            $array = [];
            $array[$encode_url] = $url;
            $content = http_build_query($array, "####");
            $result["file"] = Helper::setDataToFile($content, $this->filename);
            $result["message"] = Message::getMessage("encode", $encode_url);
            $result["status"] = "success";
            $result["code"] = $encode_url;
        }
        return $result;
    }
    public function getUrl(string $code)
    {
        $decode_url = $this->decode($code);
        
        return $decode_url;
    }
}