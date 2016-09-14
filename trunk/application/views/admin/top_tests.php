<html>
<head>
<title>Top</title>
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

<h2>Top passed/failed tests</h2>


<h4>You are logged in as <?php echo $user->name.", ".$user->email ?></h4>
<h5>Id user <?php echo $user->id_user ?></h5>

<a href="<?php echo site_url('admin/statistics') ?>">Back to statistics</a>

<h5>Top passed</h5>
<table>
  <tr>
    <th>Name</th>
    <th>Average grade</th>

  </tr>

  <?php  
        foreach($passed as $key){ 
        if($key['avg(final_grade)']>=5){?>
      <tr>
            <td> <?php echo $key['name'] ?> </td>
            <td> <?php echo $key['avg(final_grade)'] ?> </td>
      </tr>
    <?php }}?>

</table>

<h5>Top failed</h5>
<table>
  <tr>
    <th>Name</th>
    <th>Average grade</th>

  </tr>

  <?php  
        foreach($failed as $key){ 
        if($key['avg(final_grade)']<=5){?>
      <tr>
            <td> <?php echo $key['name'] ?> </td>
            <td> <?php echo $key['avg(final_grade)'] ?> </td>
      </tr>
    <?php }}?>

</table>

</body>
</html>