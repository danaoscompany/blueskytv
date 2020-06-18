<?php

class Main extends CI_Controller {

	public function get_channels() {
		$categories = $this->db->query("SELECT * FROM `channels` GROUP BY `category`");
		for ($i=0; $i<sizeof($categories); $i++) {
			$category = $categories[$i]['category'];
			$channels = $this->db->query("SELECT * FROM `channels` WHERE `category`='" . $category . "'")->result_array();
			$category['channels'] = $channels;
		}
		echo json_encode($categories);
	}
}
