<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="The page to contact the company">
        <!--Key Words for File-->
        <meta name="keywords" content="HTML, Form, Tags, contact, enquiry, jobs, careers, support">
        <!--Author Information-->
        <meta name="author" content="Stacey Millers" >

        <title>Contact</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Including the navigation links (nav.inc) file -->
        <?php include 'nav.inc'; ?>

        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        
        <main>
            <h1 id="contact_us"><strong>Contact us</strong></h1>

            <!--Introduction Paragraph Content-->
            <p> Connect with the Best Big Brain Group.</p>

            <!--Form Section for Contact-->
            <form id="contact_form" action="https://mercury.swin.edu.au/it000000/formtest.php" method="POST">
                <!--Drop Down Reason Box-->
                <p>
                    <label for="reason">Contact Reason: </label>
                    <select name="reason" id="reason" required="required">
                        <option value="" selected="selected" disabled="disabled">Please Select</option>
                        <option value="general">General Enquiry</option>
                        <option value="technical_support">Technical Support</option>
                        <option value="careers_internships">Careers & Internships</option>
                        <option value="partnership">Partnership Enquiry</option>
                        <option value="other">Other</option>
                    </select>
                </p>

                <!-- Email Address for return reply-->
                <p> <!-- Email Address - Input type "email" automatically validates email and gives pattern, as in apply page. Text input used here to show how to use patterns to accomplish -->
                    <label for="email_contact">Email Address:</label>
                    <input type="text" id="email_contact" name="email_contact" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="example@emailaddress.com.au" required="required">
                </p>

                <!--Enquiry Box-->
                <p>
                    <label for="enquiry_box" class="visually_hidden"> Enquiry Box </label>
                    <!--Text box to type in enquiry-->
                    <textarea id="enquiry_box" name="enquiry_box" rows="10" cols="150" placeholder="Please provide details of your enquiry here..."></textarea>
                </p> 

                <!--Buttons: Input 'Submit' & 'Reset Form'-->
                <p id="contact_buttons">
                    <input type="submit" value="SUBMIT" title="Click to Submit Enquiry">
                </p> 

            </form>
        </main>
        <!-- Including nav_footer.inc file -->
        <?php include 'nav_footer.inc'; ?>

         <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>