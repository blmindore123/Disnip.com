<!-- include file -->
<footer class="site-footer">

    <!-- footer-widget-3 -->

    <div class="secondery-footer dark">
        <div class="container">
            <div class="counter-user">
                <h4></h4>
            </div>
            <div class="inner-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <p>Copyright 2017 disNip | All Rights Reserved 
                       
                        <li><a href="<?php echo site_url('website/why_shop_withus'); ?>">Why Shop with Us</a></li>
                        <li><a href="<?php echo site_url('website/delivery_shipping'); ?>">Delivery/Shipping</a></li>
                        <li><a href="<?php echo site_url('website/return_policy'); ?>">Return Policy</a></li>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                    <h4 class="visitor-counter">Visitors :  <span><?php $result = $this->login_model->get_record('visitor_count');
                        echo $result[0]->count; ?></h4>
                       
                        </span>
                        
                        <br>
                        <p class="col-xs-12 col-sm-6 col-md-4" style="margin-top:30px"> 
                        <li><a href="<?php echo site_url('website/privecy_policy'); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo site_url('website/termsconditions'); ?>">Terms and Conditions</a></li>
                        <li class="marrgin_one_left_sixty"><a href="<?php echo site_url('website/seller'); ?>">For Sellers</a></li>
                       
                        </p>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <ul class="social-links social-1 text-right">
                            <li> support@disnip.com</li>
                             
                            <!-- <li><a href="https://plus.google.com/share?url=http://www.disnip.com" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
  src="https://www.gstatic.com/images/icons/gplus-32.png" alt="Share on Google+"/></a></li> -->
                            <li><a href="https://www.facebook.com/disNip77/" target="_Blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/disNip77" target="_Blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/disnip77/" target="_Blank"><i class="fa fa-instagram"></i></a></li>
                         </ul>
                         <br>
                        <li class="marrgin_one_left_sixty" ><a href="<?php echo site_url('website/contactus'); ?>">Any Help</a></li>
                         <li  class="marrgin_one_left_sixty"><a href="<?php echo site_url('website/contactus'); ?>">Connect with us</a></li>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:void(0)" id="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
    
</footer>        <!-- include file -->


<!--
JavaScripts
========================== -->
<script src="<?php echo base_url('webassets/js/scripts.minified.js'); ?>"></script>
<script src="<?php echo base_url('webassets/js/main.js'); ?>"></script>    </body>
<script>
   

    
    var cart = [];
    if (localStorage.getItem('items') !== null) {
        var cart = JSON.parse(localStorage.getItem("items"));
    } else {
        var cart = [];
    }
    if (localStorage.getItem('ttl') !== null) {
        var ttl = parseInt(localStorage.getItem("ttl"));
    } else {
        var ttl = 0;
    }
    if (localStorage.getItem('count') !== null) {
        var count = parseInt(localStorage.getItem("count"));
    } else {
        var count = 0;
    }
    
     if (localStorage.getItem('itmqty') !== null) {
        var itmqty = parseInt(localStorage.getItem("itmqty"));
    } else {
        var itmqty = 0;
    }
    function addCart(id, name, img, price, qty) {
ttl = parseInt(price*qty) + parseInt(ttl);
        var myArray = cart;

      var objIndex = myArray.findIndex((obj => obj.item_id == id));
    
if(objIndex>=0){
//Console object.
console.log("Before update: ", myArray[objIndex]);

//Update object's name property.
myArray[objIndex].qty = parseInt(myArray[objIndex].qty)+parseInt(qty);

//Console object again.
console.log("After update: ", myArray[objIndex]);
 localStorage.setItem('items', JSON.stringify(myArray));
location.reload();
        }else{

       
        
        $('#itemslist').append('<div class="cart-product relative flex flex-middle" id="'+cart.length+'"><figure class="thumb mr-20"><a href="#"><img width="100" src="' + img + '" alt=""></a></figure><div class="desc"><h6 class="roboto mb-10"><a href="#" class="title-link">' + name + '</a></h6><span class="price title-color fw500">Rs ' + price + ' x ' + qty + '</span> </div><a href="javascript:;" class="remove-product transition" onclick="removeByValue('+cart.length+');"></a></div>');
        $('#ttlprc').html('Rs ' + ttl);
        $('#cont').html(cart.length + 1);
       localStorage.setItem('ttl', ttl);
             localStorage.setItem('count', cart.length + 1);
        var items = {
            id: cart.length,
            item_id: id,
            name: name,
            img: img,
            price: price,
            qty: qty
        };

        cart.push(items);

             $('#checkout').css('display','block');
        
        localStorage.setItem('items', JSON.stringify(cart));
        // $('#displaynames').html(localStorage.getItem('items'));
      //  alert(localStorage.getItem('items'));
    }}
