          <!-- TO DO List -->
          <div class="box" style="height:900px; ">

          <h1 style="margin-left: 20px">New Partner Applications</h1>
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
                <th>Reg#</th>
                <th>Province</th>
                <th>City</th>
                <th>Rep</th>
                <th>Number</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        

            
         <?php
    $new = 1;  

    //COUNT HOW MANY USERS NEED TO BE DISPLAYED
    $sqlQuery = "SELECT count(*) from service_providers WHERE new = $new";
    $result = $db->prepare($sqlQuery); 
    $result->execute(array(':new' => $new)); 
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
                                    services,
                                    suspended
                                    FROM
                                    service_providers
                                    WHERE
                                    new = $new
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
                                        province,
                                        services,
                                        suspended
                                        FROM
                                            service_providers
                                        WHERE
                                            serviceProviderID = $agentsInfoID AND new = 1
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
                                                            $province = $getagent['province'];
                                                            $services = $getagent['services'];
                                                            $suspended = $getagent['suspended'];
                                                        
                                                        endforeach;
/////////////////////////////////////////// 
					
?>
        <tr>
            <td><?php echo $company;?></td>
            <td><?php echo $companyReg;?></td>
            <td><?php echo $province;?></td>
            <td><?php echo $city;?></td>
            <td><?php echo $title . " " . $name . " " . $surname;?></td>
            <td><?php echo '<a href="tel:' . $number . '" style="text-decoration:none; color:#crimson">' . $number . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $email . '" style="color:#crimson">' . $email . '</a>';?></td>
            <td><?php if($suspended == 0 ){echo '<span style="color:crimson">Pending Review</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;<a href="#" onclick="location=\'./review.php?id=' . $providerID . '\'"><span style="color:green"><b>Review</b></span></a>';}?></td>
        </tr>        
<?php
            endforeach;
        } else {
            echo "There does not seem to be any new applications at this time.";
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



<script>
function toggle(id){
    alert('You are about to change the status of this partner!');    
    var toggle = id;

   $.ajax({
        url: 'toggle.php',
        timeout:30000,
        type: "POST",
        data: {"toggle": toggle},
        success : function(msg) {
        // alert(JSON.stringify(msg));
                if (msg == 'The partner was reactivated!')
                {
                    alert('Success, The partner was reactivated!');
                    location.reload();    
                } else if (msg == 'The partner was suspended!')
                {
                    alert('Success, The partner was suspended!');
                    location.reload();    
                }
            },
        error: function(jqXHR, textStatus)
        {
           alert('Error Occured'); //MESSAGE
        }
     });
 }
</script>
