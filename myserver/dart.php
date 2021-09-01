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
    <title>dart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<style>
    li{
   margin:8px;
    }
.font-family{
  font-family:cursive;
}
.decoration{
text-decoration: none;
color: white;
margin: 0px;
}
.decoration:hover{
text-decoration: underline;
}
nav{
  background:#003638 !important;
  box-shadow:5px 5px 1px 5px #003638!important;
  height: 40px !important;
}

.alerts-main{
  float: left; width:100%;
  background:  rgb(83, 184, 187) !important; 
  min-height:700px;
  margin:0px;
}

 aside{
  float: left; 
  width:25%;
  max-height:700px;
  min-height:700px; 
  background-color:rgb(5, 80, 82);
  color:white; overflow: hidden;
  display:none;
}
</style>
</head>
<body dir="rtl">
  
    <!--navbar star-->
<nav class="navbar navbar-light bg-light"style="background:#003638 !important;" >
  <div class="container">
<h5 style="float: left !important; color:white; font-family:cursive;"><a class="decoration" href="edit-class.php">المادة: '.$show->name.'</a> </h5>
 <div class="show">
  <form method="POST">
         <button type="submit" class="btn btn-secondary" name="show">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
                <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                </svg>
         </button>
  </form>
 </div>
<div class="hidden" style="display:none">
  <form method="POST">
         <button type="submit" class="btn btn-secondary" name="hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
                <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                </svg>
         </button>
  </form>
</div>
</div>';


if(isset($_POST['show'])){
  echo"<style> 
  #alerts-aside{
    float: left!important; 
    width:25% !important;
    max-height:700px!important;
    min-height:700px!important; 
    background-color:rgb(5,80,82)!important;
    margin:0px !important;
    color:white; 
    display: block;
   
  }
  .alerts-main{
    width: 75% !important;
    min-height:700px!important;
    background:rgb(83, 184, 187)!important;
    float:right!important;
    margin: 0px !important;
  }
 .show{
  display:none;}
  .hidden{display: block !important;}
  </style>";
}
// button//

echo'
      </div>
    </a>
  </div>
</nav>

    <!--navbar end-->

    <!--Aside star-->

    <aside id="alerts-aside">
    <h5 class="font-family m-3">معلومات الطلاب</h5>

    <ul style="list-style-type: none; height:50px;"> 
       <li><a href="deg_dart.php" class="decoration">عرض معلومات الطلاب</a></li>
    </ul>
<hr>
<h5 class="font-family m-2">المدير</h5>
<ul style="list-style-type: none; height:100px;overflow: scroll;">';


$show_teacher=$database->prepare("SELECT * FROM note ORDER BY id DESC");
$show_teacher->execute();
$i=0;
foreach($show_teacher AS $items){
  $i+=1;

   echo '<li>'.$items["note_dart"].'<li>';
    if($i>5){break;}
}
echo'

</ul>

 <hr>
<h5 class="font-family m-2">اسألة الطلاب</h5>

  <ul style="list-style-type: none; overflow: scroll;height:150px;" > ';

 $show_com=$database->prepare(" SELECT *FROM comment_dart ORDER BY id DESC");
  $show_com->execute();
  $i=0;
  foreach($show_com AS $items){
  $i+=1; 
   echo '<li>'.$items["comment"].'<li>';
    if($i>9){break;}
 } 
 echo '
  </ul>
</div>
</aside>


    <!--Aside end-->



<!--main star-->
<div dir="rtl" class="alerts-main"style="margin: 0px;background: #53B8BB; height: 700px;">
<!--send files star -->

