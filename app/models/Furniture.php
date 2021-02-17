<?php

class Furniture implements ProductInterface
{
    public function displayProduct()
    {
    }

    public function generateFormField()
    {
        $field = '<div class="form-item dynamic-content">';
        $field .= '<label class="label-text" for="height">Height(CM)</label>';
        $field .= '<input type="number" id="height" name="height" required>';
        $field .= '</div>';

        $field .= '<div class="form-item dynamic-content">';
        $field .= '<label class="label-text" for="width">Width(CM)</label>';
        $field .= '<input type="number" id="width" name="width" required>';
        $field .= '</div>';

        $field .= '<div class="form-item dynamic-content">';
        $field .= '<label class="label-text" for="length">Length(CM)</label>';
        $field .= '<input type="number" id="length" name="length" required>';
        $field .= '</div>';
        $field .= '<p>Please, provide dimensions</p>';

        return $field;
    }
}
