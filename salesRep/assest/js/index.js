$(document).ready(function () {
    let data = Array("Salon", "Bahçe", "Teras", "Balkon", "Havuz", "Toplantı", "1. Kat", "2. Kat"," 3. Kat", "4. Kat", "5. Kat", "Vip"," Tezgah", "Loca", "Arka", "Dış Mekan", "İç Mekan", "Ön Teras", "Arka Teras", "İşletme", "Yönetim", "Yan Bahçe", "Şezlong", "Atölye", "Kasa", "Paket Servis", "Gel Al", "Salon", "- 2, Sahil", "Sahil - 2")
    let elements = "";
    
data.forEach(function(value){
elements +=`
<option value="${value}">${value}</option>
`
$("#section").html(elements);
})
});


$("#sales_rep").submit(function (e){ 
    let data = $(this).serialize();
     $.ajax({
        type: "POST",
        url: "./assest/php/smtp_mail.php",
        data: data,
        dataType: "JSON",
        success: function (response){
                error = response.error;
            console.log(response.message);
                Swal.fire({
                    text: error.message,
                    icon: error.type
                })

        }
    });
    return false;
});
