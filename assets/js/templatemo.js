/*

TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

*/

'use strict';
$(document).ready(function() {
  
  $('#rappelle').click(function() {
    $('#rappelle').addClass('disabled');
  })
  
    
  $('.qty').change(function() {
    let qty = $('.qty').val();
    let length_row = $('.qty');
    let count = Object.keys(length_row).length;
    // console.log(length_row)
    // alert(length_row)
    //console.log('la quantité est : ' + qty)
    
    for (var i = 1; i < count - 1; i++) {
      let qtyy = $('#qty'+i+'').val();
      
    let un  = 1;

    if (qtyy < 1) {
      alert('vous pouvez pas faire une quantité inferieur a 1, la quantité va devenir 1 automatiquement');
      $('#qty'+i+'').val(un);
    }
    }
    
  })

    // $('#qty').change(function() {
    //   let qty = $('#qty').val();
    //   $('#quantity').val(qty);
    //   let price = $('#price').text();
    //   let id = $('#id').val();

    //   $.ajax({
    //     url : "change_cart.php",
    //     method : "POST",
    //     data : {qty:qty,price:price,id:id},
    //     success : function(data) {
    //       console.log(data)
    //     }
    //   })
    // });
    function displayVals() {
              // body...
              var singleWilaya = $( "#wilaya" ).val()
              //console.log(typeof singleWilaya)

              //$( "p" ).html( "<b>wilaya:</b> " + singleWilaya );

              

              $( "#prix_livraison" ).val( singleWilaya.substr(3) );
              
              
            }

            $( "select" ).change( displayVals );
            displayVals();
        /////////////////////////////////////////
        function totalplusliv() {
          let total = $('#total_price').val();
          let totals = parseInt(total);
          let liv   = $('#prix_livraison').val();
          let livraison = parseInt(liv)
          let totalplusliv = totals + livraison;
          
          $("#totalplusliv").append(totalplusliv);
        }
        totalplusliv()
        ///////////////////////
        function total_price_buyfast() {
          let price = $('#product_price').val();
          //console.log(price)
          let prix  = parseInt(price);
          //console.log(prix)
          let liv   = $('#prix_livraison').val();
          let livraison = parseInt(liv)
          //console.log(livraison)
          let ttl   = prix + livraison;
          //console.log(ttl)
          $('#priceplusliv').html(ttl)
          console.log()
         $('#wilaya').change(function() {
            let price = $('#product_price').val();
          console.log(price)
          let prix  = parseInt(price);
          console.log(prix)
          let liv   = $('#prix_livraison').val();
          let livraison = parseInt(liv)
          console.log(livraison)
          let ttl   = prix + livraison;
          console.log(ttl)
          $('#priceplusliv').html(ttl)
          });
        }
        //$('#wilaya').onchange(total_price_buyfast());
        total_price_buyfast();
    // Accordion


    var all_panels = $('.templatemo-accordion > li > ul').hide();

    $('.templatemo-accordion > li > a').click(function() {
        console.log('Hello world!');
        var target =  $(this).next();
        if(!target.hasClass('active')){
            all_panels.removeClass('active').slideUp();
            target.addClass('active').slideDown();
        }
      return false;
    });
    // End accordion

    // Product detail
    $('.product-links-wap a').click(function(){
      var this_src = $(this).children('img').attr('src');
      $('#product-detail').attr('src',this_src);
      return false;
    });
    $('#btn-minus').click(function(){
      var val = $("#var-value").html();
      val = (val=='1')?val:val-1;
      $("#var-value").html(val);
      $("#product-quanity").val(val);
      return false;
    });
    $('#btn-plus').click(function(){
      var val = $("#var-value").html();
      val++;
      $("#var-value").html(val);
      $("#product-quanity").val(val);
      return false;
    });
    $('.btn-size').click(function(){
      var this_val = $(this).html();
      $("#product-size").val(this_val);
      $(".btn-size").removeClass('btn-secondary');
      $(".btn-size").addClass('btn-success');
      $(this).removeClass('btn-success');
      $(this).addClass('btn-secondary');
      return false;
    });
    // End roduct detail

});
