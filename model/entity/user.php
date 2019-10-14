<?php
class User
{
    var $userName;
    var $passWord;
    var $fullName;
    function User($userName, $passWord, $fullName)
    {
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->fullName = $fullName;
    }
    static function authentication($userName, $pw)
    {
        if ($userName == "vanps1997@gmail.com" && $pw == "123456")
            return new User($userName, $pw, "The Joke");
        return null;
    }
}
?>