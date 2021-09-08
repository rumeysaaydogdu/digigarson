<?php
    if(isset($_POST['name']) & isset($_POST['email']) & isset($_POST['subject']) & isset($_POST['message'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $icerik=$message."<br><br><br>"."Name: ".$name."<br>"."Email:    ".$email;
    }elseif(isset($_POST['name']) & isset($_POST['surname']) & isset($_POST['companyname']) & isset($_POST['tel']) & isset($_POST['email']) & isset($_POST['taxno']) & isset($_POST['address'])){
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $companyname=$_POST['companyname'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $taxno=$_POST['taxno'];
        $address=$_POST['address'];
        $subject = 'RESTORAN BAŞVURUSU';
        $icerik = "
            <html>
                <body>
                    <table style='border:3px solid rgba(79,79,79,0.1);'>
                        <tr>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Name</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$name.$surname."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>CompanyName</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$companyname."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Phone</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$tel."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Mail</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$email."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Tax No</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$taxno."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Address</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$address."</td>
                        </tr>
                    </table>
                </body>
            </html>";
    }else{
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $companyname=$_POST['companyname'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $companytype=$_POST['companytype'];
        $companycomment=$_POST['companycomment'];
        $companycomment2=$_POST['companycomment2'];
        $sales=$_POST['sales'];
        $salestarget=$_POST['salestarget'];
        $address=$_POST['address'];
        $subject = 'BAYİLİK BAŞVURUSU';
        $icerik = "
            <html>
                <body>
                    <table style='border:3px solid rgba(79,79,79,0.1);'>
                        <tr>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Name</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$name.$surname."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>CompanyName</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$companyname."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Phone</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$tel."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Mail</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$email."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>CompanyType</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$companytype."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>CompanyComment</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$companycomment.$companycomment2."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Sales</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$sales."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>SalesTarget</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$salestarget."</td>
                        </tr>
                        <tr style='border:1px solid rgba(79,79,79,0.1);'>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>Address</td>
                            <td style='border:1px solid rgba(79,79,79,0.1);'>".$address."</td>
                        </tr>
                    </table>
                </body>
            </html>";
    }
    require("/home/dgsite/public_html/forms/PHPMailer.php");
    require("/home/dgsite/public_html/forms/SMTP.php");
    require("/home/dgsite/public_html/forms/PHPMailerAutoload.php");
    require("/home/dgsite/public_html/forms/Exception.php");
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->SMTPAuth = false;
    $mail->SMTPAutoTLS = false; 
    $mail->Port = 25; 
    $mail->Username = 'merve.coban@busula.com';
    $mail->Password = 'Mrv#1239';
    $mail->SetFrom($mail->Username, 'Merve');
    $mail->AddAddress('cobanmerve615@gmail.com', '');
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->MsgHTML($icerik);
    if($mail->Send()) {
       echo 'Mail gönderildi!';
    } else {
       echo 'Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
    }
?>