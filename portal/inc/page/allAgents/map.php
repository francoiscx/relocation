<?php
include_once 'inc/required/utilities.php';
include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
?>




<style>

      #map {
        height: 580px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
    

    <!--The div element for the map -->
    <div id="map"></div>
    
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        
        
                                     
        var options = {
            zoom:5.8, 
            center:{lat: -28.8, lng: 22.5}
        }
        

        // New Map
        var map = new 
        google.maps.Map(document.getElementById('map'), options);

    //Add markers array
    var markers = [
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

                                                                                                            $agentID = $getagent['agentID'];
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
					

echo '
        {
        coords:{lat:' . $lat . ',lng:' . $lng . '},
        iconImage:\'https://fitgen.co.za/GreenPin.png\',
        content:\'<center><h2>' . $area . '</h2><p>' . $agent . '<br><br><a href="tel:' . $cell . '" style="color:#82b834">' . $cell .'</a><br><br><a href="' . $email . '" style="color:#82b834">' . $email . '</a></p></center>\'
        },

';
            endforeach;
        }
?>

        {
        coords:{lat:-26.0157469,lng:28.0979165},
        iconImage:'https://fitgen.co.za/GreenPin.png',
        content:'<Center><h2>Pretoria</h2><p>Head Office<br><br><a href="tel:+27647556332" style="color:#82b834">+27647556332</a><br><br><a href="mailto:info@fitgen.co.za" style="color:#82b834">info@fitgen.co.za</a></p></center>'
    }];    
    
    
    //Loop through markers
    for(var i = 0; i < markers.length; i++){
        addMarker(markers[i]);
    }
    
    //Add marker function
    function addMarker(props){
        //Add marker
        var marker = new google.maps.Marker({
            position:props.coords,
            map:map,
            //icon:props.iconImage
        });  
        
        //Check for custom icon 
        if(props.iconImage){
            //Set icon image
            marker.setIcon(props.iconImage);
        }
        
        //Check content
        if(props.content){
            var infoWindow = new google.maps.InfoWindow({
            content:props.content
        });
        
        marker.addListener('click', function(){
            infoWindow.open(map, marker);
    });
        }
    }
}

    </script>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa1PQ2IvNQDYpksSEd5GvrqbZChu10Dqs&callback=initMap">
    </script>
