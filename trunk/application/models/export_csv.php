<?php

class Export_csv extends CI_Model {

   
    function __construct()
    {
        parent::__construct();
        
    }

    function get_users()
    {
    	$query = $this->db->query("SELECT *FROM users");
    	return $query->result_array();
    }

    function get_tests()
    {
    	$query = $this->db->query("SELECT *FROM tests");
    	return $query->result_array();
    }

    function get_classes()
    {
    	$query = $this->db->query("SELECT *FROM classes");
    	return $query->result_array();
    }

    function get_results()
    {
    	$query = $this->db->query("SELECT *FROM results");
    	return $query->result_array();
    }

    function get_questions()
    {
    	$query = $this->db->query("SELECT *FROM questions");
    	return $query->result_array();
    }

    function get_answers()
    {
    	$query = $this->db->query("SELECT *FROM answers");
    	return $query->result_array();
    }

    function get_results_per_user($id)
    {
        $query = $this->db->query("SELECT * from results where id_user=$id");
        return $query->result_array();
    }

    function get_results_per_test($id)
    {
        $query = $this->db->query("SELECT * from results where id_test=$id");
        return $query->result_array();
    }

}