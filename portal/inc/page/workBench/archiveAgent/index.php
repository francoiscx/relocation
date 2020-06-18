 <?php
include_once '../inc/required/utilities.php';
include_once '../inc/required/sessions.php';
include_once '../inc/required/database.php';

if(!isset($_SESSION['userID'])) {header("Location: http://demoprojects.relocation.co.za/logout.php");
} else {

    unset($_SESSION['companyName']);
    unset($_SESSION['companyRegistrationNumber']);
    unset($_SESSION['title']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['companyNumber']);
    unset($_SESSION['emailnotify']);
    unset($_SESSION['email']);
    unset($_SESSION['addresss']);
    unset($_SESSION['suburb']);
    unset($_SESSION['townCity']);
    unset($_SESSION['province']);
    unset($_SESSION['postalCode']);
}

?>

<!-- TO DO List -->
          <div class="box box-primary" style="height:900px;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->
<style>
    input#deactivateAgentBtn {
    background: crimson;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}

input#ignoreBtn {
    background: #83B63E;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}
</style>


<?php

$serviceProviderID = $_GET['id']; 

    $stmt = $db->prepare('SELECT * FROM service_providers WHERE serviceProviderID=?');
    $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if(! $row)
           
        {
            die('Nothing found');
    } else {
        
            $companyName = $row['companyName'];
            $companyRegistrationNumber = $row['companyRegistrationNumber'];
            $title = $row['title'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $companyNumber = $row['companyNumber'];
            $emailnotify = $row['emailnotify'];
            $email = $row['email'];
            $addresss = $row['addresss'];
            $suburb = $row['suburb'];
            $townCity = $row['townCity'];
            $province = $row['province'];
            $postalCode = $row['postalCode'];
    }
    
    ?>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->


<?php

if($_SESSION['returnTo'] == 2) {
    $phrase = "deactivate";
    $return = "workbench.php?id=" . 2;
    $active = 0;
} else {
    $phrase = "activate";
    $return = "workbench.php?id=" . 4;
    $active = 1;
}

if(isset($_POST['ignoreBtn'])) { 
    echo "
    <script> 
        window.location.replace('" . $return . "');
    </script>";
}

if(isset($_POST['deactivateAgentBtn'])) {


echo $active;
    
 /////////////UPDATE   
                                try{   
                                                    //SQL statement to update card
                                                    $sqlUpdate = "UPDATE service_providers SET active =:active WHERE serviceProviderID =:serviceProviderID";
                                
                                                    //use PDO prepared to sanitize SQL statement
                                                    $statement = $db->prepare($sqlUpdate);
                                
                                                    //execute the statement
                                                    $statement->execute(array(':active' => $active, ':serviceProviderID' => $serviceProviderID));
                                                    
                                                    //check if one new row was updated
	    	                                        if($statement->rowCount() == 1){
	    	                                            $_SESSION['agentDeactivated'] = "<h3>The agent was succesfully deactivated</h3>";
	                                               }  
                                                    
                                                 }catch (PDOException $ex){
                                                $result = "An error occurred: ".$ex->getMessage();
                                        }
    
                                        if(isset($_SESSION['agentDeactivated'])) {     
    
                                            echo $_SESSION['agentDeactivated'];
                                    
                                    unset($_SESSION['agentDeactivated']);
                                    
                                    echo "
                                    <script> 
                                        window.location.replace('" . $return . "');
                                    </script>";
                                }
}


?>

<center><h3 class="box-title" style="margin-top:10%">You are about to <?php echo $phrase;?></h3></center>
<br><br>


<container>


                                                            <center><h4>
                                                     
                                                            <?php if(isset($companyName)) echo $companyName;?> from
                                                            
                                                            <?php if(isset($province)) echo $province;?>,
                                                            
                                                            <?php if(isset($townCity)) echo $townCity;?>,
                                                            
                                                            
                                                            the contact number for the partner is: 
                                                            
                                                            <?php if(isset($companyNumber)) echo $companyNumber;?> and the notofication email is: 
                                                            
                                                            <?php if(isset($emailnotify)) echo $emailnotify;?>
                                                        
                                                        </h4>
                                                        
                                                        <form action="" method="post">    
                                                            
                                                                <h3> Are you sure you want to <?php echo $phrase . " " . $companyName;?></h3><br><br><br><br>
                                                                <input type="submit" id="deactivateAgentBtn" name="deactivateAgentBtn" value="<?php echo ucfirst($phrase) . ' ' . $companyName;?>">
                                                                
                                                                <br><br><br><br>
                                                                
                                                                <input type="submit" id="ignoreBtn" name="ignoreBtn" value="Ignore this Request">
                                                            </center>
                                                        </form>
                                                
</container>



            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->