<?php

class Admin_model extends CI_Model {

   
    function __construct()
    {
        parent::__construct();
        
    }

    function get_users()
    {
    	$query = $this->db->query("SELECT * FROM users");
    	return $query->result_array();
    }

    function delete_user($id)
    {   
        $this->db->query("DELETE FROM users_to_classes WHERE id_user=$id");
        $this->db->query("DELETE FROM results WHERE id_user=$id");
    	$this->db->query("DELETE FROM users WHERE id_user=$id");
        
    }

    function id_user($id)
    {
        $this->db->where('id_user',$id);
        $query = $this->db->get('users');             
        if ($query->num_rows() == 1 )
        { 
            return $query->row();  
        }
        else
        {
            return 0;
        }

    }

    function edit($data, $users)
     {   
        $this->db->where('id_user', $data);    
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

     function edit_test($id, $tests)
    {
        $this->db->where('id_test', $id);    
        $this->db->update('tests', $tests); 

        if(strlen($tests['name'])>0 || strlen($users['description'])>0 || strlen($users['limit_test'])>0)
        {   
            return true;
        }
        else
        {
             return false;
        }
    }

     function sort($data, $type)
     {
         if($data == "id_user" && $type == "ascending")
         {
            $query = $this->db->query("SELECT * FROM users ORDER BY id_user ASC");
         }
         elseif($data == "id_user" && $type == "descending")
         {
            $query = $this->db->query("SELECT * FROM users ORDER BY id_user DESC");
         }
         elseif($data == "name" && $type == "ascending") 
         {
            $query = $this->db->query("SELECT * FROM users ORDER BY name ASC");
         } 
         elseif($data == "name" && $type == "descending")
         { 
            $query = $this->db->query("SELECT * FROM users ORDER BY name DESC");
         }
         elseif($data == "email" && $type == "ascending")
         { 
            $query = $this->db->query("SELECT * FROM users ORDER BY email ASC");
         }
         else
         {
            $query = $this->db->query("SELECT * FROM users ORDER BY email DESC");
         }
         return $query->result_array();

     }

     function sort_tests($data, $type)
     {
         if($data == "id_test" && $type == "ascending")
         {
            $query = $this->db->query("SELECT id_test, (select name from tests t where q.id_test=t.id_test) as name, COUNT(id_questions) as count FROM questions_to_tests q group by id_test ORDER BY id_test ASC");
         }
         elseif($data == "id_test" && $type == "descending")
         {
            $query = $this->db->query("SELECT id_test, (select name from tests t where q.id_test=t.id_test) as name, COUNT(id_questions) as count FROM questions_to_tests q group by id_test ORDER BY id_test DESC");
         }
         elseif($data == "name" && $type == "ascending") 
         {
            $query = $this->db->query("SELECT id_test, (select name from tests t where q.id_test=t.id_test) as name, COUNT(id_questions) as count FROM questions_to_tests q group by id_test ORDER BY name ASC");
         } 
         elseif($data == "name" && $type == "descending")
         { 
            $query = $this->db->query("SELECT id_test, (select name from tests t where q.id_test=t.id_test) as name, COUNT(id_questions) as count FROM questions_to_tests q group by id_test ORDER BY name DESC");
         }
         elseif($data == "total_q" && $type == "ascending")
         { 
            $query = $this->db->query("SELECT id_test, (select name from tests t where q.id_test=t.id_test) as name, COUNT(id_questions) as count FROM questions_to_tests q group by id_test ORDER BY count ASC");
         }
         else
         {
            $query = $this->db->query("SELECT id_test, (select name from tests t where q.id_test=t.id_test) as name, COUNT(id_questions) as count FROM questions_to_tests q group by id_test ORDER BY count DESC");
         }
         return $query->result_array();

     }

     function sort_questions($data, $type)
     {
         if($data == "id_question" && $type == "ascending")
         {
            $query = $this->db->query("SELECT id_question, (select txt from questions q where q.id_question=a.id_question) as txt, COUNT(id_answer) as count FROM answers a group by id_question ORDER BY id_question ASC");
         }
         elseif($data == "id_question" && $type == "descending")
         {
            $query = $this->db->query("SELECT id_question, (select txt from questions q where q.id_question=a.id_question) as txt, COUNT(id_answer) as count FROM answers a group by id_question ORDER BY id_question DESC");
         }
         elseif($data == "txt" && $type == "ascending") 
         {
            $query = $this->db->query("SELECT id_question, (select txt from questions q where q.id_question=a.id_question) as txt, COUNT(id_answer) as count FROM answers a group by id_question ORDER BY txt ASC");
         } 
         elseif($data == "txt" && $type == "descending")
         { 
            $query = $this->db->query("SELECT id_question, (select txt from questions q where q.id_question=a.id_question) as txt, COUNT(id_answer) as count FROM answers a group by id_question ORDER BY txt DESC");
         }
         elseif($data == "total_q" && $type == "ascending")
         { 
            $query = $this->db->query("SELECT id_question, (select txt from questions q where q.id_question=a.id_question) as txt, COUNT(id_answer) as count FROM answers a group by id_question ORDER BY count ASC");
         }
         else
         {
            $query = $this->db->query("SELECT id_question, (select txt from questions q where q.id_question=a.id_question) as txt, COUNT(id_answer) as count FROM answers a group by id_question ORDER BY count DESC");
         }
         return $query->result_array();

     }

     function sort_classes($data, $type)
     {
         if($data == "id_class" && $type == "ascending")
         {
            $query = $this->db->query("SELECT *, (select count(id_user) from users_to_classes u where u.id_class=c.id_class) as count from classes c order by id_class asc");
         }
         elseif($data == "id_class" && $type == "descending")
         {
            $query = $this->db->query("SELECT *, (select count(id_user) from users_to_classes u where u.id_class=c.id_class) as count from classes c order by id_class desc");
         }
         elseif($data == "name" && $type == "ascending") 
         {
            $query = $this->db->query("SELECT *, (select count(id_user) from users_to_classes u where u.id_class=c.id_class) as count from classes c order by name asc");
         } 
         elseif($data == "name" && $type == "descending")
         { 
            $query = $this->db->query("SELECT *, (select count(id_user) from users_to_classes u where u.id_class=c.id_class) as count from classes c order by name desc");
         }
         elseif($data == "total_students" && $type == "ascending")
         { 
            $query = $this->db->query("SELECT *, (select count(id_user) from users_to_classes u where u.id_class=c.id_class) as count from classes c order by count asc");
         }
         else
         {
            $query = $this->db->query("SELECT *, (select count(id_user) from users_to_classes u where u.id_class=c.id_class) as count from classes c order by count desc");
         }
         //echo "<pre>";var_dump($query);exit;
         return $query->result_array();


     }



     function get_tests()
     {
        $query = $this->db->query("SELECT id_test, (select name from tests t where q.id_test=t.id_test) as name, COUNT(id_questions) as count FROM questions_to_tests q group by id_test");
        return $query->result_array();

     }

     function get_questions()
     {
        $query = $this->db->query("SELECT id_question, (select txt from questions q where q.id_question=a.id_question) as txt,  COUNT(id_answer) as count FROM answers a group by id_question");
        return $query->result_array();

     }

     function get_answers()
     {
        $query = $this->db->query("SELECT * FROM answers");
        return $query->result_array();
     }

     
     function get_number_of_questions_per_test($id)
     {
        $query = $this->db->query("SELECT COUNT(id_questions) FROM questions_to_tests WHERE id_test=$id");
        //echo "<pre>";var_dump($query->result_array()[0]["COUNT(id_questions)"]);
        return $query->result_array()[0]["COUNT(id_questions)"];//trimit exact valoarea de care am nevoie
     }

     function get_number_of_answers_per_question($id)
     {
        $query = $this->db->query("SELECT COUNT(id_answer) FROM answers WHERE id_question=$id");
        //echo "<pre>";var_dump($query->result_array()[0]["COUNT(id_answer)"]);exit;
        return $query->result_array()[0]["COUNT(id_answer)"];//trimit exact valoarea de care am nevoie
     }



     function new_test()
     {
        $f1 = $_POST['name']; 
        $f2 = $_POST['description'];
        $f3 = $_POST['date'];
        $f4 = $_POST['limit_test'];

        $this->db->query("INSERT INTO tests(name, description, date_time, limit_test) VALUES('$f1','$f2','$f3', '$f4')"); 
        $query = $this->db->query("SELECT id_test FROM tests ORDER BY id_test DESC LIMIT 1");
        //echo "<pre>";var_dump($query);exit;
        return $query->result_array();
     }


     function match_test_question($que, $id_test)
     {
        //echo "<pre>";var_dump($que);exit;
        for($i=0; $i<count($que); $i=$i+1)
        {   
            $this->db->query("INSERT INTO questions_to_tests(id_test,id_questions) VALUES ($id_test, $que[$i])");
        }
        
     }

     function delete_test($id)
     {
        $this->db->query("DELETE FROM questions_to_tests WHERE id_test=$id");
        $this->db->query("DELETE FROM tests WHERE id_test=$id");
     }
    
    function get_info_questions_per_test($id_test)
    {
        $query = $this->db->query("SELECT * FROM questions WHERE id_question IN (SELECT id_questions FROM questions_to_tests WHERE id_test=$id_test)");//SELECT-ul din interior selecteaza id_question-urile, iar apoi celalalt SELECT afiseaza * pentru fiecare id_question identic
        return $query->result_array();     
    }

    function id_test($id)
    {
        $query = $this->db->query("SELECT * FROM tests WHERE id_test=$id");
        if ($query->num_rows() == 1 )
        { 
            return $query->row();  
        }
        else
        {
            return 0;
        }
    }

    function delete_question_from_test($result)
    {
        for($i=0; $i<count($result); $i=$i+1)
        {   
            //echo $result[$i];
            $this->db->query("DELETE FROM questions_to_tests WHERE id_questions=$result[$i]");
        }
    }

    function id_question($id)
    {
        $query = $this->db->query("SELECT * FROM questions WHERE id_question=$id");
        if ($query->num_rows() == 1 )
        { 
            return $query->row();  
        }
        else
        {
            return 0;
        }

    }

    function get_info_answers_per_question($id)
    {
        $query = $this->db->query("SELECT * FROM answers WHERE id_question=$id");
        return $query->result_array();
    }

    function delete_answers_from_question($id)
    {
            $query = $this->db->query("DELETE FROM answers WHERE id_question=$id");
    } 

    
    function add_answers($id, $array, $questions, $que)
    {  
        $x = $questions['txt'];
        $y = $questions['grade'];

        $this->db->query("UPDATE questions SET `txt`='$x', `grade`='$y' WHERE id_question=$id");
        for($i=0; $i<count($array); $i=$i+1)
        {
            $this->db->query("INSERT INTO answers (`id_question`, `txt`, `is_correst`) VALUES('$id', '$array[$i]', '$que[$i]')");
        }
    }

    function add_question($questions, $que, $new_answers)
    {
        $x = $questions['txt'];
        $y = $questions['grade'];

        $this->db->query("INSERT INTO questions (`txt`, `grade`) VALUES ('$x', '$y')");
        $id_question = $this->db->query("SELECT id_question FROM questions ORDER BY id_question DESC LIMIT 1");
        
        $id_question = (int)$id_question->row()->id_question;
        //echo "<pre>";var_dump($id_question);exit;
        for($i=0; $i<count($new_answers); $i=$i+1)
        {
            $this->db->query("INSERT INTO answers (`id_question`, `txt`, `is_correst`) VALUES('$id_question', '$new_answers[$i]', '$que[$i]')");
        }

    }

    function delete_question($id)
    {
        $this->db->query("DELETE FROM answers WHERE id_question=$id");
        $this->db->query("DELETE FROM questions_to_tests WHERE id_questions=$id");
        $this->db->query("DELETE FROM questions WHERE id_question=$id");
    }

    function average_per_id_user()
    {
        $query = $this->db->query("SELECT r.id_user, (select name from users u where u.id_user = r.id_user) as name, round(avg(final_grade),1) as avg FROM results r group by id_user order by avg desc LIMIT 15");
        //echo "<pre>";var_dump($query->result_array());exit;
        return $query->result_array();
    }

    function top_passed_tests()
    {
        $query = $this->db->query("SELECT r.id_test,(select name from tests t where t.id_test=r.id_test) as name, avg(final_grade)  from results r group by id_test order by avg(final_grade) desc limit 3");
        return $query->result_array();
    }

    function top_failed_tests()
    {
        $query = $this->db->query("SELECT r.id_test,(select name from tests t where t.id_test=r.id_test) as name, avg(final_grade)  from results r group by id_test order by avg(final_grade) asc limit 3");
        return $query->result_array();
    }

    function get_classes()
    {
        $query = $this->db->query("SELECT *, (select count(id_user) from users_to_classes u where u.id_class=c.id_class) as count from classes c");
        return $query->result_array();
    }

    function users_without_class()
    {
        $query = $this->db->query("SELECT id_user, name from users where type='student' and id_user not in (select id_user from users_to_classes)");
        return $query->result_array();
    }

    function users_per_class($id_class)
    {
        $query = $this->db->query("SELECT c.id_user, (select name from users u where u.id_user=c.id_user) as name from users_to_classes c where id_class=$id_class");
        return $query->result_array();
    }

    function delete_users_from_class($result)
    {
        for($i=0; $i<count($result); $i=$i+1)
        {   
            //echo $result[$i];
            $this->db->query("DELETE FROM users_to_classes WHERE id_user=$result[$i]");
        }

    }

    function add_users_to_class($result, $id)
    {
        for($i=0; $i<count($result); $i=$i+1)
        {   
            //echo $result[$i];
            $this->db->query("INSERT INTO users_to_classes VALUES ($id, $result[$i])");
        }

    }

    function get_class_with_id($id)
    {
        $query = $this->db->query("SELECT * from classes where id_class=$id");
        return $query->result_array();
    }

    function edit_class($id, $class_name)
    {
        $query = $this->db->query("UPDATE classes SET `name`='$class_name' where id_class=$id");
    }

    function create_class($name)
    {
        $query = $this->db->query("INSERT into classes values('NULL','".$name."')");
        return $this->db->query("SELECT max(id_class) as id from classes")->row();
    }

}