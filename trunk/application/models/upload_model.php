<?php

class Upload_model extends CI_Model {

	function upload_users($data)
	{
		
		

		for($i=1; $i<count($data); $i=$i+1)
		{	//echo $data[$i][1];
			$query = "INSERT INTO users VALUES";
			$query.="('NULL','".$data[$i][1]."','".md5($data[$i][2])."','".$data[$i][0]."','".$data[$i][3]."')";
			$this->db->query($query);
			if(strlen($data[$i][4])>0)
			{
				$query_class = "INSERT INTO classes VALUES ('NULL','".$data[$i][4]."') ON DUPLICATE KEY UPDATE id_class=id_class";
				$this->db->query($query_class);

				//echo "<pre>";var_dump($query_class);
				$id_class = $this->db->query("SELECT id_class from classes WHERE name='".$data[$i][4]."'")->result_array();
				$id_user = $this->db->query("SELECT max(id_user) as max FROM users")->result_array();
				//echo "<pre>";var_dump($id_class[0]['id_class'], $id_user[0]['max']);exit;

				$query_connected = "INSERT INTO users_to_classes VALUES ('".$id_class[0]['id_class']."','".$id_user[0]['max']."')";
				$this->db->query($query_connected);
			}
			//echo "<pre>";var_dump($query_connected);
		}
		
	}

	function upload_questions($data)
	{	
		
		for($i=1; $i<count($data); $i=$i+1)
		{	$query = "INSERT INTO questions VALUES";
			$query1 = "INSERT INTO answers VALUES";

			$query .="('NULL','".$data[$i][0]."','".$data[$i][1]."'),";
			$id_question = $this->db->query("SELECT max(id_question) as max from questions")->result_array();
			$id_question = $id_question[0]['max'];
			$answers = explode('|', $data[$i][2]);
			$is_correct = explode('|', $data[$i][3]);
			//echo "<pre>";var_dump(count($answers));exit;
			for($j=0; $j<count($answers); $j=$j+1)
			{
				$query1 .="('NULL','".$id_question."','".$answers[$j]."','".$is_correct[$j]."'),";
				//echo $id_question." ".$answers[$j]." ".$is_correct[$j]."<br>";
			}
			
			$query1 = rtrim($query1, ",");//taie ultima virgula din dreapta (Cea din coada)
			$this->db->query($query1);
			$query = rtrim($query, ",");
			$this->db->query($query);						
		}	

	}
}?>