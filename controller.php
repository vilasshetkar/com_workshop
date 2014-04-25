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
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerlegacy');

class WorkShopController extends JControllerLegacy
{

	public function display($cachable = false, $urlparams = false)
	{
//		$view = $this->getView(JRequest::getVar('view'), 'html');
//		$view->setModel($this->getModel('default'), true); // Default model
		JRequest::setVar('view',JRequest::getVar('view')); // force it to be the search view		
		JRequest::setVar('layout',JRequest::getVar('layout')); // force it to be the search view		
//		return $view;
		return parent::display($cachable, $urlparams);
	}

}
