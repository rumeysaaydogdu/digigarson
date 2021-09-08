const defaultUrl = "./assets/backend/operations.php";

Get("features", {}, "JSON","POST",function success(data){
    let elements = ``;
    let aosdelay = 100;
    data.forEach(function (e){
        elements +=`       
        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-3 mb-3 " data-aos="zoom-in" data-aos-delay="${aosdelay+=100}">
                        <div class="icon-box">
                            <img class="iconn" src="${e.image}">
                            <h4><a>${e.name}</a></h4>
                            <p>${e.desc}</p>
                        </div>
                </div>`;
    })
    $(".features").append(elements);
})
Get("timeline", {}, "JSON","POST",function success(data){
    let elements = ``;
    let aosdelay = 100;
    let text;
    let count = 1;
    function LRclass(val){
        if(val%2==0){
            return "right";
        }
        else {
            return "left";
        }
    }
    data.forEach(function (e){
      text = e.text.split("-");
        elements +=`
           <div class="timeline-container ${LRclass(count)}">
          <div class="timeline-content">
            <h2 class="timeline-h2">${e.title}</h2>
            <p class="timeline-p">${text[0]}<br>${text[1]}</p>
          </div>
        </div>
        `;
        count++
    })
    $(".timeline").append(elements);
})
Get("usageareas", {}, "JSON","POST",function success(data){
    let elements = ``;
    elements += `<ul>`;
    let count = 1;
    data.forEach(function (row){
        elements +=`
                 <li>
                 <a data-bs-toggle="collapse" class="collapse collapsed" data-bs-target="#accordion-${count}">
                  ${row.title}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                 <div id="accordion-${count}" class="collapse" data-bs-parent=".accordion-list">
              <p>${row.text}
            </p>
               </div>
          </li>
        `;
        count +=1;
    })
    elements += `</ul>`;
    $("#accordion-list").append(elements);
})
Get("contact", {}, "JSON","POST",function success(data){
    let elements = ``;
    data.forEach(function (e){
        elements +=`       
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Adres:</h4>
                            <p>${e.address}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Mail:</h4>
                            <p>${e.mail}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Telefon:</h4>
                            <p>${e.phone}</p>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12046.319945254201!2d28.8696072!3d40.9906771!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xad5c30c43e04d187!2sDigigarson!5e0!3m2!1str!2str!4v1627553962062!5m2!1str!2str" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>`;
    })
    $("#pull_contact").append(elements);
})
function Get (function_type, data, dataType, type, success){
    $.ajax({
        type: type,
        url: defaultUrl,
        data: {"function_type": function_type},
        dataType: dataType,
        success: function (response) {
          success(response)
        }
    });
}