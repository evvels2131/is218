<?php
namespace app\model;

use app\model\DatabaseConnection;
use \PDO;

class CarModel extends Model
{
  private $_id;
  private $_vin;
  private $_make;
  private $_model;
  private $_year;
  private $_price;
  private $_cond;
  private $_img_url;
  private $_created_by;

  public function __construct($id = '')
  {
    if (!empty($id)) {
      $this->_id = $id;
    } else {
      $this->_id = uniqid('car_', false);
    }

    // Create a table for cars if not existent in the database
    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('CREATE TABLE IF NOT EXISTS cars (
        car_id CHAR(17) NOT NULL,
        vin CHAR(17) NOT NULL,
        make VARCHAR(15) DEFAULT NULL,
        model VARCHAR(15) DEFAULT NULL,
        year VARCHAR(4) DEFAULT NULL,
        price VARCHAR(10) DEFAULT NULL,
        cond VARCHAR(10) DEFAULT NULL,
        img_url VARCHAR(20) DEFAULT NULL,
        added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        created_by CHAR(18) NOT NULL,
        PRIMARY KEY(car_id),
        FOREIGN KEY fk_user(created_by)
        REFERENCES users(user_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
      )ENGINE=InnoDB');
      $stmt->execute();
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      die();
    }
  }

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

  // Get information about the car
  public function getCarDetails()
  {
    $db = new Database();

    $result = $db->getCarDetails($this->_vin);

    return $result;
  }
}

?>
