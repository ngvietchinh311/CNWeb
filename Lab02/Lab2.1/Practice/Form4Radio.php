<!<!doctype html>
<html>
    <head><title>Receiving input</title></head>
    <body>
        <font size="5">Thank you: Received your input. </font>
        <?php
            $email = $_POST["email"];
            $contact = $_POST["contact"];
            print("<br>Your email address is: $email");
            print("<br>Contact preference is $contact");
        ?>
    </body>
</html>