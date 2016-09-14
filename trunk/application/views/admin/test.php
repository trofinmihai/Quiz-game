<html>
<head>
<title>Tests page</title>
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

<h2>Tests page</h2>


<h4>You are logged in as <?php echo $user->name.", ".$user->email ?></h4>
<h5>Id user <?php echo $user->id_user ?></h5>

<a href="<?php echo site_url('admin/user') ?>">Homepage</a>
<a href="<?php echo site_url('admin/test/edit') ?>">Create test</a>

<h4>Sort by</h4>

<form action="sort" method="get">
   <select name="sorting_by">
      <option value="id_test" <?php echo ($this->input->get('sorting_by') == 'id_test' ? 'SELECTED' : '');?>>ID Test</options>
      <option value="name" <?php echo ($this->input->get('sorting_by') == 'name' ? 'SELECTED' : '');?> >Name</option>
      <option value="total_q" <?php echo ($this->input->get('sorting_by') == 'total_q' ? 'SELECTED' : '');?>>Total questions</option>
  </select> 

   <select name="type">
      <option value="ascending" <?php echo ($this->input->get('type') == 'ascending' ? 'SELECTED' : '');?>>Ascending</options>
      <option value="descending" <?php echo ($this->input->get('type') == 'descending' ? 'SELECTED' : '');?>>Descending</option>
  </select> 
<input type="submit" name="Sort" value="Send"/>
</form>

<table>
  <tr>
    <th>ID Test</th>
    <th>Name</th>
    <th>Total questions</th>
    <th>Options</th>

  </tr>

  <?php  
        foreach($tests as $key){ ?>
      <tr>
            <td> <?php echo $key['id_test'] ?> </td>
            <td> <?php echo $key['name'] ?> </td>
            <td> <?php echo $key['count'] ?> </td>
            <td> <?php echo "<a href='".site_url('admin/test/edit/'.$key['id_test'])."'>Edit</a>"; 
                       echo " ";
                       echo "<a href='".site_url('admin/test/delete/'.$key['id_test'])."'>Delete</a>";?> </td>    
      </tr>
    <?php }?>

</table>





</body>
</html>