$(document).ready(function() {



 if (localStorage.getItem('webcount') == null  || localStorage.getItem('webcount') == undefined || localStorage.getItem('webcount') == '') {

               $.ajax({

            url: '<?php echo site_url('website/visitor_count'); ?>',

            type: "POST",

            data: {

                'count': '1'

            },



            success: function (data) {

                localStorage.setItem('webcount', '1');

          

            }

        });
    } 
    ttl=0;

 $('#ttlprc').html('Rs ' + ttl);
        $('#cont').html("0");
        if(parseInt(localStorage.getItem("count"))==0){
             $('#checkout').css('display','none');
        }else{
        $('#checkout').css('display','block');
        }
            if(cart!=''){
        for(var i=0;i<JSON.parse(localStorage.getItem("items")).length;i++){
               ttl = parseInt(cart[i].price*cart[i].qty ) + parseInt(ttl);
    $('#itemslist').append('<div class="cart-product relative flex flex-middle" id="'+i+'" ><figure class="thumb mr-20"><a href="#"><img width="100" src="' + cart[i].img + '" alt=""></a></figure><div class="desc"><h6 class="roboto mb-10"><a href="#" class="title-link">' + cart[i].name + '</a></h6><span class="price title-color fw500">Rs ' + cart[i].price + ' x ' + cart[i].qty + '</span> </div><a href="javascript:;" class="remove-product transition"  onclick="removeByValue('+i+');"></a></div>'); 
    $('#ttlprc').html('Rs ' + ttl);
     localStorage.setItem('ttl', ttl);
     $('#cont').html(parseInt(localStorage.getItem("count")));
    }
    }else{
      $('#checkout').css('display','none');
      }
});

	
function removeByValue(id) {
       // alert(mylist);
        var arr = cart;
        
          localStorage.setItem('count', parseInt((localStorage.getItem("count") - 1)));
                arr.splice(id, 1);
                cart=arr;
                localStorage.setItem('items', JSON.stringify(cart).replace(/\\/g, ""));
                $('#' + id).remove();
                $('#1' + id).remove();
                location.reload();
            

    }
    
    function changeByValue(id) {
  var val= $('#qtyp'+id).val();
        var myArray = cart;

      var objIndex = myArray.findIndex((obj => obj.id == id));

//Console object.
console.log("Before update: ", myArray[objIndex]);

//Update object's name property.
myArray[objIndex].qty = val;
  localStorage.setItem('items', JSON.stringify(myArray));
//Console object again.
console.log("After update: ", myArray[objIndex]);
location.reload();
    }
    
    //Find index of specific object using findIndex methode.    


</script>


 <script type="text/javascript">
            (function($) {
                $(".matex-rs-1").ionRangeSlider();
                $(".matex-rs-2").ionRangeSlider({
                    type: "double",
                });

                $(".matex-rs").each(function() {
                    var rsStyle = $(this).attr("data-rs-style");
                    $(this).prev("span.irs").addClass(rsStyle);
                });

                var slider = document.querySelector(".nouiSlider");
                noUiSlider.create(slider, {
                    start: [20, 80],
                    connect: true,
                    step: 1,
                    range: {
                        "min": 0,
                        "max": 100
                    },
                    format: wNumb({
                        decimals: 0
                    })
                });
            })(jQuery);
        </script>
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1925105257753727";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</html>