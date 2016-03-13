<?php
namespace app\view\html;

class CSVTable extends HTML
{
  public static function generateCSVTable($array)
  {
    $htmlTable = '<table class="table table-striped"><tr>';

    // Generate Table Headers
    foreach ($array[0] as $key => $value)
    {
      $htmlTable .= '<th>' . $value . '</th>';
      if (++$i == 12) break; // limits the table to 12 heading columns
    }
    $htmlTable .= '</tr>';

    // Generate rows for the table
    foreach ($array as $key => $value)
    {
      if ($key == 0)
      {
        // Skip the first row, which was used for table headers
        continue;
      }
      else if ($key < 200) // limits the table rows to 200
      {
        $htmlTable .= '<tr>';
        foreach ($value as $key => $value)
        {
          // Limits to 13 columns
          if (++$key == 13)
          {
            $key = 0;
            break;
          }
          else
          {
            $htmlTable .= '<td>' . $value . '</td>';
          }
        }
        $htmlTable .= '</table>';
      }
    }

    return $htmlTable;
  }
}

?>
