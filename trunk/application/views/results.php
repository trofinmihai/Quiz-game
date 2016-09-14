<html>
<head>
<title>Results</title>

<style>
  table 
  {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
  }

  td, th 
  {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
  }

  tr:nth-child(even) 
  {
      background-color: #dddddd;
  }
</style>

</head>

<body>

<h2>Results page</h2>


<h4>You are logged in as <?php echo $user->name.", ".$user->email ?></h4>
<h5>Id user <?php echo $user->id_user ?></h5>
<a href="<?php echo site_url('account') ?>">Homepage</a>

<table>
  <tr>
    <th>#</th>
    <th>Nume test</th>
    <th>Data</th>
    <th>Nota</th>
  </tr>

  <?php  if($result!=false){
      $number = 1;
      //echo "<pre>";var_dump($result);
    	foreach($result as $key){ 
        if($key->final_grade>=0){?> 
      <tr>
    	     
  		    <td> <?php echo $number ?> </td>
  		    <td> <?php echo $key->name ?> </td>
  		    <td> <?php echo date("l", strtotime($key->date_time)).", ".date("F", strtotime($key->date_time))." ".date("d", strtotime($key->date_time)).", ".date("Y", strtotime($key->date_time)) ?> </td>
  		    <td> <?php echo $key->final_grade ?> </td>    
      </tr>
    <?php $number = $number +1;}}}?>


  
</table>



</body>
</html>