<?php 
session_start();

if($_GET['lang'] == 0 and $flg== 0)
{
        $_SESSION['lang']=0;
        header("Location: ".$_SESSION['page_viewer']);
}
if($_GET['lang'] == 1 and $flg == 0)
{
        $_SESSION['lang']=1;
        header("Location: ".$_SESSION['page_viewer']);
}
?>
