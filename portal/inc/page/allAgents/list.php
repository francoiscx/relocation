<?php
include_once 'inc/required/utilities.php';
include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
  
  


<!-- TO DO List -->
          <div class="box" style="height:50px; box-primary">
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
                <th>Area</th>
                <th>Town</th>
                <th>Province</th>
                <th>Country</th>
                <th>Agent</th>
                <th>Cell</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            

            
         <?php
    $active = 1;  

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

                                                                                                            $agent = $getagent['agentName'];
                                                                                                            $province = $getagent['province'];
                                                                                                            $country = $getagent['country'];
                                                                                                            $town = $getagent['town'];
                                                                                                            $area = $getagent['area'];
                                                                                                            $cell = $getagent['cell'];
                                                                                                            $email = $getagent['email'];
                                                                                                            $lat = $getagent['lat'];
                                                                                                            $lng = $getagent['lng'];
                                                                                                            
                                                                                                            endforeach;
/////////////////////////////////////////// 
					
?>

        <tr>
            <td><?php echo $area;?></td>
            <td><?php echo $town;?></td>
            <td><?php echo $province;?></td>
            <td><?php echo $country;?></td>
            <td><?php echo $agent;?></td>
            <td><?php echo '<a href="tel:' . $cell . '" style="text-decoration:none; color:#82b834">' . $cell . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $email . '" style="color:#82b834">' . $email . '</a>';?></td>
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

<br><br>

        </content>

            </div>
            <!-- /.box-header -->


          </div>
          <!-- /.box -->



        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>



<script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#agentlist').DataTable({
        responsive: true
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>


<script>
    $(document).ready( function () {
    $('#table_id').DataTable({
       rowReorder: {
           selector: 'td:nth-child(2)'
       },
       responsive: true
   });
} );
</script>

