let data ={
    info: {
        person : "",
        dollar : ""
    },
    products: []
    
} 

$(document).on("change","#form-one input", function(){

    let type = $(this).attr("name")

    switch(type){
        case "person" :
            data.info.person = $(this).val()
            break;

        case "usd" :
            data.info.dollar = $(this).val()
            break;
        
    }
})

$(document).on("submit","#form-two", function () {

    let item = $(this).serializeObject()
    data.products.push(item)

    createList()
 //   console.log(data);
    return false;
})

function createList () {

    let total = 0
    let element = ""

    data.products.forEach(function(item,i){
        
        if(item.price_type === "$"){
            total += (item.price * item.count) * data.info.dollar
        }
        else{
            total += (item.price * item.count)
        }


        element += `<tr index="${i}">

        <td><button class="delete_btn">Sil</button></td>
        <td>${item.name}</td>
        <td>${item.count}</td>
        <td>${item.price}</td>
        <td>${(item.price * item.count).toFixed(2)} ${item.price_type}</td>
        </tr>`
    })

    element += `<tr> <td colspan="5">Genel Toplam: ${total}</td> </tr>`

    $("#list").html(element)
    

}

$(document).on("click",".delete_btn",function(){
    let element = $(this).closest("tr") 
    let index = parseInt(element.attr("index"))

    data.products.splice(index,1)
    element.remove();

  //  console.log(data)

});

/*

$("table tbody").find('input[name="record"]').each(function(){
    if($(this).is(":checked")){
          $(this).parents("tr").remove();
      }
    });


     $("td").remove("this");

    */