<?php
namespace app\view\html;

class Table extends HTML
{
  // Create a table with cars for homepage
  public static function displayCarsTable($cars)
  {
    $tableHTML = '<table class="table table-striped">';
    $tableHTML .= '<thead><tr>';

    foreach ($cars[0] as $key => $val)
    {
      if ($key == 'UserID') {
        continue;
      } else if ($key == 'CarID') {
        $tableHTML .= '<th>Details</th>';
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
        if ($property == 'UserID') {
          $user_id = $val;
        } else if ($property == 'Salesperson') {
          $tableHTML .= '<td><a href="index.php?page=profile&id=' . $user_id . '">' . $val . '</a></td>';
        } else if ($property == 'CarID') {
          $tableHTML .= '<td><a href="index.php?page=cardetails&id=' . $val . '">Click Here</a></td>';
        } else {
          $tableHTML .= '<td>' . $val . '</td>';
        }
      }
    }
    $tableHTML .= '</tbody>';
    $tableHTML .= '</table>';

    return $tableHTML;
  }
}

?>
