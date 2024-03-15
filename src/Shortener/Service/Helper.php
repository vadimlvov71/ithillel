<?php
namespace App\Shortener\Service;

/**
 * [a service class]
 */
class Helper
{
    public static function setDataToFile(string $content, string $filename): array
    {  
        $result = [];
        if (is_writable($filename)) {

        
            if (!$fp = fopen($filename, 'wa+')) {
                $result['error'] = "can`t open the file". $filename;
                return $result;
            }
        
            if (fwrite($fp, $content) === FALSE) {
                return $result['error'] = "can`t write the file". $filename;
            }
            $result['write_status'] = "success";
            return $result;
            fclose($fp);
        } else {
            $result['error'] = "permission denied ". $filename;
            return $result;
        }
    }
    public static function getDataFromFile(string $filename): array
    {  
        $result = [];
        if (is_writable($filename)) {
            if ($content = file_get_contents($filename)) {
                $result['read_status'] = "success";
                $result['content'] = $content;
                return $result;
            } else {
                $result['error'] = "can`t open the file". $filename;
            }
        }
    }
}