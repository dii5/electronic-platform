<?php
    $user='root';
    $pass="";
    $database=new PDO("mysql:host=localhost;dbname=school;charset=utf8;",$user,$pass);
 
  if($_COOKIE["myid"]==2){

if(!empty($_COOKIE["myid"])||!empty($_COOKIE["mypass"])){
$myid=$_COOKIE["myid"];
$mypass=$_COOKIE["mypass"];
$show=$database->prepare(" SELECT * FROM inf_class WHERE id=$myid");
$show->execute();
$show=$show->fetchObject();
 if(!empty($show->pass)){
if($show->pass==$mypass){

  echo '

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>degre</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<style>
table{
      margin: 10px;
      text-align: center;
      }
.head-t{
      border: 1px solid #51C4D3;
     
      background: #132C33!important;
      color: white;
}

td{
width: 100px;
border: 1px solid #51C4D3;
background:#D8E3E7;
}
</style>
</head>

<body dir="rtl" >
<nav class="navbar navbar-light bg-light" style="background: #132C33!important;">
  <div class="container-fluid">
    <form class="d-flex" form method="POST">
      <input class="form-control me-2" type="search" name="search" placeholder="ادخل اسم الطالب" aria-label="Search">
      <button style="margin-right:20px;background:#D8E3E7; "class="btn btn-outline-success" type="submit" name="submit" >  بحث  </button>
    </form>
  </div>
</nav>
<div style="font-family: cursive;">';
  
    $user='root';
    $pass="";
    $database=new PDO("mysql:host=localhost;dbname=school;charset=utf8;",$user,$pass);

    $showinf=$database->prepare("SELECT * FROM inf_stu");
    $showinf->execute();
    echo '<table>
    <tr>
    <td class="head-t">الايدي</td>
    <td class="head-t">الاسم</td>
    <td class="head-t">المرحلة</td>
    <td class="head-t">بايثون</td>
    <td class="head-t">دارت</td>
    <td class="head-t" >سي بلس بلس</td>';
    if(isset($_POST['submit'])) {
      $search='%'.$_POST['search'].'%';
      $showinf=$database->prepare("SELECT * FROM inf_stu WHERE name LIKE '$search';");
      $showinf->execute();

      foreach($showinf AS $item){
      echo '
          </tr>
           <tr>
            <td>'.$item['id'].  '</td>
            <td>'.$item['name'].'</td>
            <td>'.$item['stage'].'</td>
            <td>'.$item['deg_python'].'</td>
            <td>'.$item['deg_dart'].'</td>
            <td>'.$item['deg_c'].'</td>
            </tr>' ;
                                       }
      echo '</table> ';
   
   }
    foreach($showinf AS $item){
    echo '
        </tr>
         <tr>
          <td>'.$item['id'].  '</td>
          <td>'.$item['name'].'</td>
          <td>'.$item['stage'].'</td>
          <td>'.$item['deg_python'].'</td>
          <td>'.$item['deg_dart'].'</td>
          <td>'.$item['deg_c'].'</td>
          </tr>' ;
                                     }
    echo '</table> ';
 


    
   echo'
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
 
</body>
</html>';
}}}
else{
  echo"<script>location.replace('longint.php')</script>";
}
}
else {
  echo"<script>location.replace('longint.php')</script>";
}
?>