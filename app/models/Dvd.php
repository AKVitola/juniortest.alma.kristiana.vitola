<?php

class Dvd implements ProductInterface
{
    public function displayProduct()
    {
    }

    public function generateFormField()
    {
        $field = '<div class="form-item dynamic-content">';
        $field .= '<label class="label-text" for="size">Size(MB)</label>';
        $field .= '<input type="number" id="size" name="size" required>';
        $field .= '</div>';
        $field .= '<p>Please, provide size</p>';

        return $field;
    }
}
