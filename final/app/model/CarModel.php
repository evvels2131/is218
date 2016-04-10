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

  public function getPrice()
  {
    return $this->_price;
  }

  public function setPrice($price)
  {
    $this->_price = $price;
  }

  public function getImgUrl()
  {
    return $this->_img_url;
  }

  public function setImageUrl($url)
  {
    $this->_img_url = $url;
  }

  // Save a new car into the database
  public function saveCar($user_id)
  {
    $db = new Database();

    $result = $db->addNewCar($this->_vin, $this->_condition, $this->_price, $user_id);

    return $result;
  }
}

?>
