          <!-- TO DO List -->
          <div class="box box-primary" style="height:900px;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->


<h3 class="box-title">All Archived partners marked as suspended or active</h3>
<br><br>

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
                <center><th>Country</th></center>
                <center><th>Province</th></center>
                <center><th>Town</th></center>
                <center><th>Area</th></center>
                <center><th>Lat</th></center>
                <center><th>Lng</th></center>
                <center><th>Agent</th></center>
                <center><th>Cell</th></center>
                <center><th>Email</th></center>
                <center><th>Edit</th></center>
                <center><th>Reactivate</th></center>
            </tr>
        </thead>
        <tbody>
            
            

            
         <?php
    $active = 0;  

    //COUNT HOW MANY USERS NEED TO BE DISPLAYED
    $sqlQuery = "SELECT count(*) from agents WHERE active = $active";
    $result = $db->prepare($sqlQuery); 
    $result->execute(array(':active' => $active)); 
    $agentInfo = $result->fetchColumn();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//NOW THAT THERE IS ONE OR MORE AGENTS LISTED FETCH DETAILS FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                 


        if(isset($agentInfo)) {
 
                                $agentInfoQuery = "
         
                                    SELECT
                                        agents.agentID,
                                        agents.country,
                                        agents.province,
                                        agents.town,
                                        agents.area,
                                        agents.agentName,
                                        agents.cell,
                                        agents.email,
                                        agents.lat,
                                        agents.lng
                                    FROM
                                        agents
                                    WHERE
                                        agents.active = $active
                                    ORDER BY agents.country DESC, agents.province, agents.town, agents.area, agents.agentname ASC
                                ";
                         
                                $agentsInfo = $db->query($agentInfoQuery)->fetchAll();
    
    //var_dump($agentsInfo);                            
               
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//START FOR EACH LOOP - BUILD FILES FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                             

            foreach($agentsInfo as $agentsInfo):
                
                                                                        $agentsInfoID = $agentsInfo['agentID'];
                                                        
                                                        
                                                                        //THIS WILL RETREIVE THE INFO TO POPULATE THE AGENTCARD IN QUESTION
                                                                        $getagentQuery = "
                                                                                                                        
                                                                                            SELECT 
                                                                                                    agents.agentID,
                                                                                                    agents.country,
                                                                                                    agents.province,
                                                                                                    agents.town,
                                                                                                    agents.area,
                                                                                                    agents.agentName,
                                                                                                    agents.cell,
                                                                                                    agents.email,
                                                                                                    agents.lat,
                                                                                                    agents.lng
                                                                                            FROM
                                                                                                agents
                                                                                            WHERE
                                                                                                agents.agentID = $agentsInfoID AND agents.active = $active
                                                                                        ";
                                                                                        
                                                                                        $getagent = $db->query($getagentQuery);
    //var_dump($getagentStep1);                                    
                                                                                                            foreach($getagent->fetchAll() as $getagent):

                                                                                                              $email = $getagent['email'];
                                                                                                            $lat = $getagent['lat'];
                                                                                                            $lng = $getagent['lng'];
                                                                                                            
                                                                                                            endforeach;
/////////////////////////////////////////// 
					
?>

        <tr>
            <td><?php echo $country;?></td>
            <td><?php echo $province;?></td>
            <td><?php echo $town;?></td>
            <td><?php echo $area;?></td>
            <td><?php echo $lat;?></td>
            <td><?php echo $lng;?></td>
            <td><?php echo $agent;?></td>
            <td><?php echo '<a href="tel:' . $cell . '" style="text-decoration:none; color:green">' . $cell . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $email . '" style="color:green">' . $email . '</a>';?></td>
            <?php echo '<td><center><div class="redirect"><a href="/editArchives.php?id=' . $agentID . '"<i class="fa fa-edit"></i></div></center></td>';?>
            <?php echo '<td><center><div class="redirect"><a href="/reinstateAgent.php?id=' . $agentID . '"<i class="fa fa-user-plus"></i></div></center></td>';?>
            
            
            
            
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
            </tr>
        </tfoot>
       
    </table>

        </div>

        <content >
            <center>
                <h4 style="padding:25px">
                    Headoffice: <br><br>
                    Tel: <a href="tel:+27647556332">+27 (64) 755 6332</a> <br><br>
                    Email: <a href="mailto:info@fitgen.co.za">info@fitgen.co.za</a>
                </h4>
            </center>
        </content>




            </div>
            <!-- /.box-header -->


          </div>
          <!-- /.box -->





