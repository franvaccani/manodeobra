! function(i) {
  "use strict";
  i("#sidebar_fixed").theiaStickySidebar({
    minWidth: 991,
    updateSidebarHeight: !0,
    additionalMarginTop: 25
  }), i(".content_more").hide(), i(".show_hide").on("click", function() {
    var e = i(".content_more").is(":visible") ? "Read More" : "Read Less";
    i(this).text(e), i(this).prev(".content_more").slideToggle(200)
  }), i('.radio_select input[type="radio"]').on("click", function() {
    var e = i("input[name='time']:checked").val();
    i("#selected_time").text(e)
  }), i('.radio_select input[type="radio"]').on("click", function() {
    var e = i("input[name='people']:checked").val();
    i("#selected_people").text(e)
  }), i('.radio_select input[type="radio"]').on("click", function() {
    var e = i("input[name='day']:checked").val();
    i("#selected_day").text(e)
  }), i(".magnific-gallery").each(function() {
    i(this).magnificPopup({
      delegate: "a",
      type: "image",
      preloader: !0,
      gallery: {
        enabled: !0
      },
      removalDelay: 500,
      callbacks: {
        beforeOpen: function() {
          this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim"), this.st.mainClass = this.st.el.attr("data-effect")
        }
      },
      closeOnContentClick: !0,
      midClick: !0
    })
  }), i(".menu-gallery").each(function() {
    i(this).magnificPopup({
      delegate: "figure a",
      type: "image",
      preloader: !0,
      gallery: {
        enabled: !0
      },
      removalDelay: 500,
      callbacks: {
        beforeOpen: function() {
          this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim"), this.st.mainClass = this.st.el.attr("data-effect")
        }
      },
      closeOnContentClick: !0,
      midClick: !0
    })
  }), i(".btn_reserve_fixed a").on("click", function() {
    i(".box_booking").show()
  }), i(".close_panel_mobile").on("click", function(e) {
    e.stopPropagation(), i(".box_booking").hide()
  })
}(window.jQuery);

function buscadatos(id){
  var data= {};
  return data
}

//funcion envia form a prestador
function carga_contacto_prestador(){

  var nombre = $('#nombre_presu').val();
  var email = $('#email_presu').val();
  var zona = $('#ciudad_presu').val();
  var oferta = $('#oferta_presu').val();
  var direccion = $('#dir_presu').val();
  var mensaje = $('#descripcion_presu').val();

  var string = 'nombre='+nombre+'&email='+email+'&zona='+zona+'&direccion='+direccion+'&mensaje='+mensaje+'&oferta='+oferta;

   /********************/

    if(nombre!='' && email !='' && zona !='' && mensaje!='' ){

      $.ajax({
        url: 'assets/php/insert_contacto.php',
        data: string,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data) {
            console.log(data);
            if(data=='true'){
            location.href = 'index.php?pagina=buzon';
            }
         }
     })


   } else{ // fin de comprobacion
     console.log(string);
     alert('Complete los campor Obligatorios') //mejorar con sweet alert

   }


}


auto_localidad('ciudad_presu');
