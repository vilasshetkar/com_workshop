<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Build the route for the com_content component
 *
 * @param	array	An array of URL arguments
 * @return	array	The URL arguments to use to assemble the subsequent URL.
 * @since	1.5
 */
function WorkShopBuildRoute(&$query)
{
	$segments	= array();

	// get a menu item based on Itemid or currently active
	$app		= JFactory::getApplication();
	$menu		= $app->getMenu();
	$params		= JComponentHelper::getParams('com_workshop');
	$advanced	= $params->get('sef_advanced_link', 0);

	// we need a menu item.  Either the one specified in the query, or the current active one if none specified
	if (empty($query['Itemid'])) {
		$menuItem = $menu->getActive();
		$menuItemGiven = false;
	}
	else {
		$menuItem = $menu->getItem($query['Itemid']);
		$menuItemGiven = true;
	}

	if (isset($query['layout']) && isset($query['id'])) {
		$view = $query['layout'];
		$id = $query['id'];
	}
	else {
		// we need to have a view in the query or it is an invalid URL
		return $segments;
	}

	if (!$view == '')
	{
			$segments[] = 'RealEstateProperties';
			$segments[] = $view;
			$segments[] = $id;
			unset($query['layout']);
			unset($query['id']);
	}
	return $segments;
}



/**
 * Parse the segments of a URL.
 *
 * @param	array	The segments of the URL to parse.
 *
 * @return	array	The URL attributes to be used by the application.
 * @since	1.5
 */
function RealEstateParseRoute($segments)
{
	$vars = array();

	//Get the active menu item.
	$app	= JFactory::getApplication();
	$menu	= $app->getMenu();
	$item	= $menu->getActive();
	$params = JComponentHelper::getParams('com_content');
	$advanced = $params->get('sef_advanced_link', 0);
	$db = JFactory::getDBO();

	// Count route segments
	$count = count($segments);

	// Standard routing for articles.  If we don't pick up an Itemid then we get the view from the segments
	// the first segment is the view and the last segment is the id of the article or category.
	//if (!isset($item)) {
		$vars['view']	= $segments[0];
		$vars['layout']	= $segments[1];
		if($count==1){
			$vars['id'] = 1;
		}else{
		$vars['id']		= $segments[2];
		}

		return $vars;
	//}

	// if there is only one segment, then it points to either an article or a category
	// we test it first to see if it is a category.  If the id and alias match a category
	// then we assume it is a category.  If they don't we assume it is an article
	if ($count == 1) {
		// we check to see if an alias is given.  If not, we assume it is an article
		if (strpos($segments[0], ':') === false) {
			$vars['layout'] = 'prop';
			$vars['id'] = (int) $segments[0];
			return $vars;
		}

		//list($id, $alias) = explode(':', $segments[0], 2);

	}

	return $vars;
}
