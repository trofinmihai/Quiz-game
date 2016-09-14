<?php

class Account_model extends CI_Model {

    public $data = array();
    function __construct()
    {
        parent::__construct();
        
    }
    
    function get_tests($id)
    {   

            $query = $this->db->query("SELECT id_test from users_to_classes join tests_to_classes on users_to_classes.id_class=tests_to_classes.id_class where id_user=$id;"); // $query primeste id-ul testelor disponibile pentru utilizatoru logat
            //echo $query->result->; // afiseaza numarul de linii din $query
            if($query->num_rows()==0)
                return false;
            $i=0; //pentru ca interogarea a afisat mai multe linii, vom face un array $res si vom pune acolo interogarile viitoare 
            $res=array();
            foreach ($query->result_array() as $key)
            {
                $id_test = $key['id_test'];
                $res[$i] = $this->db->query("SELECT t.*,(select count(id_result) from results where id_user=$id and id_test=t.id_test) as total_run FROM tests t WHERE id_test=$id_test");
                $res[$i] = $res[$i]->row();
                $i=$i+1;
                
            } 
        //echo "<pre>";var_dump($res);    
        return $res;
    }

    function get_results($id)
    {  
       $query = $this->db->query ("SELECT * from tests join results on tests.id_test=results.id_test WHERE ID_USER=$id");
       //echo "<pre>";var_dump($query->row());
       //return $query->row();
       
       if($query->num_rows()==0)
                return false;
            $i=0; //pentru ca interogarea a afisat mai multe linii, vom face un array $res si vom pune acolo interogarile viitoare
            foreach ($query->result() as $key)
            {   $res[$i] = $key;
                //$res[$i] = $res[$i]->row();
                $i=$i+1;
               //echo "<pre>";var_dump($key);
            } 
        //echo "<pre>";var_dump($res);    
        return $res;
    }

    function get_type($id)
    {
        $query = $this->db->query("SELECT type from users where id_user = $id");
        if ($query->num_rows() == 1 ){ 
                return $query->result_array();  
            }
            else
            {
                return 0;
            }
    }

}