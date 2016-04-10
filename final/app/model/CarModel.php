<?php
namespace app\model;

use app\model\Database;

class CarModel extends Model
{
  private $_id;
  private $_vin;
  private $_condition;
  private $_price;
  private $_img_url;

  // Getters and setters
  public function getId()
  {
    return $this->_id;
  }

  public function setId($id)
  {
    $this->_id = $id;
  }
}

?>
