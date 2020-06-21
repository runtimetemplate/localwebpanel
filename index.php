<?php session_start();

if(isset($_SESSION['webpanel'])) {
    header("Location: admin/");
} elseif (isset($_SESSION['clientpanel'])) {
    header("Location: client/");
} elseif (isset($_SESSION['managerpanel'])) {
    header("Location: manager/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Innovention</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/css/login.css">
</head>
<?php include_once("resources/functions.php")  ?>
<body>

<div class="login-form">
    <div id="alert">
        
    </div>
    <div class="loginform">
        <div class="text-center">
            <div class="form-group">
                <img src="dist/img/fbwlogo.png" class="rounded" style="width: 200px;" alt="logo">
            </div>        
        </div>
        <div class="text-center"><p>Online POS Management System</p></div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" id="username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>    
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password"name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>     
        </div>   
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-secondary btn-sm" id="btn" name="submit">Sign in</button>
        </div>
        <div class="clearfix">
            <label class="float-left checkbox-inline"><input type="checkbox"> Remember me</label>    
            <a href="#" class="float-right" style="color: #cfa54b">Forgot Password?</a>
        </div>      
            <p class="text-center small">Don't have an account? <a href="#" style="color: #cfa54b">Sign up here!</a></p>
        <div class="text-center">
            <div id="loader" class=""><div></div><div></div><div></div>
        </div>
    </div>
    </div>
</div>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
$(document).ready(function(){
  $("#btn").click(function(){
    document.getElementById("loader").classList.add('lds-facebook');
    var username = $("#username").val();
    var password = $("#password").val();
    if (username != '' & password != '') {
        $.ajax({  
            url:"loginfunction.php",  
            method:"post",  
            data:{
                username:username,
                password:password
            },  
            success:function(data){  
                if(data == "admin"){
                    alert("Successfully login as Admin");      
                    $("#loader").removeClass("lds-facebook");
                    self.location = "admin/";
                } else if (data == "client") {
                    $("#loader").removeClass("lds-facebook");
                    alert("Successfully login as Client"); 
                    self.location = "client/";  
                } else if (data == "manager") {
                    $("#loader").removeClass("lds-facebook");
                    alert("Successfully login as Manager");   
                    self.location = "manager/";  
                } else {
                    $("#loader").removeClass("lds-facebook");
                    alert("Wrong Credentials.");            
                }
            }  
           });  
    } else {
        alert("Please fill up all fields");
        $("#loader").removeClass("lds-facebook");
      
    }
  });
});
</script>
</body>
</html>   
  <!-- $("<div class='alert alert-info alert-dismissible'> <button type ='button' class = 'close' data-dismiss='alert' aria-hidden='true'>&times;</button><h5><i class='icon fas fa-info'></i> Alert!</h5>Info alert preview. This alert is dismissable.</div> " ).appendTo( "#alert" ); -->
<!--     <div class='alert alert-info alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class='icon fas fa-info'></i> Alert!</h5>
        Info alert preview. This alert is dismissable.
    </div>   -->

