<?php
namespace app\html;

class Table extends HTML
{
  public static function generateTable($array)
  {
    $i = 0;
    $htmlTABLE = '<table><tr>';

    // Get table headings
    foreach ($array as $key => $innerArray)
    {
      if (is_array($innerArray))
      {
        foreach ($innerArray as $attribute => $value)
        {
          $pos = strrpos($attribute, '_') + 1;
          $strlen = strlen($attribute) - 1;
          $cleanAttribute = substr($attribute, $pos, $strlen);
          $htmlTABLE .= '<th>' . ucfirst($cleanAttribute) . '</th>';
        }

        if (++$i == 1)
        {
          break;
        }
      }
    }
    $htmlTABLE .= '</tr>';

    // ID should be generated as links
    $find = 'id';

    // Get the rest of the table
    foreach ($array as $key => $innerArray)
    {
      if (is_array($innerArray))
      {
        $htmlTABLE .= '<tr>';
        foreach ($innerArray as $attribute => $value)
        {
          if (strpos($attribute, $find) !== false)
          {
            $href = 'index.php?value=' . $value;
            $htmlTABLE .= '<td>' . Link::newLink('View', $href, '_BLANK') . '</td>';
          }
          else
          {
            $htmlTABLE .= '<td>' . $value . '</td>';
          }
        }
        $htmlTABLE .= '</tr>';
      }
    }
    $htmlTABLE .= '<table>';

    return $htmlTABLE;
  }
}

?>
