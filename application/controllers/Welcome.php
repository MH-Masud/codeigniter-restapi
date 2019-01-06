<?php
// header('content-type: application/json');

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function all_user()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$key = $this->input->get('key');
			$this->db->select('*');
			$this->db->from('keys');
			$this->db->where('key',$key);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$this->db->select('*');
				$this->db->from('users');
				$query = $this->db->get();
				$user = $query->result();
				echo json_encode($user);
			}else{
				$message = array(
					'status' => 'false',
					'message' => 'Invalid key'
				);
				echo json_encode($message);
			}
		}
	}
	public function insert_user()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$key = $this->input->get('key');
			$this->db->select('*');
			$this->db->from('keys');
			$this->db->where('key',$key);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$this->load->view('insert');
			}else{
				$message = array(
					'status' => 'false',
					'message' => 'Invalid key'
				);
				echo json_encode($message);
			}
		}
	}
	public function insert_user_data()
	{
		$email = $this->input->post('email');
		$name = $this->input->post('name');

		$url = 'http://localhost/codeigniter/api/go';

		$data = json_encode(array(
			'name' => $name,
            'email' => $email
		));

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$execute = curl_exec($curl);
		echo $execute; exit();
		curl_close($curl);
	}
	public function find()
	{
       $data = json_decode(file_get_contents('php://input'),true);
       $email = $data['email'];
       $name = $data['name'];
       $data = array(
          'name' => $data['name'],
          'email' => $data['email']
       ); 
       $insert = $this->db->insert('users',$data);
       if ($insert) {
       	echo "Data insert successfull";
       }else{
       	echo "Error";
       }
	}
}
