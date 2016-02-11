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
	
	public function createParagraph($text)
	{
		?>
		<p><?php echo $text; ?></p>
		<?php
	}
}

// Testing
$obj = new Page("Homepage");
$obj->createHeader();


$obj->createContent("Header");
$obj->createParagraph("This is a sample paragraph.");
$obj->createLink("http://www.w3schools.com", "W3Schools");
$obj->createTable("Table", "Content");


$obj->setFooter("This is a sample footer.");
$obj->createFooter();
	


?>
