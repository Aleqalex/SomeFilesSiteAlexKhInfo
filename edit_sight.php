<?php 
        require_once("config_manager.php");
?>
<html>
<head>
<?php echo "<title>Редактрование сайта - ".$_SESSION['project_name']." </title>"; ?>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="/highslide/highslide.js" type="text/javascript"></script>
<link href="/highslide/highslide.css" rel="stylesheet" property="stylesheet" />
<script type="text/javascript">
hs.graphicsDir = '/highslide/graphics/';
hs.wrapperClassName = 'your-own-style';
</script>
<style>
	.tb_edit_sight
	{
		width: 1200;
		height: 600;
		margin-left: auto;
		margin-right: auto;
	}
	.td_edit_sight
	{
		height: 550;
		vertical-align: top;
	}
	.tb_my_data td
	{
		border: 1px solid;
		border-collapse: collapse;
	}
	.tb_my_data
        {
                border-collapse: collapse;                
        }

	.tb_edit_sight_del
	{
		margin: auto;
	}
	.ava
	{
		height: 155;
		width: 170;
		margin: 2;
	}
	.td_greetings
	{
		padding: 4;
		text-align: justify;
	}
	td
	{
		text-align: center;
		padding: 4;
		font: 11pt serif;
	}
	.btn_ava
	{
		margin: 6 auto;
	}
	.docs_imgs
	{	
		height: 80;
		width: 100;
	}
	.tb_docs_imgs
	{
		margin-left: auto;
		margin-right: auto;
	}
	.tb_education
	{
		margin: 0 auto;
	}
	.tb_docs_imgs td
        {
                padding: 5;
		background: #c9c0d6;
        }
	.td_upload_ava
	{
		font: 11pt serif;
		width: 40;
	}
	#upload_file_ava
	{
		width: 220;
		margin: 3 0 0 0;
	}
	.pre_tb_education
	{
		border: 1px solid black;
		width: 100%;
	}
	.pre_tb_education td
        {
                text-align: center;
        }
	.pre_tb_docs
        {
                border: 1px solid black;
                width: 100%;
        }
        .pre_tb_docs td
        {
                text-align: center;
        }
	.pre_tb_greetings
        {
                border: 1px solid black;
                width: 100%;
        }
        .pre_tb_greetings td
        {
                text-align: center;
        }
</style>
<script type='text/javascript'>

function openwnd_edit_text(id,lang)
{
	//window.open('edit_text.php?id_project='+id, '', 'scrollbars=1 height='+screen.availHeight-100 +',width='+Math.min(800, screen.availWidith)); return false;
}


function Edit_Address()
{
	var Address = prompt('Введите новый адрес', '');
	if(Address !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
		Address=encodeURI(Address);
                form.innerHTML = "<input type=hidden name=SightEditAddress value="+Address+">";
                document.body.append(form);
                form.submit();
        }
}
function Edit_Name()
{
        var Name = prompt('Введите новое ФИО:', '');
	if(Name !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
		Name= encodeURI(Name);
                form.innerHTML = "<input type=hidden name=SightEditName value="+Name+">";
                document.body.append(form);
                form.submit();
        }
}

