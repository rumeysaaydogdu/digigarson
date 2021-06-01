<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
class messages{
    const
    SUCCESS = "Mail Gönderildi.",
    ERROR = "Mail Gönderilemedi.",
    ERROR2 = "Bilgileri Doldurun.",
    INFO = "info message";
}
class type{
    const 
    SUCCESS = "success",
    ERROR = "error",
    INFO = "info";
}
$first_name = $_POST["first_name"];
$company_name = $_POST["company_name"];
$address = $_POST["address"];
$tax = $_POST["tax"];
$tax_no = $_POST["tax_no"];
$signboard_name = $_POST["signboard_name"];
$phone = $_POST["phone"];
$autho_name = $_POST["autho_name"];
$autho_phone = $_POST["autho_phone"];
$checkbox = $_POST["checkbox"];
$mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'fr-street.guzelhosting.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '_mainaccount@weborjin.com';
        $mail->Password   = 'Bt+pQfEeW5Se49W';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
    
        $mail->setFrom('_mainaccount@weborjin.com', 'Web Orjin');
        $mail->addAddress('ozmert2434@gmail.com');
    
        $mail->isHTML(true);
        $mail->Subject = "Test Subject";
        $mail->Body = "
        <div class='page-wrapper bg-gra-03 p-t-45 p-b-50'>
            <div class='wrapper wrapper--w790'>
                <div class='card card-5'>
                    <div style='background-color: #d44237; padding: 2px; border-radius: 5px; margin: 10px;'>
                        <h1 style=' margin-left: 3px; text-align: center;'><strong>Digigarson</strong></h1>
                    </div>
                    <div class='card-body'>
                        <form id='sales_rep'>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Satış Temsilcisi Adı Soyadı</h3></div>
                            <p style='margin: 10px;'>$first_name</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Firma Ünvanı</h3></div>
                            <p style='margin: 10px;'>company_name</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Firma Adresi</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Vergi Dairesi</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Vergi No</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Tabela İsmi</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Telefon Numaras</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Yetkili Adı Soyadı</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Yetkili Telefon Numarası</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <div><h3 style='background-color: rgb(223, 217, 217); color: #9c1208; margin-left: 3px; border-radius: 3px; margin: 10px; padding: 3px;'>• Sözleşme</h3></div>
                            <p style='margin: 10px;'>fd</p>
    
                            <table style=''>
                                <thead style='background-color: rgb(223, 217, 217); color: #9c1208;  border-radius: 3px;  margin: 10px;'>
                                    <th><strong>Bölüm</strong></th>
                                    <th><strong>Max</strong></th>
                                    <th><strong>Min</strong></th>
                                </thead>
                                <tbody>
    
                                </tbody>
                            </table>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    
        if($mail->send());
            echo json_encode(result(messages::SUCCESS, type::SUCCESS));
    } 
    catch (Exception $e) {
        echo json_encode(result(messages::ERROR, type::ERROR));
    } 

function result($message, $type){
    return array(
        "error" => [
            "message" => $message,
            "type" => $type
        ]

    );
}