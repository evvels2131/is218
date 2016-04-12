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

  // Save the car
  public function save()
  {
    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('INSERT INTO cars (car_id, vin, make, model, year,
        price, cond, img_url, created_by) VALUES (:car_id, :vin, :make, :model, :year,
        :price, :cond, :img_url, :created_by)');

      $stmt->bindParam(':car_id', $this->_car_id);
      $stmt->bindParam(':vin', $this->_vin);
      $stmt->bindParam(':make', $this->_make);
      $stmt->bindParam(':model', $this->_model);
      $stmt->bindParam(':year', $this->_year);
      $stmt->bindParam(':price', $this->_price);
      $stmt->bindParam(':cond', $this->_cond);
      $stmt->bindParam(':img_url', $this->_img_url);
      $stmt->bindParam(':created_by', $this->_created_by);

      $stmt->execute();
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      die();
    }
  }

  // Get the basic information about the car
  public function getBasicInformation()
  {
    $result = array();

    try
    {
      $stmt = $dbconn->prepare('SELECT
        c.vin AS `Vin`,
        CONCAT_WS(\' \', c.make, c.model, c.year) AS `Name`,
        c.price AS `Price`,
        c.cond AS `Condition`,
        c.img_url AS `Image`,
        c.added_on AS `Added on`,
        CONCAT_WS(\' \', u.first_name, u.last_name) AS `Salesperson`
        FROM cars c LEFT JOIN users u ON c.created_by = u.user_id
        WHERE car_id=:car_id');

      $stmt->bindParam(':car_id', $this->_id);
      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($result, $row);
      }

      return $result;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      return $result;
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
