<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classs extends CI_Controller {


	public function __construct() {
		parent::__construct();


	if(!$this->session->userdata('user'))//in cazul in care nu suntem logati, vom fi trimisi automat catre pagina de logare
	    redirect('/login_controller');
		
	//Extract user data by id
	$this->load->model('get_by_id');
	$this->data['user'] = $this->get_by_id->id_user($this->session->userdata('user'));//info id_user (numa, email, parola)

	}

	function index()

	{	
		$this->classes();
	}

	function classes()
	{
		$this->load->model('admin_model');
		$this->data['classes'] = $this->admin_model->get_classes();//info despre classes
		//echo "<pre>";var_dump($this->data['classes']);exit;
		$this->load->view('/admin/classs', $this->data);
	}

	function sort()
	{	
		
		$this->load->model("admin_model");
		$this->data['classes'] = $this->admin_model->sort_classes($_GET['sorting_by'], $_GET['type']);

		//echo "<pre>";var_dump($this->data['classes']);exit;
		$this->load->view('/admin/classs', $this->data);
	}

	function edit($id=NULL)
	{
		$this->load->model('admin_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->data['users_without_class'] = $this->admin_model->users_without_class();
		//echo "<pre>";var_dump($this->data['users_without_class']);exit;
		

	    if($id!=NULL)
	    {
			$this->load->model('admin_model');

			$this->form_validation->set_rules('name', 'Name', 'required'); 
			
			$this->data['classes'] = $this->admin_model->get_class_with_id($id);
			//echo "<pre>";var_dump($this->data['classes']);exit;
			$this->data['users_per_class'] = $this->admin_model->users_per_class($id);
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->view('admin/edit_class', $this->data);
			}
			else
	   		{	
				if($this->input->post('submit'))
				{	

					$class_name = $this->input->post('name');
					
					$this->admin_model->edit_class($id, $class_name);
				

				$delete_users = $this->input->post('delete_users');
				//echo "<pre>";var_dump($delete_users);exit;

					if($delete_users!=false)
					{
						$this->admin_model->delete_users_from_class($delete_users);
					}

				$add_users = $this->input->post('users_without_class');
				//echo "<pre>";var_dump($add_users);exit;
					if($add_users!=false)
					{
						$this->admin_model->add_users_to_class($add_users, $id);
					}
				}
				redirect('/admin/classs/classes');
				
			}
		}
		elseif($id==NULL)
		{
			$this->form_validation->set_rules('name', 'Name', 'required'); 

		
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->view('admin/create_class', $this->data);
			}
			else
			{	
				
				if($this->input->post('submit'))
				{
					$class_name = $this->input->post('name');
					
					$id_class = $this->admin_model->create_class($class_name);

					$add_users = $this->input->post('users_without_class');
					//echo "<pre>";var_dump($id_class);exit;
					if(count($add_users)<3)
					{	
						redirect('admin/classs/edit?error=1');//limita minima de elevi obligatorie
					}

					if($add_users!=false)
					{
						$this->admin_model->add_users_to_class($add_users, $id_class->id);
					}
				}
				redirect('/admin/classs/classes');
			}
		}

	}

}