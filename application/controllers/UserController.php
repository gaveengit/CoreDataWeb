<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Identification_model');
		$this->load->model('Screening_model');
		$this->load->model('User_model');
		$this->load->library("pagination");
	}

	public function index()
	{
		$result['data'] = $this->User_model->display_records();
		$this->load->view('users_list', $result);
	}

	public function addNewUser()
	{

		$this->load->view('add_new_user');
	}

	public function goLoginScreen()
	{

		$this->load->view('login_screen');
	}

	public function saveUser()
	{

		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['password'] = hash("sha256", $data['password']);
		$data['user_type'] = $this->input->post('user_type');
		$data['STATUS'] = "1";
		$data['added_date'] = date("Y-m-d");
		$data['added_time'] = date('h:i:s');

		$response_check['check_data_count'] = $this->User_model->checkUsername($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->User_model->saveRecords($data);
			if ($response > 0) {
				echo "<script type='text/javascript'>alert('New User has been added successfully');
			</script>";
				$result['data'] = $this->User_model->display_records();
				$this->load->view('users_list', $result);
			} else {
				echo "<script type='text/javascript'>alert('Error in adding new user. Please try again.');
			</script>";
				$this->load->view('add_new_user');
			}
		} else {
			echo "<script type='text/javascript'>alert('User is already existing');
			</script>";
			$this->load->view('add_new_user');
		}
	}

	public function updateUsers($User_id)
	{
		$result['data'] = $this->User_model->display_records_individual($User_id);
		$this->load->view('update_user', $result);
	}

	public function checkLogin()
	{
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['password'] = hash("sha256", $data['password']);
		$result['data'] = $this->User_model->checkLogin($data);
		if (count($result['data']) > 0) {
			$this->session->set_userdata("logged_user_id", $result['data'][0]->user_id);
			$this->session->set_userdata("logged_user_first_name", $result['data'][0]->first_name);
			$this->session->set_userdata("logged_user_last_name", $result['data'][0]->last_name);
			$this->session->set_userdata("logged_user_username", $result['data'][0]->username);
			$this->session->set_userdata("logged_user_usertype", $result['data'][0]->user_type);
			$this->load->view('main_menu');
		} else {
			echo "<script type='text/javascript'>alert('Invalid credentials. Please try again.');
			</script>";
			$this->load->view('login_screen');
		}
	}

	public function signOut()
	{
		unset($_SESSION["logged_user_id"]);
		unset($_SESSION["logged_user_first_name"]);
		unset($_SESSION["logged_user_last_name"]);
		unset($_SESSION["logged_user_username"]);
		unset($_SESSION["logged_user_usertype"]);
		//$this->load->view('login_screen');
		$this->goLoginScreen();
	}

	public function deleteUser($user_id)
	{
		$data['STATUS'] = "-2";
		$data['user_id'] = $user_id;
		$response = $this->User_model->deleteRecord($data);
		if ($response > 0) {
			echo "<script type='text/javascript'>alert('User has been deleted successfully');
			</script>";
			$result['data'] = $this->User_model->display_records();
			$this->load->view('users_list', $result);
		} else {
			echo "<script type='text/javascript'>alert('User has not been deleted successfully');
			</script>";
			$result['data'] = $this->User_model->display_records();
			$this->load->view('users_list', $result);

		}
	}

	public function saveUpdateUser()
	{
		/*load registration view form*/

		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['user_type'] = $this->input->post('user_type');
		$data['STATUS'] = $this->input->post('user_status');
		$data['user_id'] = $this->input->post('save-btn');

		$response = $this->User_model->updateRecords($data);
		if ($response > 0) {
			echo "<script type='text/javascript'>alert('User has been updated successfully');
			</script>";
			$result['data'] = $this->User_model->display_records();
			$this->load->view('users_list', $result);
		} else {
			echo "<script type='text/javascript'>alert('User has not been updated successfully');
			</script>";
			$result['data'] = $this->User_model->display_records_individual($data['user_id']);
			$this->load->view('update_user', $result);

		}

	}

	public function saveUpdatePassword()
	{
		/*load registration view form*/

		$data_old['password'] = $this->input->post('current_password');
		$data_old['password'] = hash("sha256", $data_old['password']);
		$data_old['user_id'] = $this->input->post('save-btn');
		$data['password'] = $this->input->post('password');
		$data['password'] = hash("sha256", $data['password']);
		$data['user_id'] = $this->input->post('save-btn');

		$response = $this->User_model->checkCurrentPassword($data_old);
		if ($response > 0) {
			$response_update = $this->User_model->updateRecords($data);
			if ($response_update > 0) {
				echo "<script type='text/javascript'>alert('Password has been updated successfully.');
			</script>";
				unset($_SESSION["logged_user_id"]);
				unset($_SESSION["logged_user_first_name"]);
				unset($_SESSION["logged_user_last_name"]);
				unset($_SESSION["logged_user_username"]);
				unset($_SESSION["logged_user_usertype"]);
				//$this->load->view('login_screen');
				$this->goLoginScreen();
			} else {
				echo "<script type='text/javascript'>alert('Error in updating password. Please try again.');
			</script>";
				$result['data'] = $this->User_model->display_records_individual($data['user_id']);
				$this->load->view('update_user', $result);
			}
		} else {
			echo "<script type='text/javascript'>alert('Current password is invalid. Please try again.');
			</script>";
			$result['data'] = $this->User_model->display_records_individual($data['user_id']);
			$this->load->view('update_user', $result);

		}

	}


}


