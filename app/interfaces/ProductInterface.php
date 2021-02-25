<?php
interface ProductInterface
{
    public function generateFormField();
    public function getAtributeFromPost();
    public function formatAtributeData($atributes);
}
