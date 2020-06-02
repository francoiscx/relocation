<?php
$siteSection = "Register New User";
date_default_timezone_set('Africa/Lagos');
$siteTitle= "Kia-Data";

include_once'/home/erasmusm/beta.kia-data.com/inc/required/sessions.php';
include_once'/home/erasmusm/beta.kia-data.com/inc/required/database.php';
include_once'/home/erasmusm/beta.kia-data.com/inc/required/utilities.php';

$_SESSION['lastPageVisited'] = $siteSection;

?>
<title><?php echo $siteTitle?> | <?php echo $siteSection?> </title>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $siteTitle?> | Create New User</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index.php"><b><?php echo $siteTitle?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      
<?php




if(isset($_POST['signupBtn'])){
    
    //initialize array for form errors
    $form_errors = array();
    
    //list all required fields
    $required_fields = array ('Email', 'Firstname', 'Lastname');
    
    //call function to check empty fields
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    
    //define fields that require checking for minimum length and indicate min
    $fields_to_check_length = array('Firstname' => 2, 'Lastname' => 2, 'Email' => 12);
    
    //call function to check fields lengths
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
    
    //email validation and merge returned data
    $form_errors = array_merge($form_errors, check_email($_POST));
    
    //check if error array is empty. If YES then collect form vars
    if(empty($form_errors)) {
        
        //collect form data from variables
        
            $REmail = $_POST['Email'];
    //echo $REmail . "<br>";
            $RFirstname = $_POST['Firstname'];
    //echo $RFirstname . "<br>";
            $RLastname = $_POST['Lastname'];
    //echo $RLastname . "<br>";
            $RegisteredBy = $_SESSION['userID'];
    //echo $RegisteredBy . "<br>";
            $tempPassword = dechex(rand(0x000000000, 0xFFFFFFFFF));
    //echo $tempPassword . "<br>";
            $password = $tempPassword;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //echo $hashed_Password . "<br>";
    
    
        $RFirstname = name_field($RFirstname);
		$RLastname = name_field($RLastname);
		$email = strtolower($email);
        $accountID = $_SESSION['accountID'];
        
    try{    
    
        $sqlInsert = "INSERT INTO users (accountID, email, password, tempPassword, first_name, last_name, registration_date, registeredBy)
                      VALUES (:accountID, :email, :password, :tempPassword, :first_name, :last_name, now(), :registeredBy)";
                      
        $statement = $db->Prepare($sqlInsert);
        $statement->execute(array(':accountID' => $accountID, ':email' => $REmail, ':password' => $hashed_password, ':tempPassword' => $tempPassword, ':first_name' => $RFirstname, ':last_name' => $RLastname, ':registeredBy' => $RegisteredBy));
        
        if($statement->rowCount() == 1) {
            
            $result = "<p style='padding:20px; color:green'>Registration Successful</p>";
            
        }
        
    }catch (PDOException $ex){
        
            $result = "<p style='padding:20px; color:red'>An error occured: ". $ex->getMessage() ."</p>";
                    
    } 
    
    } else {
    
        if(count($form_errors) == 1) {
        
            $result = "<h3 style='padding:20px; color:red'>There was 1 error in the form</h3>";
        
        } else {
        
            $result = "<h3 style='padding:20px; color:red'>There were " .count($form_errors). " errors in the form</h3>";
        
        }
    
    }
    
}

?>
<center>
    <?php 
    if(!isset($result)) {
        echo "<h4> Use this form to register a new user </h4>";
    }else if(isset($result)) {
        echo $result;
    }
    if(!empty($form_errors)) echo show_errors($form_errors);
    ?>
</center>
    <br>

    <form method="post" action="">
      <div class="form-group has-feedback">
        <input type="email" id="Email" name="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email'];?>" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

    <div class="form-group has-feedback">
        <input type="text" id="Firstname" name="Firstname" value="<?php if(isset($_POST['Firstname'])) echo $_POST['Firstname'];?>" class="form-control" placeholder="First Name">
      </div>
      
    <div class="form-group has-feedback">
        <input type="text" id="Lastname" name="Lastname" value="<?php if(isset($_POST['Lastname'])) echo $_POST['Lastname'];?>" class="form-control" placeholder="Last Name">
      </div>
      
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input button type="submit" name="signupBtn" value="Register" class="button btn btn-primary btn-medium"></button>
        </div>
        <!-- /.col -->
      </div>
    </form>


<!--    <a href="#">I forgot my password</a><br>    -->
<!--    <a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
