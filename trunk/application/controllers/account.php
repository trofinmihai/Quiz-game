<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	 
	public $data = array();
	public $query = array();
	public function __construct() {
		parent::__construct();
		
		
		if(!$this->session->userdata('user'))//in cazul in care nu suntem logati, vom fi trimisi automat catre pagina de logare
	    	redirect('/login_controller');
		
		//Extract user data by id
		$this->load->model('get_by_id');
		$this->data['user'] = $this->get_by_id->id_user($this->session->userdata('user'));//info id_user (numa, email, parola)
		//echo "<pre>";var_dump($this->data['user']);
		$this->load->model('account_model');
		$this->data['test'] = $this->account_model->get_tests($this->data['user']->id_user);//id-ul testelor accesibile lui id_user actual
		//echo "<pre>";var_dump($this->data['test']);
		$this->data['result'] = $this->account_model->get_results($this->data['user']->id_user);//results
		//echo "<pre>";var_dump($this->data['result']);
	
		
		
		//sortare lista teste in ordine descrescatoare (selection algorithm)
		
		for( $i=0; $i<count($this->data['test'])-1; $i=$i+1)
				{
					for($j=$i+1; $j<count($this->data['test']); $j=$j+1)
					{
						if($this->data['test'][$i]->date_time > $this->data['test'][$j]->date_time)
						{
							$copy = $this->data['test'][$i];
							$this->data['test'][$i] = $this->data['test'][$j];
							$this->data['test'][$j] = $copy;

						}
					}
				}

		for( $i=0; $i<count($this->data['result'])-1; $i=$i+1)
		{
			for($j=$i+1; $j<count($this->data['result']); $j=$j+1)
			{
				if($this->data['result'][$i]->date_time < $this->data['result'][$j]->date_time)
				{
					$copy = $this->data['result'][$i];
					$this->data['result'][$i] = $this->data['result'][$j];
					$this->data['result'][$j] = $copy;

				}
			}
		}
		//echo "<pre>";var_dump($this->data['test']);

	}
	
	public function index()
	{
		$this->load->view('homepage', $this->data);
	}
		
	//Account page
	//===============================================================================================================================================
	//edit profile
	public function edit() 
	{
	    
		//$this->load->view('edit_profile');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback_email_check'); 
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim');
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[15]');


		$this->load->model('get_by_id');
		//echo "<pre>";var_dump($this->data);
		$this->data['user'] = $this->get_by_id->id_user($this->data['user']->id_user);
		
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('edit_profile', $this->data);
		}
		else
   		{	

   			//Verificam daca toate casutele din form au content			
			if(strlen($this->input->post('email'))>0 && $this->data['user']->email!=$this->input->post('email'))
			{	
				$users['email']=$this->input->post('email');
			}
			else
			{
				$users['email']=$this->data['user']->email;
			}
			

			if(strlen($this->input->post('password'))>0)
			{	
				$users['password']=md5($this->input->post('password'));
			}
			else
			{
				$users['password']=$this->data['user']->password;
			}

			if(strlen($this->input->post('name'))>0)
			{	
				$users['name']=$this->input->post('name');
			}
			else
			{
				$users['name']=$this->data['user']->name;
			}
			
			
			$this->load->model('edit_profile');
			$this->edit_profile->edit($this->data, $users);

			redirect('account');
		}
	}
	
	function email_check($key) //verifica daca email-ul primit din form se gaseste in baza de date
	{
		if($this->data['user']->email!=$this->input->post('email'))
		{
			$this->load->model('register');	 // incarca (face legatura) cu fisierul "register.php"
			$is_exist=$this->register->email_exist($key);	//punem in variabila $is_exist "true"/"false" care vine din metoda "email_exist($key)"

			if ($is_exist) //daca $is_exist este adevarat 
			{
	       		$this->form_validation->set_message( 'email_check', 'Email address is already exist.'); //rescriem eroare  
	       		return false;
	   		}
	   		else 
	   		{
	      		return true;
	   		}
   		}
   		return true;	
	}

	function results()
	{
		$this->load->view('results', $this->data);
	}

	//logout
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('/login_controller');
	}
	
	
	
}
