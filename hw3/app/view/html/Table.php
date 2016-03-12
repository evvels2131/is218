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
      $htmlTABLE = '<table class="table table-striped"><tr>';

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
              // Show details about the car
              $href = 'index.php?page=car&id=' . $value;
              $htmlTABLE .= '<td>' . Link::newLink('View', $href, '_self');
              $htmlTABLE .= '&emsp;&emsp;';

              // Show form to edit the car
              $href = 'index.php?page=editcar&id=' . $value;
              $htmlTABLE .= Link::newLink('Edit', $href, '_self') . '</td>';
            }
            else if (strpos($attribute, 'image') !== false)
            {
              if (!empty($value))
              {
                $htmlTABLE .= '<td><img src="' . $value . '" alt="image" class="img-rounded" width="60"></td>';
              }
              else
              {
                $htmlTABLE .= '<td>N/A</td>';
              }
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
