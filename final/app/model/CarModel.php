<?php
namespace app\model;

use app\model\Database;

class CarModel extends Model
{
  private $_vin;
  private $_condition;
  private $_price;
  private $_img_url;

  // Getters and setters
  public function getVin()
  {
    return $this->_vin;
  }

  public function setVin($vin)
  {
    $this->_vin = $vin;
  }

  public function getCondition()
  {
    return $this->_condition;
  }

  public function setCondition($condition)
  {
    $this->_condition = $condition;
  }

  public function getImgUrl()
  {
    return $this->_img_url;
  }

  public function setImageUrl($url)
  {
    $this->_img_url = $url;
  }
}

?>
