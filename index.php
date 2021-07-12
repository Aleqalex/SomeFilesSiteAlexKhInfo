<?php 
        require_once("config.php");
?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="/highslide/highslide.js" type="text/javascript"></script>
<link href="/highslide/highslide.css" rel="stylesheet" property="stylesheet" />
<script type="text/javascript">
hs.graphicsDir = '/highslide/graphics/';
hs.wrapperClassName = 'your-own-style';
</script>
<style>
	.tb_about_main
	{
		margin: auto;
		width: 1200;
		height: 600;
		padding: 1;
	}
	.td_header
	{
		vertical-align: top;	
		height: 20;
	}
	.tb_me
	{
		margin: left;		
		width: 100%;
	}
	.tb_me td
	{	
		padding: 3;
	}
	.ava
	{
		width: 145;
		height: 130;
	}
	.td_info
	{
		vertical-align: top;
                height: 10;
                border: 1px solid black;
	}
	.td_greetings, .td_images, .td_urls, .td_directions, .td_urls_skills, .td_urls_knowledge
	{
		vertical-align: top;
		height: 10;
		border: 1px solid black;
		padding: 0 6;
	}
	.project_img, .skills_img, .knowledge_img
	{
		height: 80;
		width: 80;
	}	
	.tb_images
	{
		margin: auto;
		border-spacing: 2;
	}
	.pre_tb_images
	{
		width: 100%;
	}
	.tb_images td
        {
		background-color:  #b69fc8;
        }
        .tb_urls, .tb_directions, .tb_urls_skills, .tb_urls_knowledge
	{
		margin: 0 auto;	
		font: 12pt serif;
		border-spacing: 2;
	}
	.docs_imgs
	{
		height: 80;
		width: 80;
	}
	.tb_directions td
	{
		background-color:  #b69fc8;
	}
	.pre_tb_directions, .pre_tb_urls, .pre_tb_urls_skills, .pre_tb_urls_knowledge
	{
		width: 100%;
	}
	.tb_urls td
        {
                background-color:  #b69fc8;
	}
	.td_info td
        {
                font: 11pt sans-serif; 
        }
	.tb_info
	{
		margin: 0 auto; 	
	}
	.td_ava
	{
		width: 90;
	}
	.tb_me td
	{
		 background: #bfcec5; //#c5c1c8;
	}
	.tb_greetings
        {
		margin: 0 2;
        }
	.APName, .APKnowledge
	{
		font: 9pt serif;	
	}
	.tb_urls_skills td
	{
 		 background-color:  #b69fc8;
	}
	.tb_urls_knowledge td
        {
                 background-color:  #b69fc8;
        }
	.ADirName
	{
		font: 11pt serif;
	}
</style>
<?php

if($_SESSION['lang'] == 0)
{
	echo "<title>Портфолио</title>"; $work="Работы:";
	$directions="Направления: "; $all="Все "; $skills="Навыки: "; $knowledge="Знания: ";
}
if($_SESSION['lang'] == 1)
{
	echo "<title>Portfolio</title>";$work="Work:"; 
	$directions="Directions: "; $all="View all ";
	$skills="Skills: "; $knowledge="Knowledge: ";
}

mysqli_query($mysqli, "SET NAMES utf8");
if($_SESSION['lang'] == 0) $sql="select distinct id_project, url, name from Images join Projects using(id_project)
				 where id_project != 0 and project_category=false group by id_project order by rand() limit 10;";
if($_SESSION['lang'] == 1) $sql="select distinct id_project, url, name_eng from Images join Projects using(id_project)
                                 where id_project != 0 and project_category=false group by id_project order by rand() limit 10;";
