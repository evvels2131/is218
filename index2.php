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
			foreach ($inputFields as $key => $innerArray)
			{
				echo $key . '<br />'; 

				if (is_array($innerArray))
				{
					?>
					<input type="<?php echo $innerArray['type']; ?>" name="<?php echo $innerArray['name']; ?>"
						value="<?php echo $innerArray['value']; ?>"><br />
					<?php
				}
				else
				{
					echo $innerArray;
				}
			}
			?>
		</form>
		<input type="submit" value="Submit">
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
	
);

// Testing
$obj = new Page("Homepage");
$obj->createHeader();


$obj->createContent("Header");
$obj->createParagraph("This is a sample paragraph.");
$obj->createLink("http://www.w3schools.com", "W3Schools");
$obj->createTable("Table", "Content");
$obj->createForm($inputFields, 'index2.php');


$obj->setFooter("This is a sample footer.");
$obj->createFooter();


?>
