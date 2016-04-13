<?php
namespace app\view\html;

class ListHTML extends HTML
{
  public static function databaseList($data)
  {
    $listHTML = '<ul class="list-group">';

    foreach ($data as $key => $attempts)
    {
      foreach ($attempts as $attempt)
      {
        $listHTML .= '<li class="list-group-item">' . $attempt . '</li>';
      }
    }

    $listHTML .= '</ul>';

    return $listHTML;
  }

  // Show details about a specific car
  public static function carDetailsList($data)
  {
    $listHTML = '<ul class="list-group">';

    foreach ($data as $key => $car)
    {
      foreach ($car as $key => $attribute)
      {
        if ($key == 'UserID') {
          $user_id = $attribute;
        } else if ($key == 'Salesperson') {
          $listHTML .= '<li class="list-group-item"><b>' . $key .
            ':</b> <a href="index.php?page=profile&id=' . $user_id . '">' .
            $attribute . '</a></li>';
        } else {
          $listHTML .= '<li class="list-group-item"><b>' . $key . ':</b> ' .
            $attribute . '</li>';
        }
      }
    }
    $listHTML .= '</ul>';

    return $listHTML;
  }
}
?>
