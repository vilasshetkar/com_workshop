<?php

// no direct access

defined('_JEXEC') or die;

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


<div class="panel panel-default">

  <div class="panel-heading">Trainings</div>
<table class="table table-striped">
    <tr>
        <th>Sr.No.</th>
        <th>Name of Participant</th>
        <th>Date of Registration</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Delete</th>
    </tr>
<?php foreach($this->user as $i => $row): ?>

<?php 

$register = JRoute::_( "index.php?view=default&layout=register&id=".$row['Id'] ); 

?>
    <tr>
        <td> <?php echo $i+1 ?> </td>
        <td> <?php echo $row['participant_name'] ?> </td>
        <td> <?php echo $row['program_date'] ?> </td>
        <td> <?php echo $row['email'] ?> </td>
        <td> <?php echo $row['phone'] ?> </td>
        <td> <?php echo $row['event_id'] ?> </td>
    </tr>

  <?php endforeach; ?>
</table>
<?php // echo $this->pagination->getListFooter(); ?>

<?php }else{

	echo "Please Login as Administrator to view this page!";

}

?>
</div>
