 <!-- The error and database connection php code-->
<?php
    // including database settings
    require_once("settings.php");

    // connection to database
    $dbconn = mysqli_connect($host, $user, $pwd, $db);
    if (!$dbconn) {
    error_log("Connection failed: ".mysqli_connect_error());
    die("Sorry, there has been an error, please be patient with us.");
    }

    // SELECT query to get job reference numbers from database. Preparation for the drop down input.
    $sql = "SELECT job_id FROM jobs";
    $result = $dbconn->query($sql);
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="The page to apply for the Job Applications">
        <!--Key Words for File-->
        <meta name="keywords" content="HTML, Form, Tags, apply, job, submit">
        <!--Author Information-->
        <meta name="author" content="Stacey Millers" >

        <title>Job Application</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>

        <main id="apply_body">
            <!--PAGE TITLE-->
            <div id="application_start">
                <h2 id="heading_application"><strong>Apply Now</strong></h2>

                <!--Introduction Paragraph Content-->
                <p> The Best Big Brain Group welcomes all applicants. Please fill out the form below to apply.</p>
            </div>

            <!--Form Section. Requirements for all: 1. Inputs need labels 2. All form values (excepting'other skills' text area) are required or default value)-->
            <form id="apply_form" action="process_eoi.php" method="POST" novalidate="novalidate">

                <!--Fieldset 1: Job Reference Number - Drop Down-->
                <fieldset id="fieldset_reference"> 
                    <legend class="visually_hidden"> Fieldset Containing Job Reference Numbers </legend>
                    <!-- Drop Down Boxes-->
                    <p>
                        <label for="job_reference"><strong> JOB REFERENCE NUMBER:</strong></label>
                        <select name="job_reference" id="job_reference" required="required">

                        <!--The first placeholder drop down-->
                        <option value="" selected="selected" disabled="disabled">Please Select</option>

                        <!--Dynamically connected to SQL database. Drop down references ids are pulled directly from jobs table-->
                            <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $raw_job_reference = htmlspecialchars($row['job_id']);  // getting id data from table
                                        $job_reference = "#" . str_pad($raw_job_reference, 5, "0", STR_PAD_LEFT); // Ensuring the job ID is still 5 digits
                                        echo "<option value=\"$job_reference\">$job_reference</option>";
                                    }
                                } else {
                                echo "<option disabled>No jobs available to apply for.</option>";
                                };
                            ?>

                        </select>
                    </p>
                </fieldset> 

                <!--Fieldset 2: Personal Details-->
                <fieldset id="fieldset_personal"> 
                    <legend class="visually_hidden"> Fieldset Containing Personal Details </legend>
                    <h3 class="form_headings"><strong>Personal Details</strong></h3><br>
                    <div id="fieldset_name" class="personal_details"> <!-- Name : div 1-->
                        <ul class="apply_personal_list"> 
                            <li class="personal_listing">
                                <!-- Name - Input Text; Format: Max 20 Alpha Characters-->
                                <label for="first_name">First Name: 
                                    <input type="text" id="first_name" name="first_name" placeholder= "e.g John" pattern="[A-Za-z]+" maxlength="20" title="max 20 characters" required="required">
                                </label><br>
                            </li>
                            <li class="personal_listing">
                                <label for="family_name">Family Name: 
                                    <input type="text" id="family_name" name="family_name" placeholder= "e.g Smith" pattern="[A-Za-z]+" maxlength="20" title="max 20 characters" required="required">
                                </label> 
                            </li>

                            <li class="personal_listing">
                                <!-- Date of Birth ; Format: dd/mm/yyyy-->
                                <p><label for="dob"> Date of Birth: <input type="text" placeholder= "DD/MM/YYYY" pattern="^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/\d{4}$" id="dob" name="dob" required="required"></label></p>
                            </li>
                        </ul>

                        <fieldset id="gender"> <!-- Gender : sub fieldset --> 
                            <legend><strong> Gender </strong></legend>
                                <!-- Gender - Radio Input ; Needs own Fieldset & Legend-->
                                <label for="gender1"><input type="radio" id="gender1" name="gender" value="female">Female</label> 
                                <label for="gender2"><input type="radio" id="gender2" name="gender" value="male">Male</label>
                                <label for="gender3"><input type="radio" id="gender3" name="gender" value="other">Other</label> 
                                <label for="gender4"><input type="radio" id="gender4" name="gender" value="NA" checked="checked">Prefer not to say</label>
                        </fieldset>
                    </div>

                    <div id="fieldset_address" class="personal_details"> <!-- Address : div 2 -->
                        <ul class="apply_personal_list">
                            <li class="personal_listing">
                                <!-- Street Address- Input Text; Format: Max 20 Alpha Characters-->
                                <label for="street_address">Street Address: 
                                    <input type="text" id="street_address" name="street_address" placeholder= "e.g 12 Main St" pattern="^\d+\s[A-Za-z\s\.]+$" maxlength="40" title="i.e 123 Main St (max 40 characters)" required="required">
                                </label>
                            </li>
                            <li class="personal_listing">
                                <!-- Suburb- Input Text; Format: Max 20 Alpha Characters-->
                                <label for="suburb">Suburb/Town: 
                                    <input type="text" id="suburb" name="suburb" placeholder= "e.g Croydon" pattern="[A-Za-z\s]+" maxlength="40" title="max 40 characters" required="required">
                                </label> 
                            </li>
                            <li class="personal_listing">
                                <!-- State - Drop Down Boxes-->
                                <p><label for="state">State: </label>
                                    <select name="state" id="state" required="required">
                                        <option value="" selected="selected" disabled="disabled">Please Select</option>
                                        <option value="ACT">ACT</option>
                                        <option value="NSW">NSW</option>
                                        <option value="NT">NT</option>
                                        <option value="QLD">QLD</option>
                                        <option value="SA">SA</option>
                                        <option value="TAS">TAS</option>
                                        <option value="VIC">VIC</option>
                                        <option value="WA">WA</option>
                                    </select>
                                </p>
                            </li>
                            <li class="personal_listing">
                                <!-- Postcode - Text Input: Four Digits Only; Australia postcodes range from 0200 to 9944 -->
                                <label for="postcode">Postcode: <input type="text" placeholder= "Australian Postcodes Only" id="postcode" name="postcode" minlength="4" maxlength="4" pattern="(0[289][0-9]{2})|([123456789][0-9]{3})" title="4 digits only" required="required"></label>
                            </li>
                        </ul>
                    </div>

                    <div id="fieldset_contact" class="personal_details"> <!-- Contact Details : div 3 -->
                            <ul class="apply_personal_list">
                                <li class="personal_listing">
                                    <!-- Email Address - Input type "email" automatically validates email and gives pattern. See contact page for how to do it as a text input with pattern -->
                                    <label for="email_apply"> Email Address: 
                                        <input type="email" id="email_apply" name="email_apply" placeholder= "e.g example@emailaddress.com.au" title="example@emailaddress.com.au" required="required">
                                    </label>
                                </li>
                                <li class="personal_listing">
                                    <!-- Phone Numbers - Input Text: 8-12 digits or spaces -->
                                    <label for="mobile"> Phone Number: 
                                        <input type="text" id="mobile" name="mobile" placeholder= "e.g 0400 000 000" minlength="8" maxlength="12" pattern="[0-9\s]+" title="8-12 digits &amp; spaces only" required="required">
                                    </label>
                                </li>
                            </ul>
                    </div>
                </fieldset> 

                <!--Fieldset 3: Job Requirements-->
                <fieldset id="fieldset_skills">
                    <legend class="visually_hidden"> Fieldset Containing Job Skills </legend>
                    <h4 class="form_headings"><strong> Skills Field</strong></h4>
                    <!--Required Technical List - Checkbox Inputs -->
                    <div id="required_skills">

                        <h5> Required Technical Skills </h5> 
                        <!-- Skills from Jobs Page -->
                            <div id="skills">
                                <label  for="bachelor">
                                    <input type="checkbox" id="bachelor" name="skills[]" value="bachelor" checked="checked"> Bachelor Degree in listed area
                                </label> <!--DEFAULT TICK ON FIRST-->
                                <label for="experience">
                                    <input type="checkbox" id="experience" name="skills[]" value="experience"> Minimum 2 years Industry Experience
                                </label>
                                <label for="tech_proficiency"><input type="checkbox" id="tech_proficiency" name="skills[]" value="tech_proficiency">
                                    Proficiency in listed programs
                                </label>
                                <label for="communication"><input type="checkbox" id="communication" name="skills[]" value="communication">
                                    Communication Skills
                                </label>
                                <label for="problem_solving"><input type="checkbox" id="problem_solving" name="skills[]" value="problem_solving">
                                    Detail orientated and problem-solving skills
                                </label>
                            </div>
                         <!-- Other Skills Checkbox (needs to be out of skills div to ensure visibility toggle works) -->
                            <input type="checkbox" id="other_skills" name="skills[]" value="other_skills">
                            <label for="other_skills"> Other skills? </label>

                         <!--Other Skills - Textbox-->
                         <div id="skills_other" class="apply_textarea">
                            <label for="skills_other_textbox" class="visually_hidden"> Other Skills </label>
                            <!-- Seperating the label and input to ensure the visibility css works-->
                            <textarea id="skills_other_textbox" name="skills_other_textbox" rows="4" cols="60" placeholder="Please provide any other skills here..."></textarea>
                         </div> 
                    </div>

                    <!--Other Job Requirements: Comments (Textarea)-->
                    <div id="personal_requirements" class="apply_textarea">
                        <label for="requirements">Any Additional Personal Requirements?</label>
                        <textarea id="requirements" name="requirements" rows="4" cols="60" placeholder="Please share any additional personal requirements or information here."></textarea><br><br>
                    </div>
                </fieldset>

                <!--(OPTIONAL) Job Expectations section; no required inputs-->
                <fieldset id="job_expectations">
                    <legend class="visually_hidden"> Fieldset For Outlining Job Expectations </legend>
                    <h6 class="form_headings"><strong> Job Expectations (Optional)</strong></h6>

                    <!--Sliding Scale Range for Salary Expectations-->
                    <label for="salary_scale"> What are your Salary Expectations? (Per Year):</label><br>
                    <!-- Salary Slider Container -->
                    <div id="salary_container">
                        <!-- The minimum salary value label -->
                        <span class="salary_min_max" id="value_min"><strong>$50,000</strong></span>
                        <!-- The input for the salary scale -->
                        <input type="range" id="salary_scale" name="salary_scale" min="0" max="15" step="1" value="1" title="slide to provide an approx. salary expectation">
                        <!-- The maximum salary value label -->
                        <span class="salary_min_max" id="value_max"><strong>$200,000</strong></span>
                    </div>

                    <!--Working Hours-->
                    <p>Please provide your preferred working hours.</p>
                    <div id="working_hours">
                        <label for="hours_start"> Start time: </label>
                        <input type="time" id="hours_start" name="hours_start">
                    
                        <label for="hours_end"> End time: </label>
                        <input type="time" id="hours_end" name="hours_end">
                    </div>
                </fieldset>
            
                <!--Buttons: Input 'Apply' & 'Reset Form'-->
                <!--Applicant is sent to process_eoi page after clicking Apply to see the results they have submitted-->
                <p id="form_buttons">
                    <input type="reset" value="Reset Form" title="Click to Reset Form">
                    <input type="submit" value="Apply" title="Click to Apply Now">
                </p> 
            </form>
        </main>
        <!--Footer: from the include file-->
        <?php include 'footer.inc'; ?>
    </body>
</html>