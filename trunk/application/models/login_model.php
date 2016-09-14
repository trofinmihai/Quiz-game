<?php

	class Login_model extends CI_Model
	{
		
		function email_exist($key)
		{
		    $this->db->where('email',$key); //where email=$key
		    $query = $this->db->get('users'); //select *users (where email=$key) -- pentru a verifica daca mai exista emailuri in DB
		    if ($query->num_rows() == 1){ //daca exista...
		        return true;  //adevarat
		    }
		    else
		    {
		        return false;
		    }
		}

		function password_exist($pswd, $email)
		{
			$this->db->where('email', $email);
			$this->db->where('password', md5($pswd)); 
			
		    $query = $this->db->get('users'); //select * from users (where password=md5($key)) -- pentru a verifica daca exista parola

		    if ($query->num_rows() == 1 ){ //daca exista...
		        return true;  //adevarat
		    }
		    else
		    {
		        return false;
		    }
		}
	}

?>