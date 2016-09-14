<?php

	class Register extends CI_Model
	{
		function insert_register_db()
		{
			$f1 = $_POST['email']; //pune in variabila #f1 "email" ca valoare de incarcat in DB
			$f2 = md5($_POST['password']);//parola criptata
			$f3 = $_POST['name'];

			$this->db->query("INSERT INTO users(email, password, name, type) VALUES('$f1','$f2','$f3', 'student')"); //incarca in DB query-ul
		}

		function email_exist($key)
		{
		    $this->db->where('email',$key); //where email=$key
		    $query = $this->db->get('users'); //select * from users (where email=$key) -- pentru a verifica daca mai exista emailuri in DB
		    if ($query->num_rows() > 0){ //daca exista...
		        return true;  //adevarat
		    }
		    else
		    {
		        return false;
		    }
		}
	}

?>