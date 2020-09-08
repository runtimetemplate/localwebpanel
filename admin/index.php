<?php session_start();

  if(!isset($_SESSION["webpanel"])) {
    header("Location:../");
  } else {
    if ($_SERVER['REQUEST_URI'] == "/admin/index.php" || $_SERVER['REQUEST_URI'] == "/admin/index.php?dashboard" || $_SERVER['REQUEST_URI'] == "/admin/") 
    {
        include('dashboard.php');
    }     
    if(isset($_GET['outlets'])) {
        include("outlets.php");
    }
    if(isset($_GET['users'])) {
        include("users.php");
    }
    if(isset($_GET['settings'])) {
        include("generalsettings.php");
    }
    if(isset($_GET['defprod'])) {
        include("defproducts.php");
    }
    if(isset($_GET['defcat'])) {
        include("defcategory.php");
    }
    if(isset($_GET['defform'])) {
        include("defformula.php");
    }
    if(isset($_GET['definv'])) {
        include("definventory.php");
    }
    if(isset($_GET['pmanagement'])) {
        include("pmanagement.php");
    }
  }
?>
<script type="text/javascript">
  function logout() {
    $.ajax({  
      url:"actions/logout.php",  
      success:function(data){  
       window.location = "../";
      }  
    });  
  }
</script>