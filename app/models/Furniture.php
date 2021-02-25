<?php
class Furniture implements ProductInterface
{
    public function generateFormField()
    {
        $field = '<div class="dynamic-content">';
        $field .= '<div class="form-item">';
        $field .= '<label class="label-text long" for="height">Height(CM)</label>';
        $field .= '<input id="height" name="height" required>';
        $field .= '</div>';

        $field .= '<div class="form-item">';
        $field .= '<label class="label-text long" for="width">Width(CM)</label>';
        $field .= '<input id="width" name="width" required>';
        $field .= '</div>';

        $field .= '<div class="form-item">';
        $field .= '<label class="label-text long" for="length">Length(CM)</label>';
        $field .= '<input id="length" name="length" required>';
        $field .= '</div>';
        $field .= '<p>Please, provide dimensions</p>';
        $field .= '</div>';

        return $field;
    }

    public function getAtributeFromPost() {
          $atributesData = [
            'height' => trim($_POST['height']),
            'width' => trim($_POST['width']),
            'length' => trim($_POST['length'])
          ];

        return $atributesData;
    }

    public function formatAtributeData($atributes)
    {
      return "Dimension: " . $atributes->height . "x" . $atributes->width . "x" . $atributes->length;
    }
}
