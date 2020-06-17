
<section id="partners">
        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large; margin: 0px 17px; text-align:center;"><!--PARTNERS--><br></h1>
        <div>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <!-- <h1 id="partners" style="text-align:center">So you have what it takes to join the family?<br/></h1> -->
                        <p id="partners" style="text-align:center">Details as Provided by applicant.<br>After reviewing the application, an email will be sent to the applicant as to whether it was accepted or declined.</p>
                    </div>
                </div>

                    <div class="row">

                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6">
                        <form method="post" action="">

                        <?php
                        if(!isset($result)) {
                            echo "<h3>Review</h3>";
                        } else {
                            echo $result;  
                        }

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $_SESSION['reviewEnteryToUpdate'] = $id;
                            } 
                            //echo $id;

                            //check for userID in database
                            $sqlQuery = "SELECT * FROM service_providers WHERE serviceProviderID =:serviceProviderID";
                            $statement = $db->prepare($sqlQuery);
                            $statement->execute(array(':serviceProviderID' => $id));
                            
                                while($row = $statement->fetch()){
                                $app_companyName = $row['companyName'];
                                $app_companyRegistrationNumber = $row['companyRegistrationNumber'];
                                $app_title = $row['title'];
                                $app_firstname = $row['firstname'];
                                $app_lastname = $row['lastname'];
                                $app_companyNumber = $row['companyNumber'];
                                $app_email = $row['email'];
                                $app_emailnotify = $row['emailnotify'];
                                $app_address = $row['addresss'];
                                $app_suburb = $row['suburb'];
                                $app_townCity = $row['townCity'];
                                $app_postalCode = $row['postalCode'];
                                $residential = $row['residential'];
                                $commercial = $row['commercial'];
                                $international = $row['international'];
                                $storage = $row['storage'];
                                $pet = $row['pet'];
                                $car = $row['car'];
                                $courier = $row['courier'];
                                $shuttle = $row['shuttle'];
                                $cleaning = $row['cleaning'];
                                $wrapping = $row['wrapping'];
                                $packing = $row['packing'];
                                $insurance = $row['insurance'];
                            }

                    ?>
                            <div class="form-group">
                                <label for="companyName" style="float:left">Company Name</label>
                                <input type="text" class="form-control" id="companyName" name="companyName"  value="<?php if(isset($app_companyName)) echo $app_companyName;?>" placeholder="Company Name" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label for="companyRegistrationNumber" style="float:left">Company Registration Number</label>
                                <input type="text" class="form-control" id="companyRegistrationNumber" name="companyRegistrationNumber" value="<?php if(isset($app_companyRegistrationNumber)) echo $app_companyRegistrationNumber;?>" placeholder="Company Registration Number" disabled>
                            </div>

                            <div class="form-group">
                                <label for="title" style="float:left">Title</label>
                                <select id="title" name="title" class="form-control">
                                    <option <?php if(isset($app_title) && ($app_title == "")) echo 'selected= "selected"';?> disabled placeholder="Title"></option>    
                                    <option <?php if(isset($app_title) && ($app_title == "Mr")) echo 'selected= "selected"';?>disabled>Mr</option>
                                    <option <?php if(isset($app_title) && ($app_title == "Mrs")) echo 'selected= "selected"';?>disabled>Mrs</option>
                                    <option <?php if(isset($app_title) && ($app_title == "Miss")) echo 'selected= "selected"';?>disabled>Miss</option>
                                    <option <?php if(isset($app_title) && ($app_title == "Ms")) echo 'selected= "selected"';?>disabled>Ms</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Name & Surname</span>
                                </div>
                                <input type="text" aria-label="First name" id="firstname" name="firstname" value="<?php if(isset($app_firstname)) echo $app_firstname;?>" class="form-control" disabled>
                                <input type="text" aria-label="Last name" id="lastname" name="lastname" value="<?php if(isset($app_lastname)) echo $app_lastname;?>" class="form-control" disabled>
                            </div><br>

                            <div class="form-group">
                                <label for="companyNumber" style="float:left">Contact Number</label>
                                <input type="text" class="form-control" id="companyNumber" name="companyNumber" value="<?php if(isset($app_companyNumber)) echo $app_companyNumber;?>" placeholder="Contact Number" disabled>
                            </div>

                            <div class="form-group">
                                <label for="email" style="float:left">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($app_email)) echo $app_email;?>" placeholder="Enter email" disabled>
                                <small id="emailHelp" class="form-text text-muted">This is for official use and communiating with you as our client.</small>
                            </div>

                            <div class="form-group">
                                <label for="email" style="float:left">Email address to receive notifications</label>
                                <input type="email" class="form-control" id="emailnotify" name="emailnotify" value="<?php if(isset($app_emailnotify)) echo $app_emailnotify;?>" placeholder="Enter email" disabled>
                                <small id="emailHelp" class="form-text text-muted">This is where we will send your leads too.</small>
                            </div>

                            <div class="form-group">
                                <label for="address" style="float:left">Company Address</label>
                                <input style="margin-bottom:3px" type="text" class="form-control" id="address" name="address" value="<?php if(isset($app_address)) echo $app_address;?>" placeholder="Address" disabled>
                                <input style="margin-bottom:3px" type="text" class="form-control" id="suburb" name="suburb" value="<?php if(isset($app_suburb)) echo $app_suburb;?>" placeholder="Suburb" disabled>
                                <input style="margin-bottom:3px" type="text" class="form-control" id="townCity" name="townCity" value="<?php if(isset($app_townCity)) echo $app_townCity;?>" placeholder="Town/City" disabled>
                                <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?php if(isset($app_postalCode)) echo $app_postalCode;?>" placeholder="Postal Code" disabled>
                            </div>
                            
                            <label style="float:left">Select the services you offer</label>
                            <select select multiple="true" class="selectpicker" id="services" name="services" multiple data-live-search="true">
                                <option <?php if(isset($residential) && ($residential == "1")) echo 'selected= "selected"';?>disabled>Residential</option>
                                <option <?php if(isset($commercial) && ($commercial == "1")) echo 'selected= "selected"';?>disabled>Commercial</option>
                                <option <?php if(isset($international) && ($international == "1")) echo 'selected= "selected"';?>disabled>International</option>
                                <option disabled></option>
                                <option <?php if(isset($storage) && ($storage == "1")) echo 'selected= "selected"';?>disabled>Storage</option>
                                <option <?php if(isset($pet) && ($pet == "1")) echo 'selected= "selected"';?>disabled>Pet Transport</option>
                                <option <?php if(isset($car) && ($car == "1")) echo 'selected= "selected"';?>disabled>Car Transport</option>
                                <option <?php if(isset($courier) && ($courier == "1")) echo 'selected= "selected"';?>disabled>Courier Services</option>
                                <option <?php if(isset($shuttle) && ($shuttle == "1")) echo 'selected= "selected"';?>disabled>Shuttle Services</option>
                                <option <?php if(isset($cleaning) && ($cleaning == "1")) echo 'selected= "selected"';?>disabled>Cleaning Services</option>
                                <option <?php if(isset($wrapping) && ($wrapping == "1")) echo 'selected= "selected"';?>disabled>Wrapping Services</option>
                                <option <?php if(isset($packing) && ($packing == "1")) echo 'selected= "selected"';?>disabled>Packing Services</option>
                                <option <?php if(isset($insurance) && ($insurance == "1")) echo 'selected= "selected"';?>disabled>Insurance</option>
                            </select>
                            
                            <input type="hidden" id="sudo"  name="sudo" value="">
                                                        
                            <br><br><br>
                            <input type="submit" id="noActionBtn" name="noActionBtn" value="Take No Action" class="btn btn-block btn-info" style="float:right; max-width:125px;padding:5px 12px!important;margin:10px">
                            <input type="submit" id="rejectBtn" name="rejectBtn" value="Reject" class="btn btn-block btn-danger" style="float:right; max-width:95px;padding:5px 12px!important;margin:10px">
                            <input type="submit" id="trialBtn" name="trialBtn" value="Start Trial" class="btn btn-block btn-warning" style="float:right; max-width:95px;padding:5px 12px!important;margin:10px">
                            <input type="submit" id="liveBtn" name="liveBtn" value="Go Live" class="btn btn-block btn-success" style="float:right; max-width:95px;padding:5px 12px!important;margin:10px">

                            <br><br>
                            

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br><br><br>





