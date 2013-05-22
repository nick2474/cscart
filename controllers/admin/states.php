<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/


if ( !defined('AREA') )	{ die('Access denied');	}

/** Body **/

if (empty($_REQUEST['country_code'])) {
	$_REQUEST['country_code'] = Registry::get('settings.General.default_country');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	//
	// Create/update state
	//
	//
	if ($mode == 'update') {
		fn_update_state($_REQUEST['state_data'], $_REQUEST['state_id'], DESCR_SL);
	}


	// Updating existing states
	//
	if ($mode == 'm_update') {
		foreach ($_REQUEST['states'] as $key => $_data) {
			if (!empty($_data)) {
				fn_update_state($_data, $key, DESCR_SL);
			}
		}
	}

	//
	// Delete selected states
	//
	if ($mode == 'delete') {

		if (!empty($_REQUEST['state_ids'])) {
			foreach ($_REQUEST['state_ids'] as $v) {
				db_query("DELETE FROM ?:states WHERE state_id = ?i", $v);
				db_query("DELETE FROM ?:state_descriptions WHERE state_id = ?i", $v);
			}
		}
	}

	return array(CONTROLLER_STATUS_OK, "states.manage?country_code=$_REQUEST[country_code]");
}

if ($mode == 'manage') {

	$country_code = !empty($_REQUEST['country_code']) ? $_REQUEST['country_code'] : Registry::get('settings.General.default_country');

	$view->assign('states', fn_get_states($country_code, DESCR_SL, true));
	$view->assign('country_code', $country_code);
	$view->assign('countries', fn_get_countries());

} elseif ($mode == 'delete') {

	if (!empty($_REQUEST['state_id'])) {
		db_query("DELETE FROM ?:states WHERE state_id = ?i", $_REQUEST['state_id']);
		db_query("DELETE FROM ?:state_descriptions WHERE state_id = ?i", $_REQUEST['state_id']);
	}
	return array(CONTROLLER_STATUS_REDIRECT, "states.manage?country_code=$_REQUEST[country_code]");
}


function fn_update_state($state_data, $state_id = 0, $lang_code = DESCR_SL)
{
	if (empty($state_id)) {
		if (!empty($state_data['code']) && !empty($state_data['state'])) {
			$state_data['state_id'] = $state_id = db_query("REPLACE INTO ?:states ?e", $state_data);

			foreach ((array)Registry::get('languages') as $state_data['lang_code'] => $_v) {
				db_query('REPLACE INTO ?:state_descriptions ?e', $state_data);
			}
		}
	} else {
		db_query("UPDATE ?:state_descriptions SET ?u WHERE state_id = ?i AND lang_code = ?s", $state_data, $state_id, $lang_code);
	}

	return $state_id;

}

/** /Body **/

?>