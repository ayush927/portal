<?php
    if( isset( $partName ) ){
        if( isset( $variation ) || $partName == 'uce_part2' ){

    ?>

        <div class="modal fade" id="modal_view_review" data-keyboard="false" data-backdrop="static" aria-hidden="true">

            <div class="modal-dialog modal-lg" style='margin-top:160px;'>

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title h1">Introduction</h4>

                    </div>

                    <div class="modal-body">

                        <p class='review h3 font-weight-bold text-secondary'><?php echo $detail->top_discription; ?></p>

                    </div>

                    <div class="modal-footer justify-content-between">

                      <div class="col-md-12">

                        <div class="col-md-4 offset-8">

                          <button data-dismiss="modal" type="button" class="btn btn-info closeButton">Continue for assessment</button>

                        </div>

                      </div>

                    </div>

                </div>

            </div>

        </div>

    </div>  

    <?php

        }
    }

        else{

    ?>

    </div>  

    <?php

        }

    ?>

<script type="text/javascript">

    

// Set the date we're counting down to

// var countDownDate = new Date('<?= $stamp; ?>').getTime();



// // Update the count down every 1 second

// var x = setInterval(function() {



//   // Get today's date and time

//   var now = new Date().getTime();

    

//   // Find the distance between now and the count down date

//   var distance = countDownDate - now;

    

//   // Time calculations for days, hours, minutes and seconds

//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));

//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    

//   // Output the result in an element with id="demo"

//   document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

//   document.getElementById("remain_time").value = minutes

//   // If the count down is over, write some text 

//   if (distance < 0) {

//     clearInterval(x);

//     // document.getElementById("demo").innerHTML = "EXPIRED";

//     // var name = $("#name").val();

// 	var code = $("#code").val();

// 	$.ajax({

// 		url: "<?php echo base_url(); ?>BaseController/finish_time",

// 		type : "post",

// 		dataType: "json",

// 		data:{

// 			part: 'cat_part1',

// 			code : code

// 		},

// 		success: function(data){

// 			if(data.message=='success')

//       {

//         alert('Time allocated for this assessment is over.');

//         // $('#exampleModalLong2').show();

//         window.location = "<?php echo base_url().'BaseController/view_code'; ?>";

//       }

			

// 		}

// 	});



//   }

// }, 1000);



let assessmentStart = new Date('<?= $stamp; ?>');

let EndTime = new Date('<?= $newDateTime; ?>');

let message = '<?php echo $detail->top_discription; ?>'



<?php

    if( !isset( $_SESSION['timer'][$partName] ) ){
        if(isset( $_SESSION['timer'] )){
            unset( $_SESSION['timer'] );
        }

        if( isset( $variation ) || $partName == 'uce_part2' ){
            $_SESSION['timer'][$partName] = true;
?>
            // let EndTimeGetTime = assessmentStart.getTime();

             window.onload = function () {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#modal_view_review").modal("show");
                $("#modal_view_review").find(".review").html(message);
                $('.closeButton').click(function(){
                    var base_url = '<?= base_url() ?>';
                    var code = '<?= $code ?>';
                    $.ajax({
                        type : 'post',
                        url : '<?php echo base_url()."assessment-variations/variation-time-update/"; ?>'+code+"/<?= $partName ?>",
                        success : function(data){
                            var response = JSON.parse(data);
                            if( response.status == 'success' ){
                                assessmentStart = new Date(response.data.dateTime);
                                EndTime = new Date(response.data.newDateTime);
                                start();
                            }
                        }
                    });
                });
            }
<?php
        }
        else{
?>
            start();
<?php
        }
    }
    else{
?>
        start();
<?php
    }
?>
let part = '<?= $partName ?>';
function start(){
    let counter = setInterval(() => {
    // Get Date Now
    let dateNow = new Date().getTime();
    // Find The Difference Between The Time Now And The Countdown Date
    let dateDiff = EndTime - dateNow;
    let days = Math.floor(dateDiff / (1000 * 60 * 60 * 24));
    let hours = Math.floor((dateDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((dateDiff % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((dateDiff % (1000 * 60)) / 1000);
    if (dateDiff < 0) {
        clearInterval();
        var code = $("#code").val();
        $.ajax({
                url: "<?php echo base_url(); ?><?= isset($variation) ? 'assessment_variations' : 'BaseController' ; ?>/finish_time",
                type : "post",
                dataType: "json",
                data:{
                    part: part,
                    code : code
                },
                success: function(data){
                    if(data.status == 'success')
                    {
                    alert('Time allocated for this assessment is over.');
                    // $('#exampleModalLong2').show();
                    window.location = "<?php echo base_url().( isset( $variation ) && isset($nextPartName) ? 'assessment_variations/'.$nextPartName."/".base64_encode($code) : 'BaseController/view_code/'); ?>";
                    }
                }
            });

        }

        else{

            document.querySelector(".minutes").innerHTML = minutes < 10 ? `0${minutes}` : minutes;

            document.querySelector(".seconds").innerHTML = seconds < 10 ? `0${seconds}` : seconds;

        }

            

        if (dateDiff <= 0) {

        clearInterval(counter);

        }

    }, 1000);

}

</script>