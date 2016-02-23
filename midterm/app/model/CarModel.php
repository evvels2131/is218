<?php
namespace app\model;

class CarModel extends Model
{
  private $_make;
  private $_model;
  private $_year;

  // Getters and setters
  public function getMake()
  {
    return $this->_make;
  }

  public function setMake($newMake)
  {
    $this->_make = $newMake;
  }
}
?>
