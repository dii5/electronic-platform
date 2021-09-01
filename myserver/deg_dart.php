<?php
    $user='root';
    $pass="";
    $database=new PDO("mysql:host=localhost;dbname=school;charset=utf8;",$user,$pass);
 
  if($_COOKIE["myid"]==4){

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
<div style="font-family: cursive;">';
  
    $user='root';
    $pass="";
    $database=new PDO("mysql:host=localhost;dbname=school;charset=utf8;",$user,$pass);

    $showinf=$database->prepare("SELECT * FROM inf_stu WHERE stage='الاولئ'");
    $showinf->execute();
    echo '<table>
    <tr>
    <td class="head-t">الايدي</td>
    <td class="head-t">الاسم</td>
    <td class="head-t">الدرجة</td>
    <td class="head-t">الحضور</td>

    <td class="head-t" >اضف & عدل الدرجة</td>';
     $i=0;
     $de=[];
    foreach($showinf AS $item){
      $de[$i]=$item['id'];
    echo '
        </tr><form method="POST">
         <tr>
          <td>'.$item['id'].  '</td>
          <td>'.$item['name'].'</td>
          <td>'.$item['deg_dart'].'</td>
          <td>';
      
      $show_day=$database->prepare("SELECT SUM(open_close)  FROM attend_dart WHERE id_stu=$de[$i]");
      $show_day->execute();
      // $ars=$show_day->fetch(PDO::FETCH_ASSOC);
      // echo $ars['summation'];
       $aa=$show_day->fetchColumn();
        echo $aa;
       
     echo' </td><td><input type="text" name="a'.$i.'"style="width:100px !important;"></input></td>';
             $i++;
       echo'</tr>';  
    }
    echo '</table>

    <button style="width:150px;"type="submit"name="submit2" class="btn btn-success m-2 mb-3">حفظ</button>

    </form>';
 

     if(isset($_POST['submit2'])) {
        $a=0;
      for($a;$a<$i;$a++){
     if(!empty($_POST['a'.$a])){
      $newdeg=$_POST['a'.$a];      
      $open_close=$database->prepare("UPDATE inf_stu SET deg_dart=$newdeg where id= $de[$a]");
      $open_close->execute();
      echo"<script>location.replace('deg_dart.php')</script>";
   
      }
     }
   }
    
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