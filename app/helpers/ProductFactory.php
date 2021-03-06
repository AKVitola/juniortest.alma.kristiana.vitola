<?php
class ProductFactory
{
    public static function getProduct($type)
    {
        $class = ucfirst(strtolower($type));

        include_once "../app/models/$class.php";

        if (class_exists($class)) {
            return new $class();
        }

        throw new Exception('Unsupported type: ' . $class);
    }
}
