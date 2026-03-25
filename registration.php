<?php
include("header.php");
?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Registration Form</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Registration</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible;animation-delay: 0.1s;animation-name: fadeInUp;background-image: url(img/bb1.jpg);background-size: cover;">
        <div class="container py-5">
            <!-- <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Please</h5>
                <h1 class="mb-0">Register Here !</h1>
                <h1 class="mb-0">Registration Not Started !</h1>
            </div>-->
            
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form name="form_save" id="form_save" method="post" action="adminssion_save">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="name" id="name" placeholder="Applicant Name" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control border-0 bg-light px-4" name="contact" id="contact" placeholder="Contact Number" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" name="email" id="email" placeholder="Applicant Email" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="course" id="course" placeholder="Course" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" name="college" id="college" placeholder="College" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" name="parentname" id="parentname" placeholder="Parent Name" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="parentoccupation" id="parentoccupation" placeholder="Parent Occupation" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control border-0 bg-light px-4" name="parentcontact" id="parentcontact" placeholder="Parent Number" style="height: 55px;">
                            </div>                            
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" name="address" id="address" placeholder="Address"></textarea>
                            </div>
                             <div class="col-md-6">
                                <input type="date" class="form-control border-0 bg-light px-4" name="dateofbirth" id="dateofbirth" placeholder="Date of Birth" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control border-0 bg-light px-4" name="aadhar" id="aadhar" placeholder="Aadhar Number" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="nationality" id="nationality" placeholder="Nationality" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="religion" id="religion" placeholder="Religion" style="height: 55px;">
                            </div>
                             <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="comminity" id="community" placeholder="Community" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="cast" id="cast" placeholder="Name of Caste" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="bloodgroup" id="bloodgroup" placeholder="Blood Group" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="hseschoolname" id="hseschoolname" placeholder="HSE School Name" style="height: 55px;">
                            </div>
                             <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="hseboard" id="hseboard" placeholder="HSE Board" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="hsemark" id="hsemark" placeholder="HSE Mark" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="passoutyear" id="passoutyear"  placeholder="Passout Year" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                            </div>  
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-3">
                                10th Certificate
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control border-0 bg-light px-4" placeholder="Passout Year" style="height: 55px;">
                            </div>


                            <div class="col-md-3">
                                12th Certificate
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control border-0 bg-light px-4" placeholder="Passout Year" style="height: 55px;">
                            </div>


                            <div class="col-md-3">
                                Aadhar Card
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control border-0 bg-light px-4" placeholder="Passout Year" style="height: 55px;">
                            </div>


                            <div class="col-md-3">
                                Passport Size Photo
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control border-0 bg-light px-4" placeholder="Passout Year" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


<?php
include("footer.php");
?>

