<?php

	class Edit_profile extends CI_Model
	{

		function edit($data, $users)
		{	
			//echo "<pre>";var_dump($data,$users);
			//exit;

			$this->db->where('id_user', $data['user']->id_user);	
		    $this->db->update('users',$users); 
   			

		    
		    if(strlen($users['email'])>0 || strlen($users['password'])>0 || strlen($users['name'])>0)
		    {	
		    	return true;
		    }
		    else
		   	{
		   		return false;
		   	}
		}
	}
?>