<?php

class Form extends CI_Controller {

	function index()
	{	
		//$this->session->set_userdata('email','mihai');
		//print_r($this->session->all_userdata());//--detalii sesiune(testare)

		//if($this->session->userdata('user'))
	    //	redirect('/account');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');


		//pentru fiecare camp din FORM se verifica dupa preferinta, find more!-https://codeigniter.com/userguide2/libraries/form_validation.html#callbacks
		//=================================================================================================================================
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check'); //trim=elimina spatii goale dreapta/stanga
		$this->form_validation->set_rules('password', 'Password', 'trim|mrequired|min_length[8]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[15]');

		
		//verifica daca exista validari, daca exista si sunt respectate atunci adevarat
		//=================================================================================================================================
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('register_form');
		}
		else
		{	
			$this->insert_to_db();	// face legatura cu metoda "insert_to_db()" de mai jos
			$this->load->view('login_form'); //afiseaza mesajul "formsuccess"
		}

	}

	//callback pentru validarea email-ului
	//======================================================================================================================================
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
	


	//metoda care face legatura cu modelul
	//=======================================================================================================================================
	function insert_to_db()
	{
		$this->load->model('register');	//incarca fisierul "register.php"
		$this->register->insert_register_db();	//ma trimite catre metoda "insert_registers_db()" din fisierul de mai sus
	
	}
	
		
}
?>