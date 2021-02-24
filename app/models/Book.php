<?php
class Book implements ProductInterface
{
    public function displayProduct()
    {
    }

    public function generateFormField()
    {
        $field = '<div class="dynamic-content">';
        $field .= '<div class="form-item">';
        $field .= '<label class="label-text long" for="weight">Weight(KG)</label>';
        $field .= '<input id="weight" name="weight" required>';
        $field .= '</div>';
        $field .= '<p>Please, provide weight</p>';
        $field .= '</div>';

        return $field;
    }
}
