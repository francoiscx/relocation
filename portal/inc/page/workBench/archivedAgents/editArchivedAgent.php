 <?php
include_once '/home/erasmusm/fitgen.allapps.co.za/inc/required/utilities.php';
include_once '/home/erasmusm/fitgen.allapps.co.za/inc/required/sessions.php';
include_once '/home/erasmusm/fitgen.allapps.co.za/inc/required/database.php';

if(!isset($_SESSION['userID'])) {header("Location: http://demoprojects.relocation.co.za/logout.php");
} else {

    if(isset($_POST['updateAgentCountry']) || isset($_SESSION['country'])) {
            if(isset($_POST['updateAgentCountry'])) {
                $_SESSION['country'] = $_POST['updateAgentCountry'];
       } else {
           if(isset($_SESSION['country'])){
            
            }
       }
    }
    
    if(isset($_POST['updateAgentProvince']) || isset($_SESSION['province'])) {
            if(isset($_POST['updateAgentProvince'])) {
                $_SESSION['province'] = $_POST['updateAgentProvince'];
       } else {
            if(isset($_SESSION['province'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentTown']) || isset($_SESSION['town'])) {
            if(isset($_POST['updateAgentTown'])) {
                $_SESSION['town'] = $_POST['updateAgentTown'];
       } else {
            if(isset($_SESSION['town'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentArea']) || isset($_SESSION['area'])) {
            if(isset($_POST['updateAgentArea'])) {
                $_SESSION['area'] = $_POST['updateAgentArea'];
       } else {
            if(isset($_SESSION['area'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentlat']) || isset($_SESSION['lat'])) {
            if(isset($_POST['updateAgentlat'])) {
                $_SESSION['lat'] = $_POST['updateAgentlat'];
       } else {
            if(isset($_SESSION['lat'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentlng']) || isset($_SESSION['lng'])) {
            if(isset($_POST['updateAgentlng'])) {
                $_SESSION['lng'] = $_POST['updateAgentlng'];
       } else {
            if(isset($_SESSION['lng'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentName']) || isset($_SESSION['agent'])) {
            if(isset($_POST['updateAgentName'])) {
                $_SESSION['agent'] = $_POST['updateAgentName'];
       } else {
            if(isset($_SESSION['agent'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentCell']) || isset($_SESSION['cell'])) {
            if(isset($_POST['updateAgentCell'])) {
                $_SESSION['cell'] = $_POST['updateAgentCell'];
       } else {
            if(isset($_SESSION['cell'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentEmail']) || isset($_SESSION['aemail'])) {
            if(isset($_POST['updateAgentEmail'])) {
                $_SESSION['aemail'] = $_POST['updateAgentEmail'];
       } else {
            if(isset($_SESSION['aemail'])){
            }
       }
    }
}

?>



<style>
input#updateagentBtn {
    background: #83B63E;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}
</style>

<!-- TO DO List -->
          <div class="box" style="height:900px; box-primary">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->



<?php

$agentID = $_GET['id']; 

    $active = 0;  

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

<h3 class="box-title">Ensure that all details for the archived agent is provided. <br>Editing this wil not reinstae the agent.</h3>
<br><br>



            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->






<?php




if(isset($_POST['updateAgentCountry']) || isset($_SESSION['country'])) {
        if(isset($_SESSION['country'])){
   } else {
        if(isset($_POST['updateAgentCountry'])) {
            $_SESSION['country'] = $_POST['updateAgentCountry'];
        }
   }
}

if(isset($_POST['updateAgentProvince']) || isset($_SESSION['province'])) {
        if(isset($_SESSION['province'])){
   } else {
        if(isset($_POST['updateAgentProvince'])) {
            $_SESSION['province'] = $_POST['updateAgentProvince'];
        }
   }
}

if(isset($_POST['updateAgentTown']) || isset($_SESSION['town'])) {
        if(isset($_SESSION['town'])){
   } else {
        if(isset($_POST['updateAgentTown'])) {
            $_SESSION['town'] = $_POST['updateAgentTown'];
        }
   }
}

if(isset($_POST['updateAgentArea']) || isset($_SESSION['area'])) {
        if(isset($_SESSION['area'])){
   } else {
        if(isset($_POST['updateAgentArea'])) {
            $_SESSION['area'] = $_POST['updateAgentArea'];
        }
   }
}

if(isset($_POST['updateAgentlat']) || isset($_SESSION['lat'])) {
        if(isset($_SESSION['lat'])){
   } else {
        if(isset($_POST['updateAgentlat'])) {
            $_SESSION['lat'] = $_POST['updateAgentlat'];
        }
   }
}

if(isset($_POST['updateAgentlng']) || isset($_SESSION['lng'])) {
        if(isset($_SESSION['lng'])){
   } else {
        if(isset($_POST['updateAgentlng'])) {
            $_SESSION['lng'] = $_POST['updateAgentlng'];
        }
   }
}

if(isset($_POST['updateAgentName']) || isset($_SESSION['agent'])) {
        if(isset($_SESSION['agent'])){
   } else {
        if(isset($_POST['updateAgentName'])) {
            $_SESSION['agent'] = $_POST['updateAgentName'];
        }
   }
}

if(isset($_POST['updateAgentCell']) || isset($_SESSION['cell'])) {
        if(isset($_SESSION['cell'])){
   } else {
        if(isset($_POST['updateAgentCell'])) {
            $_SESSION['cell'] = $_POST['updateAgentCell'];
        }
   }
}

if(isset($_POST['updateAgentEmail']) || isset($_SESSION['aemail'])) {
        if(isset($_SESSION['aemail'])){
   } else {
        if(isset($_POST['updateAgentEmail'])) {
            $_SESSION['aemail'] = $_POST['updateAgentEmail'];
        }
   }
}




if(isset($_POST['updateagentBtn'])) {



    if(isset($_SESSION['country']) && ($_SESSION['province']) && ($_SESSION['town']) && ($_SESSION['area']) && ($_SESSION['lat']) && ($_SESSION['lng']) && ($_SESSION['agent']) && ($_SESSION['cell']) && ($_SESSION['aemail'])){

        
    $country = $_SESSION['country'];
    $province = $_SESSION['province'];
    $town = $_SESSION['town'];
    $area = $_SESSION['area'];
    $lng = $_SESSION['lng'];
    $lat = $_SESSION['lat'];
    $agent = $_SESSION['agent'];
    $cell = $_SESSION['cell'];
    $aemail = $_SESSION['aemail'];

    
    
    
 /////////////UPDATE   
                                try{   
                                                    //SQL statement to update card
                                                    $sqlUpdate = "UPDATE agents SET agentName =:agent, country =:country, province =:province, town =:town, area =:area, lat =:lat, lng =:lng, cell =:cell, email =:aemail WHERE agentID =:agentID";
                                
                                                    //use PDO prepared to sanitize SQL statement
                                                    $statement = $db->prepare($sqlUpdate);
                                
                                                    //execute the statement
                                                    $statement->execute(array(':agent' => $agent, ':country' => $country, ':province' => $province, ':town' => $town, ':area' => $area, ':lat' => $lat, ':lng' => $lng, ':cell' => $cell, ':aemail' => $aemail, ':agentID' => $agentID));
                                                    
                                                    //check if one new row was updated
	    	                                        if($statement->rowCount() == 1){
	    	                                            $_SESSION['agentUpdated'] = "<h3>The agents details was succesfully updated</h3>";
	                                               }  
                                                    
                                                 }catch (PDOException $ex){
                                                $result = "An error occurred: ".$ex->getMessage();
                                        }
    
    
    

    

                                        
                                        
        
    } else {
        echo' <h3>All fields are required</h3>';
    }
    
}


?>

<container>


                                                        <form action="" method="post">
                                                     
                                                            <input type="text" name="updateAgentCountry" id="updateAgentCountry" class="form-control" value="<?php if(isset($country)) echo $country;?>" placeholder="Country" required>
                                                            
                                                            <input type="text" name="updateAgentProvince" id="updateAgentProvince" class="form-control" value="<?php if(isset($province)) echo $province;?>" placeholder="Province" required>
                                                            
                                                            <input type="text" name="updateAgentTown" id="updateAgentTown" class="form-control" value="<?php if(isset($town)) echo $town;?>" placeholder="Town" required>
                                                            
                                                            <input type="text" name="updateAgentArea" id="updateAgentArea" class="form-control" value="<?php if(isset($area)) echo $area;?>" placeholder="Area" required>
                                                            
                                                            <input type="text" name="updateAgentlat" id="updateAgentlat" class="form-control" value="<?php if(isset($lat)) echo $lat;?>" placeholder="Lat" required>
                                                            
                                                            <input type="text" name="updateAgentlng" id="updateAgentlng" class="form-control" value="<?php if(isset($lng)) echo $lng;?>" placeholder="Lng" required>
                                                            
                                                            <input type="text" name="updateAgentName" id="updateAgentName" class="form-control" value="<?php if(isset($agent)) echo $agent;?>" placeholder="Agent" required>
                                                            
                                                            <input type="text" name="updateAgentCell" id="updateAgentCell" class="form-control" value="<?php if(isset($cell)) echo $cell;?>" placeholder="Cell" required>
                                                            
                                                            <input type="text" name="updateAgentEmail" id="updateAgentEmail" class="form-control" value="<?php if(isset($aemail)) echo $aemail;?>" placeholder="Email" required>
                                                            
                                                            
                                                            
                                                            <input type="submit" id="updateagentBtn" name="updateagentBtn" value="Update Archived Agent" style="float:right;">
                                                            
                                                        </form>
                                                
</container>



<?php
    if(isset($_SESSION['agentUpdated'])) {     
    
            echo $_SESSION['agentUpdated'];
    
    unset($_SESSION['agentUpdated']);
    

header('Refresh: 2; URL=http://demoprojects.relocation.co.za/editArchives.php?id=4');
}


?>



            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->