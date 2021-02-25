<?php
class Dvd implements ProductInterface
{
    public function generateFormField()
    {
        $field = '<div class="dynamic-content">';
        $field .= '<div class="form-item">';
        $field .= '<label class="label-text dvd" for="size">Size(MB)</label>';
        $field .= '<input id="size" name="size" required>';
        $field .= '</div>';
        $field .= '<p>Please, provide size</p>';
        $field .= '</div>';

        return $field;
    }

    public function getAtributeFromPost()
    {
          $atributesData = [
            'size' => trim($_POST['size'])
          ];

        return $atributesData;
    }

    public function formatAtributeData($atributes)
    {
        return "Size: " . $atributes->size . " MB";
    }
}
