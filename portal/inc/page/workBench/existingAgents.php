          <!-- TO DO List -->
          <div class="box box-primary" style="height:9000px;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->


<h3 class="box-title">All active partners marked as suspended or live</h3><br><br>


  <style>
  
    a.fa.fa-user-times {
        color: crimson;
    }
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
                <center><th>Company</th></center>
                <center><th>Reg #</th></center>
                <center><th>Contact</th></center>
                <center><th>Contact Number</th></center>
                <center><th>Email</th></center>
                <center><th>Notify Email</th></center>
                <center><th>Edit</th></center>
                <center><th>Remove</th></center>
                <center><th>Logo</th></center>

                <center><th>Residential</th></center>
                <center><th>Commercial</th></center>
                <center><th>International</th></center>
                <center><th>Storage Serives</th></center>
                <center><th>Pet Transport</th></center>
                <center><th>Car Tranport</th></center>
                <center><th>Courier Services</th></center>
                <center><th>Shuttle Services</th></center>
                <center><th>Cleaning Services</th></center>
                <center><th>Wrapping Services</th></center>
                <center><th>Packing Services</th></center>
                <center><th>Insurance</th></center>
            
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
                                        companyNumber,
                                        email,
                                        emailnotify,
                                        residential,
                                        commercial,
                                        international,
                                        storage,
                                        pet,
                                        car,
                                        courier,
                                        shuttle,
                                        cleaning,
                                        wrapping,
                                        packing,
                                        insurance
                                    FROM
                                        service_providers
                                    WHERE
                                        active = $active
                                    ORDER BY companyName DESC, companyRegistrationNumber, title, firstname, lastname ASC
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
                                                                emailnotify,
                                                                residential,
                                                                commercial,
                                                                international,
                                                                storage,
                                                                pet,
                                                                car,
                                                                courier,
                                                                shuttle,
                                                                cleaning,
                                                                wrapping,
                                                                packing,
                                                                insurance
                                                        FROM
                                                            service_providers
                                                        WHERE
                                                            serviceProviderID = $agentsInfoID AND active = $active
                                                    ";
                                                    
                                                    $getagent = $db->query($getagentQuery);
//var_dump($getagentStep1);                                    
                                                        foreach($getagent->fetchAll() as $getagent):

                                                        $serviceProviderID = $getagent['serviceProviderID'];                                                                                                  $companyRegistrationNumber = $getagent['companyRegistrationNumber'];
                                                        $companyName = $getagent['companyName'];
                                                        $title = $getagent['title'];
                                                        $firstname = $getagent['firstname'];
                                                        $lastname = $getagent['lastname'];
                                                        $companyNumber = $getagent['companyNumber'];
                                                        $email = $getagent['email']; 
                                                        $emailnotify = $getagent['emailnotify'];       
                                                        $residential = $getagent['residential'];  
                                                        $commercial = $getagent['commercial'];  
                                                        $international = $getagent['international'];  
                                                        $storage = $getagent['storage'];  
                                                        $pet = $getagent['pet'];  
                                                        $car = $getagent['car'];  
                                                        $courier = $getagent['courier'];  
                                                        $shuttle = $getagent['shuttle'];  
                                                        $cleaning = $getagent['cleaning'];  
                                                        $wrapping = $getagent['wrapping'];  
                                                        $packing = $getagent['packing'];  
                                                        $insurance = $getagent['insurance'];                                                                                                    
                                                        
                                                        endforeach;
/////////////////////////////////////////// 
					
?>

        <tr>
            <td><?php echo $companyName;?></td>
            <td><?php echo $companyRegistrationNumber;?></td>
            <td><?php echo $title . ' ' . $firstname . ' ' . $lastname;?></td>
            <td><?php echo '<a href="tel:' . $companyNumber . '" style="text-decoration:none; color:green">' . $companyNumber . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $email . '" style="color:green">' . $email . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $emailnotify . '" style="color:green">' . $emailnotify . '</a>';?></td>
            <td><?php echo '<br><br><center><div class="redirect"><a href="../portal/jobCard.php?id=' . $serviceProviderID . '"<span style="color:orange"><i class="fa fa-edit"></i></span></div></center>';?></td>
            <td><?php echo '<br><br><center><div class="redirect"><a href="../portal/archiveAgent.php?id=' . $serviceProviderID . '"<i class="fa fa-user-times"></i></div></center>';?></td>
            <td><?php echo '<br><br><center><div class="redirect"><a href="../portal/uploadLogo.php?id=' . $serviceProviderID . '"<span style="color:orange"><i class="fa fa-picture-o"></i></span></div></center>';?></td>
             
            <td><?php if(isset($residential) && ($residential == 1)) {echo '<br><br><span style="display:none">Residential</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($commercial) && ($commercial == 1)) {echo '<br><br><span style="display:none">Commercial</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($international) && ($international == 1)) {echo '<br><br><span style="display:none">International</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($storage) && ($storage == 1)) {echo '<br><br><span style="display:none">Storage</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($pet) && ($pet == 1)) {echo '<br><br><span style="display:none">Pet Transport</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($car) && ($car == 1)) {echo '<br><br><span style="display:none">Car Transport</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($courier) && ($courier == 1)) {echo '<br><br><span style="display:none">Courier Services</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($shuttle) && ($shuttle == 1)) {echo '<br><br><span style="display:none">Shuttle Services</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($cleaning) && ($cleaning == 1)) {echo '<br><br><span style="display:none">Cleaning Services</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($wrapping) && ($wrapping == 1)) {echo '<br><br><span style="display:none">Wrapping Services</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($packing) && ($packing == 1)) {echo '<br><br><span style="display:none">Residential</span>Packing Services<center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
            <td><?php if(isset($insurance) && ($insurance == 1)) {echo '<br><br><span style="display:none">Insurance</span><center style="color:green"><i class="fa fa-check"></i></center><br><br>';} else {echo '<br><br><center style="color:crimson"><i class="fa fa-times"></i></center><br><br>';}?></td>
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
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
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



    </div>
    <!-- /.box-header -->


</div>
<!-- /.box -->





<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>