<section id="partners">
        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large; margin: 0px 17px; text-align:center;"><!--PARTNERS--><br></h1>
        <div>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <!-- <h1 id="partners" style="text-align:center">So you have what it takes to join the family?<br/></h1> -->
                        <p id="partners" style="text-align:center">Provide your details in the fields as provided below.<br>After reviewing your application, we will notify you as to whether it was successful or not.</p>
                    </div>
                </div>

                    <div class="row">

                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6">
                        <form method="post" action="">

                        <?php
                        if(!isset($result)) {
                            echo "<h3>SIGNUP</h3>";
                        } else {
                            echo $result;  
                        }

                        if(!empty($form_errors)) echo str_replace(
                            ['firstname','lastname', 'companyName', 'companyRegistrationNumber', 'title', 'email','emailnotify', 'address', 'townCity', 'province', 'suburb', 'postalCode', 'services'],
                            ['Firstname', 'Surname', 'Company Name', 'Company Registration Number', 'Title', 'Email', 'Email for Notifications', 'Address', 'Town / City', 'Suburb', 'Postal Code', 'Services that you want to offer'],
                            show_errors($form_errors));
                    ?>
                            <div class="form-group">
                                <label for="companyName" style="float:left">Company Name</label>
                                <input type="text" class="form-control" id="companyName" name="companyName" value="<?php if(isset($_SESSION['app_companyName'])) echo $_SESSION['app_companyName'];?>" placeholder="Company Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="companyRegistrationNumber" style="float:left">Company Registration Number</label>
                                <input type="text" class="form-control" id="companyRegistrationNumber" name="companyRegistrationNumber" value="<?php if(isset($_SESSION['app_companyRegistrationNumber'])) echo $_SESSION['app_companyRegistrationNumber'];?>" placeholder="Company Registration Number">
                            </div>

                            <div class="form-group">
                                <label for="title" style="float:left">Title</label>
                                <select id="title" name="title" class="form-control">
                                    <option <?php if(isset($_SESSION['app_title']) && ($_SESSION['app_title'] == "")) echo 'selected= "selected"';?> disabeled placeholder="Title"></option>    
                                    <option <?php if(isset($_SESSION['app_title']) && ($_SESSION['app_title'] == "Mr")) echo 'selected= "selected"';?>>Mr</option>
                                    <option <?php if(isset($_SESSION['app_title']) && ($_SESSION['app_title'] == "Mrs")) echo 'selected= "selected"';?>>Mrs</option>
                                    <option <?php if(isset($_SESSION['app_title']) && ($_SESSION['app_title'] == "Miss")) echo 'selected= "selected"';?>>Miss</option>
                                    <option <?php if(isset($_SESSION['app_title']) && ($_SESSION['app_title'] == "Ms")) echo 'selected= "selected"';?>>Ms</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Name & Surname</span>
                                </div>
                                <input type="text" aria-label="First name" id="firstname" name="firstname" value="<?php if(isset($_SESSION['app_firstname'])) echo $_SESSION['app_firstname'];?>" class="form-control">
                                <input type="text" aria-label="Last name" id="lastname" name="lastname" value="<?php if(isset($_SESSION['app_lastname'])) echo $_SESSION['app_lastname'];?>" class="form-control">
                            </div><br>

                            <div class="form-group">
                                <label for="companyNumber" style="float:left">Contact Number</label>
                                <input type="text" class="form-control" id="companyNumber" name="companyNumber" value="<?php if(isset($_SESSION['app_companyNumber'])) echo $_SESSION['app_companyNumber'];?>" placeholder="Contact Number">
                            </div>

                            <div class="form-group">
                                <label for="email" style="float:left">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_SESSION['app_email'])) echo $_SESSION['app_email'];?>" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">This is for official use and communiating with you as our client.</small>
                            </div>

                            <div class="form-group">
                                <label for="email" style="float:left">Email address to receive notifications</label>
                                <input type="email" class="form-control" id="emailnotify" name="emailnotify" value="<?php if(isset($_SESSION['app_emailnotify'])) echo $_SESSION['app_emailnotify'];?>" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">This is where we will send your leads too.</small>
                            </div>

                            <div class="form-group">
                                <label for="address" style="float:left">Company Address</label>
                                <input style="margin-bottom:3px" type="text" class="form-control" id="address" name="address" value="<?php if(isset($_SESSION['app_address'])) echo $_SESSION['app_address'];?>" placeholder="Address">
                                <input style="margin-bottom:3px" type="text" class="form-control" id="suburb" name="suburb" value="<?php if(isset($_SESSION['app_suburb'])) echo $_SESSION['app_suburb'];?>" placeholder="Suburb">
                                <input style="margin-bottom:3px" type="text" class="form-control" id="townCity" name="townCity" value="<?php if(isset($_SESSION['app_townCity'])) echo $_SESSION['app_townCity'];?>" placeholder="Town/City">
                                <input style="margin-bottom:3px" type="text" class="form-control" id="province" name="province" value="<?php if(isset($_SESSION['app_province'])) echo $_SESSION['app_province'];?>" placeholder="Province">
                                <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?php if(isset($_SESSION['app_postalCode'])) echo $_SESSION['app_postalCode'];?>" placeholder="Postal Code">
                            </div>
                            
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

                            <input type="hidden" id="sudo"  name="sudo" value="">
                            
                            <br><br><br>

                            <button type="submit" id="submitApplication" name="submitApplication" class="btn btn-primary" <?php if(isset($notmobile)) echo 'style="float: right;margin-right:-150px;"';?>>Submit</button>

                        </form>
                      
                        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large; margin: 0px 17px;"></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br><br><br>





