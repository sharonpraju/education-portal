<?php
  
    require ("class.phpmailer.php");
  
    if(isset($_POST['submit'])){
        $name=$_POST['name']; // Get Name value from HTML Form
        $subject=$_POST['subject'];  // Get Mobile No
        $email=$_POST['email'];  // Get Email Value
        $message=$_POST['message']; // Get Message Value
          
          
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
          
        $mail->Subject = "Enquiry from Website submitted by $name"; // This is your subject
        $mail->Subject .= "<br>". $subject;

          
        // HTML Message Starts here
          
        $mail->Body = "
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$$subject</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$message</td>
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