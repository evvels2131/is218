<?php
	
class Page
{
	private $_title;
	private $_footer;
	
	public function __construct($pageTitle)
	{
		$this->_title = $pageTitle;
	}
	
	// Getters and setters
	public function getTitle()
	{
		return $this->_title;
	}
	
	public function setTitle($newTitle)
	{
		$this->_title = $newTitle;
	}
	
	public function getFooter()
	{
		return $this->_footer;
	}
	
	public function setFooter($newFooter)
	{
		$this->_footer = $newFooter;
	}
	
	// Create header
	public function createHeader()
	{
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title><?php echo $this->_title; ?></title>
			
			<!--Bootstrap-->
			<link rel="stylesheet" 
				href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
				integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
				crossorigin="anonymous">
		</head>
		<?php
	}
	
	// Create content
	public function createContent($heading)
	{
		?>
		<body>
			<!-- Navigation -->
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">IS 218</a>
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Another one</a></li>
						<li><a href="#">Another one</a></li>
					</ul>
				</div>
			</nav>
			<!-- end of Navigation -->
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1><?php echo $heading; ?></h1>
		<?php
	}
	
	// Create footer
	public function createFooter()
	{
		?>
						<footer>
							<h3><?php echo $this->_footer; ?></h3>
						</footer>
					</div> <!-- end of col-md-6-->
				</div> <!-- end of row -->
		  </div> <!-- end of container -->
			<!--jQuery-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
			<!--Bootstrap-->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
				integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
				crossorigin="anonymous"></script>
		</body>
		</html>
		<?php
	}
	
	// Create a link
	public function createLink($url, $text)
	{
		?>
		<a href="<?php echo $url; ?>" target="_blank"><?php echo $text; ?></a>
		<?php
	}
	
	public function createParagraph($text)
	{
		?>
		<p><?php echo $text; ?></p>
		<?php
	}
	
	// Create heading
	public function createHeading($type, $text)
		{
			switch ($type)
			{
				case 'h1':
					?>
					<h1><?php echo $text; ?></h1>
					<?php
					break;
				case 'h2':
					?>
					<h2><?php echo $text; ?></h2>
					<?php
					break;
				case 'h3':
					?>
					<h3><?php echo $text; ?></h3>
					<?php
					break;
				case 'h4':
					?>
					<h4><?php echo $text; ?></h4>
					<?php
					break;
				case 'h5':
					?>
					<h5><?php echo $text; ?></h5>
					<?php
					break;	
				case 'h6':
					?>
					<h6><?php echo $text; ?></h6>
					<?php
					break;
			}
		}
	
	// Create form from an array of input fields
	public function createForm($inputFields, $action)
	{
		?>
		<form action="<?php echo $action; ?>" method="POST">
			<?php
			foreach ($inputFields as $key => $inputField)
			{
				switch ($inputField['type'])
				{
					case 'text':
						//echo $inputField['desc'] . '<br />';
						?>
						<div class="form-group">
							<label><?php echo $inputField['desc']; ?></label>
							<input type="text" 
							   		 class="form-control" 
										 name="<?php echo $inputField['name']; ?>"
										 placeholder="<?php echo $inputField['value']; ?>">
						</div>
						<?php
						break;
					case 'password':
						//echo $inputField['desc'] . '<br />';
						?>
						<div class="form-group">
							<label><?php echo $inputField['desc']; ?></label>
							<input type="password"
										 class="form-control"
										 name="<?php echo $inputField['name']; ?>"
										 placeholder="<?php echo $inputField['value']; ?>">
						</div>
						<?php
						break;
					case 'radio':
						?>
						<div class="radio">
							<label>
								<input type="radio"
											 name="<?php echo $inputField['name']; ?>"
											 value="<?php echo $inputField['value']; ?>"
											 <?php echo $inputField['checked']; ?>>
								<?php echo $inputField['desc']; ?>
							</label>
						</div>
						<?php
						break;
					case 'checkbox':
						?>
						<div class="checkbox">
							<label>
								<input type="checkbox"
											 name="<?php echo $inputField['name']; ?>"
											 value="<?php echo $inputField['value']; ?>">
								<?php echo $inputField['desc']; ?>
											 
							</label>
						</div>
						<?php
						//echo $inputField['desc'] . '<br />';
						break;
				}
			}
			?>
			<br />
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
			<?php
	}
}

class Person
{
	private $_title;
	private $_firstName;
	private $_lastName;
	private $_emailAddress;
	
	public function __construct($title, $fname, $lname, $email)
	{
		$this->_title = $title;
		$this->_firstName = $fname;
		$this->_lastName = $lname;
		$this->_emailAddress = $email;
	}
	
	public function getObjectVars()
	{
		return get_object_vars($this);
		//var_dump(get_object_vars($this));
	}
	// Getters and Setters would go here
	public function getTitle()
	{
		return $this->_title;
	}
	
	public function getFirstName()
	{
		return $this->_firstName;
	}
	
	public function getLastName()
	{
		return $this->_lastName;
	}
	
	public function getEmailAddress()
	{
		return $this->_emailAddress;
	}
}

