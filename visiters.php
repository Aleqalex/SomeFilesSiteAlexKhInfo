<?php
        require_once("config_manager.php");
	
	$flg=0; $all=0;
	
	if($_GET['records'] == '5')
        {
	       	$_SESSION['step']=5;
                $_SESSION['end'] = $_SESSION['begin']+ $_SESSION['step'];
        }
        if($_GET['records'] == '10')
        {
		$_SESSION['step']=10;
                $_SESSION['end'] = $_SESSION['begin']+ $_SESSION['step'];
        }
        if($_GET['records'] == '20')
        {
                $_SESSION['step']=20;
                $_SESSION['end'] = $_SESSION['begin']+ $_SESSION['step'];
        }
        if($_GET['records'] == '50')
        {
                $_SESSION['step']=50;
                $_SESSION['end'] = $_SESSION['begin']+ $_SESSION['step'];
        }
	if($_GET['records'] == 'next')
        {
		$_SESSION['begin'] += $_SESSION['step'];
                $_SESSION['end']= $_SESSION['begin']+ $_SESSION['step'];
        }
        if($_GET['records'] == 'perv')
        {
		$_SESSION['end'] -= $_SESSION['step'];
                $_SESSION['begin'] = ($_SESSION['end'] - $_SESSION['step']);
        }
	if($_SESSION['begin'] < 0)
        {
                $_SESSION['begin'] =0;
                $_SESSION['end'] = $_SESSION['begin']+ $_SESSION['step'];
        }
	if($_GET['records'] == 'all')
        {
		$sql="select id_visiter, ip, date_in from Visiters order by date_in desc;";
		$all =1; $flg=1;		
	}
	if(!$flg)
	{
		$sql="select id_visiter, ip, date_in from Visiters
                                        order by date_in desc limit $_SESSION[begin], $_SESSION[step];";
		$all=0;
	}	
	
        mysqli_query($mysqli, "SET NAMES utf8");        
        if($result = mysqli_query($mysqli,$sql))
	{
		$tb_visiters="<table class=tb_visiters><tr><td>id</td><td>ip</td><td>Дата</td></tr>";
		if(mysqli_num_rows($result) > 0)
                {
	                while(list($_id, $_ip, $_date_in) = mysqli_fetch_row($result))
			{
				$tb_visiters.="<tr><td>$_id</td><td>$_ip</td><td>$_date_in</td></tr>";
			}
		}
		else  echo "No records matching your query were found.";
		$tb_visiters.="</table>";
	}
	else
	{
        	 echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	}
?>
<html>
<head>
<?php echo "<title>Просмотры главной - ".$_SESSION['project_name']."</title>"; ?>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<style>
	.td_panel
	{
		height: 20;
		vertical-align: top;
		padding: 4;
	}
	.tb_visiters td
	{
		padding: 4 10;
		text-align: center;
		background-color: #bdb4cb;
	}
	.tb_visiters
        {
                margin: auto;
		padding: 15;
		//height: 300;
        }
	td
        {
                text-align: center;
                //padding: 4;
                font: 11pt serif;
        }
	.td_visiters
	{
		vertical-align: top;
		
	}
	input
	{
		width: 45;
		height: 24;
	}
	#del_visiters
	{
		height: 27;
	}
	#btn_del
	{
		height: 25;
	}
</style>
<script type=text/javascript>
function del_visiters()
{
	var start = document.getElementsByName('del_id_start');
	var end= document.getElementsByName('del_id_end');
	if((start[0].value !== null) && (end[0].value !== null))
	{
		let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
                form.innerHTML = "<input type=hidden name=DelVisiters value="+start[0].value+"><input type=hidden name=end value="+end[0].value+">";
                document.body.append(form);
                form.submit();
	}
}
</script>
</head>
<body>
<table class=tb_main>
<tr>
<td class=td_panel>
        <?php echo $panel; ?>
</td>
</tr>
<tr>
<td class=td_colonticule>
<p>Просмотры главной </p>
</td>
</tr>
<tr>
<td class=td_visiters>
	<?php echo $tb_visiters; ?>
</td>
</tr>
<tr>
	<?php
	if($all == 0) $str="".($_SESSION['begin']+1)." - ".$_SESSION['end']."";
        else	$str="Все";
	?>
        <td class=td_show_by>
	<p> Просмотр по:
                &nbsp&nbsp<a href=visiters.php?records=5>5</a>&nbsp&nbsp
                <a href=visiters.php?records=10>10</a>&nbsp&nbsp
                <a href=visiters.php?records=20>20</a>&nbsp&nbsp
                <a href=visiters.php?records=50>50</a>&nbsp&nbsp
                <a href=visiters.php?records=perv><--</a>&nbsp&nbsp
                <a href=visiters.php?records=next>--></a>&nbsp&nbsp
		<a href='visiters.php?records=all'> Все </a>&nbsp&nbsp
                <?php echo "(Записи: $str)&nbsp&nbsp" ?>
        </p>
	<p id=del_visiters>Удалить записи с id: <input type=text name=del_id_start> по id: <input type=text name=del_id_end>  <button id=btn_del onclick=del_visiters()>Удалить</button></p>
        </td>
        </tr>

</table>
</body>
</html>

