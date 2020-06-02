          <!-- TO DO List -->
          <div class="box" style="height:900px; ">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->



<br><br>

  <style>
      .dataTables_wrapper .dataTables_filter input {
    background: #f0f0f0;
    }

    select {
    background: #f0f0f0;
    }

  </style>

      
  <table id="agentlist" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Company</th>
                <th>Reg #</th>
                <th>City</th>
                <!-- <th>Country</th> -->
                <th>Rep</th>
                <th>Number</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        

            
         <?php
    $active = 1;  

    //COUNT HOW MANY USERS NEED TO BE DISPLAYED
    $sqlQuery = "SELECT count(*) from service_providers WHERE active = $active";
    $result = $db->prepare($sqlQuery); 
    $result->execute(array(':active' => $active)); 
    $agentInfo = $result->fetchColumn();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//NOW THAT THERE IS ONE OR MORE AGENTS LISTED FETCH DETAILS FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                 

        if(isset($agentInfo)) {
 
                                $agentInfoQuery = "
                                    SELECT
                                    serviceProviderID,
                                    companyName,
                                    companyRegistrationNumber,
                                    title,
                                    firstname,
                                    lastname,
                                    firstname,
                                    email,
                                    townCity,
                                    services
                                    FROM
                                    service_providers
                                    WHERE
                                    active = $active
                                    ORDER BY townCity DESC, firstname, lastname ASC
                                ";
                         
                                $agentsInfo = $db->query($agentInfoQuery)->fetchAll();
    
    //var_dump($agentsInfo);                            
               
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//START FOR EACH LOOP - BUILD FILES FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////         

            foreach($agentsInfo as $agentsInfo):
                
                                            $agentsInfoID = $agentsInfo['serviceProviderID'];
                            
                                            //THIS WILL RETREIVE THE INFO TO POPULATE THE AGENTCARD IN QUESTION
                                            $getagentQuery = "
                                                                                            
                                                                SELECT 
                                                                serviceProviderID,
                                                                companyName,
                                                                companyRegistrationNumber,
                                                                title,
                                                                firstname,
                                                                lastname,
                                                                companyNumber,
                                                                email,
                                                                townCity,
                                                                services
                                                                FROM
                                                                    service_providers
                                                                WHERE
                                                                    serviceProviderID = $agentsInfoID AND active = 1
                                                            ";
                                                            
                                                            $getagent = $db->query($getagentQuery);
                                    
                                                                                foreach($getagent->fetchAll() as $getagent):

                                                                                $providerID = $getagent['serviceProviderID'];
                                                                                $company = $getagent['companyName'];
                                                                                $companyReg = $getagent['companyRegistrationNumber'];
                                                                                $title = $getagent['title'];
                                                                                $name = $getagent['firstname'];
                                                                                $surname = $getagent['lastname'];
                                                                                $number = $getagent['companyNumber'];
                                                                                $email = $getagent['email'];
                                                                                $city = $getagent['townCity'];
                                                                                $services = $getagent['services'];
                                                                                
                                                                                endforeach;
/////////////////////////////////////////// 
					
?>

        <tr>
            <td><?php echo $company;?></td>
            <td><?php echo $companyReg;?></td>
            <td><?php echo $city;?></td>
            <td><?php echo $title . " " . $name . " " . $surname;?></td>
            <td><?php echo '<a href="tel:' . $number . '" style="text-decoration:none; color:#crimson">' . $number . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $email . '" style="color:#crimson">' . $email . '</a>';?></td>
        </tr>        
<?php
            endforeach;
        }
?>

        
        </tbody>


        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
       
    </table>

        </div>

        <content >
            <center>
                <h4 style="padding:25px">

                </h4>
            </center>
        </content>





            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->





            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->




