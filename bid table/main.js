$(document).ready(function(){
  $(".add-row").click(function(){
      var no = $("#no").val();
      var service = $("#service").val();
      var count = $("#count").val();
      var price = $("#price").val();
      var money = $("#money").val();

      var countCalculate = Number($("#count").val());
      var priceCalculate = Number($("#price").val());
      var calculatedAll;

        if( $('select[name=money] option:selected').val() == 'Türk Lirası' ){
            calculatedAll = countCalculate * priceCalculate;
        }
        else{
            var dollar = Number($("#dollar").val());
            calculatedAll = countCalculate * priceCalculate * dollar;
        }

      var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + no + "</td><td>" + service + "</td><td>" + count + "</td><td>" + price + "</td><td>" + money + "</td><td>" + calculatedAll + " TL" + "</td> </tr>";
      $("#adding-table").append(markup);
    });
          
      // Find and remove selected table rows
    $(".delete-row").click(function(){
      $("table tbody").find('input[name="record"]').each(function(){
        if($(this).is(":checked")){
              $(this).parents("tr").remove();
          }
        });
    });
});    

/* ÇALIŞMADILAR



   /* if ($("select.money").val() == "Türk Lirası") {
       calculatedAll = countCalculate * priceCalculate;
   }
   else{
       var dollar = Number($("#dollar").val());
       calculatedAll = countCalculate * priceCalculate * dollar;
   } */




   /* $("#money").change(function (e){
       var state = $(this).val();
       if (state == 'Türk Lirası'){
           calculatedAll = countCalculate * priceCalculate;
       }
       else {
           var dollar = Number($("#dollar").val());
           calculatedAll = countCalculate * priceCalculate * dollar;
       }
   }); bunda undefined TL. muhtemelen $() ile başladığı için */




   
    /*  if($("#money").name == "tl"){
        calculatedAll = countCalculate * priceCalculate;
      }
      else{
        var dollar = Number($("#dollar").val());
        calculatedAll = countCalculate * priceCalculate * dollar;
     } */
     


     /* else if('select[name=money] option:selected').val() == 'Dolar' && dollar == 0){
        calculatedAll = "Dolar kurunu giriniz";
    }   BUNU EKLEEE 16. satıra
     
     
     
     */