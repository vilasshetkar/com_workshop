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

?>

<?php 



$user = JFactory::getUser();
$isAdmin = $user->get('isRoot');

if ($isAdmin) {

$createEvent = JRoute::_( "index.php?view=default&layout=create-event"); 

	?>

<div class="col-md-12">

<a href="<?php echo $createEvent; ?>" id="download-brochure" class="btn btn-default">Create Seminar/Workshop</a>

</div>

<div class="clearfix"></div>

	<hr class="divider">



<?php }else{

	//echo "This is user";

}

?>



<div class="panel panel-default">

  <div class="panel-heading">Trainings</div>

<?php foreach($this->items as $i => $item): ?>

<?php 

$register = JRoute::_( "index.php?view=default&layout=register&id=".$item->greeting['id'] ); 

$detail = JRoute::_( "index.php?view=default&layout=event-details&id=".$item->greeting['id'] ); 

if ($isAdmin) {

$editEvent = JRoute::_( "index.php?view=default&layout=edit-event&id=".$item->greeting['id'] ); 
$registeredUser = JRoute::_( "index.php?view=default&layout=registered-user&id=".$item->greeting['id'] ); 
$deleteEvent = JRoute::_( "index.php?view=default&del=".$item->greeting['id'] ); 

$addBtn = '<a href="'.$editEvent.'" class="btn  btn-primary" title="Edit this event"><span class="glyphicon glyphicon-edit"></span> Edit </a> | <a href="'.$deleteEvent.'" class="btn  btn-danger" title="Delete this event"> <span class="glyphicon glyphicon-remove"></span> Delete</a> | <a href="'.$registeredUser.'" class="btn  btn-primary" title="See how many users registered for this event"><span class="glyphicon glyphicon-edit"></span> Registered User </a>';

}else{

	$addBtn = '<a href="'.$register.'"><span class="glyphicon glyphicon-pencil"></span> Register </a> | <a href="'.$item->greeting["brochure"].'"><span class="glyphicon glyphicon-file"></span> Brochure </a> | <a href="" class="test" id="ical"><span class="glyphicon glyphicon-calendar"></span> Add to Outlook </a>';

	}

?>



  <div class="wraper-list" id="<?php echo $item->greeting['id']; ?>">

    <div class="col-md-4 col-sm-4"> <img src="<?php echo $item->greeting['image'];?>" alt="..." class="img-responsive img-thumbnail" style="margin-top:30px;"> </div>

    <div class="col-md-8 col-sm-8">

      <a href="<?php echo $detail ; ?>">

      <h4 id="first"><?php echo $item->greeting['title'];?></h4>

      </a>

      <p>Start Date: <span class="start-time"><?php echo $item->greeting['start_date'];?> | </span>End Date: <span class="end-time"><?php echo $item->greeting['end_date'];?></span></p>

      <div>

        <p><small class="Location"><?php echo $item->greeting['venue'];?></small></p>

      </div>

    <?php echo $addBtn; ?>

       </div>

    <div class="clearfix"></div>

  </div>

	<hr class="divider">

  <?php endforeach; ?>

</div>

<?php echo $this->pagination->getListFooter(); ?>

<hr class="divider">

