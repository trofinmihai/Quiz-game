<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user'))//in cazul in care nu suntem logati, vom fi trimisi automat catre pagina de logare
	    	redirect('/login_controller');
		
		//Extract user data by id
		$this->load->model('get_by_id');
		$this->data['user'] = $this->get_by_id->id_user($this->session->userdata('user'));//info id_user (numa, email, parola)

	}

	function index()
	{	/*if(isset($_GET['sorting_user']))
		{
 			 echo "selected size: ".htmlspecialchars($_GET['sorting_user']);
		}*/
		$this->load->view('/admin/homepage', $this->data);
	}

	function users()
	{	
		$this->load->model('admin_model');
		$this->data['users_info'] = $this->admin_model->get_users();//info despre useri
		//echo "<pre>";var_dump($this->data['users_info']);
		$this->load->view('/admin/user', $this->data);
	}

	public function edit($id=NULL) 
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	    if($id!=NULL)
	    {
			
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback_email_check'); 
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim');
			$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[15]');


			$this->load->model('admin_model');
			//echo "<pre>";var_dump($this->data);
			$this->data['user'] = $this->admin_model->id_user($id);
			
			
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->view('admin/edit', $this->data);
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
			
				$this->load->model('admin_model');
				$this->admin_model->edit($id, $users);
				redirect('/admin/user/users');
				
			}
		}
		elseif($id==NULL)
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check'); //trim=elimina spatii goale dreapta/stanga
			$this->form_validation->set_rules('password', 'Password', 'trim|mrequired|min_length[8]|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[15]');

		
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->view('admin/create');
			}
			else
			{	
				$this->load->model('register');	
				$this->register->insert_register_db();
				redirect('/admin/user/users');
			}
		}
	}

	function email_check($key) //verifica daca email-ul primit din form se gaseste in baza de date
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

	function delete($id)
	{
		$this->load->model('admin_model');
		$this->admin_model->delete_user($id);
		$this->users();
	}

	function sort()
	{	
		
		$this->load->model("admin_model");
		$this->data['users_info'] = $this->admin_model->sort($_GET['sorting_by'], $_GET['type']);
		//echo "<pre>";var_dump($this->data['users_info']);
		$this->load->view('/admin/user', $this->data);
	}

	
}