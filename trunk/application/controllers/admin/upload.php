<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
 {

	public function __construct() 
	{
		parent::__construct();

	if(!$this->session->userdata('user'))//in cazul in care nu suntem logati, vom fi trimisi automat catre pagina de logare
	    redirect('/login_controller');
		
	//Extract user data by id
	$this->load->model('get_by_id');
	$this->data['user'] = $this->get_by_id->id_user($this->session->userdata('user'));//info id_user (numa, email, parola)
	}

	function index()
	{
		$this->load->view('admin/upload', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';//stabilesc locul unde se salveaza fisierele uploadate in serverul meu local
		$config['allowed_types'] = 'csv';//specific tipul de fisiere pe care sa le acceept (aici se poate doar fisierele cu extensia .csv)
		$config['max_size']	= '100';//dimensiunea maxima in kilobytes
		

		$this->load->library('upload', $config);//apelez libraria 'upload' cu configuratiile mele de mai sus $config

		if ( ! $this->upload->do_upload())//verificam
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('admin/upload', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());//incarca info despre fisier in $data
			$file = fopen("uploads/".$data['upload_data']['file_name'], 'r');//creez $file ca fisier ce poate fi citit, primul parametru din fopen repr numele fisierului, pe care l-am luat din info din $data
			if(isset($file))//verifica daca exista acest $file
			{	$row=1;
				$this->load->model('upload_model');//incarcam modelul necesar pentru uoplod-uri
				while (($dat = fgetcsv($file, 1000, ",")) !== FALSE) //extrage fiecare linie; primul parametru repr fisierul, al doilea nr de caractere de pe fiecare linie, al treilea repr delimitatorul de cuvinte
				{
			        $this->data['upload'][] = $dat;//pun fiecare linie in acest vector, voi avea un array cu un nr de elemente egal cu liniile din csv
        			
        		}
        		if (strpos($data['upload_data']['file_name'], 'questions') !== false)
        		{
        			$this->upload_model->upload_questions($this->data['upload']);
        		}
        		else
        		{	//echo "<pre>";var_dump($this->data['upload']);exit;
        			$this->upload_model->upload_users($this->data['upload']);
        		}
        		

   			}
    		fclose($file);//inchid fisierul
			//echo "<pre>";var_dump($this->data['upload']);		
			$this->load->view('admin/upload_success', $data);
		}
	}
}