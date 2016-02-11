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
		<html>
		<head>
			<meta charset="UTF-8">
			<title><?php echo $this->_title; ?></title>
		</head>
		<?php
	}
	
	// Create content
	public function createContent($heading)
	{
		?>
		<body>
			<section>
				<h1><?php echo $heading; ?></h1>
		<?php
	}
	
	// Create footer
	public function createFooter()
	{
		?>
		  </section>
			<footer>
				<h3><?php echo $this->_footer; ?></h3>
			</footer>
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
	
	public function createTable($th, $td)
	{
		?>
		<table>
			<tr>
				<th><?php echo $th; ?></th>
			</tr>
			<tr>
				<td><?php echo $td; ?></td>
			</tr>
		</table>
		<?php
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
						echo $inputField['desc'] . '<br />';
						?>
						<input type="text" 
									 name="<?php echo $inputField['name']; ?>" 
									 value="<?php echo $inputField['value']; ?>"><br />
						<?php
						break;
					case 'password':
						echo $inputField['desc'] . '<br />';
						?>
						<input type="password" 
									 name="<?php echo $inputField['name']; ?>" 
									 value="<?php echo $inputField['value']; ?>"><br />
						<?php
						break;
					case 'radio':
						?>
						<input type="radio" 
									 name="<?php echo $inputField['name']; ?>" 
									 value="<?php echo $inputField['value']; ?>" 
									 <?php echo $inputField['checked']; ?> >
						<?php
						echo $inputField['desc'] . '<br />';
						break;
					case 'checkbox':
						?>
						<input type="checkbox"
									 name="<?php echo $inputField['name']; ?>"
									 value="<?php echo $inputField['value']; ?>">
						<?php
						echo $inputField['desc'] . '<br />';
						break;
				}
			}
			?>
			<br />
			<input type="submit" value="Submit">
		</form>
			<?php
	}
	
	public function createParagraph($text)
	{
		?>
		<p><?php echo $text; ?></p>
		<?php
	}
}

$inputFields2 = array(
	'0' => array(
		'desc' => 'First name:',
		'type' => 'text',
		'name' => 'fname',
		'value' => 'First Name'
	),
	'1' => array(
		'desc' => 'First naddme:',
		'type' => 'text',
		'name' => 'ddd',
		'value' => 'Firsddt Name'
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
	),
);

// Testing
$obj = new Page("Homepage");
$obj->createHeader();


$obj->createContent("Header");
$obj->createParagraph("This is a sample paragraph.");
$obj->createLink("http://www.w3schools.com", "W3Schools");
$obj->createTable("Table", "Content");
//$obj->createForm($inputFields, 'index2.php');
$obj->createForm($inputFields2, 'index2.php');


$obj->setFooter("This is a sample footer.");
$obj->createFooter();


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
	
	public function test()
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

$john = new Person('Waiter', 'John', 'Smith', 'johnsmith@njit.edu');
$mary = new Person('Realtor', 'Mary', 'Smith', 'marysmith@njit.edu');
$tony = new Person('Teacher', 'Tony', 'Hawk', 'tonyhawk@njit.edu');
$johnny = new Person('Unemployed', 'Johnny', 'Applesead', 'johnnyapplesead@njit.edu');

$personArray = array($john, $mary, $tony, $johnny);

echo '<h1>test</h1>';
//echo $personArray[$john];
print_r($personArray[0]);
//echo $personArray[0];

foreach ($personArray as $key => $person)
{
	echo $key . '<br />';
	echo $person->test();
	echo $person->getTitle() . '<br />';
	echo $person->getFirstName() . '<br />';
	echo $person->getLastName() . '<br />';
	echo $person->getEmailAddress() . '<br /><br />';
}

echo '<pre>';
$john->test();
echo '</pre>';

$whats = $john->test();
//$whats = get_object_vars($john);
foreach ($whats as $key => $value)
{
	echo 'key: ' . $key . ', value: ' . $value . '<br />';
}

//cT($whats);
cT($personArray);

function cT($arrayPeople)
{
	$firstObject = $arrayPeople[0];
	$test = $firstObject->test();
	?>
	<table>
		<tr>
			<?php
			foreach ($test as $key => $value)
			{
				?>
				<th><?php echo $key; ?></th>
				<?php
			}
			?>
		</tr>
			<?php
			foreach ($arrayPeople as $key => $value)
			{
				?>
				<tr>
					<td><?php echo $value->getTitle(); ?></td>
					<td><?php echo $value->getFirstName(); ?></td>
					<td><?php echo $value->getLastName(); ?></td>
					<td><?php echo $value->getEmailAddress(); ?></td>
				</tr>
				<?php
			}
			?>
	</table>
	<?php
}


$class_vars = get_object_vars($john);
foreach ($class_vars as $name => $value)
{
	echo $name . ': ' . $value . '<br />';
}

//$test = get_object_vars($john);
//var_dump($test);

echo '<pre>';
print_r($personArray);
echo '</pre>';


function makeTable($array)
{
	echo 'Hello';
}
//echo $personArray[0];
print_r(array_keys($personArray[0]));
$testing = each($personArray);
echo '<pre>';
print_r($testing);
echo '</pre>';

//var_dump(get_object_vars($personArray));
	



?>
