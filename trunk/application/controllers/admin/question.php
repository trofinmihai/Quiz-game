<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller {

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
		$this->questions();
	}

	function questions()
	{
		$this->load->model('admin_model');
		$this->data['questions'] = $this->admin_model->get_questions();//info despre questions
		//$this->data['tests'][0]['questions'] = 5;
		//echo $this->data['tests'][0]['questions'];
		//echo "<pre>";var_dump($this->data['questions']);exit;
		$this->load->view('/admin/question', $this->data);

	}

	function sort()
	{	
		
		$this->load->model("admin_model");
		$this->data['questions'] = $this->admin_model->sort_questions($_GET['sorting_by'], $_GET['type']);
		
		foreach($this->data['questions'] as $value=>$key)
		{	//echo $key['id_question']." ";
			$this->data['questions'][$value]['answers'] = $this->admin_model->get_number_of_answers_per_question($key['id_question']);
		}
		//echo "<pre>";var_dump($this->data['tests']);
		$this->load->view('/admin/question', $this->data);
	}

	function delete($id)
	{	$this->load->model('admin_model');
		$this->admin_model->delete_question($id);
		$this->questions();
	}

	public function edit($id=NULL) 
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('admin_model');

		if($id!=NULL)
		{
			$this->data['question'] = $this->admin_model->id_question($id);//info despre test-ul cu $id ca parametru
			//echo "<pre>";var_dump($this->data['question']);exit;
			$this->data['a_per_q'] = $this->admin_model->get_info_answers_per_question($id);
			//echo "<pre>";var_dump($this->data['a_per_q']);exit;
		}

		$this->data['answers'] = $this->admin_model->get_answers();//toate informatiile despre questions
		//echo "<pre>";var_dumo($this->data['answers']);exit;

	    if($id!=NULL)
	    {
			
			$this->form_validation->set_rules('txt', 'Text', 'required'); 
			$this->form_validation->set_rules('grade', 'Grade', 'required'); 	
			$this->form_validation->set_rules('answer1', 'Answer1', 'required'); 
			$this->form_validation->set_rules('answer2', 'Answer2', 'required'); 	
			$this->form_validation->set_rules('answer3', 'Answer3', 'required'); 
			$this->form_validation->set_rules('answer4', 'Answer4', 'required'); 	
			
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->view('admin/edit_question1', $this->data);//trimite catre view
			}
			else
	   		{	
	   			if($this->input->post('submit'))
				{	

					$questions['txt']=$this->input->post('txt');
					$questions['grade']=$this->input->post('grade');
					$questions['grade']=(int)$questions['grade'];
					//echo "<pre>";var_dump($questions);exit;
									
					$que[] = $this->input->post('answer11');//checkboc-uri bifate pentru raspunsuri corecte
					$que[] = $this->input->post('answer22');//checkboc-uri bifate pentru raspunsuri corecte
					$que[] = $this->input->post('answer33');//checkboc-uri bifate pentru raspunsuri corecte
					$que[] = $this->input->post('answer44');//checkboc-uri bifate pentru raspunsuri corecte

					$new_answers[]=$this->input->post('answer1');
					$new_answers[]=$this->input->post('answer2');
					$new_answers[]=$this->input->post('answer3');
					$new_answers[]=$this->input->post('answer4');

					$this->admin_model->delete_answers_from_question($id, $new_answers);//sterge raspunsurile pentru intrebarea cu id-ul $id
				
					$this->admin_model->add_answers($id, $new_answers, $questions, $que);
							
				}
				redirect('/admin/question/questions');
				
			}
		}
		elseif($id==NULL)
		{
					
			$this->form_validation->set_rules('txt', 'Text', 'required'); 
			$this->form_validation->set_rules('grade', 'Grade', 'required'); 	
			$this->form_validation->set_rules('answer1', 'Answer1', 'required'); 
			$this->form_validation->set_rules('answer2', 'Answer2', 'required'); 	
			$this->form_validation->set_rules('answer3', 'Answer3', 'required'); 
			$this->form_validation->set_rules('answer4', 'Answer4', 'required'); 	
			

			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->view('admin/create_question', $this->data);
			}
			else
			{	

				if($this->input->post('submit'))//daca este apelat submit din view
				{	

					$questions['txt']=$this->input->post('txt');
					$questions['grade']=$this->input->post('grade');
					$questions['grade']=(int)$questions['grade'];
					//echo "<pre>";var_dump($questions);exit;
									
					$que[] = $this->input->post('answer11');//checkboc-uri bifate pentru raspunsuri corecte
					$que[] = $this->input->post('answer22');//checkboc-uri bifate pentru raspunsuri corecte
					$que[] = $this->input->post('answer33');//checkboc-uri bifate pentru raspunsuri corecte
					$que[] = $this->input->post('answer44');//checkboc-uri bifate pentru raspunsuri corecte

					$new_answers[]=$this->input->post('answer1');
					$new_answers[]=$this->input->post('answer2');
					$new_answers[]=$this->input->post('answer3');
					$new_answers[]=$this->input->post('answer4');

					$this->admin_model->add_question($questions, $que, $new_answers);
				}
				redirect('/admin/question');
			}
		}
	}

}