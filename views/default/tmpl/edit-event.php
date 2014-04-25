<?php
// no direct access
defined('_JEXEC') or die;
JHtml::stylesheet(Juri::base() . 'components/com_workshop/css/style.css');
$document = JFactory::getDocument();

$editor = JFactory::getEditor();
 
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
      <h2><strong><?php echo $row["title"]; ?></strong></h2>

   <form id="createEvent" class="form-horizontal" role="form" method="post" action="<?php //echo $formsubmit ; ?>">

    <div class="form-group">
        <div class=" col-sm-10">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="reset" class="btn btn-danger" id="resetme">Reset</button>
          <span class="pull-right">
          <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#metakey-panel">Meta Key </button>
          <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#metadescription-panel">Meta Description </button>
          </span>
          <div class="clearfix"></div>
        </div>
        
    <div id="metakey-panel" class="collapse"> This is meta key
   <textarea class="form-control" id="metakey" name="metakey" placeholder="Meta Key" rows="3"><?php echo $row["metakey"]; ?></textarea>
    </div>
    <div id="metadescription-panel" class="collapse"> This is meta description
   <textarea class="form-control col-sm-10" id="metadescription" name="metadescription" placeholder="Meta Description" rows="3"><?php echo $row["metadescription"]; ?></textarea>
    </div>
    </div>


<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
  <li><a href="#objective-tab" data-toggle="tab">Objective</a></li>
  <li><a href="#topics-tab" data-toggle="tab">Topics</a></li>
  <li><a href="#tools-tab" data-toggle="tab">Tools/Methods</a></li>
  <li><a href="#who-attend-tab" data-toggle="tab">Who Should Attend</a></li>
  <li><a href="#fee-tab" data-toggle="tab">Registration & Fee</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="home">
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title" placeholder="Name of Seminar" value="<?php echo $row["title"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="start-date" class="col-sm-2 control-label">Start Date</label>
    <div class="col-sm-2">
      <input type="text" class="form-control datepicker" id="start_date" name="start_date" placeholder="Start Date" value="<?php echo $row["start_date"]; ?>">
    </div>

    <label for="start-date" class="col-sm-2 control-label">End Date</label>
    <div class="col-sm-2">
      <input type="text" class="form-control datepicker" id="end_date" name="end_date" placeholder="End Date" value="<?php echo $row["end_date"]; ?>">
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="venue" class="col-sm-2 control-label">Venue</label>
    <div class="col-sm-10">
    <?php echo $editor->display('venue', $row["venue"], '', '', '', '', false); ?>
<!--    <textarea class="form-control" id="venue" name="venue" placeholder="Venue" rows="3"></textarea>
-->    </div>
  </div>
  <div class="form-group">
    <label for="event_image" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-4">
      <input type="file" class="form-control" id="event_image" name="event_image" placeholder="Image">
    </div>
    <label for="brochure" class="col-sm-2 control-label">Brochure</label>
    <div class="col-sm-4">
      <input type="file" class="form-control" id="brochure" name="brochure" placeholder="Brochure">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
    <?php echo $editor->display('description', $row["description"], '', '', '', '', false); ?>
	</div>
  </div>
  </div>
  
  
  <div class="tab-pane fade" id="objective-tab">
    <div class="form-group">
        <label for="objective" class="col-sm-2 control-label">Objective</label>
        <div class="col-sm-4">
            <?php echo $editor->display('objective', $row["objective"], '', '', '', '', false); ?>
        </div>
    </div>
  </div>

  <div class="tab-pane fade" id="topics-tab">
    <div class="form-group">
        <label for="topics" class="col-sm-2 control-label">Course Topics</label>
        <div class="col-sm-10">
            <?php echo $editor->display('topics', $row["topics"], '', '', '', '', false); ?>
        </div>
      </div>
    </div>

  <div class="tab-pane fade" id="tools-tab">
  <div class="form-group">
        <label for="tools" class="col-sm-2 control-label">Tools & Methods</label>
        <div class="col-sm-10">
            <?php echo $editor->display('tools', $row["tools"], '', '', '', '', false); ?>
        </div>
      </div>
  </div>
  <div class="tab-pane fade" id="who-attend-tab">
    <div class="form-group">
    <label for="who_attend" class="col-sm-2 control-label">Who Should Attend</label>
    <div class="col-sm-4">
            <?php echo $editor->display('who_attend', $row["who_attend"], '', '', '', '', false); ?>
    </div>
  </div>
  </div>

  <div class="tab-pane fade" id="fee-tab">
    <div class="form-group">
    <label for="registration" class="col-sm-2 control-label">Register & Fee</label>
    <div class="col-sm-4">
            <?php echo $editor->display('registration', $row["registration"], '', '', '', '', false); ?>
    </div>
  </div>
  
  </div>
  
</div>
<input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>" />
<input type="hidden" name="event" id="event" value="2" />

</form>
  <?php endforeach; ?>
