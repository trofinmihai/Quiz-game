<?php

class Questions extends CI_Model {

   
    function __construct()
    {
        parent::__construct();
        
    }
    
    function get_id_questions($id_test)
    {   
    	$this->db->select('id_questions');
    	$this->db->where('id_test', $id_test);
		$query = $this->db->get('questions_to_tests'); 
		//echo "<pre>";var_dump($query->result());
		return $query->result();
    }

    function get_test_questions($id_test)
    {
        $query = $this->db->query("SELECT q.id_question, q.txt, q.grade  from questions q, tests t, questions_to_tests qt where t.id_test=$id_test and t.id_test=qt.id_test and qt.id_questions=q.id_question;");

        return $query->result();
    }

    function get_questions($id)
    {
    	$query = $this->db->query("SELECT txt from questions where id_question=$id;");//selectam intrebarea pt a fi afisata din DB dupa id_question
    	//echo "<pre>";var_dump($query->result());
    	return $query->result();
    }

    function get_test_name($id)
    {
    	$query = $this->db->query("SELECT name, description from tests where id_test=$id");
    	//echo "<pre>";var_dump($query->result());
    	return $query->result();
    }

    function get_answers($id)
    {
        $query = $this->db->query("SELECT id_answer, txt, is_correst from answers where id_question=$id");
        //echo "<pre>";var_dump($query->result());
        return $query->result();
    }

    function insert_grade($id_user, $id_test, $grade)
    {   $limit = $this->db->query ("SELECT lim, id_result from results WHERE ID_USER=$id_user and ID_TEST=$id_test order by id_result desc limit 1");
        $limit = $limit->result_array();
        $x = $limit[0]["lim"];
        //echo "<pre>";var_dump($limit);exit;
        if($x>0){
        $y= $limit[0]["id_result"];
        $this->db->query("DELETE FROM results WHERE id_result=$y");}
        $this->db->query("INSERT INTO results (id_user, id_test, final_grade, lim) VALUES ($id_user, $id_test, $grade, $x+1)"); //inseram o linie noua in results 
    }

     function get_limit($id_user, $id_test)
    {
         $limit = $this->db->query("SELECT lim from results where id_user=$id_user and id_test=$id_test"); 
         echo "<pre>";var_dump($limit->result());exit;
         return $query();
    }

}