$tb_images="";
$tb_imgages_buff="";
$WorkNames="";
if($result = mysqli_query($mysqli, $sql))
{
       if(mysqli_num_rows($result) > 0)
       {
		$i=0;
                while(list($_id_project, $_url, $_name) = mysqli_fetch_row($result))
                {	
			$i++;
			$name= urlencode($_name);
			$tb_images_buff.="<td><a href=$_url class=highslide onclick='return hs.expand(this)'><img class=project_img src=$_url></a></td>";
			$WorkNames.="<td><a class=APName href=projects.php?project=$name>$_name</a></td>";
                }
		$tb_images_buff.="</tr>"."<tr>".$WorkNames."</tr>";
        }
        else  echo "No records matching your query were found.";
}
else
{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
$tb_images_buff.="</table>";
$tb_images="<table class=tb_images><tr><td colspan=$i>$work</td></tr>".$tb_images_buff;

mysqli_query($mysqli, "SET NAMES utf8");

if($_SESSION['lang'] == 0) $sql="select distinct name from Projects where project_category=false group by id_project order by rand();";
if($_SESSION['lang'] == 1) $sql="select distinct name_eng from Projects where project_category=false group by id_project order by rand();"; 
$tb_urls="<table class=tb_urls><tr><td>$work</td>";
$i=0;
if($result = mysqli_query($mysqli, $sql))
{
       if(mysqli_num_rows($result) > 0)
       {
                while(list($_name) = mysqli_fetch_row($result))
                {
			$name= urlencode($_name);
                        $tb_urls.="<td><a href=projects.php?project=$name>$_name</a></td>";
			if($i == 6)
			{
				$tb_urls.="</tr><tr>";
				$i= -1;
			}
			$i++;
                }
                $tb_urls.="</tr>";
        }
        else  echo "No records matching your query were found.";
}
else
{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
$tb_urls.="</table>";
///45
mysqli_query($mysqli, "SET NAMES utf8");
if($_SESSION['lang'] == 0) $sql="select distinct name, url from Projects join Images using (id_project)
					 where project_category & 2 group by id_project order by rand();";
if($_SESSION['lang'] == 1) $sql="select distinct name_eng, url from Projects join Images using (id_project)
					 where project_category & 2 group by id_project order by rand();"; 
$tb_urls_knowledge="<tr>";
$tb_url_kn_head="";
$tb_kn_images="<tr>";
$i=0; $l=1;
if($result = mysqli_query($mysqli, $sql))
{
       if(mysqli_num_rows($result) > 0)
       {
                while(list($_name, $_url) = mysqli_fetch_row($result))
                {
                        $name= urlencode($_name);
                        $tb_urls_knowledge.="<td><a class=APKnowledge href=projects.php?project=$name>$_name</a></td>"; 
			$tb_kn_images.="<td><img class=knowledge_img src=$_url></td>";
			if($l <=6) $l++;
			if($i == 6)
                        {
				
                                $tb_urls_knowledge.="</tr>";
				$tb_kn_images.="</tr>";
				$tb_kn_images.=$tb_urls_knowledge;
				$tb_kn_images.="<tr>";
				$tb_urls_knowledge="<tr>";
                                $i= -1;
                        }
                        $i++;
                }
		$tb_kn_images.="</tr>";
                $tb_urls_knowledge.="</tr>";
		$tb_kn_images.=$tb_urls_knowledge;
        }
        else  echo "No records matching your query were found.";
}
else
{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
$tb_kn_images.="</table>";
$tb_urls_kn_head.="<table class=tb_urls_knowledge><tr><td colspan=$l>$knowledge</td></tr>";
$tb_urls_kn_head.=$tb_kn_images;
$tb_urls_knowledge=$tb_urls_kn_head;

//123
mysqli_query($mysqli, "SET NAMES utf8");
if($_SESSION['lang'] == 0) $sql="select distinct name, url from Projects join Images using (id_project) where project_category & 1 group by id_project order by rand();";
if($_SESSION['lang'] == 1) $sql="select distinct name_eng, url from Projects join Images using (id_project) where project_category & 1 group by id_project order by rand();"; 
$tb_urls_skills_buff="<tr>";
$tb_images_skills_buff="<tr>";
$i=0; $l=1;
if($result = mysqli_query($mysqli, $sql))
{
       if(mysqli_num_rows($result) > 0)
       {
                while(list($_name, $_url) = mysqli_fetch_row($result))
                {
                        $name= urlencode($_name);
			$tb_images_skills_buff.="<td><a href=$_url class=highslide onclick='return hs.expand(this)'>
							<img class=skills_img src=$_url></td>";
                        $tb_urls_skills_buff.="<td><a class=APName href=projects.php?project=$name>$_name</a></td>";
			if($i <=9) $l++;
                        if($i == 9)
                        {
				$tb_images_skills_buff.="</tr>";
                                $tb_urls_skills_buff.="</tr>";
				$tb_images_skills_buff.=$tb_urls_skills_buff;
				$tb_images_skills_buff.="<tr>";
				$tb_urls_skills_buff="<tr>";
                                $i= -1;
                        }
                        $i++;
                }
		$tb_images_skills_buff.="</tr>";
                $tb_urls_skills_buff.="</tr>";
		$tb_images_skills_buff.=$tb_urls_skills_buff;
        }
        else  echo "No records matching your query were found.";
}
else
{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

$tb_urls_skills.="<table class=tb_urls_skills><tr><td colspan=$l>$skills</td></tr>".$tb_images_skills_buff."</table>";


mysqli_query($mysqli, "SET NAMES utf8");
if($_SESSION['lang'] == 0) {$sql="select distinct type from Projects order by rand();";}
if($_SESSION['lang'] == 1) {$sql="select distinct type_eng from Projects group by id_project order by rand();";};
$tb_directions="<table class=tb_directions><tr><td>$directions</td><td><a class=ADirName href=projects.php>$all</a></td>";
$i=0;
if($result = mysqli_query($mysqli, $sql))
{
       if(mysqli_num_rows($result) > 0)
       {
                while(list($_type) = mysqli_fetch_row($result))
                {
			$type= urlencode($_type);
                        $tb_directions.="<td><a class=ADirName href=projects.php?types_projects=$type> $_type</a></td>";
			if($i== 6)
			{
				$tb_directions.="</tr><tr>";
				$i= -1;
			}
			$i++;
                }
                $tb_directions.="</tr>";
        }
        else  echo "No records matching your query were found.";
}
else
{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
$tb_directions.="</table>";


mysqli_query($mysqli, "SET NAMES utf8");
$sql="select url from Images where id_project =0;";
$tb_docs_imgs="<table class=tb_docs_imgs><tr>";
if($result = mysqli_query($mysqli, $sql))
{
       if(mysqli_num_rows($result) > 0)
       {
                while(list($_url) = mysqli_fetch_row($result))
                {
                        $tb_docs_imgs.="<td><a href=$_url class=highslide onclick='return hs.expand(this)'><img class=docs_imgs src=$_url></a></td>";
                }               
        }
        else  echo "No records matching your query were found.";
}
else
{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
$tb_docs_imgs.="</tr></table>";

?>
</head>
<body>
<table class=tb_about_main>
<tr>
<td class=td_info>
	<?php echo $_SESSION['header']; ?>
	
	<table class=tb_me>
	<tr>
		<td rowspan=2 class=td_ava>
		<?php echo "<a href=$url_ava class=highslide onclick='return hs.expand(this)'><img class=ava src=$url_ava></a>"; ?>
		</td>
	
     		<td class=td_education>
                <?php echo $education; ?>
                </td>
	</tr>
	<tr>	<td class=td_docs>
		<?php echo $tb_docs_imgs; ?>
		</td>
	</tr>		
	</table>
</td>
</tr>
<tr>
<td class=td_greetings>
<table class=tb_greetings>
<tr>
<td>
<?php echo $greetings; ?>
</td>
</tr>
</table>
</td>
<tr>
<td class=td_directions>
<table class=pre_tb_directions><tr><td>
<?php echo $tb_directions; ?>
</td></tr></table>
</td>
</tr>
<tr>
<td class=td_images>
<table class=pre_tb_images>
<tr><td>
<?php echo $tb_images;?>
</td></tr></table>
</td>
</tr>
<!-- <tr> -->
<!-- <td class=td_urls> -->
<!-- <table class=pre_tb_urls><tr><td> -->
<?php /*echo $tb_urls; */?>
<!-- </td></tr></table> -->
<!-- </td> -->
<!-- </tr> -->
<tr>
<td class=td_urls_skills>
<table class=pre_tb_urls_skills><tr><td>
<?php echo $tb_urls_skills; ?>
</td></tr></table>
</td>
</tr>
<tr>
<td class=td_urls_knowledge>
<table class=pre_tb_urls_knowledge><tr><td>
<?php echo $tb_urls_knowledge; ?>
</td></tr></table>
</tr>
</table>
</body>
</html>


