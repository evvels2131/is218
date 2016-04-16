<?php
namespace app\collection;

use app\model\CarModel;
use app\model\DatabaseConnection;
use \PDO;

class CarCollection extends Collection
{
  private $_cars;
  private $_limitRecords;
  private $_starting_position;

  // Getter for the cars attribute
  public function getCars()
  {
    return $this->_cars;
  }

  public function setLimit($limit)
  {
    $this->_limitRecords = $limit;
  }

  public function getLimit()
  {
    return $this->_limitRecords;
  }

  public function setStartingPosition($starting_position)
  {
    $this->_starting_position = $starting_position;
  }

  public function getStartingPosition()
  {
    return $this->_starting_position;
  }

  // Create a new car model
  public function create()
  {
    $car = new CarModel;
    return $car;
  }

  public function populateCollection()
  {
    $result = array();

    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('SELECT
        c.img_url AS `Image`,
        CONCAT_WS(\' \', c.make, c.model, c.year) AS `Name & Year`,
        c.price AS `Price`,
        c.cond AS `Condition`,
        c.added_on AS `Added on`,
        u.user_id AS `UserID`,
        CONCAT_WS(\' \', u.first_name, u.last_name) AS `Salesperson`,
        c.car_id AS `CarID`
        FROM cars c LEFT JOIN users u ON c.created_by = u.user_id ORDER BY c.added_on
        DESC LIMIT :startingPosition,  :limitRecords');

      $length = strlen($this->_limitRecords);
      $strpos = strlen($this->_starting_position);

      $stmt->bindParam(':limitRecords', $this->_limitRecords, PDO::PARAM_STR, $length);
      $stmt->bindParam(':startingPosition', $this->_starting_position, PDO::PARAM_STR, $strpos);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        array_push($result, $row);
      }

      $this->_cars = $result;

      return true;
    }
    catch (\PDOException $e)
    {
      return false;
      // echo 'Database error: ' . $e->getMessage();
      die();
    }
  }

  public function getAmountOfPages()
  {
    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('SELECT car_id FROM cars');

      $stmt->execute();

      $totalRecords =  $stmt->rowCount();

      return ceil($totalRecords / $this->_limitRecords);
    }
    catch (\PDOException $e)
    {
      return false;
      echo 'Database error: ' . $e->getMessage();
      die();
    }
  }
}
?>
