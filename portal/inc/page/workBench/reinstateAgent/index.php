 <?php
include_once 'inc/required/utilities.php';
include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';

if(!isset($_SESSION['userID'])) {header("Location: http://demoprojects.relocation.co.za/logout.php");
} else {

    unset($_SESSION['country']);
    unset($_SESSION['province']);
    unset($_SESSION['town']);
    unset($_SESSION['area']);
    unset($_SESSION['lat']);
    unset($_SESSION['lng']);
    unset($_SESSION['agent']);
    unset($_SESSION['cell']);
    unset($_SESSION['aemail']);
}

?>

<!-- TO DO List -->
          <div class="box box-primary" style="height:900px;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->
<style>
    input#ignoreBtn {
    background: crimson;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}

input#reactivateAgentBtn {
    background: #83B63E;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}
</style>


<?php

$agentID = $_GET['id']; 



    $stmt = $db->prepare('SELECT * FROM agents WHERE agentID=?');
    $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if( ! $row)
           
        {
            die('Nothing found');
    } else {
        
            $country = $row['country'];
            $province = $row['province'];
            $town = $row['town'];
            $area = $row['area'];
            $lng = $row['lng'];
            $lat = $row['lat'];
            $agent = $row['agentName'];
            $cell = $row['cell'];
            $aemail = $row['email'];
    }
    
    ?>



            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->






<?php



if(isset($_POST['reactivateAgentBtn'])) {

$active = 1;
    
 /////////////UPDATE   
                                try{   
                                                    //SQL statement to update card
                                                    $sqlUpdate = "UPDATE agents SET active =:active WHERE agentID =:agentID";
                                
                                                    //use PDO prepared to sanitize SQL statement
                                                    $statement = $db->prepare($sqlUpdate);
                                
                                                    //execute the statement
                                                    $statement->execute(array(':active' => $active, ':agentID' => $agentID));
                                                    
                                                    //check if one new row was updated
	    	                                        if($statement->rowCount() == 1){
	    	                                            $_SESSION['agentReactivated'] = "<h3>The agent was succesfully reactivated</h3>";
	                                               }  
                                                    
                                                 }catch (PDOException $ex){
                                                $result = "An error occurred: ".$ex->getMessage();
                                        }
    
    
    

    

                                        
                                        
        

    
}

if(isset($_POST['ignoreBtn'])) { echo "
    <script> 
        window.location.replace('http://demoprojects.relocation.co.za/workbench.php?id=4');
    </script>";
}
?>

<center><h3 class="box-title" style="margin-top:10%">You are about to reactivate</h3></center>
<br><br>


<container>


                                                            <center><h4>
                                                     
                                                            <?php if(isset($agent)) echo $agent;?> from
                                                            
                                                            <?php if(isset($country)) echo $country;?>,
                                                            
                                                            <?php if(isset($province)) echo $province;?>,
                                                            
                                                            <?php if(isset($town)) echo $town;?>,
                                                            
                                                            <?php if(isset($area)) echo $area;?>, with Coordinates:
                                                            
                                                            <?php if(isset($lat)) echo $lat;?>,
                                                            
                                                            <?php if(isset($lng)) echo $lng;?>.<br>
                                                            
                                                            The Cellnumber for the agent is: 
                                                            
                                                            <?php if(isset($cell)) echo $cell;?> and the email is: 
                                                            
                                                            <?php if(isset($aemail)) echo $aemail;?>
                                                        
                                                        </h4>
                                                        
                                                        <form action="" method="post">    
                                                            
                                                                <h3> Are you sure you want to reactivate <?php echo $agent;?></h3><br><br><br><br>
                                                                <input type="submit" id="reactivateAgentBtn" name="reactivateAgentBtn" value="Reactivate <?php echo $agent;?>">
                                                                
                                                                <br><br><br><br>
                                                                
                                                                <input type="submit" id="ignoreBtn" name="ignoreBtn" value="Ignore this Request">
                                                            </center>
                                                        </form>
                                                
</container>



<?php
    if(isset($_SESSION['agentReactivated'])) {     
    
            echo $_SESSION['agentReactivated'];
    
    unset($_SESSION['agentReactivated']);
    

header('Refresh: 2; URL=http://demoprojects.relocation.co.za/workbench.php?id=4');
}


?>



            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->