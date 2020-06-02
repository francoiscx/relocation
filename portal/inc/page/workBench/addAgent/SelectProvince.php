<?php


if(!isset($_SESSION['country'])){

$userID = $_SESSION['userID'];
$accountID = $SESSION['accountID'];
$accountID = 1;
$country = $_SESSION['country'];
		
		//ONLY DISPLAY FOR accountID 1 (Fitgen) 
		/////////////////////////////////////////////////////
		//THIS PROCESS IS NOT BUILT FOR OTHER ACCOUNTS YET///
		/////////////////////////////////////////////////////
		
		if(isset($accountID) && ($accountID == 1)){
		    
		    //ON CLICK OF NEXT BUTTON
		    if(isset($_POST['country'])) {
                		        
                		        //PREVENT SUBMISSION OF EMPTY DATA
                		        if(($_POST['country'] != 0) || ($_POST['country'] != NULL)) {
                		            
                		            //GET VALUE SELECTED
                		            $countryID = $_POST['country'];
                                                $_SESSION['countryID'] = $countryID;
                
                                        //THIS WILL RETREIVE THE country NAME FROM ID THAT WAS SELECTED
                                        $countryQuery = "
                                                                        
                                            SELECT
                                                country.countryName,
                                                country.countryID
                                            FROM
                                                country
                                            WHERE
                                                country.countryID = $countryID;
                                                                        
                                        ";
                                        
                                        $country = $db->query($countryQuery);
                                        
                                                            foreach($country->fetchAll() as $country):
                                                            endforeach;
                                                            
                                                            $country = $country['countryName'];
                                                            $_SESSION['country'] = $country;
                                         
                		        }                   
    
} else {
    "";
}


            
//----------------------------------------------------------------------------------------
//[USERS]


                                                   
                        //THIS WILL RETREIVE ALL ASSOCIATED DATA TO POPULATE SELECTION
                        $companiesQuery = "
                                                        
                            SELECT
                                country.countryID,
                                country.countryName
                            FROM
                                country
                            WHERE
                                country.accountID = $accountID
                                                        
                        ";
                                                        
                        $companies = $db->query($companiesQuery);
                                                        
                            if(isset($_SESSION['country'])) {                   
                                                        
                                    if($_SESSION['countryID'] == 2)  {  
                                            
                                                $_SESSION['countryID'] = 2;
  
                                            } else {
                                            
                                                
                                            
                                        }
                                        //If SELECTION WAS MADE SHOW THIS
                                         ?>
                                                            
                                                            <textfield name="country" id="country" class="form-control" disabled value="<?php echo $_SESSION['countryID'];?>"><?php echo $_SESSION['country'];?></textfield>
                                                                
                                                            </select><form action="" method="post"><input type="submit" name="countryResetBtn" value="Reset" class="btn btn-block btn-danger" style="float:right;margin:-34px 0px;; width:65px"></form>
                                                            
                                        <?php
                                                    } else {
                                                     //IF NO SELECTION IS MADE YET SHOW THIS
                                        ;?>
                                                    
                                                        <form action="" method="post">
                                                            
                                                            <select name="country" id="country" class="form-control">
                                                                <option value="" selected>Select a Country</option>
                                                                <?php foreach($companies->fetchAll() as $companies): ?>
                                                                    <option value="<?php echo $companies['countryID']; ?>"><?php echo $companies['countryName']; ?></option>
                                                                <?php endforeach; ?>
                                                                
                                                            </select> 
                                                            
                                                            <input type="submit" id="countryBtn" value="Next" class="btn btn-block btn-success" style="float:right; width: 65px;">
                                                            
                                                        </form>
                                                        
                                                        
                                                        <?php
                                                        }
                                                        

} else {
    
    echo "An error occured";

    }

}
?>	



