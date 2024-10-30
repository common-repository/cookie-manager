<?php

	function prepare_directory($fpath, $year) {
		if (!is_dir($fpath.$year))
		{
    		mkdir($fpath.$year, 0755, true);
		}
	};

	function prepare_file($fpath, $year, $fname, $fheader) {
		if(!file_exists($fpath.$year.$fname)){
			$file = fopen($fpath.$year.$fname, 'a');
			fwrite($file, $fheader);
			fclose($file);
		}
	}

	function get_email(){
		$current_user = wp_get_current_user();
		if($current_user->ID == 0){
			return "Not signed in";
		} else {
			return $current_user->user_email;
		}
	}

	function prepare_data($data) {
		return str_replace("[email]", get_email(), $data);
	}

	function update_file($fpath, $year, $fname, $data) {
		$file = fopen($fpath.$year.$fname, 'a');
		fwrite($file, $data);
		fclose($file);
	};

?>
	