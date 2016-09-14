<?php

	class Get_by_id extends CI_Model
	{

		function array_id($email, $password)
		{	
			$this->db->where('email', $email);
			$this->db->where('password', md5($password)); 
			
		    $query = $this->db->get('users'); 
		    
		    if ($query->num_rows() == 1 ){ 
		        return $query->result();  
		    }
		    else
		    {
		        return 0;
		    }
		}

		function id_user($id)
		{
			$this->db->where('id_user',$id);
			$query = $this->db->get('users'); 
		    
		    if ($query->num_rows() == 1 ){ 
		        return $query->row();  
		    }
		    else
		    {
		        return 0;
		    }

		}

	}

?>