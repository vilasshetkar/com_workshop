<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.viewlegacy');

class WorkShopViewDefault extends JViewLegacy
{
	 public function display($tpl = null)
	 {
		 // Assign data to the view
 		$app	= JFactory::getApplication();
		$params = $app->getParams();
		$menus	= $app->getMenu();
		$menu	= $menus->getActive();
		$model = $this->getModel();
		$layout = $this->getLayout();
		
		switch ($layout)
		{
			case "default": $this->defaultList();
			  break;
			case "registered-user": $this->registeredUser();
			  break;
			default: $this->createEvent();
		}
		
		 // Display the template
		 parent::display($tpl);
	 }
	 
	 public function defaultList(){
 		$app	= JFactory::getApplication();
		$params = $app->getParams();
		$menus	= $app->getMenu();
		$menu	= $menus->getActive();
		$model = $this->getModel();
		$layout = $this->getLayout();

			$result = $model->getMsg($id = null);
	
			$this->property = $result;
			
	
			 $this->msg = array();
			 for($s=0;$s<count($this->property);$s++)
			 {
				 $this->msg[$s]->greeting = $this->property[$s];
			 }
			 $total = count($this->msg);
			 if (JRequest::getVar('limit') > 0) {
			 $this->msg	= array_splice($this->msg, JRequest::getVar('limitstart'), JRequest::getVar('limit'));
			 }
		 
			 jimport('joomla.html.pagination');
			 $this->_pagination = new JPagination($total, JRequest::getVar('limitstart'), JRequest::getVar('limit') );
			 
			 $this->items = $this->msg;
			 $this->pagination = $this->_pagination;
	
			 JRequest::setVar('limit', JRequest::getVar('limit', 5, '', 'int'));
			 JRequest::setVar('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));
			 
 			$del = JRequest::getVar('del');
			if($del) { echo $model->deleteEvent() ;	 }

		 // Check for errors.
			 if (count($errors = $this->get('Errors')))
			 {
				 JError::raiseError(500, implode('', $errors));
				 return false;
			 }
	 }
	 
	 

	 public function createEvent(){
 		$app	= JFactory::getApplication();
		$params = $app->getParams();
		$menus	= $app->getMenu();
		$menu	= $menus->getActive();
		$model = $this->getModel();
		$layout = $this->getLayout();


			//Get property id from url parameter like $_GET
			$id = JRequest::getVar('id');
			$ce = JRequest::getVar('event');
			$del = JRequest::getVar('del');
			$email = JRequest::getVar('email');
			$upload = JRequest::getVar('upload');
			
			if($ce == 1){ echo $model->createEvent() ; }
			elseif($ce == 2) { echo $model->updateEvent(); }
			elseif($ce == 'register') { echo $model->registerEvent() ;	 }
			if($del) { echo $model->deleteEvent() ;	 }
			if($this->getLayout()=='upload') { $model->uploadFile() ;	 }

	
			//get Model Object
			$result = $model->getMsg($id);
	
			$this->property = $result;
			if($email){
				$title = $email;
			}else{
	
				$title = $this->property[0]['title'];
			}
			$metakey = $this->property[0]['metakey'];
			$metadesc = $this->property[0]['metadescription'];
			
			//for breadcrumb  -> Pathway
			$pathway = $app->getPathway();
			$pathway->addItem($title, JRoute::_( "index.php?view=prop&id=".$id ));
	
			//Set Browser Title
			$this->document->setTitle($title);
	
			//Set Browser Meta Description
			$this->document->setDescription($metadesc);
	
			//Set Browser Meta Keywords
			$this->document->setMetadata('keywords', $metakey);
	
			if ($params->get('robots')) 
			{
				$this->document->setMetadata('robots', $params->get('robots'));
			}
		}
		
	 public function registeredUser(){
 		$app	= JFactory::getApplication();
		$params = $app->getParams();
		$menus	= $app->getMenu();
		$menu	= $menus->getActive();
		$model = $this->getModel();
		$layout = $this->getLayout();


			//Get property id from url parameter like $_GET
			$id = JRequest::getVar('id');
				
			//get Model Object
			$result = $model->registeredUser($id);
			
			$delUsr = JRequest::getVar('delUser');
			if(!$delUsr==""){
				$model->deleteUser($delUsr);
			}
	
			$this->user = $result;
	
			$title = $this->user[0]['participant_name'];

			$metakey = $this->user[0]['participant_name'];
			$metadesc = $this->user[0]['participant_name'];
			
			//for breadcrumb  -> Pathway
			$pathway = $app->getPathway();
			$pathway->addItem("Registered Users", JRoute::_( "index.php?view=default&layout=registered-user&id=".$id ));
	
			//Set Browser Title
			$this->document->setTitle($title);
	
			//Set Browser Meta Description
			$this->document->setDescription($metadesc);
	
			//Set Browser Meta Keywords
			$this->document->setMetadata('keywords', $metakey);
	
			if ($params->get('robots')) 
			{
				$this->document->setMetadata('robots', $params->get('robots'));
			}
		}
		
}
