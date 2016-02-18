<?php
namespace app\model;

include_once('autoloadFunction.php');

// CarModel Class
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

  public function getModel()
  {
    return $this->_model;
  }

  public function setModel($newModel)
  {
    $this->_model = $newModel;
  }

  public function getYear()
  {
    return $this->_year;
  }

  public function setYear($newYear)
  {
    $this->_year = $newYear;
  }
}
?>