function Edit_Phone()
{
	var Phone = prompt('Введите новый номер:', '');
        if(Phone !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
                Phone= encodeURI(Phone);
                form.innerHTML = "<input type=hidden name=SightEditPhone value="+Phone+">";
                document.body.append(form);
                form.submit();
        }        
}
function Edit_Email()
{
        var Email = prompt('Введите новый e-mail:', '');
        if(Email !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
                Email= encodeURI(Email);
                form.innerHTML = "<input type=hidden name=SightEditEmail value="+Email+">";
                document.body.append(form);
                form.submit();
        }        
}
function Edit_Telegram()
{
        var Telegram = prompt('Введите новый telegram:', '');
        if(Telegram !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
                Telegram= encodeURI(Telegram);
                form.innerHTML = "<input type=hidden name=SightEditTelegram value="+Telegram+">";
                document.body.append(form);
                form.submit();
        }        
}
function Edit_Viber()
{
        var Viber = prompt('Введите новый viber:', '');
        if(Viber !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
                Viber= encodeURI(Viber);
                form.innerHTML = "<input type=hidden name=SightEditViber value="+Viber+">";
                document.body.append(form);
                form.submit();
        }        
}
function Edit_Skype()
{
        var Skype = prompt('Введите новый skype:', '');
        if(Skype !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
                Skype= encodeURI(Skype);
                form.innerHTML = "<input type=hidden name=SightEditSkype value="+Skype+">";
                document.body.append(form);
                form.submit();
        }        
}
function Edit_Name_eng()
{
        var NameEng = prompt('Enter new name:', '');
        if(NameEng !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
		NameEng = encodeURI(NameEng);
                form.innerHTML = "<input type=hidden name=SightEditNameEng value="+NameEng+">";
                document.body.append(form);
                form.submit();
        }        
}
function Edit_Address_eng()
{
        var AddressEng = prompt('Enter new address:', '');
        if(AddressEng !== null)
        {
                let form = document.createElement('form');
                form.action = 'engine.php';
                form.method = 'POST';
                AddressEng = encodeURI(AddressEng);
                form.innerHTML = "<input type=hidden name=SightEditAddressEng value="+AddressEng+">";
                document.body.append(form);
                form.submit();
        }        
}
function EditText()
{
       window.open('edit_text.php?id_project=0&language=0', '', 'scrollbars=1 height='+screen.availHeight-100 +',width='+Math.min(800,screen.availWidith)); return false;
}
function EditEducation()
{
       window.open('edit_text.php?id_project=-1&language=0', '', 'scrollbars=1 height='+screen.availHeight-100 +',width='+Math.min(800,screen.availWidith)); return false;
}
function EditDocImgs()
{
       window.open('edit_doc_imgs.php', '', 'scrollbars=1 height='+screen.availHeight-100 +',width='+Math.min(800,screen.availWidith)); return false;
}
</script>

