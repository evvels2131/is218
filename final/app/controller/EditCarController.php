<?php 
namespace app\controller;

use app\view\NotificationsView;
use app\collection\CarCollection;

class EditCarController extends Controller 
{
	public function get() {}

	public function post() 
	{
		if ($_POST['form']) 
		{
			$clean = array();
			$clean['vin'] = parent::sanitizeString($_POST['vin']);
			$clean['price'] = parent::sanitizeString($_POST['price']);
			$clean['condition'] = parent::sanitizeString($_POST['condition']);
			$clean['img_url'] = parent::sanitizeString($_POST['img_url']);

			$carCollection = new CarCollection();

			$car = $carCollection->create();

			$car->setVin($clean['vin']);

			// Delete the car if delete button was clicked/submitted
			if (isset($_POST['delete'])) {
				$message = '';
				$type = 'danger';
				if ($car->delete()) {
					$message = 'Congratulations! You\'ve successfully deleted the car.';
					$type = 'success';
				} else {
					$message = 'Something went wrong. Please go back and try again';
				}
				$notification = new NotificationsView($message, $type);
				exit();
			}

			$car->setPrice($clean['price']);
			$car->setCondition($clean['condition']);

			// Save a new file image if submitted
			if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
				parent::saveFile();
				$path = 'uploads/' . $_FILES['file']['name'];
				$car->setImageUrl($path);
			} else {
				$car->setImageUrl($clean['img_url']);
			}

			$message = '';
			$type = 'danger';
			if ($car->update()) {
				$message = 'You\'ve successfully updated the information about the car.';
				$type = 'success';
			} else {
				$message = 'Something went wrong. Please go back and try again.';
			}

			$notification = new NotificationsView($message, $type);
		}
		else {
			$message = 'Something went wrong. Please go back and try again.';
			$type = 'danger';

			$notification = new NotificationsView($message, $type);
		}
	}
}

?>