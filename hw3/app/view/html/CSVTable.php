<?php
namespace app\view\html;

class CSVTable extends HTML
{
  public static function generateCSVTable($array)
  {
    $tableHTML = '<table class="table table-striped"><tr>';

    // Create table headers
    foreach ($array[0] as $key => $value)
    {
      $tableHTML .= '<th>' . $value . '</th>';
      if (++$i == 12) break; // limits to 12 column headings
    }
    $tableHTML .= '</tr>';

    foreach ($array as $key => $value)
    {
      if ($key == 0)
      {
        // Skip the first row
        continue;
      }
      else if ($key < 200) // Limits to 200 table rows
      {
        $tableHTML .= '<tr>';
        foreach ($value as $key => $val)
        {
          // Limits to 13 columns
          if (++$key == 13)
          {
            $key = 0;
            break;
          }
          else
          {
            $tableHTML .= '<td>' . $val . '</td>';
          }
        }
        $tableHTML .= '</tr>';
      }
    }
    $tableHTML .= '</table>';

    return $tableHTML;
  }
}

?>
