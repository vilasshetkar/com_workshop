<?php
// no direct access
defined('_JEXEC') or die;
JHtml::stylesheet(Juri::base() . 'components/com_workshop/css/style.css');
$document = JFactory::getDocument();
 
// Add Javascript directly here
$document->addScriptDeclaration('
    $(document).ready(function(){
		$("a").click(function(){
			//alert("An inline JavaScript Declaration");
		});
    });
');

$user = JFactory::getUser();

$isAdmin = $user->get('isRoot');

?>
<?php foreach($this->property as $i => $row): ?>
<?php 
if ($isAdmin) {

$editEvent = JRoute::_( "index.php?view=default&layout=edit-event&id=".$row['id'] ); 
$deleteEvent = JRoute::_( "index.php?view=default&del=".$row['id'] ); 

 $addBtn = '<a href="'.$editEvent.'" class="btn  btn-primary" title="Edit this event"><span class="glyphicon glyphicon-edit"></span> Edit </a> | <a href="'.$deleteEvent.'" class="btn  btn-danger" title="Delete this event"> <span class="glyphicon glyphicon-remove"></span> Delete</a>';

}else{
	$addBtn = '';
}
?>

<?php $backlink = JRoute::_( "index.php?view=default");
$register = JRoute::_( "index.php?view=default&layout=register&id=".$row['id'] ); 
?>

<div class="pull-left">
<a href="<?php echo $backlink ; ?>" class="btn  btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Event List</a>
<a href="<?php echo $register ; ?>" class="btn  btn-primary"><span class="glyphicon glyphicon-pencil"></span> Register</a>
<a href="<?php echo $row['brochure'] ; ?>" class="btn  btn-primary"><span class="glyphicon glyphicon-download"></span> Download Brochure</a>
</div>
<div class="pull-right">
<?php echo $addBtn; ?>
</div>
<div class="clearfix"></div>
	<hr class="divider">



      <h3><strong><?php echo $row["title"]; ?></strong></h3>

<?php 
$id = ($row['id'])-1;
$link = JRoute::_( "index.php?view=prop&id=".$id ); ?>


<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
  <li><a href="#objective" data-toggle="tab">Objective</a></li>
  <li><a href="#topics" data-toggle="tab">Topics</a></li>
  <li><a href="#tools" data-toggle="tab">Tools/Methods</a></li>
  <li><a href="#who-attend" data-toggle="tab">Who Should Attend</a></li>
  <li><a href="#fee" data-toggle="tab">Registration & Fee</a></li>

</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="home">
  <div class="col-sm-2 pull-left">
      <img src="<?php echo $row["image"]; ?>" class="img-responsive">
  </div>
  <div class="pull-left col-sm-10">
  <table class="table table-striped ">
    <tbody><tr>
      <td colspan="1" class="col-sm-2">
        Name of Seminar: 
        </td>
      <td class="col-sm-10" colspan="3">
        <strong><?php echo $row["title"]; ?></strong>
        </td>
    </tr>
    <tr>
      <td class="col-sm-2"  colspan="1">
        Start Date: 
        </td>
      <td class="col-sm-4" colspan="1">
        <?php echo $row["start_date"]; ?>
        </td>
      <td class="col-sm-2"  colspan="1">
        End Date: 
        </td>
      <td class="col-sm-4" colspan="1">
        <?php echo $row["end_date"]; ?>
        </td>
    </tr>
    <tr>
      <td class="col-sm-2" colspan="1">Venue: </td>
      <td class="col-sm-10"  colspan="3"><?php echo $row["venue"]; ?></td>
      </tr>
    </tbody></table>
    </div>
  <table class="table table-striped clearfix">
    <tbody><tr>
    <th>Course Description: </th>
      </tr>
    <tr>
    <td>
      <?php echo $row["description"]; ?>
          </td>
    </tr>
    </tbody></table>
</div>
  <div class="tab-pane fade" id="objective">
  <table class="table table-striped ">
    <tbody><tr>
    <th>
      Objective
    </th>
    </tr>
    <tr>
    <td>
      <?php echo $row["objective"]; ?>
	</td>
    </tr>
    </tbody></table>
  </div>
  <div class="tab-pane fade" id="topics">
<table class="table table-striped ">
    <tbody><tr>
    <th>
      Course Topics
    </th>
    </tr>
    <tr>
    <td class="col-sm-10" colspan="6">
      <?php echo $row["topics"]; ?>
	</td>
    </tr>
    </tbody></table>

  

</div>
  <div class="tab-pane fade" id="tools">
  <table class="table table-striped ">
    <tbody><tr>
    <th>
      Tools & Methods
      </th>
      </tr>
    <tr>
    <td>
      <?php echo $row["tools"]; ?>
	</td>
    </tr>
    </tbody></table>
  </div>
  <div class="tab-pane fade" id="who-attend">
  <table class="table table-striped ">
    <tbody><tr>
    <th>
      Who Should Attend
      </th>
      </tr>
    <tr>
    <td>
      <?php echo $row["who_attend"]; ?>
	</td>
    </tr>
    </tbody></table>
  </div>
  <div class="tab-pane fade" id="fee">
  <table class="table table-striped ">
    <tbody><tr>
    <td>
      Registration & Fee
    </td>
    </tr>
    <tr>
    <td>
      <?php echo $row["who_attend"]; ?>
	</td>
    </tr>
    </tbody></table>
  </div>
  
</div>

<?php endforeach; ?>
