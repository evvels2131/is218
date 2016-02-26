<?php
namespace app\view\html;

class Table extends HTML
{
  public static function generateTable($array)
  {
    if (is_array($array))
    {
      $i = 0;
      $find = 'id'; // ID should be generated as links
      $htmlTABLE = '<table><tr>';

      // Get table headings
      foreach ($array as $key => $innerArray)
      {
        if (is_array($innerArray))
        {
          foreach ($innerArray as $attribute => $value)
          {
            if (strpos($attribute, $find) !== false)
            {
              $htmlTABLE .= '<th>Action</th>';
            }
            else
            {
              $clean = HTML::cleanAttribute($attribute);
              $htmlTABLE .= '<th>' . $clean . '</th>';
            }
          }

          if (++$i == 1)
          {
            break;
          }
        }
      }
      $htmlTABLE .= '</tr>';

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
              $href = 'index.php?page=car&id=' . $value;
              $htmlTABLE .= '<td>' . Link::newLink('View/Edit', $href, '_self') . '</td>';
            }
            else
            {
              $htmlTABLE .= '<td>' . $value . '</td>';
            }
          }
          $htmlTABLE .= '</tr>';
        }
      }
      $htmlTABLE .= '</table>';

      return $htmlTABLE;
    }
  }
}
?>
