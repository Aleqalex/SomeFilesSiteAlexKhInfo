<?php
	$dblocation = "127.0.0.1"; 
	$dbname = "mydb"; 
	$dbuser = "****"; 
	$dbpasswd = "*****";

	session_start();

	$host= "localhost"; 
	$db_host= "localhost";

	$mysqli = new mysqli($dblocation, $dbuser, $dbpasswd, $dbname);
	if(mysqli_connect_errno()) exit("Connecting DB error");
	$mysqli->query("SET NAMES 'cp1251'");	
	$_SESSION['page_viewer']= $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

	if(!isset($_SESSION['viewer']))
        {
		$_SESSION['viewer'] = 1;
		$ip= $_SERVER['REMOTE_ADDR'];
		$sql="insert into Visiters (ip, date_in) values ('$ip', NOW())"; 
		if(!$mysqli->query($sql))
		{
			exit("Error inserting into table Visiters");
		}
	}

	function MakeHeader($lang, $_mysqli, &$url_ava, &$greetings, &$education)
	{
		mysqli_query($_mysqli, "SET NAMES utf8");
		if($lang == 0)
			$sql="select name, address, phone, email, telegram, viber, url_ava, greetings, education, skype from Privacy;";
		if($lang == 1)
			$sql="select name_eng, address_eng, phone, email, telegram, viber, url_ava, greetings_eng, education_eng, skype from Privacy;";

		if($result = mysqli_query($_mysqli, $sql))
		{
		        if(mysqli_num_rows($result) > 0)
	       		{
               			while(list($_name, $_address, $_phone, $_email, $_telegram, $_viber, $_url_ava, $_greetings,
                               		$_education, $_skype) = mysqli_fetch_row($result))
		                {
	                                $name= $_name;
	       	                        $address = $_address;
                	                $phone= $_phone;
               	        	        $email= $_email;
                       	        	$telegram= $_telegram;
	                               	$viber=$_viber;
	                                $url_ava= $_url_ava;
	       	                        $greetings= $_greetings;
                	                $education=$_education;
               	        	        $skype=$_skype;
	        	        }
		        }
		        else
			{
				 echo "No records matching your query were found.";
			}
		}
		else
		{
		         echo "ERROR: Could not able to execute $sql. " . mysqli_error($_mysqli);
		}
		$tb_header="
		  <table class=tb_header>
		  <th>
	          <a href=index.php>".$name."</a>
        	  </th>
	          <td>
        	  <img src=/images/home.png class=home_img>
	       	  ".$address."
	       	  </td>
	          <td>
        	  <img src=/images/phone.jpg class=phone_img>
	          ".$phone."
        	  </td>
	          <td>
        	  <img src=/images/mail.png class=mail_img>
	          ".$email."
        	  </td>
	       	  <td>
	       	  <img src=/images/tlg.png class=tlg_img>
	          ".$telegram."
        	  </td>
	          <td>
        	  <img src=/images/viber.png class=viber_img>
	       	  ".$viber."        
	       	  </td>
	          <td>
        	  <img src=/images/skype.png class=skype_img>
	          ".$skype."
        	  </td>
	          <td>
        	  <table class=tb_ru><tr><td><a href=ws_engine.php?lang=0>RUS</a></td></tr></table>
		  <table class=tb_eng><tr><td><a href=ws_engine.php?lang=1>ENG</a></td></tr></table>
	          </td>	
        	  </table>      
	       	  ";
		  return $tb_header;
        }

	if($_SESSION['lang'] == 0)
	{
		$_SESSION['header'] = MakeHeader(0, $mysqli, $url_ava, $greetings, $education);
		$lang_url_color=".tb_ru td {background:  #9b81b4;}";
	}
	if($_SESSION['lang'] == 1)
	{
		$_SESSION['header'] = MakeHeader(1, $mysqli, $url_ava, $greetings, $education);
		$lang_url_color=".tb_eng td {background:   #9b81b4;}";
	}

	echo "<style>
        .tb_header
        {
                border-spacing: 3 0;
                margin-left: auto;
                margin-right: auto;
        }
        .td_header
        {
                vertical-align: top;
                height: 30; 
        }
        .tb_header td
        {
                padding: 3;
                font: 11pt sans-serif; 
                text-align: center;
                background:   #c5c1c8;
        }
        .tb_header th
        {
                background:   #c5c1c8;
        }
	.tlg_img, .phone_img, .home_img, .mail_img, .viber_img, .skype_img
        {
                height: 21;
                width: 24;
		margin: 0 0 1 0;
        }

	$lang_url_color;
</style>";
$_SESSION['owner']= $name;
?>
