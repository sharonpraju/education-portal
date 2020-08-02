<?php
  
    require ("class.phpmailer.php");
  
    if(isset($_POST['submit'])){
        $feature_title=$_POST['feature_title']; 
        $feature_details=$_POST['feature_details'];  
        $
          
          
        $mail = new PHPMailer();
          
        $mail->IsSMTP();
        $mail->Host = "domain.com"; // Your Domain Name
          
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = "info@domain.com"; // Your Email ID
        $mail->Password = "PASSWORD"; // Password of your email id
          
        $mail->From = "info@domain.com";
        $mail->FromName = "EduFox Team";
        $mail->AddAddress ("info@domain.com"); // On which email id you want to get the message
        $mail->AddCC ($email);
          
        $mail->IsHTML(true);
          
        $mail->Subject = "Enquiry from Website Requesting a feature"; // This is your subject
        $mail->Subject .= "<br>". $feature_title;

          
        // HTML Message Starts here
          
        $mail->Body = "
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$feature_title</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$feature_details</td>
                        </tr>
                        
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
          
              
        if(!$mail->Send()) {
            // Message if mail has been sent
            echo "<script>
                alert('Submission failed.');
            </script>";
        }
        else {
            // Message if mail has been not sent
            echo "<script>
                alert('Email has been sent successfully.');
            </script>";
        }
  
    }
?>