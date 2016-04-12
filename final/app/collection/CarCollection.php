<?php
namespace app\collection;

use app\model\CarModel;
use app\model\DatabaseConnection;

class CarCollection extends Collection
{
  private $_cars;

  public function __construct($limitRecords = 10)
  {
    $result = array();

    try
    {
      $stmt = $dbconn->prepare('SELECT
        c.car_id AS `CarID`,
        c.vin AS `Vin`,
        CONCAT_WS(\' \', c.make, c.model, c.year) AS `Name & Year`,
        c.price AS `Price`,
        c.cond AS `Condition`,
        c.img_url AS `Image`,
        c.added_on AS `Added on`,
        CONCAT_WS(\' \', u.first_name, u.last_name) AS `Salesperson`,
        u.user_id AS `UserID`
        FROM cars c LEFT JOIN users u ON c.created_by = u.user_ID LIMIT :limitRecords');

      $stmt->bindParam(':limitRecords', $limitRecords);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        array_push($result, $row);
      }

      $this->_cars = $result;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      die();
    }
  }
}
?>
