<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 12/18/13
 * Time: 2:10 PM
 */

class viewModel {
	function getView($file = "", $data = '') {
		include $file;
	}
}