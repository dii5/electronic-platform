<?php
    $user='root';
    $pass="";
    $database=new PDO("mysql:host=localhost;dbname=school;charset=utf8;",$user,$pass);
  ?>

<?php 
if(!empty($_COOKIE["myid"])||!empty($_COOKIE["mypass"])){
$myid=$_COOKIE["myid"];
$mypass=$_COOKIE["mypass"];
$show=$database->prepare(" SELECT * FROM inf_stu WHERE id=$myid");
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
    <title>class-dart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
  <!--head star -->
<div class="card bg-dark text-white mt-4 mb-4" style="max-height:200px;width:900px;margin:auto;border-radius: 10px !important;">
  <img src="imgs-sch/3.jpg" class="card-img" alt="..." style="max-height:200px;width:900px;border-radius: 10px ">
  <div class="card-img-overlay">
    <h5 class="card-title"style="font: size 20px;">Card title</h5>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>
  <!--head end -->
      <!--days star-->

<div class="row" style="width:700px; margin:auto">

   ';
    
    if(isset($_POST['submit1'])){

      $day=date('Y-m-d');
            $show=$database->prepare("SELECT * FROM attend_dart WHERE id_stu=9999");
             $show->execute();
             $show=$show->fetchObject();
             
            if($show->open_close==1){
              if(empty($_COOKIE["day"])){
            $open_close=$database->prepare("INSERT INTO attend_dart(open_close,id_stu,day)VALUES('1','$myid','$day')  " );
            $open_close->execute();
            setcookie('day', 5, time() + (60*60*16), "/"); // 
           
            echo '<div dir="rtl" class="alert alert-primary" role="alert">
              تم تسجيل الدخول
          </div>';}
          else{    echo '<div dir="rtl"  class="alert alert-primary" role="alert">
                     لقد سجلت بالفعل 
                </div>';}}
          else{
            echo '<div  dir="rtl" class="alert alert-primary" role="alert">
                 لم يتم تسجيل الدخول
          </div>';
          }}
           
   echo'
    <form method="POST">
  <div class="mb-2" style="width:65%; float:right">
    <label style="width:25%; float:right;" for="exampleInputEmail1" class="form-label m-1">تسجيل حضور</label>
  </div>
  <div style="float:left; width:35%;">  
  <button style=" width:50%;" type="submit" class="btn btn-primary col-3 m-1" name="submit1">تسجيل</button>
  </div>
    </form>
</div>
    <!-- days end-->

  <!-- publishing public star -->
  ';
    if(isset($_POST['submit3'])){  
      $i=0;
      if($i<1) {
      $comment=$_POST['comment'];       
      $add_comn=$database->prepare("INSERT INTO comment_dart (comment,id) VALUES('$comment','')"); 
      $add_comn->execute();}}

$show3=$database->prepare("SELECT * FROM class_dart ORDER BY id DESC");
$show3->execute();
foreach($show3 AS $show2){
    


echo '<div class="card mb-3" style="max-width: 700px;min-height:100px; margin:auto ;border-radius: 10px !important;">
  <div class="row g-0">
    <div class="col-md-2">
      <img src="imgs-sch/bat.jpg" class="m-2 " alt="..." style="border-radius:50%;width:60px; height:60px;">
    </div>
    <div class="col-md-10">
      <div class="card-body">
        <h5 class="card-title m-0">noor</h5>
        <p class="card-text"><small class="text-muted">'.$show2['title'].'</small></p>
        <!-- bic & bdf star-->
        <div class="row g-0">';
       if($show2['vidue']!=''){
  echo'<div class="col-6 " style="height:60px;border-radius:3px;border:1px solid #EEEEEE; ">
        <div class="row g-0">
               <div class="col-3 m-0">
                <img  src="imgs-sch/video-pic.jpg" style="height:57px;max-width:100%;float:left;border-radius:3px;">
               </div>
               <div class="col-9">
               <a href="'.$show2['vidue'].'"><p  style="overflow:hidden;height:58px;"> vidue </p></a>
               </div>
          </div>
        </div>';}
          if($show2['typefile']!=''){
        echo'<div class="col-6" style="height:60px; border-radius:3px;border:1px solid #EEEEEE;">
             <div class="row g-0">
               <div class="col-3 m-0">
                <img  src="imgs-sch/pdf-pic.png" style="height:57px;max-width:100%;border-radius:3px;">
               </div>
               <div class="col-9">';

              
               $getFile = "data:" . $show2['typefile'].";base64,".base64_encode($show2['filedata']);
               echo "<a href='". $getFile."'download>" .$show2['namefile'] . "</a> <br>";
               echo '<embed type="bdf" src="'.$getFile.'">
               </div>
              </div>
            </div>';}
            echo'
            <!-- bic & bdf end-->
       </div>
      </div>
    </div>
  </div>
  <hr>
        <!--comment star-->
  <div class="row" style="width:700px; margin:auto">

    <form method="POST">
  <div class="mb-2" style="width:75%; float:right">
    <label style="width:25%; float:right;" for="exampleInputEmail1" class="form-label m-1">اضافة رد</label>
    <input type="" style="width:70%; float:left;" type="text" class="form-control col-3 m-1"name="comment" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div style="float:left; width:25%;">  
  <button style="width: 90%;" type="submit" class="btn btn-primary m-1" name="submit3">ارسال</button>
  </div>
  </form>                        
  </div>
  </div>';}

  echo'

 <!--comment end -->
<!-- publishing public end-->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
</body>
</html>';    }}
else{
  echo"<script>location.replace('longin.php')</script>";
}
}
else {
  echo"<script>location.replace('longin.php')</script>";
}
?>