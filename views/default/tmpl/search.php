<?php

/**

* Author:	Omar Muhammad

* Email:	admin@omar84.com

* Website:	http://omar84.com

* Component:Blank Component

* Version:	3.0.0

* Date:		03/11/2012

* copyright	Copyright (C) 2012 http://omar84.com. All Rights Reserved.

* @license	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

**/

// no direct access

defined('_JEXEC') or die;

JHtml::stylesheet(Juri::base() . 'components/com_workshop/css/style.css');
JHtml::script(Juri::base() . 'components/com_workshop/js/script.js');

$document = JFactory::getDocument();

 

// Add Javascript directly here

$document->addScriptDeclaration('

    $(document).ready(function(){

		$("a").click(function(){

			//alert("An inline JavaScript Declaration");

		});

    });

');

$searchView = JRoute::_( "index.php?option=com_workshop&view=default&layout=search" ); 

?>

<form action="<?php echo $searchView; ?>" method="post" enctype="multipart/form-data">
Title: <input type="text" name="search[]" value="" /><br>

Venue: <input type="text" name="search[]" value="" /><br>

Date: <input type="text" name="search[]" value="" /><br>

<input type="submit">
</form>

<div class="panel panel-default">

  <div class="panel-heading">Trainings</div>

<?php foreach($this->msg as $i => $row): ?>

	<h1><?php echo $row['title'] ; ?>
	<small><?php echo $row['venue'] ; ?></small></h1>

	<hr class="divider">

  <?php endforeach; ?>

</div>
<?php echo $this->pagination->getListFooter(); ?>

<hr class="divider">

