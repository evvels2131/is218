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
}
?>
