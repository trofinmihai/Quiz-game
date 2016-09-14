<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {


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
		//$this->load->view('/admin/test', $this->data);
		$this->tests();
	}

	function tests()
	{
		$this->load->model('admin_model');
		$this->data['tests'] = $this->admin_model->get_tests();//info despre tests
		
		//$this->data['tests'][0]['questions'] = 5;
		//echo $this->data['tests'][0]['questions'];
		//echo "<pre>";var_dump($this->data['tests']);
		$this->load->view('/admin/test', $this->data);
	}

	function delete($id)
	{
		$this->load->model('admin_model');
		$this->admin_model->delete_test($id);
		redirect('/admin/test/tests');
	}

	function sort()
	{	
		
		$this->load->model("admin_model");
		$this->data['tests'] = $this->admin_model->sort_tests($_GET['sorting_by'], $_GET['type']);

		//echo "<pre>";var_dump($this->data['tests']);exit;
		$this->load->view('/admin/test', $this->data);
	}

	public function edit($id=NULL) 
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('admin_model');

		if($id!=NULL)
		{
			$this->data['test'] = $this->admin_model->id_test($id);//info despre test-ul cu $id ca parametru
		//echo "<pre>";var_dump($this->data['tests']);exit;
			$this->data['q_per_test'] = $this->admin_model->get_info_questions_per_test($id);
		}
		$this->data['questions'] = $this->admin_model->get_questions();//toate informatiile despre questions


	    if($id!=NULL)
	    {
			
			$this->form_validation->set_rules('name', 'Name', 'required'); 
			$this->form_validation->set_rules('description', 'Description', 'required'); 
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('limit_test', 'Limit', 'required');

					
			
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->view('admin/edit_test', $this->data);//trimite catre view
			}
			else
	   		{	
	   			if($this->input->post('submit'))//daca este apelat submit din view('edit_test')
				{	

					$tests['name']=$this->input->post('name');
					$tests['description']=$this->input->post('description');
					$tests['date_time']=$this->input->post('date');
					$tests['limit_test']=$this->input->post('limit_test');

					$this->admin_model->edit_test($id, $tests);
					
					$result = $this->input->post('q_per_test');//checkbox-uri bifate pentru delete (din view)

					if($result!=false)
					{
						$this->admin_model->delete_question_from_test($result);
					}

					$que = $this->input->post('question');//checkboc-uri bifate pentru add(din view)
					//echo "<pre>";var_dump($que);
					//echo "<pre>";var_dump($this->data['q_per_test']);exit;

					//Verfica daca intrebarile selectate la add se regasesc deja in intrebarile testului
					foreach($this->data['q_per_test'] as $key)
					{
						for($i=0; $i<count($que); $i=$i+1)
						{
							if( $key['id_question'] == $que[$i])
							{
								array_splice($que, $i, 1);//sterge un element dintr-un array
							}
						}
					}
					//echo "<pre>";var_dump($que);exit;
					if($que!=false)
					{
						$this->admin_model->match_test_question($que, $id);
					}			
				}
				redirect('/admin/test/tests');
				
			}
		}
		elseif($id==NULL)
		{
			
			//echo "<pre>";var_dump($this->data['questions']);exit;

			$this->form_validation->set_rules('name', 'Name', 'required'); 
			$this->form_validation->set_rules('description', 'Description', 'required'); 
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('limit_test', 'Limit', 'required');  
			

			if ($this->form_validation->run() == FALSE)
			{	
				
				$this->load->view('admin/create_test', $this->data);
			}
			else
			{	

				if($this->input->post('submit'))//daca este apelat submit din view
				{	

					$this->load->model('admin_model');	
					$id_test = $this->admin_model->new_test();	
					//echo "<pre>";var_dump($id_test);exit;
					//echo $id_test[0]['id_test'];exit;
					$que = $this->input->post('question');

					//echo "<pre>";var_dump($que);exit;
					$this->admin_model->match_test_question($que, $id_test[0]['id_test']);
				}
				redirect('/admin/test');
			}
		}
	}

}