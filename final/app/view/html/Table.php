<?php
namespace app\view\html;

class Table extends HTML
{
  // Creates a table with cars for sale
  public static function createCarsTable($cars)
  {
    $tableHTML = '<table class="table table-striped">';
    $tableHTML .= '<thead><tr>';
    foreach ($cars[0] as $key => $val)
    {
      if ($key == 'user_id') {
        continue;
      } else {
        $tableHTML .= '<th>' . $key . '</th>';
      }
    }
    $tableHTML .= '</tr></thead>';
    $tableHTML .= '<tbody>';
    foreach ($cars as $key => $value)
    {
      $tableHTML .= '<tr>';
      foreach ($value as $property => $val)
      {
        if ($property == 'user_id') {
          $user_id = $val;
          continue;
        } else if ($property == 'Salesman') {
          $tableHTML .= '<td><a href="index.php?page=profile&id=' . $user_id. '">' . $val . '</a></td>';
        } else {
          $tableHTML .= '<td>' . $val . '</td>';
        }

      }
      $tableHTML .= '</tr>';
    }
    $tableHTML .= '</tbody>';

    $tableHTML .= '</table>';

    return $tableHTML;
  }
}

?>
