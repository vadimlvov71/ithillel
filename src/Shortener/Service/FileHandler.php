<?php
namespace App\Shortener\Service;

/**
 * [a service class]
 */
class FileHandler
{
    public function __construct( protected string $filename)
    {
        $this->filename = $filename;
    }
    public function setDataToFile(string $content): array
    {  
        $result = [];
        if (is_writable($this->filename)) {

        
            if (!$fp = fopen($this->filename, 'wa+')) {
                $result['error'] = "can`t open the file". $this->filename;
                return $result;
            }
        
            if (fwrite($fp, $content) === FALSE) {
                return $result['error'] = "can`t write the file". $this->filename;
            }
            $result['write_status'] = "success";
            return $result;
            fclose($fp);
        } else {
            $result['error'] = "permission denied ". $this->filename;
            return $result;
        }
    }
    public function getDataFromFile(): array
    {  
        $result = [];
        $result["message"] = "";
        if (is_writable($this->filename)) {
            if ($content = file_get_contents($this->filename)) {
                $result['read_status'] = "success";
                $result['content'] = $content;
                return $result;
            } else {
                $result['error'] = "can`t open the file". $this->filename;
            }
        } else {
            $result['error'] = "permission denied file: ". $this->filename;
        }
    }
}