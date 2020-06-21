<?php
include '../../resources/conn.php';
$user_guid =  $_POST['id'];
$sql = "SELECT * FROM admin_user WHERE user_guid = '$user_guid'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$fname = $row['user_fname'];
$lname = $row['user_lname'];
$username = $row['user_name'];
$password = $row['user_pass'];
$email = $row['user_email'];
$contactno = $row['contact_no'];
$image = $row['user_profile'];
echo 
'<div class="card-body">
    <input type="hidden" id="guid" name="userguid" value="'.$user_guid.'">
    <div class="row">
      <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required value="'.$fname.'"> 
        </div>         
      </div>
      <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required value="'.$lname.'">
        </div>         
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="'.$username.'">
        </div>         
      </div>
      <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="showpassword" name="password" placeholder="Password" required value="'.$password.'">
          <div class="input-group-prepend">
            <span class="input-group-text"><input type="checkbox" onclick="showpass()"></span>
          </div>
        </div>         
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="'.$email.'">
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" required value="'.$contactno.'">
        </div>         
      </div>
      <div class="col-md-6">
      </div>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="image" id="image"  accept="image/*" value="'.$image.'">
      <label class="custom-file-label" for="image">Choose file</label>
    </div>
</div>';
?>
