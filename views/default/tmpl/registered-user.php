<?php

// no direct access

defined('_JEXEC') or die;

$document = JFactory::getDocument();
JHtml::stylesheet(Juri::base() . 'components/com_workshop/css/datepicker.css');
JHtml::script(Juri::base() . 'components/com_workshop/js/bootstrap-datepicker.js');
JHtml::script(Juri::base() . 'components/com_workshop/js/script.js');
 


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

$register = JRoute::_( "index.php?option=com_workshop&view=default&layout=register&id=".$row['event_id'] ); 
$delUser = JRoute::_( "index.php?option=com_workshop&view=default&layout=registered-user&delUser=".$row['id']."&id=".$_GET['id'] ); 

?>
    <tr>
        <td> <?php echo $i+1 ?> </td>
        <td> <?php echo $row['participant_name'] ?> </td>
        <td> <?php echo date("d-M-Y", strtotime($row['date']))  ?> </td>
        <td> <?php echo $row['email'] ?> </td>
        <td> <?php echo $row['phone'] ?> </td>
        <td><a href="<?php echo $delUser ?>">Delete</a> </td>
    </tr>

  <?php endforeach; ?>
</table>
<?php // echo $this->pagination->getListFooter(); ?>

<?php }else{

	echo "Please Login as Administrator to view this page!";

}

?>
</div>
