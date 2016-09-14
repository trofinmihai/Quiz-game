<html>
<head>
<title>Users</title>




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
<a href="<?php echo site_url('admin/user') ?>">Homepage</a>
<a href="<?php echo site_url('admin/user/edit') ?>">Create</a>

<h4>Sort by</h4>

<form action="sort" method="get">
   <select name="sorting_by">
      <option value="id_user" <?php echo ($this->input->get('sorting_by') == 'id_user' ? 'SELECTED' : '');?>>ID User</options>
      <option value="name" <?php echo ($this->input->get('sorting_by') == 'name' ? 'SELECTED' : '');?>>Name</option>
      <option value="email" <?php echo ($this->input->get('sorting_by') == 'email' ? 'SELECTED' : '');?> >Email</option>
  </select> 

   <select name="type">
      <option value="ascending" <?php echo ($this->input->get('type') == 'ascending' ? 'SELECTED' : '');?>>Ascending</options>
      <option value="descending" <?php echo ($this->input->get('type') == 'descending' ? 'SELECTED' : '');?>>Descending</option>
  </select> 
<input type="submit" name="Sort" value="Send"/>
</form>

  <table>
  <tr>
    <th>ID User</th>
    <th>Name</th>
    <th>Email</th>
    <th>Options</th>
  </tr>

  <?php  
        foreach($users_info as $key){ ?>
      <tr>
            <?php if($key['type']=='student'){ ?> 
            <td> <?php echo $key['id_user'] ?> </td>
            <td> <?php echo $key['name'] ?> </td>
            <td> <?php echo $key['email'] ?> </td>
            <td> <?php echo "<a href='".site_url('admin/user/edit/'.$key['id_user'])."'>Edit</a>"; 
                       echo " ";
                       echo "<a href='".site_url('admin/user/delete/'.$key['id_user'])."'>Delete</a>";?> </td>    
      </tr>
    <?php }}?>


  
</table>


  
</table>

</body>
</html>