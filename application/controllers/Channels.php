<?php

class Channels extends CI_Controller {

	public function get() {
		$categories = $this->db->query("SELECT * FROM `channels` GROUP BY `category`")->result_array();
		for ($i=0; $i<sizeof($categories); $i++) {
			$category = $categories[$i]['category'];
			$channels = $this->db->query("SELECT * FROM `channels` WHERE `category`='" . $category . "'")->result_array();
			$categories[$i]['channels'] = $channels;
		}
		echo json_encode($categories);
	}

	public function add() {
		$title = $this->input->post('title');
		$logo = $this->input->post('logo');
		$url = $this->input->post('url');
		$this->db->insert('channels', array(
			'title' => $title,
			'logo' => $logo,
			'url' => $url
		));
		echo intval($this->db->insert_id());
	}
}
