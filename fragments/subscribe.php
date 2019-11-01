<?php
/**
 * Created by PhpStorm.
 * User: Hollyphat
 * Date: 10/29/2019
 * Time: 9:53 AM
 */

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<form action="" method="post">
    <div class="form-group">
        <input type='email' class="form-control" required placeholder="enter your email" id="subscribe-form">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" role="button" id="subscribe" style="background-color:#00AEFF; border: none">
            <i class="fa fa-check"></i> Subscribe
        </button>
    </div>
</form>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#subscribe").on("click",function (e) {
            e.preventDefault();
           let email = $("#subscribe-form").val();
           if(email == ""){
               swal('Error!',"Kindly enter your email",{icon: 'error',  timer: 2500});
           }


           $.ajax({
              url: 'subscribe_ajax.php',
              dataType: 'json',
               type: 'post',
              timeout: 45000,
              data: {
                  'add': '1',
                  'email': email
              },
               success: function (f) {
                   let status = f.status;

                   if(status == true){

                       swal('Great',f.message,{icon: 'success',  timer: 25000});
                   }else{
                       swal('Error!',f.message,{icon: 'error',  timer: 25000});
                   }
               },
               error: function (e) {
                   swal('Error!',"Network error, please try again",{icon: 'error',  timer: 2500});
               }
           });
        });
    });
</script>