class Car
{
	private $_make;
	private $_model;
	private $_color;
	private $_year;
	private $_engine;
	private $_doors;
	
	public function __construct($make, $model, $color, $year, $engine, $doors)
	{
		$this->_make = $make;
		$this->_model = $model;
		$this->_color = $color;
		$this->_year = $year;
		$this->_engine = $engine;
		$this->_doors = $doors;
	}
	
	public function getObjectVars()
	{
		return get_object_vars($this);
	}
}

$car1 = new Car('Chevrolet', 'Malibu', 'Tan', '2016', 'v4', '4');
$car2 = new Car('Toyota', 'Camry', 'Black', '2015', 'v4', '4');
$car3 = new Car('Honda', 'Civic', 'White', '2014', 'v4', '2');
$car4 = new Car('Jeep', 'Grand Cherokee', 'Red', '2016', 'v8', '4');
$car5 = new Car('Dodge', 'Ram', 'Yellow', '2015', 'v8', '4');

$cars = array($car1, $car2, $car3, $car4, $car5);

$inputFields = array(
	'0' => array(
		'desc' => 'First name:',
		'type' => 'text',
		'name' => 'fname',
		'value' => 'First Name'
	),
	'1' => array(
		'desc' => 'Middle name:',
		'type' => 'text',
		'name' => 'mname',
		'value' => 'Middle Name'
	),
	'2' => array(
		'desc' => 'Password',
		'type' => 'password',
		'name' => 'pass',
		'value' => 'Password'
	),
	'3' => array(
		'desc' => 'Male',
		'type' => 'radio',
		'name' => 'gender',
		'value' => 'male',
		'checked' => 'checked'
	),
	'4' => array(
		'desc' => 'Female',
		'type' => 'radio',
		'name' => 'gender',
		'value' => 'female'
	),
	'5' => array(
		'desc' => 'Other',
		'type' => 'radio',
		'name' => 'gender',
		'value' => 'other'
	),
	'6' => array(
		'desc' => 'I have a bike',
		'type' => 'checkbox',
		'name' => 'vehicle1',
		'value' => 'Bike'
	),
	'7' => array(
		'desc' => 'I have a car',
		'type' => 'checkbox',
		'name' => 'vehicle2',
		'value' => 'Car'
	)
);

$john = new Person('Waiter', 'John', 'Smith', 'johnsmith@njit.edu');
$mary = new Person('Realtor', 'Mary', 'Smith', 'marysmith@njit.edu');
$tony = new Person('Teacher', 'Tony', 'Hawk', 'tonyhawk@njit.edu');
$johnny = new Person('Unemployed', 'Johnny', 'Appleseed', 'johnnyappleseed@njit.edu');

$people = array($john, $mary, $tony, $johnny);

// Testing
$obj = new Page("Homepage");
$obj->createHeader();

$obj->createContent("Header");
echo '<hr>';

$obj->createParagraph("This is a sample paragraph.");
echo '<hr>';

$obj->createLink("http://www.w3schools.com", "W3Schools");
//$obj->createTable("Table", "Content");
echo '<hr>';

$obj->createHeading('h1', 'This is a heading - h1');
$obj->createHeading('h2', 'This is a heading - h2');
$obj->createHeading('h3', 'This is a heading - h3');
echo '<hr>';

$obj->createForm($inputFields, 'index2.php');
echo '<hr>';

// Create table
echo '<h3>createTable($people) function</h3>';
createTable($people);
echo '<h3>createTable_v2($people) function</h3>';
createTable_v2($people);
echo '<h3>createTable_v2($cars) function</h3>';
createTable_v2($cars);
echo '<hr>';

$obj->setFooter("Footer - Tomasz Goralczyk");
$obj->createFooter();

// Function to create a table
function createTable($array)
{
	$firstObject = $array[0];
	$properties = $firstObject->getObjectVars();
	?>
	<table class="table table-striped">
		<tr>
			<?php
			foreach ($properties as $property => $value)
			{
				?>
				<th><?php echo $property; ?></th>
				<?php
			}
			?>
		</tr>
			<?php
			foreach ($array as $key => $object)
			{
				?>
				<tr>
					<td><?php echo $object->getTitle(); ?></td>
					<td><?php echo $object->getFirstName(); ?></td>
					<td><?php echo $object->getLastName(); ?></td>
					<td><?php echo $object->getEmailAddress(); ?></td>
				</tr>
				<?php
			}
			?>
	</table>
	<?php
}

//cTable($people);
function createTable_v2($array)
{
	$firstObject = $array[0];
	$properties = $firstObject->getObjectVars();
	?>
	<table class="table table-striped">
		<tr>
			<?php
			foreach ($properties as $property => $value)
			{
				?>
				<th><?php echo $property; ?></th>
				<?php
			}
			?>
		</tr>
		<?php
		foreach ($array as $key => $object)
		{
			?>
			<tr>
			<?php
			if (is_object($object))
			{
				$object = (array)$object;
				foreach ($object as $property => $value)
				{
					?>
					<td><?php echo $value; ?></td>
					<?php
				}
			}
			?>
			</tr>
			<?php
		}
		?>
	</table>
	<?php
}

?>
