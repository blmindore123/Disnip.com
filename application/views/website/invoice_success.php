<?php

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="GQs7yium";
if(!empty($txnid) && !empty($productinfo) && !empty($amount)){
           $url = SERVICEURL . 'accept_invoice.php';
     $data1['invoice_id'] = $productinfo;
     $data1['trans_id'] = $txnid;
     $data1['amount'] = $amount;
                $postdata = http_build_query($data1);
                $opts = array('http' =>
                    array(
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $postdata
                    )
                );

                $context = stream_context_create($opts);
                $result = file_get_contents($url, false, $context);
//                echo $result; die;
                if (!empty($result)) {
                    $response = json_decode($result);
                    if ($response->status == 'true') {
                        $this->session->set_flashdata("msgSuccess", $response->message);
                        redirect('petnod/invoice_list');
                    } else {
                        $this->session->set_flashdata("msgSuccess", $response->message);
                        redirect('petnod/invoice_list');
                    }
                } else {
                    $this->session->set_flashdata("msgSuccess", "Server not responding");
                   redirect('petnod');
                }
}

?>	