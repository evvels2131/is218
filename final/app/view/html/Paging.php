<?php
namespace app\view\html;

abstract class Paging
{
  public static function getPagingLinks($amount)
  {
    $pagingHTML = '<ul class="pagination">';
    for ($i = 1; $i < $amount + 1; $i++)
    {
      $pagingHTML .= '<li class="page"><a href="index.php?page_no=' . $i . '">' . $i . '</a></li>';
    }
    $pagingHTML .= '</ul>';

    return $pagingHTML;
  }
}
?>
