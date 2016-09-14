<html>
<head>
<title>Take test</title>
</head>
<body>

<?php echo validation_errors(); ?>



<h2>Tests page</h2>


<h4>You are logged in as <?php echo $user->name.", ".$user->email ?></h4>
<h5>Id user <?php echo $user->id_user ?></h5>
<h4>___________________________________________</h4>


<div id="clockdiv"></div>




<script>
var endtime = new Date(); 
//starttime.setHours(0, 0, 0, 0);
var n = endtime.getMinutes();
endtime.setMinutes(endtime.getMinutes()+1);


  function getTimeRemaining(endtime){
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor( (t/1000) % 60 );
  var minutes = Math.floor( (t/1000/60) % 60 );
  var hours = Math.floor( (t/(1000*60*60)) % 24 );
  var days = Math.floor( t/(1000*60*60*24) );
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}


function initializeClock(id, endtime){
  var clock = document.getElementById(id);
  var timeinterval = setInterval(function(){
    var t = getTimeRemaining(endtime);
    clock.innerHTML = t.minutes + ':' + t.seconds;
    if(t.total<=0)
    {
      clearInterval(timeinterval);
	  document.forms[0].submit();
      
    }
  },1000);
}

initializeClock('clockdiv', endtime);

</script>

<form name="form" method="post" action="">
<?php $i=0; $j=0;
foreach($questions as $key)
{
		
		$i=$i+1;?>
	<p><b><?php echo $i.")";?></b></p>
	<p><?php echo $key->txt; ?> </p>
 	
	<?php 	

			foreach($answers[$key->id_question] as $key1){
				echo form_checkbox('answer['.$key->id_question.'][]', $key1->id_answer).$key1->txt."<br>";//primul atribut reprezinta unde se duce elementul, al doilea atribut repr in ce variabila se salveaza (sub ce forma)
				
			}
	?>
	

<?php
} 
	?>
	<input type="submit" value="Finish" />
  <input name="submit_form" type="hidden" value="Finish" />
</form>
	
</body>
</html>