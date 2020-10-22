<?php
class Route
{
    public $file;
    public $f;
    function __construct()
    {
        $file = ".htaccess";
        $f = fopen($file, "a");
    }
    public function add($rule,$f)
    {
        fwrite($f, $rule);
    }
    public function save()
    {
    }
}
