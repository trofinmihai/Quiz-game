<html>
<head>
<title>Classes page</title>
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

<h2>Classes page</h2>


<h4>You are logged in as <?php echo $user->name.", ".$user->email ?></h4>
<h5>Id user <?php echo $user->id_user ?></h5>

<a href="<?php echo site_url('admin/user') ?>">Homepage</a>
<a href="<?php echo site_url('admin/classs/edit') ?>">Create class</a>

<h4>Sort by</h4>

<form action="sort" method="get">
   <select name="sorting_by">
      <option value="id_class" <?php echo ($this->input->get('sorting_by') == 'id_class' ? 'SELECTED' : '');?>>ID Class</options>
      <option value="name" <?php echo ($this->input->get('sorting_by') == 'name' ? 'SELECTED' : '');?> >Name</option>
      <option value="total_students" <?php echo ($this->input->get('sorting_by') == 'total_students' ? 'SELECTED' : '');?>>Total students</option>
  </select> 

   <select name="type">
      <option value="ascending" <?php echo ($this->input->get('type') == 'ascending' ? 'SELECTED' : '');?>>Ascending</options>
      <option value="descending" <?php echo ($this->input->get('type') == 'descending' ? 'SELECTED' : '');?>>Descending</option>
  </select> 
<input type="submit" name="Sort" value="Send"/>
</form>

<table>
  <tr>
    <th>ID Class</th>
    <th>Name</th>
    <th>Total students</th>
    <th>Options</th>

  </tr>

  <?php  
        foreach($classes as $key){ ?>
      <tr>
            <td> <?php echo $key['id_class'] ?> </td>
            <td> <?php echo $key['name'] ?> </td>
            <td> <?php echo $key['count'] ?> </td>
            <td> <?php echo "<a href='".site_url('admin/classs/edit/'.$key['id_class'])."'>Edit</a>";?> </td>    
      </tr>
    <?php }?>

</table>





</body>
</html>