<div  class="container" style="width:80%;border-radius:10px;border:1px solid #E8E8E8;margin:auto;margin-top:30px !important;background:#055052;color:white; margin-bottom:30px;">
  <p class="m-2" style="font-family:cursive; font-size:30px;">اضافة ملف او فيديو</p>';

  if(isset($_POST['submit1'])){
    $title=$_POST['titel'];
    $vidue=$_POST['vidue'];
    $namefile=$_FILES['file']['name'];
    $typefile=$_FILES['file']['type'];
    
   if($_FILES['file']['tmp_name'] !=""){
    $filedatap=file_get_contents($_FILES['file']['tmp_name']);}
    
    $add_file=$database->prepare("INSERT INTO class_dart (title,vidue, namefile, typefile,filedata)
    VALUES ('$title', '$vidue', '$namefile', '$typefile',':filedata')");
     $add_file->bindParam("filedata",$filedatap);
   if($add_file->execute()){
    echo '<div class="alert alert-success" role="alert">
     تم رفع الملفات
    </div>';
    }}
    echo'

  <form method="POST" enctype="multipart/form-data">
  <div class="row g-0 m-3" style="margin-top:50px !important ;">
   <div class="col-3">
       <input type="text" style=" text-align: center;" placeholder="ادخل العنوان"name="titel">
   </div>

   <div class="col-3">
       <input type="text"  style=" text-align: center;"placeholder="ادخل رابط الفيديو" name="vidue">
   </div>

   <div class="col-3" dir="rtl" lang="ar" >
       <input type="file"  placeholder="ادخل الملف" name="file">
   </div>
      <div class="col-3">
       <button type="submit" class="btn btn-primary"style="width: 100%;" name="submit1">رفع</button>
   </div>
  </div>
 </form>
</div>
<!--send file end-->

<!--open sing day  star-->
<div  class="container" style="width:80%;border-radius:10px;border:1px solid #E8E8E8;margin:auto;margin-top:10px !important;background:#055052;color:white;">
   <p class="m-2" style="font-family:cursive; font-size:25px;">فتح واغلاق تسجيل الحضور</p>';

       if(isset($_POST['open'])){
        $open_close=$database->prepare("UPDATE attend_dart SET open_close ='1';");
        $open_close->execute();
       }
       if(isset($_POST['close'])){
        $open_close=$database->prepare("UPDATE attend_dart SET open_close ='0';");
        $open_close->execute();
       }
   echo'
   <form style="margin:10px;" method="POST"> 
      <div class="row g-0 m-3"style="margin-top:50px !important;">
      <div class="text-cevter col-6">
         <button  type="submit" class="btn btn-primary"style="width: 50%;"name="open">فتح</button>
     </div>
     <div class="text-cevter col-6" >
         <button type="submit" class="btn btn-warning"   style="width: 50%; float:left; margin-left:0px;"name="close">اغلاق</button>
     </div>
   </div>
   </form>
</div>
<!--open sing day end-->

<!-- alert star-->
<div  class="container" style="width:80%;border-radius:10px;border:1px solid #E8E8E8;margin:auto;margin-top:10px !important;background:#055052; color:white;">
   <p class="m-2" style="font-family:cursive; font-size:25px;">ارسال ملاحظات</p>

  <form  style="margin:10px;" method="POST"> 
  <div class="row g-0 m-3" style="margin-top:50px !important ;">';
  
   if(isset($_POST['submit2'])){
  $notes=$_POST['message'];
  $send_message=$database->prepare("INSERT INTO note(note_dart)VALUES('$notes')");
  $send_message->execute();
  echo '<div class="alert alert-success" role="alert">
    تم ارسال الملاحظة
 </div>';
   }
   echo'
     <div class="text-cevter col-6" style="width:50%">
        <a><input style="width:50% ;min-height:auto;overflow-x:scroll;"type="text"placeholder="اكتب الملاحظة"name="message"> </a>
     </div>
     <div class="text-cevter col-6"  >
         <button type="submit" class="btn btn-primary"  style="width: 50%; float:left; margin-left:0px;" name="submit2">ارسال</button>
     </div>
  </div>
  </form>
</div>
<!-- alert end-->
<!--main end-->
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