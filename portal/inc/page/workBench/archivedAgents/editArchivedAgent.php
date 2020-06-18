<?php
include_once '../inc/required/utilities.php';
include_once '../inc/required/sessions.php';
include_once '../inc/required/database.php';

if(!isset($_SESSION['userID'])) {header("Location: http://demoprojects.relocation.co.za/logout.php");
} else {

    if(isset($_POST['updateAgentCompanyName']) || isset($_SESSION['companyName'])) {
            if(isset($_POST['updateAgentCompanyName'])) {
                $_SESSION['companyName'] = $_POST['updateAgentCompanyName'];
       } else {
           if(isset($_SESSION['companyName'])){
            
            }
       }
    }
    
    if(isset($_POST['updateAgentCompanyRegistrationNumber']) || isset($_SESSION['companyRegistrationNumber'])) {
            if(isset($_POST['updateAgentCompanyRegistrationNumber'])) {
                $_SESSION['companyRegistrationNumber'] = $_POST['updateAgentCompanyRegistrationNumber'];
       } else {
            if(isset($_SESSION['companyRegistrationNumber'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentTitle']) || isset($_SESSION['title'])) {
            if(isset($_POST['updateAgentTitle'])) {
                $_SESSION['title'] = $_POST['updateAgentTitle'];
       } else {
            if(isset($_SESSION['title'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentFirstname']) || isset($_SESSION['firstname'])) {
            if(isset($_POST['updateAgentFirstname'])) {
                $_SESSION['firstname'] = $_POST['updateAgentFirstname'];
       } else {
            if(isset($_SESSION['firstname'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentLastname']) || isset($_SESSION['lastname'])) {
            if(isset($_POST['updateAgentLastname'])) {
                $_SESSION['lastname'] = $_POST['updateAgentLastname'];
       } else {
            if(isset($_SESSION['lastname'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentCompanyNumber']) || isset($_SESSION['companyNumber'])) {
            if(isset($_POST['updateAgentCompanyNumber'])) {
                $_SESSION['companyNumber'] = $_POST['updateAgentCompanyNumber'];
       } else {
            if(isset($_SESSION['companyNumber'])){
            }
       }
    }
    
    if(isset($_POST['updateAgentEmailnotify']) || isset($_SESSION['emailnotify'])) {
            if(isset($_POST['updateAgentEmailnotify'])) {
                $_SESSION['emailnotify'] = $_POST['updateAgentEmailnotify'];
       } else {
            if(isset($_SESSION['emailnotify'])){
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
    
    if(isset($_POST['updateAgentEmail']) || isset($_SESSION['aemail'])) {
            if(isset($_POST['updateAgentEmail'])) {
                $_SESSION['aemail'] = $_POST['updateAgentEmail'];
       } else {
            if(isset($_SESSION['aemail'])){
            }
       }
    }


    if(isset($_POST['updateAgentAddresss']) || isset($_SESSION['addresss'])) {
        if(isset($_POST['updateAgentAddresss'])) {
            $_SESSION['addresss'] = $_POST['updateAgentAddresss'];
   } else {
        if(isset($_SESSION['addresss'])){
        }
   }
}

if(isset($_POST['updateAgentSuburb']) || isset($_SESSION['suburb'])) {
    if(isset($_POST['updateAgentSuburb'])) {
        $_SESSION['suburb'] = $_POST['updateAgentSuburb'];
} else {
    if(isset($_SESSION['suburb'])){
    }
}
}

if(isset($_POST['updateAgentTownCity']) || isset($_SESSION['townCity'])) {
    if(isset($_POST['updateAgentTownCity'])) {
        $_SESSION['townCity'] = $_POST['updateAgentTownCity'];
} else {
    if(isset($_SESSION['townCity'])){
    }
}
}

if(isset($_POST['updateAgentPostalCode']) || isset($_SESSION['postalCode'])) {
    if(isset($_POST['updateAgentPostalCode'])) {
        $_SESSION['postalCode'] = $_POST['updateAgentPostalCode'];
} else {
    if(isset($_SESSION['postalCode'])){
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

input#asIsBtn {
    background: orange;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}
</style>

<style>


.btn:not(:disabled):not(.disabled) {
  background-color: rgb(191,56,56);
  color: white;
  padding: 5px 37px;
  border: solid 1px rgb(191,56,56);
  border-radius: 24px;
}

</style>   




        <!-- TO DO List -->
          <div class="box box-primary" style="height:900px;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->



<?php

$serviceProviderID = $_GET['id']; 


    $active = 1;  

    $stmt = $db->prepare('SELECT * FROM service_providers WHERE serviceProviderID=?');
    $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if( ! $row) {
            die('Nothing found');
    } else {
        
            $companyName = $row['companyName'];
            $companyRegistrationNumber = $row['companyRegistrationNumber'];
            $title = $row['title'];
            $firstname = $row['firstname'];
            $companyNumber = $row['companyNumber'];
            $lastname = $row['lastname'];
            $emailnotify = $row['emailnotify'];
            $province = $row['province'];
            $aemail = $row['email'];
            $addresss = $row['addresss'];
            $suburb = $row['suburb'];
            $province = $row['province'];
            $townCity = $row['townCity'];
            $postalCode = $row['postalCode'];
            $app_services = $row['services'];
            $_SESSION['app_services'] = $app_services;
    }
    
    ?>

<h3 class="box-title">Ensure that all details for the archived partner is provided. <br>Editing this wil not reinstate the partner.</h3>
<br><br>




</div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->






<?php




if(isset($_POST['updateAgentCompanyName']) || isset($_SESSION['companyName'])) {
    if(isset($_POST['updateAgentCompanyName'])) {
        $_SESSION['companyName'] = $_POST['updateAgentCompanyName'];
   } else {
    if(isset($_SESSION['companyName'])){
        }
   }
}

if(isset($_POST['updateAgentCompanyRegistrationNumber']) || isset($_SESSION['companyRegistrationNumber'])) {
    if(isset($_POST['updateAgentCompanyRegistrationNumber'])) {
        $_SESSION['companyRegistrationNumber'] = $_POST['updateAgentCompanyRegistrationNumber'];
   } else {
    if(isset($_SESSION['companyRegistrationNumber'])){
        }
   }
}

if(isset($_POST['updateAgentTitle']) || isset($_SESSION['title'])) {
    if(isset($_POST['updateAgentTitle'])) {
        $_SESSION['title'] = $_POST['updateAgentTitle'];
   } else {
    if(isset($_SESSION['title'])){
        }
   }
}

if(isset($_POST['updateAgentFirstname']) || isset($_SESSION['firstname'])) {
    if(isset($_POST['updateAgentFirstname'])) {
        $_SESSION['firstname'] = $_POST['updateAgentFirstname'];
   } else {
    if(isset($_SESSION['firstname'])){
        }
   }
}

if(isset($_POST['updateAgentLastname']) || isset($_SESSION['lastname'])) {
    if(isset($_POST['updateAgentLastname'])) {
        $_SESSION['lastname'] = $_POST['updateAgentLastname'];
            $_SESSION['lastname'] = $_POST['updateAgentLastname'];if(isset($_SESSION['lastname'])){
   } else {
    if(isset($_POST['updateAgentLastname'])) {
        }
   }
}
}

if(isset($_POST['updateAgentCompanyNumber']) || isset($_SESSION['companyNumber'])) {
    if(isset($_POST['updateAgentCompanyNumber'])) {
        $_SESSION['companyNumber'] = $_POST['updateAgentCompanyNumber'];
   } else {
    if(isset($_SESSION['companyNumber'])){
        }
   }
}

if(isset($_POST['updateAgentEmailnotify']) || isset($_SESSION['emailnotify'])) {
    if(isset($_POST['updateAgentEmailnotify'])) {
        $_SESSION['emailnotify'] = $_POST['updateAgentEmailnotify'];
   } else {
    if(isset($_SESSION['emailnotify'])){
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

if(isset($_POST['updateAgentEmail']) || isset($_SESSION['aemail'])) {
    if(isset($_POST['updateAgentEmail'])) {
        $_SESSION['aemail'] = $_POST['updateAgentEmail'];
   } else {
    if(isset($_SESSION['aemail'])){
        }
   }
}

if(isset($_POST['updateAgentAddresss']) || isset($_SESSION['addresss'])) {
    if(isset($_POST['updateAgentAddresss'])) {
        $_SESSION['addresss'] = $_POST['updateAgentAddresss'];
   } else {
    if(isset($_SESSION['addresss'])){
        }
   }
}

if(isset($_POST['updateAgentSuburb']) || isset($_SESSION['suburb'])) {
    if(isset($_POST['updateAgentSuburb'])) {
        $_SESSION['suburb'] = $_POST['updateAgentSuburb'];
} else {
    if(isset($_SESSION['suburb'])){
    }
}
}

if(isset($_POST['updateAgentTownCity']) || isset($_SESSION['townCity'])) {
    if(isset($_POST['updateAgentTownCity'])) {
        $_SESSION['townCity'] = $_POST['updateAgentTownCity'];
} else {
    if(isset($_SESSION['townCity'])){
    }
}
}

if(isset($_POST['updateAgentPostalCode']) || isset($_SESSION['postalCode'])) {
    if(isset($_POST['updateAgentPostalCode'])) {
        $_SESSION['postalCode'] = $_POST['updateAgentPostalCode'];
} else {
    if(isset($_SESSION['postalCode'])){
    }
}
}

if(isset($_POST['sudo']) && ($_POST['sudo'] != "")) {
    $_SESSION['app_services'] = $_POST['sudo'];
    $app_services = $_SESSION['app_services'];
} else {
    $_SESSION['app_services'] == "";
    $app_services = $_SESSION['app_services'];
}
        


if(isset($_POST['updateagentBtn'])) {

    if(isset($_SESSION['companyName']) && ($_SESSION['companyRegistrationNumber']) && ($_SESSION['title']) && ($_SESSION['firstname']) && ($_SESSION['lastname']) && ($_SESSION['companyNumber']) && ($_SESSION['emailnotify']) && ($_SESSION['province']) && ($_SESSION['aemail']) && ($_SESSION['addresss']) && ($_SESSION['suburb']) && ($_SESSION['townCity']) && ($_SESSION['postalCode']) && $_SESSION['app_services']){

        
    $companyName = $_SESSION['companyName'];
    $companyRegistrationNumber = $_SESSION['companyRegistrationNumber'];
    $title = $_SESSION['title'];
    $firstname = $_SESSION['firstname'];
    $companyNumber = $_SESSION['companyNumber'];
    $lastname = $_SESSION['lastname'];
    $emailnotify = $_SESSION['emailnotify'];
    $province = $_SESSION['province'];
    $aemail = $_SESSION['aemail'];
    $addresss = $_SESSION['addresss'];
    $suburb = $_SESSION['suburb'];
    $townCity = $_SESSION['townCity'];
    $postalCode = $_SESSION['postalCode'];

    $app_services = $_SESSION['app_services'];

    $a = $app_services;

        if (strpos($a, 'Residential') !== false) {
            $residential = 1;
        }

        if (strpos($a, 'Commercial') !== false) {
            $commercial = 1;
        }

        if (strpos($a, 'International') !== false) {
            $international = 1;
        }

        if (strpos($a, 'Storage') !== false) {
            $storage = 1;
        }

        if (strpos($a, 'Pet') !== false) {
            $pet = 1;
        }

        if (strpos($a, 'Car') !== false) {
            $car = 1;
        }

        if (strpos($a, 'Transport') !== false) {
            $transport = 1;
        }

        if (strpos($a, 'Courier') !== false) {
            $courier = 1;
        }

        if (strpos($a, 'Shuttle') !== false) {
            $shuttle = 1;
        }

        if (strpos($a, 'Cleaning') !== false) {
            $cleaning = 1;
        }

        if (strpos($a, 'Wrapping') !== false) {
            $wrapping = 1;
        }
        
        if (strpos($a, 'Packing') !== false) {
            $packing = 1;
        }
        
        if (strpos($a, 'Insurance') !== false) {
            $insurance = 1;
        }       
          
            if(!isset($residential)) $residential = 0;
            if(!isset($commercial)) $commercial = 0;
            if(!isset($international)) $international = 0;
            if(!isset($storage)) $storage = 0;
            if(!isset($pet)) $pet = 0;
            if(!isset($car)) $car = 0;
            if(!isset($transport)) $transport = 0;
            if(!isset($courier)) $courier = 0;
            if(!isset($shuttle)) $shuttle = 0;
            if(!isset($cleaning)) $cleaning = 0;
            if(!isset($wrapping)) $wrapping = 0;
            if(!isset($packing)) $packing = 0;
            if(!isset($insurance)) $insurance = 0;

 /////////////UPDATE   
        try{ 
                        //SQL statement to update card
                        $sqlUpdate = "UPDATE service_providers SET emailnotify =:emailnotify, companyName =:companyName, companyRegistrationNumber =:companyRegistrationNumber, title =:title, firstname =:firstname, lastname =:lastname, companyNumber =:companyNumber, province =:province, email =:aemail, addresss =:addresss, suburb =:suburb, townCity =:townCity, postalCode =:postalCode, services =:services, residential =:residential, commercial =:commercial, international =:international, storage =:storage, pet =:pet, car =:car, courier =:courier, shuttle =:shuttle, cleaning =:cleaning, wrapping =:wrapping, packing =:packing, insurance =:insurance WHERE serviceProviderID =:serviceProviderID";
    
                        //use PDO prepared to sanitize SQL statement
                        $statement = $db->prepare($sqlUpdate);
    
                        //execute the statement
                        $statement->execute(array(':emailnotify' => $emailnotify, ':companyName' => $companyName, ':companyRegistrationNumber' => $companyRegistrationNumber, ':title' => $title, ':firstname' => $firstname, ':lastname' => $lastname, ':companyNumber' => $companyNumber, ':province' => $province, ':aemail' => $aemail, ':addresss' => $addresss, ':suburb' => $suburb, ':townCity' => $townCity, ':postalCode' => $postalCode, ':services' => $app_services, ':residential' => $residential, ':commercial' => $commercial, ':international' => $international, ':storage' => $storage, ':pet' => $pet, ':car' => $car, ':courier' => $courier, ':shuttle' => $shuttle, ':cleaning' => $cleaning, ':wrapping' => $wrapping, ':packing' => $packing, ':insurance' => $insurance, ':serviceProviderID' => $serviceProviderID));
                        
                        //check if one new row was updated
                        if($statement->rowCount() == 1){
                            $_SESSION['agentUpdated'] = "<h3>The Partner details was succesfully updated</h3>";
                        }
                        
                        }catch (PDOException $ex){
                    $result = "An error occurred: ".$ex->getMessage();
                    echo $result;
            }
      
                                        
        
    } else {
        echo' <h3>All fields are required</h3>';
    }
    
}


?>

<container>


                                                        <form action="" method="post">
                                                     
                                                            <input type="text" name="updateAgentCompanyName" id="updateAgentCompanyName" class="form-control" value="<?php if(isset($companyName)) echo $companyName;?>" placeholder="Company Name" required>
                                                            
                                                            <input type="text" name="updateAgentCompanyRegistrationNumber" id="updateAgentCompanyRegistrationNumber" class="form-control" value="<?php if(isset($companyRegistrationNumber)) echo $companyRegistrationNumber;?>" placeholder="Company Reg #" required>
                                                            
                                                            <input type="text" name="updateAgentTitle" id="updateAgentTitle" class="form-control" value="<?php if(isset($title)) echo $title;?>" placeholder="Contact Title" required>
                                                            
                                                            <input type="text" name="updateAgentFirstname" id="updateAgentFirstname" class="form-control" value="<?php if(isset($firstname)) echo $firstname;?>" placeholder="Contact Firstname" required>
                                                            
                                                            <input type="text" name="updateAgentLastname" id="updateAgentLastname" class="form-control" value="<?php if(isset($lastname)) echo $lastname;?>" placeholder="Contact Surname" required>
                                                            
                                                            <input type="text" name="updateAgentCompanyNumber" id="updateAgentCompanyNumber" class="form-control" value="<?php if(isset($companyNumber)) echo $companyNumber;?>" placeholder="Company Contact Number" required>
                                                            
                                                            <input type="text" name="updateAgentEmail" id="updateAgentEmail" class="form-control" value="<?php if(isset($aemail)) echo $aemail;?>" placeholder="Email" required>
                                                            
                                                            <input type="text" name="updateAgentEmailnotify" id="updateAgentEmailnotify" class="form-control" value="<?php if(isset($emailnotify)) echo $emailnotify;?>" placeholder="Notifications Email" required>
                                                                                                                      
                                                            <input type="text" name="updateAgentAddresss" id="updateAgentAddresss" class="form-control" value="<?php if(isset($addresss)) echo $addresss;?>" placeholder="Company Address" required>

                                                            <input type="text" name="updateAgentSuburb" id="updateAgentSuburb" class="form-control" value="<?php if(isset($suburb)) echo $suburb;?>" placeholder="Company Suburb" required>

                                                            <input type="text" name="updateAgentTownCity" id="updateAgentTownCity" class="form-control" value="<?php if(isset($townCity)) echo $townCity;?>" placeholder="Company Town / City" required>
                                                            
                                                            <input type="text" name="updateAgentProvince" id="updateAgentProvince" class="form-control" value="<?php if(isset($province)) echo $province;?>" placeholder="Company Province" required>
                                                            
                                                            <input type="text" name="updateAgentPostalCode" id="updateAgentPostalCode" class="form-control" value="<?php if(isset($postalCode)) echo $postalCode;?>" placeholder="Company Postal Code" required>
                                                            <br><br>

                            <label style="float:left">Select the services you offer</label>
                            <select select multiple="true" class="selectpicker" id="services" name="services" multiple data-live-search="true">
                                <option>Residential</option>
                                <option>Commercial</option>
                                <option>International</option>
                                <option disabled></option>
                                <option>Storage</option>
                                <option>Pet Transport</option>
                                <option>Car Transport</option>
                                <option>Courier Services</option>
                                <option>Shuttle Services</option>
                                <option>Cleaning Services</option>
                                <option>Wrapping Services</option>
                                <option>Packing Services</option>
                                <option>Insurance</option>
                            </select>
                            <br><br><br><br>
                            <input type="hidden" id="sudo"  name="sudo" value="">
                                                            
                                                            <input type="submit" id="updateagentBtn" name="updateagentBtn" value="Update Partner Details" style="float:right">
                                                            <input type="submit" id="asIsBtn" name="asIsBtn" value="Cancel" style="float:right">
                                                            
                                                        </form>
                                                
</container>



                        <?php
                                if(isset($_SESSION['agentUpdated'])) {     
                                
                                echo $_SESSION['agentUpdated'];
                                    
                                    unset($_SESSION['agentUpdated']);
                                echo '<script>    
                                        window.location.href = "workbench.php?id=4";
                                    </script>';
                                }

                        ?>



            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

          <script>
                $(function() {
                    $('#services').change(function(e) {
                    var selected = $(e.target).val();
                    selected = selected.join("','");
                    window.selected = selected;
                    document.getElementById('sudo').value = "['" + selected + "']";
                    console.log (selected);
                    sudo = document.getElementById('sudo');
                    }); 
                });
            </script>


            <script>
                var value = <?php if(isset($_SESSION['app_services'])) {echo $_SESSION['app_services'];} else { echo"''";}?>,
                    el = document.getElementById("services");

                // value is the array.
                for (var j = 0; j < value.length; j++) {
                    for (var i = 0; i < el.length; i++) {
                        if (el[i].innerHTML == value[j]) {
                            el[i].selected = true;
                            //alert("option should be selected");
                        }
                    }
                }
            </script>
