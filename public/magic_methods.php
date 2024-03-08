<?php

class Magic 
{
    public int $number;
    private string $propety;
    private string $name;
    /**
     * @param string $arg
     * 
     * @return string
     */
    public function __invoke(string $arg = ""): string 
    {
        $this->name = $arg;
        return '`__invoke: ' . $arg .  ' world.' . PHP_EOL;
    }
    
    /**
     * @return string
     */
    public function __toString(): string 
    {
        return $this->name;
    }
    /**
     * @param string $property
     * @param string $value
     * 
     * @return void
     */
    public function __set($property, string $value): void
    {
        $this->property = $value;
    }
    /**
     * @param string $property
     * 
     * @return string
     */
    public function __get(string $property): string
    {
        return $this->property;
    }
    /**
     * @param string $method_name
     * @param array $args
     * 
     * @return string
     */
    public function __call(string $method_name, array $args): string
    {
        return "you tried to call method: $method_name with these args: " .
           $args[0]->name . PHP_EOL . 
           $args[0]->email . PHP_EOL;
    }
    
}


$magic = new Magic();
$user_dto = new UserDTO("argumentOne", "argumentTwo");
echo $magic->absentMethod($user_dto);
$magic->number = 1;
$magic->propety = 'test value';
echo $magic->propety . PHP_EOL;
echo "invoke: ". $magic("hello");
echo "toString: ".$magic . PHP_EOL;

$magic_clone = clone $magic;
$magic_clone->number = 2; // no reference

$magic_copy = $magic;
$magic_copy->number = 3; // reference

echo $magic->number . PHP_EOL;
echo $magic_clone->number . PHP_EOL;
echo $magic_copy->number . PHP_EOL;



class UserDTO {

    public $name;
    public $email;

    public function __construct(string $name, string $email) 
    {

        $this->name = $name;
        $this->email = $email;
    }
}


