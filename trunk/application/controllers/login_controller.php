<?php 
 
class Login_controller extends CI_Controller 
{
 	
	
	
	function index()
	{	
		if($this->session->userdata('user'))
	    	redirect('/account');

	   	$this->load->helper(array('form'));
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_db_check'); 
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|callback_password_db_check');

	    if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('login_form');
		}
		else
		{	
			$this->load->model('get_by_id');
			$query = $this->get_by_id->array_id($this->input->post('email'), $this->input->post('password'));
			foreach ($query as $id)
			{
  		
  				$this->session->set_userdata('user', $id->id_user);
  				$this->session->set_userdata('email', $id->email);
  				$this->session->set_userdata('password', $id->password);
  				$this->session->set_userdata('name', $id->name);
  				$this->session->set_userdata('type', $id->type);

  				$this->load->model('account_model');
				$type = $this->account_model->get_type($id->id_user);
				
				$type = $type[0]['type'];

			}
			//Verificare daca se initializeaza sesiunea sau nu
			//print_r($this->session->all_userdata());
			/*if(!$this->session->userdata('user'))
			{
				echo "no";
			}
			else
			{
				echo "yes";
			}
			*/
			if($type=='student')
			{
				redirect('/account');
			}
			elseif($type=='admin')
			{
				redirect('/admin/user');
			}
			
		}
	}


	//callback-uri pentru validare
	//==============================================================================================================================================
	function email_db_check($key) //verifica daca email-ul primit din form se gaseste in baza de date
	{
		$this->load->model('login_model');	 // incarca (face legatura) cu fisierul "register.php"
		$is_exist=$this->login_model->email_exist($key);	//punem in variabila $is_exist "true"/"false" care vine din metoda "email_exist($key)"

		if ($is_exist) //daca $is_exist este adevarat 
		{
       		return true;
   		}
   		else 
   		{
   			$this->form_validation->set_message( 'email_db_check', 'Invalid username or password');
      		return false;
   		}
	}

	function password_db_check($pswd)	
	{
		$email = $this->input->post('email');//iau din form valoarea campului email si o pun in variabila $email, 'email' se gaseste in login_form.php
		$this->load->model('login_model');	 // incarca (face legatura) cu fisierul "register.php"
		$is_exist=$this->login_model->password_exist($pswd, $email);	//punem in variabila $is_exist "true"/"false" care vine din metoda "password_exist($key)"

		if ($is_exist) //daca $is_exist este adevarat 
		{
	   		return true;
	  	}
	 	else 
		{	$this->form_validation->set_message( 'password_db_check', 'Invalid password');
      		return false;
   		}
	   	
	}

	
}
 

 
?>