<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tests extends CI_Controller {


	public $data = array();

	public function __construct() 
	{
		parent::__construct();

		$this->load->library('form_validation');

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
		
		$this->load->view('tests',$this->data);
	}	

	public function take_test($id_test)
	{	//var_dump($id_test);
		$this->load->model('questions');
		$this->data['id_test'] = $id_test;
		$this->data['questions'] = $this->questions->get_test_questions($id_test);//toate informatiile despre questions
		//echo "<pre>";var_dump($this->data['questions']);
		//exit;
		
		foreach ($this->data['questions'] as $key)  
		{
			$this->data['answers'][$key->id_question] = $this->questions->get_answers($key->id_question);//cream array de array cu key-ul intrebare
			
		}
		//echo "<pre>";var_dump($this->input->post());exit;
		if($this->input->post('submit_form'))//daca este apelat submit_form din view
		{	//echo "<pre>";var_dump($this->input->get('submit_form'));exit;
			//$this->questions->update_limit();
			$this->test_validation($this->input->post('answer'), $id_test);//redirectionare catre functia test_validation
		}

		$this->load->view('take_test',$this->data);
	}

	public function test_validation($answers, $id_test)
	{	
		//echo "<pre>";var_dump($answers, $this->input->post());
		//exit;
		$questions = array();
		$final_grade = 0;
		
		if(!empty($this->data['questions']))
		{
				foreach ($this->data['questions'] as $key)
				{	$suma=0;
					$questions[$key->id_question] = array();
					foreach($this->data['answers'][$key->id_question] as $key1)
					{	if($key1->is_correst==1)
						{
							$suma = $suma+1;
						}
					}
					
					foreach($this->data['answers'][$key->id_question] as $key1)
					{	
						if($key1->is_correst==1 && (isset($answers[$key->id_question])) && in_array($key1->id_answer, $answers[$key->id_question]))
						{	
							$questions[$key->id_question][] = $key1->id_answer;
							$final_grade = $final_grade + $key->grade/$suma;
						}
						
					}
				}
				$this->questions->insert_grade($this->data['user']->id_user, $id_test, $final_grade);
		}
		redirect('account/results');
		
	}

	

}