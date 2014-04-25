<?php
// no direct access
defined('_JEXEC') or die;
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


<?php $backlink = JRoute::_( "index.php?view=default"); ?>

<div class="">
<a href="<?php echo $backlink ; ?>" id="download-brochure" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Event List</a>
</div>
<div class="clearfix"></div>
	<hr class="divider">



<?php foreach($this->property as $i => $row): ?>
<?php 
$id = ($row['title']);
$link = JRoute::_( "index.php?view=prop&id=".$id ); ?>

<h3 class="h3">Register for <?php echo $id; ?></h3>
<hr class="divider">
<div class="clearfix"></div>

<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label for="program_name" class="col-lg-3 control-label">Name Of Program</label>
    <div class="col-lg-9">
      <input type="text" class="form-control disabled" id="program_name" name="program_name" placeholder="Name Of Program" value="<?php echo $row['title']; ?>" readonly="readonly"  />
    </div>
  </div>
  <div class="form-group">
    <label for="start_date" class="col-lg-3 control-label">Date Of Program</label>
    <div class="col-lg-9" id="dp">
      <input type="text" class="form-control datepicker disabled" id="program_date" name="program_date" placeholder="dd-mm-yyyy" value="<?php echo $row['start_date']; ?>" readonly="readonly" >
    </div>
  </div>
  <div class="form-group">
    <label for="venue" class="col-lg-3 control-label">Venue</label>
    <div class="col-lg-9">
      <textarea class="form-control disabled" readonly="readonly" id="venue" name="venue" placeholder="Venue" rows="3" ><?php echo $row['venue']; ?></textarea>
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="name" class="col-lg-3 control-label">Name of Participant</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="participant_name" id="participant_name" placeholder="Name of Participant" required="required">
    </div>
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="designation" class="col-lg-3 control-label">Designation</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation">
    </div>
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="name of org" class="col-lg-3 control-label">Name Of The Organization</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="organization" id="organization" placeholder="Name Of The Organization">
    </div>
    <!-- /.col-lg-4 --> 
  </div>
  <!-- /.col-lg-4 -->
  
  <div class="form-group">
    <label for="orgaddr" class="col-lg-3 control-label">Organization Address</label>
    <div class="col-lg-9">
      <textarea class="form-control" id="organization_address" name="organization_address" placeholder="Organization Address" rows="3"></textarea>
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="phone" class="col-lg-3 control-label">Phone Number</label>
    <div class="col-lg-9">
      <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" required="required">
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="officenum" class="col-lg-3 control-label">Office Number</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="office_number" id="office_number" placeholder="Office Number">
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="col-lg-3 control-label">Email Id</label>
    <div class="col-lg-9">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required">
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="resno" class="col-lg-3 control-label">Res No</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="resident_no" id="resident_no" placeholder="Res NO">
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <label for="paofres" class="col-lg-3 control-label">Present Area of Resposibility</label>
    <div class="col-lg-3">
      <div class="checkbox" id="paofres"> <span>
        <input type="checkbox" value="Production" name="resposibility[]">
        Production </span> </div>
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 -->
    <div class="col-lg-3">
      <div class="checkbox"> <span>
        <input type="checkbox" value="Marketing" name="resposibility[]">
        Marketing </span> </div>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-3">
      <div class="checkbox"> <span>
        <input type="checkbox" value="F&A" name="resposibility[]">
        F&amp;A </span> </div>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-3">
      <div class="checkbox"> <span>
        <input type="checkbox" value="HRD" name="resposibility[]">
        HRD </span> </div>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-3">
      <div class="checkbox"> <span>
        <input type="checkbox" value="SCM" name="resposibility[]">
        SCM </span> </div>
    </div>
    <!-- /.col-lg-4 --> 
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2">
    <input type="hidden" name="event_id" id="event_id" value="<?php echo $row['id']; ?>" />
    <input type="hidden" name="event" id="event" value="register" />
      <button type="submit" class="btn btn-default">Submit</button>
      <button type="reset" class="btn btn-default" id="resetme">Reset</button>
    </div>
    <!-- /.col-lg-4 --> 
    <!-- /.col-lg-4 --> 
  </div>
</form>
<hr class="divider">

<?php endforeach; ?>
