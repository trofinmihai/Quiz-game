<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller {

	public function __construct() {
		parent::__construct();

	if(!$this->session->userdata('user'))//in cazul in care nu suntem logati, vom fi trimisi automat catre pagina de logare
	    redirect('/login_controller');
		
	//Extract user data by id
	$this->load->model('get_by_id');
	$this->data['user'] = $this->get_by_id->id_user($this->session->userdata('user'));//info id_user (numa, email, parola)

	$this->load->model('export_csv');
	$this->data['users'] = $this->export_csv->get_users();
	$this->data['tests'] = $this->export_csv->get_tests();

	}

	function index()
	{
		$this->ranking();
	}

	function ranking()
	{
		$this->load->model('admin_model');
		$this->data['ranking'] = $this->admin_model->average_per_id_user();
		$this->load->view('admin/statistics', $this->data);
	}

	function top_tests()
	{
		$this->load->model('admin_model');
		$this->data['passed'] = $this->admin_model->top_passed_tests();
		$this->data['failed'] = $this->admin_model->top_failed_tests();
		//echo "<pre>";var_dump($this->data['passed']);exit;
		$this->load->view('admin/top_tests', $this->data);
	}
	
	function export_csv($type=NULL, $id=NULL)
	{	
		$this->load->model('export_csv');	
		$this->load->view('admin/export_csv', $this->data);
		$this->load->helper('export');
		switch($type)
		{
			case "all_users": 
				
				$array = $this->export_csv->get_users();
				$header = array('id_user', 'email', 'password', 'name', 'type');
				$name_file = 'export_users.csv';	
				exportcsv($array, $header, $name_file);
   				break;

   			case "all_tests": 
				
				$array = $this->export_csv->get_tests();
				$header = array('id_test', 'name','description', 'date_time', 'limit_test');
				$name_file = 'export_tests.csv';	
				exportcsv($array, $header, $name_file);
   				break;

   			case "all_classes": 
				
				$array = $this->export_csv->get_classes();
				$header = array('id_class', 'name');
				$name_file = 'export_classes.csv';	
				exportcsv($array, $header, $name_file);
   				break;
				
   			case "all_results": 
				
				$array = $this->export_csv->get_results();
				$header = array('id_result', 'id_user', 'id_test', 'final_grade', 'lim');
				$name_file = 'export_results.csv';	
				exportcsv($array, $header, $name_file);

   				break;

   			case "all_questions": 
				
				$array = $this->export_csv->get_questions();
				$header = array('id_question', 'txt', 'grade');
				$name_file = 'export_questions.csv';	
				exportcsv($array, $header, $name_file);
   				break;

   			case "all_answers": 
				
				$array = $this->export_csv->get_answers();
				$header = array('id_answer', 'id_question', 'txt', 'is_correct');
				$name_file = 'export_answers.csv';	
				exportcsv($array, $header, $name_file);
   				break;

   			case "results_per_user":
   				
				$array = $this->export_csv->get_results_per_user($id);
				$header = array('id_result', 'id_user','id_test','final_grade','lim');	
				$name_file = 'export_results_per_user.csv';	
				exportcsv($array, $header, $name_file);
   				break;

   			case "results_per_test":
   				
				$array = $this->export_csv->get_results_per_test($id);
				$header = array('id_result', 'id_user','id_test','final_grade','lim');
				$name_file = 'export_results_per_test.csv';	
				exportcsv($array, $header, $name_file);
   				break;


		}

	}
}

