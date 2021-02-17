<?php
class Book implements ProductInterface
{
    public function displayProduct()
    {
    }

    public function generateFormField()
    {
        $field = '<div class="form-item dynamic-content">';
        $field .= '<label class="label-text" for="weight">Weight(KG)</label>';
        $field .= '<input type="number" id="weight" name="weight" required>';
        $field .= '</div>';
        $field .= '<p>Please, provide weight</p>';

        return $field;
    }
}