<script>
    $(document).ready(function() {
       
        function showChosen(){
            $(".chosen-select").chosen({
                width: "100%",
                no_results_text: "Oops, nothing found!",
            });	
        }
        function resetForm() {
            $('#form_save')[0].reset();
            //$('#form_edit')[0].reset();
            $("#imgPreview")
                        .attr("src", "");
                $("#imgholder").css("display","none");
        }
        function resetMessage() {
            $('div[role="alert"]').attr("display:none");
        }
        function resetValidation() {
            //$('#stdvalidate').attr("display: none");
            //document.getElementById('stdvalidate').style.display = 'none';
            $("#stdvalidate").css("display", "none");  
            $("#sexvalidate").css("display", "none");  
                    
        }
        
        resetValidation();

        jQuery.validator.addMethod("validdate", function(value, element) {
            return this.optional(element) ||  /^\d{1,2}\-\d{1,2}\-\d{4}$/.test(value);
        }, "Please enter valid date.");

        $("#form_save").validate({
            rules: {
                admissionyear:{
                    required: true,
                },
                name: {
                    required: true,                    
                },
                sex: {
                    required: true,                           
                },	
                admissionstandard: {							
                    required:true,
                },
                aadharno:{
                    //required:true,
                    number:true,
                    minlength:12,
                    maxlength: 12,
                },
                contact: {
                    required: true,
                    number:true,
                    minlength:10,
                    maxlength: 12,
                },   
                alternatecontact: {
                    required: true,                    
                    number:true,
                    minlength:10,
                    maxlength: 12,
                },    
                fathername: {
                    required: true,                    
                },
                fatheroccupation: {
                    required: true,                    
                },  
                mothername: {
                    required: true,                    
                },
                motheroccupation: {
                    required: true,                    
                },             
                email: {	                  				
                    email:true,
                },              
                dateadmission:{
                    validdate:true,
                },
                dateleaving:{
                    validdate:true,
                },
                dateofbirth:{
                    required: true,
                    validdate:true,
                },
                vaccinationdate:{
                    validdate:true,
                },
               		
            },
            messages: {
                admissionyear: {
                    required: "select Academic Year",                    
                },
                name: {
                    required: "enter your full name",                    
                },
                sex: {
                    required: "select your sex",                                                    
                },	
                admissionstandard: {
                    required: "select the standared",
                },
                aadharno: {
                    //required: "fill your aadhar number",
                    number: "number only",
                    minlength:"aadhar number must 12 digit",
                    maxlength: "aadhar number must 12 digit",
                },
                contact: {
                    required: "fill your mobile number",
                    number: "number only",
                    minlength:"phone number must 10 digit indian mobile number",
                    maxlength: "phone number maximum 12 digit indian mobile number",
                },
                alternatecontact: { 
                    required: "fill alternate contact number",                   
                    number: "number only",
                    minlength:"phone number must 10 digit indian mobile number",
                    maxlength: "phone number maximum 12 digit indian mobile number",
                },
                fathername:{
                    required: "enter father name", 
                },
                fatheroccupation:{
                    required: "enter father's occupation", 
                },
                mothername:{
                    required: "enter mother name", 
                },
                motheroccupation:{
                    required: "enter mother's occupation", 
                },
                email: {	                    			
                    email:"please enter a valid email address",
                },               
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
        $('#btnapplynow').click(function() { 
            let valid=true;           
            if($("#admissionstandard").val()==""){
                $("#stdvalidate").css("display", "block");    
                valid=false;                          
            }else{
                $("#stdvalidate").css("display", "none");  
                    
            }            
            if($("#sex").val()==""){
                $("#sexvalidate").css("display", "block");  
                valid=false;       
            }else{
                $("#sexvalidate").css("display", "none");  
                  
            }               
            if ($("#form_save").valid() && valid==true) { // test for validity
                if($("#accept").is(':checked')){
                    if(check_captcha()==1){
                        var $this = $("#btnapplynow"); //submit button selector using ID
                        var $caption = $this.val(); // We store the html content of the submit button
                        var form = "#form_save"; //defined the #form ID
                        var formData = $(form).serializeArray(); //serialize the form into array
                        var route = $(form).attr('action'); //get the route using attribute action

                        $("#btnapplynow").prop('disabled', true).val("Processing...");

                        // Ajax config
                        var data = new FormData();

                        //Form data						
                        $.each(formData, function(key, input) {
                            data.append(input.name, input.value);                              
                        });

                        //File data
                        //var file_data = $('input[name="imagefile"]')[0].files;
                        //data.append("imagefile", file_data[0]); 

                        //multifile upload
                        /*for (var i = 0; i < file_data.length; i++) {
                            data.append("imagefile[]", file_data[i]);
                        }*/
                        formData = data;
                        // Ajax config

                        $.ajax({
                            type: "POST", //we are using POST method to submit the data to the server side
                            url: route, // get the route value
                            data: formData, // our serialized array data for server side
                            timeout: 100,
                            async: false,
                            processData: false,
                            contentType: false,

                            beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click
                                $("#btnapplynow").prop('disabled', true).val("Processing...");
                                //$this.attr('disabled', true).val("Processing...");
                                $(".se-pre-con").fadeIn("slow");
                            },
                            success: function(response) { //once the request successfully process to the server side it will return result here
                                //$("#btnapplynow").attr('disabled', false).val($caption);
                                //alert(response);	                                
                                try {
                                    //var json = $.parseJSON(response);
                                    var json = JSON.parse(response);

                                    if (json["status"] == "success") {
                                        //alert(json["status"]);
                                        resetForm();
                                        //all();                                
                                        ShowAlert("", "Your application has been received and your application no is:" + json["appno"] + ", we will contact you shortly.!", "success");
                                        document.location.href="admissionsuccess.php?type=1&appno="+json["appno"]+"&name="+json["name"];

                                    }else if(json["status"] == "exists") {
                                        ShowAlert("", "application already exists!", "danger");
                                        document.location.href="admissionsuccess.php?type=2&appno="+json["appno"]+"&name="+json["name"];
                                    }else if(json["status"] == "filetype_error") {
                                        ShowAlert("", "Not saved! invalid file type", "danger");
                                    }else if(json["status"] == "filesize_error") {
                                        ShowAlert("", "Not saved! file size exceed", "danger");
                                    }
                                    else {
                                        ShowAlert("", "Not saved! please enter correct data", "danger");
                                    }
                                } catch (e) {                                    
                                    ShowAlert("", "Not saved! please enter correct data! ". e, "danger");
                                }
                                // Reset form
                            },
                            complete: function(data) {
                                // Hide image container
                                $("#btnapplynow").prop('disabled', false).val($caption);
                                $(".se-pre-con").fadeOut("slow");
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                $("#btnapplynow").prop('disabled', false).val($caption);
                                ShowAlert(textStatus, errorThrown, "danger");
                                $(".se-pre-con").fadeOut("slow");
                            }
                        });
                    }else{
                        ShowAlert("", "Captcha not Matched", "danger");
                    }
                }else{
                    alert("please accept the declaration");
                    ShowAlert("", "please accept the declaration", "danger");
                }
            } else {
                ShowAlert("", "please enter valid data for all required field", "danger");
            }
        });
        $('#name').on('blur', function() {
            // on blur, if there is no value, set the defaultText             
            if ($(this).val()!=''){                
                $("#spname").html($(this).val());
            }           
        });
        $('#fathername').on('blur', function() {
            // on blur, if there is no value, set the defaultText 
            $("#spfather").html("");            
            if ($(this).val()!=''){                
                $("#spfather").html($(this).val());
            }else if ($(this).val().trim()=='' && $('#mothername').val().trim()!=''){                
                $("#spfather").html($('#mothername').val().trim());
            }        
        });
        $('#mothername').on('blur', function() {
            // on blur, if there is no value, set the defaultText 
            $("#spfather").html("");
            if ($(this).val().trim()!='' && $('#fathername').val().trim()==''){                
                $("#spfather").html($(this).val());
            }else if ($('#fathername').val().trim()!=''){                
                $("#spfather").html($('#fathername').val().trim());

            }             
        });
        $('#sex').on('change', function () {
            if($("#sex").val()==""){
                $("#sexvalidate").css("display", "block");                     
            }else{
                $("#sexvalidate").css("display", "none");  
                  
            }        
        });
        $('#admissionstandard').on('change', function () {
            if($("#admissionstandard").val()==""){
                $("#stdvalidate").css("display", "block");    
                valid=false;                          
            }else{
                $("#stdvalidate").css("display", "none");  
                    
            }        
        });

        let captcha;
        function generate() {

            // Clear old input
            //document.getElementById("submit").value = "";

            // Access the element to store
            // the generated captcha
            captcha = document.getElementById("image_captcha");
            let uniquechar = "";

            const randomchar =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            // Generate captcha for length of
            // 5 with random character
            for (let i = 1; i < 5; i++) {
                uniquechar += randomchar.charAt(
                    Math.random() * randomchar.length)
            }

            // Store generated input
            captcha.innerHTML = uniquechar;
        } 
        generate();

        function check_captcha() {
            let flag=0;
            const usr_input = document
                .getElementById("txtcaptcha").value;
            let captcha = document.getElementById("image_captcha");
            document.getElementById("key").innerHTML = "";

            if (usr_input == captcha.innerHTML) {
                flag=1;
                generate();
            }
            else {
                let s = document.getElementById("key")
                    .innerHTML = "Captcha not Matched";
                    flag=0;
                generate();
            }
            return flag;
        }
        $('#txtcaptcha').on('blur', function () {
            document.getElementById("key").innerHTML = "";
        });
        
        
    });
</script>