<?php
session_start();
if(!isset($_SESSION['userdata'])){
header("location: login2.html");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($userdata['status']==0){
$status = '<b style="color:red">Not Voted</b>';
}
 else{
$status = '<b style="color:green">Voted</b>'; 
 }

  
?>

<html>
<head>
<title>Online Voting System Dashboard</title>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>


body{
background-color: lightsteelblue;
}

#backbtn{
padding: 5px;
font-size: 25px;
background-color: #000000;
color: white;
border-radius: 5px;
float: left;
margin: 10px;
}

#logoutbtn{
padding: 5px;
font-size: 25px;
background-color: #000000;
color: white;
border-radius: 5px;
float: right;
margin: 10px;
}  
  
  
#Profile{
background-color: white;
width: 47%;
padding: 60px;
float: left;
  border: 2px solid black;
}

#Group{
background-color: white;
width: 90%;
padding: 40px;
  margin-top: 40px;
  border: 2px solid black;
}
  
  
.head{
background-color: #000000;
  border: 2px solid white;
width: 95%;
padding: 20px;
  margin-top: 360px;
  color: white;
  height: 40px;
}  
  
  
  
#votebtn{
padding: 5px;
font-size: 15px;
background-color: #3498db;
color: white;
border-radius: 5px;
}
  
#mainpanel{
  padding: 10px;
}

 #voted{
 padding: 5px;
font-size: 15px;
background-color: green;
color: white;
border-radius: 5px;
 }
 
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: white;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
   border: 2px solid black;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #000000;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px){
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
} 
    
  
  
  
  
  
  
  
</style>
</head>
<body>
  
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)"
  class="closebtn"
  onclick="closeNav()">&times;</a>

  <a href="index.html"><ion-icon name="home"></ion-icon>  ->  Home</a>
  <a href="login2.html"><ion-icon name="log-in"></ion-icon>  ->  Login</a>
  <a href="register2.html"><ion-icon name="person-add"></ion-icon>  ->  Register</a>
  <a href="about.html"><ion-icon name="alert-circle"></ion-icon>  ->  About us</a>
  <a href="contactus.html"><ion-icon name="mail"></ion-icon>  ->  Contact us</a>
<a href="forgot.html"><ion-icon name="reload-circle"></ion-icon>  ->  Restore password</a>

  
  
</div>
  

 <span style="font-size:40px;color:white;border-radius:7px;border:3px solid black;
  cursor:pointer"onclick="openNav()">☰ 
</span> <b style="color:steelblue;font-size:20px"> <marquee> <center><h1>ONLINE VOTING SYSTEM</h1></center></b></marquee>
  <hr style="height:2px;width:100%;background-color:steelblue">
 
  
<script>

/* Set the width of the side navigation to
250px */ 

function openNav() {
 document.getElementById("mySidenav")
 .style.width="375px";
}

function closeNav() {
 document.getElementById("mySidenav")
 .style.width = "0";
}
</script>  
  
  
  
  
<div id="mainSection">

<center>
<div id="headerSection"> 
<a href="login2.html"><button id="backbtn"> <i class="fas fa-arrow-left"></i>  </button></a>
<a href="index.html"><button id="logoutbtn" > <i class="fas fa-sign-out-alt"></i>   </button></a>
  <b><h2 style="color:white;">DASHBOARD</h2></b>
</div>
</center><br>
<hr style="background-color:black">
  
<div id="mainpanel">  
<div id="Profile">
<b style="color:black">Name:</b> <?php echo $userdata['name']?> <br><br> 
<b style="color:black" >Mobile:</b> <?php echo $userdata['mobile']?> <br><br> 
<b  style="color:black" >Address:</b> <?php echo $userdata['address']?> <br><br> 
<b style="color:black" >Status:</b> <?php echo $status?> <br><br>
</div>
  <img  style="float:right;border:2px solid black"  src=" uploads/<?php echo $userdata['photo'] ?>  " height="310" width="300"><br><br>

    <div class="head">
      <center><h2>SELECT GROUP TO VOTE</h2></center>
    </div>
    
    <div id="Group">
<?php
if($_SESSION['groupsdata']){
for($i=0; $i<count($groupsdata); $i++){
?>

<div>
<img style="float:right;border: 2px solid black"src="uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
<b style="color:black" >Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br> 
<b style="color:black" >Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>

<form action="vote.php" method="POST">
<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">

<?php
if($_SESSION['userdata']['status']==0){
?>
<input type="submit" name="votebtn" value="vote" id="votebtn">
<?php
}
else{
?>
<button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
<?php
}
?>
  
</form>
</div>
  <hr>

<?php
}
}
else{
}
?>
</div>
</div>
  
</div>
  
 
<script src="http://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  
</body>
</html>