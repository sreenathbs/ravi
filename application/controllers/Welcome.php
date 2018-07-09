<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();

		$this->load->helper('url');
		$this->load->model('user');
		// $this->load->model('jobs');
		// $this->load->model('history');
        // $this->load->library('session');
    }

	public function index()
	{
		echo "no content";
	}

	public function login()
	{	
		if (empty($_POST))
		{
			$this->load->view('login');
			return;
		}

		$data['email'] = $_POST['email'];
		$data['pass'] = $_POST['pass'];
		
		if ($this->user->login($data)) {
			echo "logged in";
		}
		else {
			echo "error";
		}
	}

	public function signup()
	{
		if (empty($_POST))
		{
			$this->load->view('signup');
			return;
		}
		
		$data['email'] = $_POST['email'];
		$data['pass'] = $_POST['pass'];
		$data['name'] = $_POST['name'];
		$data['mob'] = $_POST['mob'];
		$data['level'] = $_POST['level'];
		
		if ($this->user->signup($data)) {
			echo "signed up";
		}
		else {
			echo "error";
		}
	}

	public function data()
	{

		$qns = $this->user->questions();
		if (empty($qns)) {
        	echo "no available qns";
        	return;
    	}

		$data['qns'] = array();
    	$data['qnid'] = array();
    	for ($i=0; isset($qns[$i]); $i++) {
        	array_push($data['qns'], $qns[$i]['question']);
        	array_push($data['qnid'], $qns[$i]['id']);
    	}

		if (empty($_POST))
		{
			$this->load->view('data_entry', $data);
			return;
		}
        
        
        foreach ($data['qnid'] as $qn) {
        	$input['$qn'] = $_POST['$qn'];
        }
        	// echo $data['qnid'][$i];
            // $input['$data["qnid"][$i]'] = $_POST['$data["qnid"][$i]'];
        // }
        var_dump($input);
		// }
	}




}