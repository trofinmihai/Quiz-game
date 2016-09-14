<html>
<head>
<title>Homepage</title>




<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<h3>You are logged in as <?php echo $user->name.", ".$user->email ?></h3>
<h4>Id user <?php echo $user->id_user ?></h4>


<a href="<?php echo site_url('account/logout') ?>">Logout</a>
<a href="<?php echo site_url('account/edit') ?>">Edit profile</a>
<a href="<?php echo site_url('account/results') ?>">Results</a>
<a href="<?php echo site_url('tests/') ?>">Tests</a>



<table>
  <tr>
    <th>#</th>
    <th>Nume test</th>
    <th>Data</th>
    <th>Aplica</th>
  </tr>
  
  <?php 
  	if($test!=false)
    {     $number = 1;
        	foreach($test as $key)
          {         $ok=0;
                    if($result!=false)
                    {           foreach($result as $key1)
                               {     
                                     if($key->id_test == $key1->id_test)
                                     {  $ok=1;
                                        $limit1=$key->limit_test;
                                        $limit2=$key1->lim;
                                      }

                               }
                                      if($ok==1)
                                      {            
                                          if(date("Y-m-d")<=$key->date_time)
                                          {        ?> <!-- daca ziua testului este anterioara zilei actuale (in timp real)-->
                                                <tr>
                                                	   
                                              		    <td> <?php echo $number ?> </td>
                                              		    <td> <?php echo $key->name ?> </td>
                                              		    <td> <?php echo date("l", strtotime($key->date_time)).", ".date("F", strtotime($key->date_time))." ".date("d", strtotime($key->date_time)).", ".date("Y", strtotime($key->date_time)) ?> </td>
                                              		    <td> <?php if(date("Y-m-d")==$key->date_time && $limit1 > $limit2) { echo "<a href='".site_url('tests/take_test/'.$key->id_test)."'>Aplica</a>";} ?> 
                                                </td>
                                              		
                                                  
                                                </tr>
     <?php                                }$number = $number +1;
                                      }
                                          if($ok==0)
                                          {       
                                          if(date("Y-m-d")<=$key->date_time)
                                          {   ?>
                                                      <tr>
                                                     
                                                      <td> <?php echo $number ?> </td>
                                                      <td> <?php echo $key->name ?> </td>
                                                      <td> <?php echo date("l", strtotime($key->date_time)).", ".date("F", strtotime($key->date_time))." ".date("d", strtotime($key->date_time)).", ".date("Y", strtotime($key->date_time)) ?> </td>
                                                      <td> <?php if(date("Y-m-d")==$key->date_time) { echo "<a href='".site_url('tests/take_test/'.$key->id_test)."'>Aplica</a>";} ?> </td>
                                                  
                                                  
                                                </tr>
     <?php                                 } $number = $number +1;
                          }

                               
                    }
                    if($result==false)
                    {
                      if(date("Y-m-d")<=$key->date_time)
                      {   ?>
                                                        <tr>
                                                       
                                                        <td> <?php echo $key->id_test ?> </td>
                                                        <td> <?php echo $key->name ?> </td>
                                                        <td> <?php echo $key->date_time ?> </td>
                                                        <td> <?php if(date("Y-m-d")==$key->date_time) { echo "<a href='".site_url('tests/take_test/'.$key->id_test)."'>Aplica</a>";} ?> </td>
                                                    
                                                    
                                                  </tr>
  <?php             }}

          }
    }

    ?>
  
</table>


</body>
</html>