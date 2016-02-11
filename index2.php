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

$inputFields = array(
	"First name" => array(
		"type" => "text",
		"name" => "firstName",
		"value" => "First Name"
	),
	"Last name" => array(
		"type" => "text",
		"name" => "lastName",
		"value" => "Last Name"
	),
	"Middle name" => array(
		"type" => "text",
		"name" => "middleName",
		"value" => "Middle Name"
	),
	"User password" => array(
		"type" => "password",
		"name" => "psw",
		"value" => "Password"
	),
	"Male" => array(
		"type" => "radio",
		"name" => "gender",
		"value" => "male",
		"checked" => "checked"
	),
	"Female" => array(
		"type" => "radio",
		"name=" => "gender",
		"value" => "female"
	)
);

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

echo '<pre>';
print_r($inputFields2);
echo '</pre>';

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


?>
