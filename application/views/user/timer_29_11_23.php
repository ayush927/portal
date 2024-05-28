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

// let EndTimeGetTime = assessmentStart.getTime();

let counter = setInterval(() => {
  // Get Date Now
  let dateNow = new Date().getTime();

  // Find The Difference Between The Time Now And The Countdown Date
  let dateDiff = EndTime - dateNow;

  let days = Math.floor(dateDiff / (1000 * 60 * 60 * 24));

  let hours = Math.floor((dateDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

  let minutes = Math.floor((dateDiff % (1000 * 60 * 60)) / (1000 * 60));

  let seconds = Math.floor((dateDiff % (1000 * 60)) / 1000);

//   document.querySelector(".days").innerHTML = days < 100 && days > 10 ? `0${days}` : days < 10 ? `00${days}` : days;
//   document.querySelector(".hours").innerHTML = hours < 10 ? `0${hours}` : hours;
    if (dateDiff < 0) {
        clearInterval();
        // document.getElementById("demo").innerHTML = "EXPIRED";
        // var name = $("#name").val();
    	var code = $("#code").val();
    	$.ajax({
    		url: "<?php echo base_url(); ?>BaseController/finish_time",
    		type : "post",
    		dataType: "json",
    		data:{
    			part: '<?= $partName ?>',
    			code : code
    		},
    		success: function(data){
    			if(data.status == 'success')
              {
                alert('Time allocated for this assessment is over.');
                // $('#exampleModalLong2').show();
                window.location = "<?php echo base_url().'BaseController/view_code/'; ?>";
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
</script>