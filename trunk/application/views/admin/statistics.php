<html>
<head>
<title>Statistics</title>
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

<h2>Statistics</h2>


<h4>You are logged in as <?php echo $user->name.", ".$user->email ?></h4>
<h5>Id user <?php echo $user->id_user ?></h5>

<a href="<?php echo site_url('admin/user') ?>">Homepage</a>
<a href="<?php echo site_url('admin/Statistics/top_tests') ?>">Top</a>
<a href="<?php echo site_url('admin/Statistics/export_csv') ?>">Export CSV</a>

<table>
  <tr>
    <th>#</th>
    <th>ID User</th>
    <th>User name</th>
    <th>Average grade</th>

  </tr>

  <?php  $i=1;
        foreach($ranking as $key){ ?>
      <tr>
            <td> <?php echo $i ?> </td>
            <td> <?php echo $key['id_user'] ?> </td>
            <td> <?php echo $key['name'] ?> </td>
            <td> <?php echo $key['avg'] ?> </td> 
      </tr>
    <?php $i=$i+1;}?>

</table>

</body>
</html>