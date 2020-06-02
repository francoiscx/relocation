<?php
date_default_timezone_set('Africa/Lagos');
include_once 'inc/required/sessions.php';

$siteTitle = $adminName;


if(isset($_SESSION['userID'])) header('Location: portal.php');
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

if(isset($_POST['loginBtn'])){

    //array to hold errors
    $form_errors = array();
    
    //validate
    $required_fields = array('Email', 'Password');
    
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    
    if(empty($form_errors)){
        
        //collect form data
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        
        //check if user exist in DB
        $sqlQuery = "SELECT * FROM users WHERE user_email = :user_email";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':user_email' => $email));
        
        
        while($row = $statement->fetch()){
        
            $userID = $row['user_id'];
            $hashed_password = $row['password'];
            $email = $row['user_email'];
            $firstname = $row['user_first_name'];
            $lastname = $row['user_last_name'];
            
            if(password_verify($password, $hashed_password)){
                
                $_SESSION['userID'] = $userID;
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                
                                if(isset($_SESSION['userID'])){

                                        //check if user has permissions
                                        $sqlQuery = "SELECT * FROM perms WHERE for_user_id = :userID";
                                        $statement = $db->prepare($sqlQuery);
                                        $statement->execute(array(':userID' => $userID));
        
        
                                        while($row = $statement->fetch()){

                                        if($_SESSION['userID'] == $row['for_user_id']) {
        
                                              $canViewAllUserDashboard = $row['canViewAllUserDashboard'];
                                              if($canViewAllUserDashboard == 1) {$_SESSION['canViewAllUserDashboard'] = $canViewAllUserDashboard;}

                                              $specialDash = $row['specialDash'];
                                              if($specialDash == 1) {$_SESSION['specialDash'] = $specialDash;}

                                              $canCreateJobs = $row['canCreateJobs'];    
                                              if($canCreateJobs == 1) {$_SESSION['canCreateJobs'] = $canCreateJobs;}

                                              $displayRightSidebar = $row['displayRightSidebar'];    
                                              if($displayRightSidebar == 1) {$_SESSION['displayRightSidebar'] = $displayRightSidebar;}

                                              $Senior = $row['Senior'];  
                                              if($Senior == 1) {$_SESSION['Senior'] = $Senior;}

                                              $showProfile = $row['showProfile'];  
                                              if($showProfile == 1 ) {$_SESSION['showProfile'] = $showProfile;}
                                              

                                              $canAddNewSupplier = $row['can_add_new_supplier'];  
                                              if($canAddNewSupplier == 1 ) {$_SESSION['canAddNewSupplier'] = $canAddNewSupplier;}

                                              $canEditExistingSupplier = $row['can_edit_existing_supplier'];  
                                              if($canEditExistingSupplier == 1 ) {$_SESSION['canEditExistingSupplier'] = $canEditExistingSupplier;}

                                              $canArchiveExistingSupplier = $row['can_archive_existing_supplier'];  
                                              if($canArchiveExistingSupplier == 1 ) {$_SESSION['canArchiveExistingSupplier'] = $canArchiveExistingSupplier;}


                                              $canViewArchivedSupplier = $row['can_view_archived_supplier'];  
                                              if($canViewArchivedSupplier == 1 ) {$_SESSION['canViewArchivedSupplier'] = $canViewArchivedSupplier;}

                                              $canEditArchivedSupplier = $row['can_edit_archived_supplier'];  
                                              if($canEditArchivedSupplier == 1 ) {$_SESSION['canEditArchivedSupplier'] = $canEditArchivedSupplier;}

                                              $canReactivateArchivedSpplier = $row['can_reactivate_archived_supplier'];  
                                              if($canReactivateArchivedSpplier == 1 ) {$_SESSION['canReactivateArchivedSpplier'] = $canReactivateArchivedSpplier;}
                                          }
                                        
                                        }
                                } else {
                                    
                                    echo" AN ERROR OCCURED";
                                    
                                }

                                        
                
                header('location: portal/index.php');
                
                //UPDATE LAST LOGEDIN TIME
              try{   
                                                    $query = $db->prepare("UPDATE users SET lastLogin = NOW() WHERE userID=:userID");

                                                    $query->bindParam(':userID', $userID, PDO::PARAM_STR);

                                                    $query->execute();

          
                                                 }catch (PDOException $ex){
                                                $result = "An error occurred: ".$ex->getMessage();
                                        } 
                                        
                                        
            } else {
                
                $result = "<p style='padding:20px; color:red'>Either the password provided does not match the email provided or the email is not registered in our database</p>";
                
            }
            
            
        }
        
        
    } else {
        
        if(count($form_errors) == 1) {
            
            $result = "<h3 style='color:red'>There was one error in the from</h3>";
            
        } else {
            
            $result = "<h3 style='color:red'>There were " . count($form_errors) . " errors in the from</h3>";
            
        }
        
    }
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $siteTitle?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/red.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript" src="./dist/selfAdded/ajax/jquery/1.5.1/jquery.min.js"></script>
  
<script>
function sendBrowserSize() {
  var myWidth = 0, myHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    myWidth = window.innerWidth;
    myHeight = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
    myHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myWidth = document.body.clientWidth;
    myHeight = document.body.clientHeight;
  }

$.ajax({
   type: "POST",
   url: "inc/required/saveBrowserSizeSession.php",
   data: "width="+myWidth+"&height="+myHeight,
   success: function(msg){
     //alert( "Browser Dimensions Saved" );
   }
 });
}

$(document).ready(function()
{
    sendBrowserSize();
});

</script>
</head>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index.php"><b><?php echo $siteTitle?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      
<center>      
<?php
    if(!isset($result)) {
        echo "<h3>Sign in to start your session</h3>";
    } else {
        echo $result;  
    }
    if(!empty($form_errors)) echo show_errors($form_errors);
?>
</center>
<br>
    <form method="post" action="">
      <div class="form-group has-feedback">
        <input type="email" id="Email" name="Email" class="form-control" placeholder="Email" autocomplete ="email" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" autocomplete ="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="loginBtn">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<!--    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
-->    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
<!--    <a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
