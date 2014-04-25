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

 

				$option['driver']   = 'mysql';            // Database driver name

				$option['host']     = 'localhost';    // Database host name

				$option['user']     = 'iflbmc_iflbm';       // User for database authentication

				$option['password'] = '2Ys]P4g7!S';   // Password for database authentication

				$option['database'] = 'iflbmc_iflbm';      // Database name

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

		$db = $this->getDbo();

		$query = $db->getQuery(true);

		$query = "INSERT INTO `events` (title, start_date, end_date, topics, venue, image, brochure, description, objective, who_attend, tools, registration, metakey, metadescription) VALUES ('$_POST[title]', '$_POST[start_date]', '$_POST[end_date]', '$_POST[topics]', '$_POST[venue]', '$_POST[image]', '$_POST[brochure]', '$_POST[description]', '$_POST[objective]', '$_POST[who_attend]', '$_POST[tools]', '$_POST[registration]', '$_POST[metakey]', '$_POST[metadescription]')";

		$db->setQuery($query);
		$db->query();

		$result = JFactory::getApplication()->enqueueMessage('Event Created Successfully','message');

		return true;

	}

// insert into database
	public function registerEvent($limit=null)

	{
		

		$db = $this->getDbo();

		$query = $db->getQuery(true);
		$responsibility = implode(",",$_POST['resposibility']);
		echo $_POST['resposibility'];

		$query = "INSERT INTO `registration` (`program_name`, `program_date`, `venue`, `participant_name`, `designation`, `organization`, `organization_address`, `phone`, `office_number`, `email`, `resident_no`, `resposibility`, `event_id`) VALUES ('$_POST[program_name]', '$_POST[program_date]', '$_POST[venue]', '$_POST[participant_name]', '$_POST[designation]', '$_POST[organization]', '$_POST[organization_address]', '$_POST[phone]', '$_POST[office_number]', '$_POST[email]', '$_POST[resident_no]', '$responsibility', '$_POST[event_id]' );";

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

		$query = "UPDATE `events` SET
		title = '$_POST[title]',
		start_date = '$_POST[start_date]',
		end_date = '$_POST[end_date]', 
		topics = '$_POST[topics]', 
		venue = '$_POST[venue]', 
		image = '$_POST[image]', 
		brochure = '$_POST[brochure]', 
		description = '$_POST[description]', 
		objective = '$_POST[objective]', 
		who_attend = '$_POST[who_attend]', 
		tools = '$_POST[tools]', 
		registration = '$_POST[registration]', 
		metakey = '$_POST[metakey]', 
		metadescription = '$_POST[metadescription]' WHERE id = $_POST[id]";

		$db->setQuery($query);
		$db->query();

		//$result = $db->loadAssocList();//loadRowList(); //loadRow();

		$result; //$result[2];
		
		$result = JFactory::getApplication()->enqueueMessage('Updated Successfully','notice');

		return $result;

	}


// Delete from database
	public function deleteEvent($limit=null)

	{		 

		$db = $this->getDbo();

		$query = $db->getQuery(true);

		$query = "UPDATE `events` SET status = '0' WHERE id = ".$_GET['del'];

		$db->setQuery($query);
		$db->query();

		//$result = $db->loadAssocList();//loadRowList(); //loadRow();

		$result; //$result[2];
		
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
		
		$result = JFactory::getApplication()->enqueueMessage('Workshop/Seminar Deleted Successfully','message');

		return $result;

	}

	public function uploadFile()

	{		 
				//Retrieve file details from uploaded file, sent from upload form
				$file = JRequest::getVar('file_upload', null, 'files', 'array');
				 
				//Import filesystem libraries. Perhaps not necessary, but does not hurt
				jimport('joomla.filesystem.file');
				
				if(isset($file)){
					 
					//Clean up filename to get rid of strange characters like spaces etc
					$filename = JFile::makeSafe($file['name']);
					 
					//Set up the source and destination of the file
					$src = $file['tmp_name'];
					$dest = JPATH_COMPONENT . "/" . "uploads" . "/" . $filename;
					 
					//First check if the file has the right extension, we need jpg only
					$fileType = strtolower(JFile::getExt($filename) );
					if ( $fileType == 'jpg' || $fileType == 'png' || $fileType == 'gif' || $fileType == 'jpeg') {
					   if ( JFile::upload($src, $dest) ) {
						  $result = $dest;
					   } else {
						  //Redirect and throw an error message
						  $result = "Error";
					   }
					} else {
					   //Redirect and notify user file is not right extension
					   $result = "Not a valid file type! Please select .jpg, .jpeg, .gif, .png only";
					}
				}

		return $result;

	}



// registered User
	public function registeredUser($limit=null)

	{		 

		$db = $this->getDbo();

		$query = $db->getQuery(true);
		

		if(!$limit == null){

			$dblimit = "WHERE event_id = $limit";

		}else{ $dblimit = "" ; }
		
		$query = "SELECT * From `Registration` ".$dblimit ;

		$db->setQuery($query);

		$result = $db->loadAssocList();//loadRowList(); //loadRow();

		//$result; //$result[2];

		return $result;

	}


}

