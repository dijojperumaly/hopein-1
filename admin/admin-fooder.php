
        </div>
		</div>

    <!--Import jQuery before materialize.js-->
		<!--<script src="js/main.min.js"></script>-->
		<script src="js/jquery-3.7.0.min.js"></script>	
		
		<script src="js/materialize.min.js"></script>

		<!--  admin account menu  settings ....start -->

		<!--<script src="js/materialize.min.js"></script>-->
    <!--<script src="js/custom.js"></script>-->

    <script>
			$('.dropdown-button').dropdown({
					inDuration: 300,
					outDuration: 225,
					constrainWidth: 400, // Does not change width of dropdown to that of the activator
					hover: true, // Activate on hover
					gutter: 0, // Spacing from edge
					belowOrigin: false, // Displays dropdown below the button
					alignment: 'left', // Displays dropdown with edge aligned to the left of button
					stopPropagation: false // Stops event propagation
			});
			$('.dropdown-button2').dropdown({
					inDuration: 300,
					outDuration: 225,
					constrain_width: false, // Does not change width of dropdown to that of the activator
					hover: true, // Activate on hover
					gutter: ($('.dropdown-content').width() * 3) / 2.5 + 5, // Spacing from edge
					belowOrigin: false, // Displays dropdown below the button
					alignment: 'left' // Displays dropdown with edge aligned to the left of button
			});
    </script>
	<!--  admin account menu  settings ....end -->

		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootbox.min.js"></script>

		<script src="js/dataTables.js"></script>
		<script src="js/dataTables.bootstrap.js"></script>
		<script src="js/dataTables.buttons.js"></script>
		<script src="js/buttons.bootstrap.js"></script>
		<script src="js/jszip.min.js"></script>
		<script src="js/pdfmake.min.js"></script>
		<script src="js/vfs_fonts.js"></script>
		<script src="js/buttons.html5.min.js"></script>
		<script src="js/buttons.print.min.js"></script>
		<script src="js/buttons.colVis.min.js"></script>
		
		<!--<script src="js/bootstrap.min.js"></script>-->
		
		
    <!--<script src="js/custom.js"></script>-->
    <script src="js/purecounter_vanilla.js"></script>     

    <script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>

	<script>
    $(document).ready(function() {
      $(".se-pre-con").fadeOut("slow");
    });
  
    function HideAlert(obj) {    
        //var AlertMsg = $('div[role="alert"]');
        obj.attr("style","display:none");
    }

	function ShowAlert(msg_title, msg_body, msg_type) {
        var AlertMsg = $('div[role="alert"]');       
		$(AlertMsg).find('strong').html(msg_title);
		$(AlertMsg).find('p').html(msg_body + '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
		$(AlertMsg).removeAttr('class');
		$(AlertMsg).addClass('alert alert-' + msg_type);
		$(AlertMsg).show();
    
    /*setTimeout(function() {
			HideAlert(AlertMsg)
		}, 5000);*/
	}
  /*function ShowAlert(msg_title, msg_body, msg_type,target) {
    alert(msg_body);
		var AlertMsg = $('div[role="'+target+'"]');
		$(AlertMsg).find('strong').html(msg_title);
		$(AlertMsg).find('p').html(msg_body + '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
		$(AlertMsg).removeAttr('class');
		$(AlertMsg).addClass('alert alert-' + msg_type);
		$(AlertMsg).show();
    
    setTimeout(function() {
			HideAlert(AlertMsg)
		}, 5000);
	}*/
 
	function ShowPopUpAlert(msg_title, msg_body, msg_type) {
		var AlertMsg = $('div[role="popupalert"]');
		$(AlertMsg).find('strong').html(msg_title);
		$(AlertMsg).find('p').html(msg_body + '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
		$(AlertMsg).removeAttr('class');
		$(AlertMsg).addClass('alert alert-' + msg_type);
		$(AlertMsg).show();
	}
</script>