<?php
	mysqli_query($mysqli, "SET NAMES utf8");
	$sql="select name, address, phone, email, telegram, viber, url_ava, greetings, education, skype,
			name_eng, address_eng, education_eng, greetings_eng from Privacy;";

	if($result = mysqli_query($mysqli, $sql))
	{
	       if(mysqli_num_rows($result) > 0)
	       {
	                while(list($_name, $_address, $_phone, $_email, $_telegram, $_viber, $_url_ava,
				 $_greetings, $_education, $_skype, $_name_eng, $_address_eng, $_education_eng,
					$_greetings_eng) = mysqli_fetch_row($result))
	                {
                                if($_name != null and $_name != ' ') $name= $_name;
				else $name="Добавить";
                                if($_address != null  and $_address != ' ') $address = $_address;
				else $address="Добавить";
                                if($_phone != null and $_phone != ' ')  $phone= $_phone;
                                else $phone="Добавить";
                                if($_email != null  and $_email != ' ') $email = $_email;
                                else $email="Добавить";
                                if($_telegram != null and $_telegram != ' ') $telegram = $_telegram;
                                else $telegram="Добавить";
                                if($_viber != null and $_viber != ' ') $viber = $_viber;
                                else $viber="Добавить";
				if($_skype != null and $_skype != ' ') $skype = $_skype;
                                else $skype="Добавить";
                                $url_ava = $_url_ava;
                                if($_greetings != null and $_greetings != ' ') $greetings = $_greetings;
                                else $greetings="Добавить";
				if($_education != null and $_education != ' ') $education = $_education;
                                else $education="<a href=# onclick=EditEducation()>Добавить</a>";
				if($_name_eng != null and $_name_eng != ' ') $name_eng = $_name_eng;
                                else $name_eng="Добавить";
				if($_address_eng != null and $_address_eng != ' ') $address_eng = $_address_eng;
                                else $address_eng="Добавить";
				$education_eng= $_education_eng;
				$greetings_eng= $_greetings_eng;

        	        }
	        }
	        else  echo "No records matching your query were found.";
	}
	else
	{
	         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	}

	mysqli_query($mysqli, "SET NAMES utf8");
	$sql="select url, id_img from Images where id_project =0;";
	$tb_docs_imgs="<table class=tb_docs_imgs><tr>";
	$i=0;
	if($result = mysqli_query($mysqli, $sql))
	{
	       if(mysqli_num_rows($result) > 0)
	       {
        	        while(list($_url, $id_image) = mysqli_fetch_row($result))
                	{
                        	$tb_docs_imgs.="<td>
					<a href=$_url class=highslide onclick='return hs.expand(this)'>
					<img class=docs_imgs src=$_url>
				</a></td>";
				$i++;
	                }
	    	}
	        else  echo "No records matching your query were found.";
	}
	else
	{
        	 echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	}
	$tb_docs_imgs.="</tr>
			<tr>
			<td colspan=$i><a href=# onclick='EditDocImgs()'>Удаление изображений</a></td>
			</tr></table>";

	$tb_edit_sight_data="
	<form action =engine.php enctype=multipart/form-data method =POST>
	<table class=tb_edit_sight_data>
	<tr><td>
		<table class=tb_my_data>
                <tr>
                <td rowspan=2><img class=ava src=$url_ava></td>

                <td>ФИО:</td>
                <td>Адрес:</td>
                <td>Телефон:</td>
                <td>e-mail:</td>
                <td>Telegram:</td>
                <td>Viber:</td>
                <td>Skype:</td>
                </tr>
                <tr>
                <td> <a href=# onclick=Edit_Name()>$name</a> </td>
                <td><a href=# onclick=Edit_Address()>$address</a> </td>
                <td><a href=# onclick=Edit_Phone()>$phone</a> </td>
                <td><a href=# onclick=Edit_Email()>$email</a> </td>
                <td><a href=# onclick=Edit_Telegram()>$telegram</a> </td>
                <td> <a href=# onclick=Edit_Viber()>$viber</a></td>
                <td> <a href=# onclick=Edit_Skype()>$skype</a></td>
                </tr>
                <tr><td class=td_upload_ava>
                Загрузить аватару:<input id=upload_file_ava type=file name=ava[]><input class=btn_ava type=submit name=add_ava value=Применить></td>
                <td> <a href=# onclick=Edit_Name_eng()>$name_eng</a></td>
                <td><a href=# onclick=Edit_Address_eng()>$address_eng</a></td>
                <td></td><td></td><td></td><td></td><td></td></tr>
                </table>
	</td></tr>
	<tr><td>
		<table class=pre_tb_education>
		<tr><td>Образование:</td></tr>
		<tr><td class=td_education>
		$education	
		</tr></td>
		<tr><td class=td_education_eng>
		$education_eng
		</td></tr>
		<tr><td><a href=# onclick=EditEducation()>Править</a></td></tr>
		</table>
	</td></tr>
	<tr><td>
		<table class=pre_tb_docs>
		<tr><td>
		Документы:
		</td></tr>
		<tr><td class=td_docs_imgs_add>
		Добавить новое: <input type=file name=docs[]><input type=submit name=add_doc value=Применить>
		</td></tr>
		<tr><td class=td_docs_imgs>$tb_docs_imgs
		</td></tr>
		</table>
	</td></tr>
	<tr><td>
		<table class=pre_tb_greetings>
		<tr><td>
		Приветствие:
		</td></tr>
		<tr><td class=td_greetings>$greetings</td></tr>
		<tr><td class=td_greetings>$greetings_eng</td></tr>
		<tr><td align=center><a href=# onclick=EditText()>Править</a></td></tr>
		</table>
	</td></tr>
	</table></form>";
?>
</head>
<body>
<table class=tb_edit_sight>
<tr>
<td class=td_es_panal>
<?php echo $panel; ?>
</td>
</tr>
<tr>
<td class=td_colonticule>
<p>Редактирование сайта </p>
</td>
</tr>
<tr>
<td class=td_edit_sight>
	 <?php echo $tb_edit_sight_data; ?>
</td>
</tr>
</table>
</body>
</html>
