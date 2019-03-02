<?php
include("Email.php");

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile_number']) && isset($_POST['programme']) && isset($_POST['venue']) && isset($_POST['msg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $programme_raw = $_POST['programme'];
    $venue_raw = $_POST['venue'];
    $msg = $_POST['msg'];

    $programme_arr = ['none', 'Experiential', 'Adventure', 'Thematic', 'Mobile Application', 'Customize Plan'];
    $venue_arr = ['none', 'Beach', 'City', 'Nature & Mountain', 'Own Premises', 'Customize Plan'];

    $mail = new Email(true);
    try {
        $mail->readyMail();
        $mail->senderName($email, $name);
        //Server email to receive from customer.
        $mail->toAddress("info@impact-volution.com");
        $mail->isHtml(true);
        $mail->setSubject('Impact Volution Team Building');
        $mail->setBody('Name: ' . $name . '<br> Email: ' . $email . '<br>Mobile number: ' . $mobile_number . '<br> Type of Programme: ' . $programme_arr[$programme_raw] . '<br> Venue: ' . $venue_arr[$venue_raw] . '<br> Message: ' . $msg);
        $mail->setAltBody('Name: ' . $name . '<br> Email: ' . $email . '<br>Mobile number: ' . $mobile_number . '<br> Type of Programme: ' . $programme_arr[$programme_raw] . '<br> Venue: ' . $venue_arr[$venue_raw] . '<br> Message: ' . $msg);

        $mail->sendMail();

        if (isset($_POST['send_copy'])){
            $mail->readyMail();
            $mail->senderName($email, $name);
            //Server email to receive from customer.
            $mail->toAddress($email);
            $mail->isHtml(true);
            $mail->setSubject('Impact Volution Team Building');
            $mail->setBody('Name: ' . $name . '<br> Email: ' . $email . '<br>Mobile number: ' . $mobile_number . '<br> Type of Programme: ' . $programme_arr[$programme_raw] . '<br> Venue: ' . $venue_arr[$venue_raw] . '<br> Message: ' . $msg);
            $mail->setAltBody('Name: ' . $name . '<br> Email: ' . $email . '<br>Mobile number: ' . $mobile_number . '<br> Type of Programme: ' . $programme_arr[$programme_raw] . '<br> Venue: ' . $venue_arr[$venue_raw] . '<br> Message: ' . $msg);

            $mail->sendMail();
        }

        echo "
            <script>
                alert('Thank you for contact us!');
                window.location.href = '../impactVolution/ContactUs.html';
            </script>";

    } catch (Exception $e) {
        echo "
            <script>
                alert('Fail to submit form. ". $mail->ErrorInfo() ."');
            </script>
            ";
    }
}

?>