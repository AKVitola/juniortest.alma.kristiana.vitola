<?php
class ProductFactory
{
    public static function getProduct($type)
    {
        // $class = ucfirst(strtolower($type));

        if (class_exists($type)) {
            return new $type();
        }
        throw new Exception('Unsupported type: ' . $type);
    }
}
