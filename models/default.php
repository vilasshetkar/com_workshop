<?php

/**

 * @package     Joomla.Site

 * @subpackage  com_content

 *

 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.

 * @license     GNU General Public License version 2 or later; see LICENSE.txt

 */



defined('_JEXEC') or die;



jimport('joomla.application.component.model');



/**

 * Content Component Archive Model

 *

 * @package     Joomla.Site

 * @subpackage  com_content

 * @since       1.5

 */

class WorkShopModelDefault extends JModelItem

{

	public function __construct($config = array())

         {

                parent::__construct($config);

 

                $option = array(); //prevent problems

 

				$option['driver']   = 'mysqli';            // Database driver name

				$option['host']     = 'localhost';    // Database host name

				$option['user']     = 'root';       // User for database authentication

				$option['password'] = '';   // Password for database authentication

				$option['database'] = 'workshop';      // Database name

				$option['prefix']   = '';             // Database prefix (may be empty)

 

                $db = JDatabase::getInstance( $option );

				

				 // Set the pagination request variables

				 JRequest::setVar('limit', JRequest::getVar('limit', 5, '', 'int'));

				 JRequest::setVar('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));

				

                parent::setDbo($db);

         }



	public function getMsg($limit=null)

	{		 

		$db = $this->getDbo();

		$query = $db->getQuery(true);
		

		if(!$limit == null){

			$dblimit = " AND id=$limit";

		}else{ $dblimit = "" ; }
		
		if(isset($_GET['status'])){
			$status = $_GET['status'] ;
		} else { $status = 1 ; }

		$query = "SELECT * From `events` WHERE status = '".$status."'".$dblimit ;

		$db->setQuery($query);

		$result = $db->loadAssocList();//loadRowList(); //loadRow();

		//$result; //$result[2];

		return $result;

	}

// insert into database
	public function createEvent($limit=null)

	{		 
		$image = JRequest::getVar('event_image');
		$brochure = JRequest::getVar('brochure');
		if($image){
			$imagePath = $this->uploadFile('event_image');
			if($imagePath==false){
				echo "false";
			}else{
				echo "true";
			}
		}
		/*if($brochure){
			$brochurePath = $this->uploadFile($brochure);
		}
		
		$db = $this->getDbo();

		$query = $db->getQuery(true);

		// Insert columns.
		$columns = array('title', 'start_date', 'end_date', 'topics', 'venue', 'image', 'brochure', 'description', 'objective', 'who_attend', 'tools','registration', 'metakey', 'metadescription');
		 
		// Insert values.
		$values = array($db->quote($_POST['title']), $db->quote($_POST['start_date']), $db->quote($_POST['end_date']), $db->quote($_POST['topics']), $db->quote($_POST['venue']), $db->quote($imagePath), $db->quote($brochurePath), $db->quote($_POST['description']), $db->quote($_POST['objective']), $db->quote($_POST['who_attend']), $db->quote($_POST['tools']), $db->quote($_POST['registration']), $db->quote($_POST['metakey']), $db->quote($_POST['metadescription']));
		 
		// Prepare the insert query.
		$query
			->insert($db->quoteName('events'))
			->columns($db->quoteName($columns))
			->values(implode(',', $values));

		$db->setQuery($query);
		$db->query();*/

		$result = JFactory::getApplication()->enqueueMessage('Event Created Successfully','message');

		return true;

	}
	
	public function uploadFile($fileField)

	{	
				//Retrieve file details from uploaded file, sent from upload form
				$file = JRequest::getVar($fileField, null, 'files', 'array');

				//Import filesystem libraries. Perhaps not necessary, but does not hurt
				jimport('joomla.filesystem.file');
				
					//Clean up filename to get rid of strange characters like spaces etc
					$filename = JFile::makeSafe($file['name']);
					 
					//Set up the source and destination of the file
					$src = $file['tmp_name'];
					$dest = JPATH_COMPONENT . "/" . "uploads" . "/" . $filename;
					 
					//First check if the file has the right extension, we need jpg only
					$fileType = strtolower(JFile::getExt($filename) );
					if ( $fileType == 'jpg' || $fileType == 'png' || $fileType == 'gif' || $fileType == 'jpeg' || $fileType == 'pdf' || $fileType == 'doc' || $fileType == 'docx') {
					   if ( JFile::upload($src, $dest) ) {
						  $result = $dest;
					   } else {
						  //Redirect and throw an error message
						  $result = "Error";
					   }
					} else {
					   //Redirect and notify user file is not right extension
					   //$result = "Not a valid file type! Please select .jpg, .jpeg, .gif, .png, .pdf, .doc, .docx only";
					   JFactory::getApplication()->enqueueMessage('Not a valid file type! Please select .jpg, .jpeg, .gif, .png, .pdf, .doc, .docx only','error');
					   return false;
					}
		return $result;

	}



// insert into database
	public function registerEvent($limit=null)

	{
		

		$db = $this->getDbo();

		$query = $db->getQuery(true);
		$responsibility = implode(",",$_POST['resposibility']);
		
		// Insert columns.
		$columns = array('date', 'program_name', 'program_date', 'venue', 'participant_name', 'designation', 'organization', 'organization_address', 'phone', 'office_number', 'email','resident_no', 'resposibility', 'event_id');
		 
		// Insert values.
		$values = array($db->quote(date('Y-m-d H:i:s')),
		$db->quote($_POST['program_name']),
		$db->quote($_POST['program_date']),
		$db->quote($_POST['venue']),
		$db->quote($_POST['participant_name']),
		$db->quote($_POST['designation']),
		$db->quote($_POST['organization']),
		$db->quote($_POST['organization_address']),
		$db->quote($_POST['phone']),
		$db->quote($_POST['office_number']),
		$db->quote($_POST['email']),
		$db->quote($_POST['resident_no']),
		$db->quote($responsibility),
		$db->quote($_POST['event_id']));
		
		$query
			->insert($db->quoteName('registration'))
			->columns($db->quoteName($columns))
			->values(implode(',', $values));
		

		$db->setQuery($query);
		$db->query();

		//$result .= implode(",",$_POST);// .= JRequest::getVar('start_date');
		$result = JFactory::getApplication()->enqueueMessage('Event Created Successfully','message');

		return true;

	}
// Update database
	public function updateEvent($limit=null)

	{		 

		$db = $this->getDbo();

		$query = $db->getQuery(true);

		$fields = array(
		$db->quoteName('title').' = '.$db->quote($_POST['title']),
		$db->quoteName('start_date').' = '.$db->quote(date('Y-m-d H:i:s',strtotime($_POST['start_date']))),
		$db->quoteName('end_date').' = '.$db->quote(date('Y-m-d H:i:s',strtotime($_POST['end_date']))),
		$db->quoteName('topics').' = '.$db->quote($_POST['topics']),
		$db->quoteName('venue').' = '.$db->quote($_POST['venue']),
		$db->quoteName('image').' = '.$db->quote($_POST['image']),
		$db->quoteName('brochure').' = '.$db->quote($_POST['brochure']),
		$db->quoteName('description').' = '.$db->quote($_POST['description']),
		$db->quoteName('objective').' = '.$db->quote($_POST['objective']),
		$db->quoteName('who_attend').' = '.$db->quote($_POST['who_attend']),
		$db->quoteName('tools').' = '.$db->quote($_POST['tools']),
		$db->quoteName('registration').' = '.$db->quote($_POST['registration']),
		$db->quoteName('metakey').' = '.$db->quote($_POST['metakey']),
		$db->quoteName('metadescription').' = '.$db->quote($_POST['metadescription'])
		);
		$conditions = array(
	    	$db->quoteName('id') . ' = '.$_POST['id']
		);

		
		$query
			->update($db->quoteName('events'))
			->set($fields)
			->where($conditions);
		

		

		$db->setQuery($query);
		$db->query();

		//$result = $db->loadAssocList();//loadRowList(); //loadRow();

		$result; //$result[2];
		
		$result = JFactory::getApplication()->enqueueMessage('Workshop/Seminar Updated Successfully','message');

		return $result;

	}


// Delete from database
	public function deleteEvent($limit=null)
	{		 
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$fields = array($db->quoteName('status').' = '.$db->quote('0'));
		$conditions = array($db->quoteName('id') . ' = '.$_GET['del']);
		
		$query
			->update($db->quoteName('events'))
			->set($fields)
			->where($conditions);

		$db->setQuery($query);
		$db->query();

		$result = JFactory::getApplication()->enqueueMessage('Workshop/Seminar Deleted Successfully','message');

		return $result;

	}

// Republish from database
	public function activeEvent($limit=null)

	{		 

		$db = $this->getDbo();

		$query = $db->getQuery(true);

		$query = "UPDATE `events` SET
		status = '$_GET[status]',
		WHERE id = $_GET[id]";

		$db->setQuery($query);
		$db->query();

		//$result = $db->loadAssocList();//loadRowList(); //loadRow();

		$result; //$result[2];
		
		$result = JFactory::getApplication()->enqueueMessage('Workshop/Seminar Restored Successfully','message');

		return $result;

	}




// registered User
	public function registeredUser($limit=null)

	{		 

		$db = $this->getDbo();

		$query = $db->getQuery(true);
		

		if(!$limit == null){

			$dblimit = "WHERE event_id = $limit AND status = '1'";

		}else{ $dblimit = "" ; }
		
		$query = "SELECT * From `registration` ".$dblimit ;

		$db->setQuery($query);

		$result = $db->loadAssocList();//loadRowList(); //loadRow();

		//$result; //$result[2];

		return $result;

	}
	
// Delete user from registration
	public function deleteUser($delUsr)
	{		 
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$fields = array($db->quoteName('status').' = '.$db->quote('0'));
		$conditions = array($db->quoteName('id') . ' = '.$delUsr);
		
		$query
			->update($db->quoteName('registration'))
			->set($fields)
			->where($conditions);

		$db->setQuery($query);
		$db->query();

		$result = JFactory::getApplication()->enqueueMessage('Workshop/Seminar Deleted Successfully','message');

		return $result;

	}


}

