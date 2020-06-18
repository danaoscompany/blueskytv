<?php

class Main extends CI_Controller {

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
