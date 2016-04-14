<?php
namespace app\model;

use app\model\DatabaseConnection;
use \PDO;

class CarModel extends Model
{
  private $car_id;
  private $vin;
  private $make;
  private $model;
  private $year;
  private $price;
  private $cond;
  private $img_url;
  private $created_by;

  public function __construct($id = '')
  {
    if (!empty($id)) {
      $this->car_id = $id;
    } else {
      $this->car_id = uniqid('car_', false);
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
        img_url VARCHAR(100) DEFAULT NULL,
        added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        created_by CHAR(18) NOT NULL,
        PRIMARY KEY(car_id),
        FOREIGN KEY fk_user(created_by)
        REFERENCES users(user_id)
        ON UPDATE NO ACTION
        ON DELETE CASCADE
      )ENGINE=InnoDB');
      $stmt->execute();

      return true;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      return false;
      die();
    }
  }

  // Getters and setters
  public function getId() {
    return $this->car_id;
  }

  public function setId($id) {
    $this->car_id = $id;
  }

  public function getVin() {
    return $this->vin;
  }

  public function setVin($vin) {
    $this->vin = $vin;
  }

  public function getMake() {
    return $this->make;
  }

  public function setMake($make) {
    $this->make = $make;
  }

  public function getModel() {
    return $this->model;
  }

  public function setModel($model) {
    $this->model = $model;
  }

  public function getYear() {
    return $this->year;
  }

  public function setYear($year) {
    $this->year = $year;
  }

  public function getPrice() {
    return $this->price;
  }

  public function setPrice($price) {
    $this->price = $price;
  }

  public function getCondition() {
    return $this->cond;
  }

  public function setCondition($condition) {
    $this->cond = $condition;
  }

  public function getImgUrl() {
    return $this->img_url;
  }

  public function setImageUrl($url) {
    $this->img_url = $url;
  }

  public function getCreatedBy() {
    return $this->created_by;
  }

  public function setCreatedBy($created_by) {
    $this->created_by = $created_by;
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

      $stmt->bindParam(':car_id', $this->car_id);
      $stmt->bindParam(':vin', $this->vin);
      $stmt->bindParam(':make', $this->make);
      $stmt->bindParam(':model', $this->model);
      $stmt->bindParam(':year', $this->year);
      $stmt->bindParam(':price', $this->price);
      $stmt->bindParam(':cond', $this->cond);
      $stmt->bindParam(':img_url', $this->img_url);
      $stmt->bindParam(':created_by', $this->created_by);

      $stmt->execute();

      return true;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      return false;
      die();
    }
  }

  // Get the basic information about the car
  public function getBasicInformation()
  {
    $result = array();

    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('SELECT
        c.img_url AS `Image`,
        c.vin AS `Vin`,
        CONCAT_WS(\' \', c.make, c.model, c.year) AS `Name`,
        c.price AS `Price`,
        c.cond AS `Condition`,
        c.added_on AS `Added on`,
        u.user_id AS `UserID`,
        CONCAT_WS(\' \', u.first_name, u.last_name) AS `Salesperson`
        FROM cars c LEFT JOIN users u ON c.created_by = u.user_id
        WHERE car_id=:car_id');

      $stmt->bindParam(':car_id', $this->car_id);
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
}

?>
