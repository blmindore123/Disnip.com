



<!-- /.page-header -->

<section class="section top-full" >

    <div class="container">

        <ul class="shop-order-progress flex flex-center fw300 mb-50 fz-13">

            <li><a href="">Order</a></li>    

            <li><a href="">Shipping</a></li>    

            <li class="active"><a href="">Payment</a></li>    

            <li><a href="#">Confirmation</a></li>

        </ul> <!-- end .order-progress -->



        <ul class="payment-type flex flex-center disable-flex-xs roboto-slab fw300">

            <?php

// Merchant key here as provided by Payu

            $MERCHANT_KEY = "W8Sifn";

            $SALT = "xmOBIXfT";

// Merchant Salt as provided by Payu

// End point - change to https://secure.payu.in for LIVE mode

            $PAYU_BASE_URL = "https://test.payu.in";

//$PAYU_BASE_URL = "https://secure.payu.in";



            $action = '';



            $posted = array();

            if (!empty($_POST)) {

                //print_r($_POST);

                foreach ($_POST as $key => $value) {

                    $posted[$key] = $value;

                }

            }



            $formError = 0;



            if (empty($posted['txnid'])) {

                // Generate random transaction id

                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

            } else {

                $txnid = $posted['txnid'];

            }

            $hash = '';

// Hash Sequence

            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

            if (empty($posted['hash']) && sizeof($posted) > 0) {

                if (

                        empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])

                ) {

                    $formError = 1;

                } else {

                    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));

                    $hashVarsSeq = explode('|', $hashSequence);

                    $hash_string = '';

                    foreach ($hashVarsSeq as $hash_var) {

                        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';

                        $hash_string .= '|';

                    }



                    $hash_string .= $SALT;





                    $hash = strtolower(hash('sha512', $hash_string));

                    $action = $PAYU_BASE_URL . '/_payment';

                }

            } elseif (!empty($posted['hash'])) {

                $hash = $posted['hash'];

                $action = $PAYU_BASE_URL . '/_payment';

            }

            ?>



            <script>

                var hash = '<?php echo $hash ?>';

             

                $(document).ready(function () {

                       function submitPayuForm() {

                    $(".se-pre-con").css("display:block");

                    if (hash == '') {

                        return;

                    }



                    var payuForm = document.forms.payuForm;

                    payuForm.submit();

$('.loader-con').css('display', 'none');

                }

                submitPayuForm();

            });



            </script>

<?php

$product_info = "Book Shop";

if (!empty($address)) {

    $mobile = $address[0]->user_mobile_no;

    $name = $address[0]->user_name;

    $email = $address[0]->user_email;

    $success_payu = site_url('website/success_payumoney');

    $cancel_payu = site_url('website/cancel_payumoney');

    $user_id = SESSIONKEY;

    $amount = base64_decode($this->uri->segment(3));

}

?>



            <input type="hidden" value="payumoney" id="payumoney">

            <form action="<?php echo $action; ?>" method="post" name="payuForm" id="payu">

                <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />

                <input type="hidden" name="hash" value="<?php echo $hash ?>"/>

                <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

                <input type="hidden" name="amount" id="amount" value="<?php echo (empty($posted['amount'])) ? $amount : $posted['amount'] ?>" />

                <input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? $user_id : $posted['firstname']; ?>" />

                <input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? $email : $posted['email']; ?>" />

                <input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? $mobile : $posted['phone']; ?>" />

                <input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? $product_info : $posted['productinfo'] ?>" >

                <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $success_payu : $posted['surl'] ?>" size="64" />

                <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $cancel_payu : $posted['furl'] ?>" size="64" />

                <input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? $user_id : $posted['address1'] ?>" size="64" />

                <input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>



<!--                <li class="payumoeny-btn" >

                    <input type="submit" value="" id="submit" name="submit"class="block h3 f700 title-color text-uppercase"/></li>-->



            </form>







            <li class="cashon-delivery" onclick="cashondelivery();">

                <a href="#" class="btn-large text-uppercase round mr-5 addtobagbtn">Cash On Delivery</a></li>

                <!--<a href="" onclick="cashondelivery();"><span class="block h3 f700 title-color text-uppercase">Cash </span>Cash On Delivery</a></li>-->

        </ul>

    </div>

</section>









<script>



    function cashondelivery() {

        var cod = '<?php echo time(); ?>';

$('.loader-con').css('display', 'block');

        $.ajax({

            url: '<?php echo site_url('website/get_order'); ?>',

            type: "POST",

            data: {

                'cod': cod

            },



            success: function (data) { 

              window.location.href = "<?php echo site_url('website/order_confirmation'); ?>";

          

            }

        });

    }

  



    $('#amount').val(localStorage.getItem('ttl'));



    

</script>