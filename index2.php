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
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
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
	/*public function createTable($th, $td)
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
	}*/
	
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
$obj->createParagraph("This is a sample paragraph.");
$obj->createLink("http://www.w3schools.com", "W3Schools");
//$obj->createTable("Table", "Content");
$obj->createHeading('h1', 'This is a heading.');
$obj->createHeading('h2', 'This is a heading.');
$obj->createHeading('h3', 'This is a heading.');
$obj->createForm($inputFields, 'index2.php');

// Create table
createTable($people);
echo '<hr>';
createTable_v2($people);

$obj->setFooter("This is a sample footer.");
$obj->createFooter();

// Function to create a table
function createTable($people)
{
	$firstPerson = $people[0];
	$test = $firstPerson->test();
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
			foreach ($people as $key => $value)
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

//cTable($people);
function createTable_v2($people)
{
	$firstObject = $people[0];
	$properties = $firstObject->test();
	?>
	<table>
		<tr>
			<?php
			foreach ($properties as $key => $value)
			{
				?>
				<th><?php echo $key; ?></th>
				<?php
			}
			?>
		</tr>
		<?php
		foreach ($people as $key => $value)
		{
			?>
			<tr>
			<?php
			if (is_object($value))
			{
				$value = (array)$value;
				foreach ($value as $key => $value)
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
