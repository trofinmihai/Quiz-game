<html>
<head>
<title>Tests page</title>

<link rel='stylesheet' href='http://localhost:81/internship/trunk/fullcalendar-2.9.1/fullcalendar.css' />

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
<a href="<?php echo site_url('account') ?>">Homepage</a>

<table>
  <tr>
    <th>Nume test</th>
    <th>Nota</th>
    <th>Status</th>
  </tr>
  
  <?php 
  	
    
  	if($test!=false){
  	foreach($test as $key){ ?> <!-- parcurge testele la care id_user are acces-->
  <tr>	   
		    <td> <?php echo $key->name ?> </td>
		    <td> <?php 
        $ok=0; 
      if($result!=false)
      { $limit=0;
  			foreach($this->data['result'] as $key1) //parcurge testele la care id_user are acces si care au rezultat (final_grade)
  			{		
  					if($key->id_test == $key1->id_test && $key1->final_grade>=0) //verifica daca id_test-ul actual se potriveste cu id_test-ul actual din foreach-ul cu $key1
  					{
  						//echo "<pre>";var_dump($key1->id_test);
  						echo $key1->final_grade; //afiseaza final_grade-ul in casuta
              $limit = $key1->lim;
              $ok=2;
  					}		
        }
      }
      else
      {
      echo "N/A";
      $limit=0;
      }

      ?>
      </td>
      <td>
      <?php  

         
            if(date("Y-m-d")==$key->date_time && $key->limit_test > $limit && $ok=2) //verifica daca data e cea de azi si daca nu a fost dat inca testul
          {   
              echo "<a href='".site_url('tests/take_test/'.$key->id_test)."'>Aplica</a>";
              $ok=1;
          } 

            if($ok!=1)
					  {  	echo date("l", strtotime($key->date_time)).", ".date("F", strtotime($key->date_time))." ".date("d", strtotime($key->date_time)).", ".date("Y", strtotime($key->date_time));
            }					
			?>
      </td>
	    
  </tr>
    <?php }} ?>
  
</table><br>

<div id='calendar'></div>

<script type="text/javascript" src='http://localhost:81/internship/trunk/fullcalendar-2.9.1/lib/moment.min.js'></script>
<script type="text/javascript" src='http://localhost:81/internship/trunk/fullcalendar-2.9.1/lib/jquery.min.js'></script>
<script type="text/javascript" src='http://localhost:81/internship/trunk/fullcalendar-2.9.1/fullcalendar.js'></script>

<script type="text/javascript"> 

var teste = JSON.parse('<?php echo json_encode($test);?>');
var teste_calendar=[];
var d = new Date();
var day = d.getDate();
var month =  d.getMonth()+1;
var year =  d.getFullYear();
for( var i=0; i<teste.length; i++)
{
      var t = teste[i].date_time.split("-");
      if(t[1]<10)
      {
        t[1] = t[1].substring(1, t[1].length);
      }

      if(t[2]<10)
      {
        t[2] = t[2].substring(2, t[2].length);
      }
      //document.write(day," ",month," ",year," ");
      //document.write(t[2]," ", t[1], " ", t[0]," ");

      if(day == t[2] && year==t[0] && month==t[1])
      { 
          teste_calendar.push({
          title: teste[i].name,
          start: teste[i].date_time,
          end:teste[i].date_time,
          color:'green',
          url: 'http://localhost:81/internship/trunk/index.php/tests/take_test/'+teste[i].id_test});
      }
      else if((t[0]>year)||(t[0]==year && t[1]>month)||(t[0]==year && t[1]==month && t[2]>day))
      {
          teste_calendar.push({
          title: teste[i].name,
          start: teste[i].date_time,
          end:teste[i].date_time,
          color:'blue',
         });
      }
      else
      {
        teste_calendar.push({
          title: teste[i].name,
          start: teste[i].date_time,
          end:teste[i].date_time,
          color:'red',
          });
      }

  
}
$(document).ready(function() {

    // page is now ready, initialize the calendar...
    
    $('#calendar').fullCalendar({
        events: teste_calendar,
        eventClick: function(event) {
        if (event.url) {
            window.location.assign(event.url);
            return false;
        }
    }

        
        

    
    })

});</script>



</body>
</html>