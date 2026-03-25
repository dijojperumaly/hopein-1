<?php 

include_once("db_connection.php");
include("adminsession.php");
$prv=0;

if(isset($_REQUEST["prv"])){
    $prv=$_REQUEST["prv"];
}
if(isset($_REQUEST["id"])){
    $id=$_REQUEST["id"];    
    $sql = "SELECT  appid,
        admissionyear ,
        appno,
        name,
        regionallanguage, 
        sex,
        aadharno,
        bloodgroup,
        admissionstandard,	
        contact,
        alternatecontact,
        email,
        fathername,
        fatheroccupation,
        address,
        mothername,
        motheroccupation,
        guardianname,
        guardianrelation,
        guardianoccupation,
        guardianaddress,
        previousschool,
        yearstuded,
        standaredstuded,
        dateadmission,
        dateleaving,
        remarks,
        dateofbirth,
        age,
        religion,
        caste,
        placebirth,
        nationality,
        state,
        community,
        mothertongue,
        tcno,
        vaccinationdate,
        bodymark1,
        bodymark2
        FROM tbl_applications
        WHERE appid=?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result(
        $appid, 
        $admissionyear,
        $appno,
        $name,
        $regionallanguage, 
        $sex,
        $aadharno,
        $bloodgroup,
        $admissionstandard,	
        $contact,
        $alternatecontact,
        $email,
        $fathername,
        $fatheroccupation,
        $address,
        $mothername,
        $motheroccupation,
        $guardianname,
        $guardianrelation,
        $guardianoccupation,
        $guardianaddress,
        $previousschool,
        $yearstuded,
        $standaredstuded,
        $dateadmission,
        $dateleaving,
        $remarks,
        $dateofbirth,
        $age,
        $religion,
        $caste,
        $placebirth,
        $nationality,
        $state,
        $community,
        $mothertongue,
        $tcno,
        $vaccinationdate,
        $bodymark1,
        $bodymark2
    );
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
    {
            if($stmt->fetch()) //fetching the contents of the row
            {
                $stmt_read = $con->prepare("UPDATE tbl_applications SET
                    isreaded=1
                    WHERE appid=?");
                    $stmt_read->bind_param("i",$id);
                    if($stmt_read->execute()){
                    }						
                    $stmt_read->close();
            }
    }
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("admin-header-links.php"); ?>
</head>

<body>
    <?php include("admin-header-topmenu.php"); ?>
    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <?php include("admin-header-sidemenu.php"); ?>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li>
                            <a href="admin-application-list.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <?php
                        if($prv!=0){
                        ?>
                            <li class="active-bre">
                                <a href="admin-application-details.php?id=<?php echo $appid; ?>">Application Details</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="active-bre">
                            <a href="#"> Application Edit</a>
                        </li>
                        <li class="page-back">
                            <a href="index.php"><i class="fa fa-backward" aria-hidden="true"></i> Back to Website</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
						<div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Edit Application - <?php echo $appno; ?></h4>
                                    <!--<p>Here you can edit your website basic details URL, Phone, Email, Address, User and password and more</p>-->
                                </div>
                                <div class="tab-inn">
                                    <p>
                                        <div class="alert alert-dismissible" role="alert" style="display:none;">
                                            <strong>Warning!</strong>
                                            <p></p>
                                        </div>
                                    </p>
                                    <form  name="form_save" id="form_save" method="post" action="adminssion_save">
                                        <input type="hidden" name="hdid" id="hdid" value="<?php echo $appid; ?>">
                                        <div class="row">
                                            <div class="input-field col s6"></label>
                                                <b>Academic Year*:</b>
                                                <select name="admissionyear" id="admissionyear" class="form-control" required>
                                                    <option value="">-- Select Academic Year --</option>
                                                    <option value="2025" <?php if($admissionyear==2025){ echo "selected"; }?> >2025-26</option>                                        
                                                </select>
                                                <!--<span id="sexvalidate" class="error customvalidation" style="display:block;width:fit-content;">This field is required.</span>-->                                         
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Full Name:</b>
                                                <input type="text" id="name" name="name" value="<?php echo $name; ?>" class="validate" required>                                                  
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Regional Language:</b>
                                                <input type="text" id="regionallanguage" name="regionallanguage" value="<?php echo $regionallanguage; ?>" class="validate" >
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Sex:</b>                                               
                                                <select name="sex" id="sex" class="form-control" aria-label="Default select example">
                                                    <option class="form-control" value="">-- Select Sex --</option>
                                                    <option class="form-control" value="male" <?php if(strtolower(trim($sex))=="male"){ echo 'selected';} ?>>Male</option>
                                                    <option class="form-control" value="female" <?php if($sex=="female"){ echo 'selected';} ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Aadhar No:</b>
                                                <input type="text" id="aadharno" name="aadharno" value="<?php echo $aadharno; ?>" class="validate"  >                                                
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <div class="input-field col s6">
                                                <b>Blood Group:</b>
                                                <input type="text" id="bloodgroup" name="bloodgroup" value="<?php echo $bloodgroup; ?>" class="validate">
                                              
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Admission Standard:</b>                                                
                                                <select name="admissionstandard" id="admissionstandard" class="form-control required">
                                                    <option value="">-- select standard  --</option>
                                                    <option value="LKG" <?php if(strtoupper(trim($admissionstandard))=="LKG"){ echo 'selected';} ?>>LKG</option>
                                                    <option value="UKG" <?php if(strtoupper(trim($admissionstandard))=="UKG"){ echo 'selected';} ?>>UKG</option>							
                                                    <option value="I" <?php if(strtoupper(trim($admissionstandard))=="I"){ echo 'selected';} ?>>I</option>
                                                    <option value="II" <?php if(strtoupper(trim($admissionstandard))=="II"){ echo 'selected';} ?>>II</option>
                                                    <option value="III" <?php if(strtoupper(trim($admissionstandard))=="III"){ echo 'selected';} ?>>III</option>
                                                    <option value="IV" <?php if(strtoupper(trim($admissionstandard))=="IV"){ echo 'selected';} ?>>IV</option>
                                                    <option value="V" <?php if(strtoupper(trim($admissionstandard))=="V"){ echo 'selected';} ?>>V</option>
                                                    <option value="VI" <?php if(strtoupper(trim($admissionstandard))=="VI"){ echo 'selected';} ?>>VI</option>
                                                    <option value="VII" <?php if(strtoupper(trim($admissionstandard))=="VII"){ echo 'selected';} ?>>VII</option>
                                                    <option value="VIII" <?php if(strtoupper(trim($admissionstandard))=="VIII"){ echo 'selected';} ?>>VIII</option>
                                                    <option value="IX" <?php if(strtoupper(trim($admissionstandard))=="IX"){ echo 'selected';} ?>>IX</option>
                                                    <!--<option value="X" <?php if(strtoupper(trim($admissionstandard))=="X"){ echo 'selected';} ?>>X</option>-->
                                                    <option value="Plus One" <?php if(strtolower(trim($admissionstandard))=="plus one"){ echo 'selected';} ?>>Plus One</option>
                                                    <!--<option value="Plus Two" <?php if(strtolower(trim($admissionstandard))=="plus two"){ echo 'selected';} ?>>Plus Two</option>-->
                                                </select>
                                                <!--<span id="stdvalidate" class="error customvalidation" style="display:block;width:fit-content;">This field is required.</span>-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="input-field col s3">
                                                <b>Contact:</b>
                                                <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>" class="validate">
                                               
                                            </div>
                                            <div class="input-field col s3">
                                                <b>Alternate Contact:</b>
                                                <input type="text" id="alternatecontact" name="alternatecontact" value="<?php echo $alternatecontact; ?>" class="validate">
                                               
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Email:</b>
                                                <input type="text" id="email" name="email" value="<?php echo $email; ?>" class="validate">
                                              
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Father Name:</b>
                                                <input type="text" id="fathername" name="fathername" value="<?php echo $fathername; ?>" class="validate">
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b>Father Occupation:</b>
                                                <input type="text" id="fatheroccupation" name="fatheroccupation" value="<?php echo $fatheroccupation; ?>" class="validate">
                                                
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <div class="input-field col s6">
                                                <b>Address:</b>
                                                <textarea rows="3" id="address" name="address"><?php echo $address; ?> </textarea>
                                               
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b>Mother Name:</b>
                                                <input type="text" id="mothername" name="mothername" value="<?php echo $mothername; ?>" class="validate">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Mother Occupation:</b>
                                                <input type="text" id="motheroccupation" name="motheroccupation" value="<?php echo $motheroccupation; ?>" class="validate">
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b>Guardian Name:</b>
                                                <input type="text" id="guardianname" name="guardianname" value="<?php echo $guardianname; ?>" class="validate">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Guardian Relation:</b>
                                                <input type="text" id="guardianrelation" name="guardianrelation" value="<?php echo $guardianrelation; ?>" class="validate">
                                              
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b>Guardian Occupation:</b>
                                                <input type="text" id="guardianoccupation" name="guardianoccupation" value="<?php echo $guardianoccupation; ?>" class="validate">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Guardian Address:</b>
                                                <textarea rows="3" id="guardianaddress" name="guardianaddress" class="validate"><?php echo $guardianaddress; ?></textarea> 
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b>Previous School:</b>
                                                <input type="text" id="previousschool" name="previousschool" value="<?php echo $previousschool; ?>" class="validate">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Year Studed:</b>
                                                <input type="text" id="yearstuded" name="yearstuded" value="<?php echo $yearstuded; ?>" class="validate">
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b>Standared Studed:</b>
                                                <input type="text" id="standaredstuded" name="standaredstuded" value="<?php echo $standaredstuded; ?>" class="validate">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Date Admission:</b>
                                                <input type="text" id="dateadmission" name="dateadmission" value="<?php echo $dateadmission; ?>" class="validate">
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b>Date Leaving:</b>
                                                <input type="text" id="dateleaving" name="dateleaving" value="<?php echo $dateleaving; ?>" class="validate">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Remarks:</b>
                                                <textarea rows="3" id="remarks" name="remarks"><?php echo $remarks; ?></textarea>
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b>Date of Birth:</b>
                                                <input type="text" id="dateofbirth" name="dateofbirth" value="<?php echo $dateofbirth; ?>" class="validate">                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Age:</b>
                                                <input type="text" id="age" name="age" value="<?php echo $age; ?>" class="validate">
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b>Religion:</b>
                                                <input type="text" id="religion" name="religion" value="<?php echo $religion; ?>" class="validate">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Caste:</b>
                                                <input type="text" id="caste" name="caste" value="<?php echo $caste; ?>" class="validate">
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b>Place of Birth:</b>
                                                <input type="text" id="placebirth" name="placebirth" value="<?php echo $placebirth; ?>" class="validate">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Nationality:</b>
                                                <input type="text" id="nationality" name="nationality" value="<?php echo $nationality; ?>" class="validate">
                                              
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b>State:</b>
                                                <input type="text" id="state" name="state" value="<?php echo $state; ?>" class="validate">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Community:</b>
                                                <input type="text" id="community" name="community" value="<?php echo $community; ?>" class="validate">
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b>Mother Tongue:</b>
                                                <input type="text" id="mothertongue" name="mothertongue" value="<?php echo $mothertongue; ?>" class="validate">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>TC No:</b>
                                                <input type="text" id="tcno" name="tcno" value="<?php echo $tcno; ?>" class="validate">
                                                
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b>Vaccination Date:</b>
                                                <input type="text" id="vaccinationdate" name="vaccinationdate" value="<?php echo $vaccinationdate; ?>" class="validate">                                                
                                            </div>
                                        </div><div class="row">
                                            <div class="input-field col s6">
                                                <b>Body Mark 1:</b>
                                                <textarea id="bodymark1" name="bodymark1" rows="4"><?php echo $bodymark1; ?></textarea>
                                              
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b>Body Mark 1:</b>
                                                <textarea id="bodymark2" name="bodymark2" rows="4"><?php echo $bodymark2; ?></textarea>
                                               
                                            </div>
                                        </div>
                                        
                                        <!--<div class="row">
											<div class="file-field input-field col s12">
												<div class="btn admin-upload-btn">
													<span>File</span>
													<input type="file">
												</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text" placeholder="Profile image">
												</div>
											</div>
                                        </div>-->                                 
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <!--<a href='#' class='ad-st-edit' style="padding:8px 12px;">edit</a>-->
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                                    <input type="button" id="btnapplynow" name="btnapplynow"  class="waves-button-input" style="font-size: medium;" value="Update Now">
                                                </i>
                                            </div>
                                            
                                        </div>
                                        <p>
                                            <div class="alert alert-dismissible" role="alert" style="display:none;">
                                                <strong>Warning!</strong>
                                                <p></p>
                                            </div>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

     <?php
     include("admin-fooder.php");
     ?>  
       
    <script>
    $(document).ready(function() {
        jQuery.validator.addMethod("validdate", function(value, element) {
            return this.optional(element) ||  /^\d{1,2}\-\d{1,2}\-\d{4}$/.test(value);
        }, "Please enter valid date.");
        $("#form_save").validate({
            rules: {
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
                    number:true,
                    minlength:10,
                    maxlength: 12,
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
                    number: "number only",
                    minlength:"phone number must 10 digit indian mobile number",
                    maxlength: "phone number maximum 12 digit indian mobile number",
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
                            $("#btnapplynow").attr('disabled', false).val($caption);                            	                                
                            try {
                                //var json = $.parseJSON(response);
                                var json = JSON.parse(response);
                                if (json["status"] == "success") {
                                    //alert(json["status"]);
                                    //resetForm();
                                    //all();                                
                                    ShowAlert("", "application successfully updated.!", "success");
                                }else if(json["status"] == "filetype_error") {
                                    ShowAlert("", "Not saved! invalid file type", "danger");
                                }else if(json["status"] == "filesize_error") {
                                    ShowAlert("", "Not saved! file size exceed", "danger");
                                }
                                else {
                                    ShowAlert("", "Not saved! please enter correct data", "danger");
                                }
                            } catch (e) {                                    
                                ShowAlert("", "Not saved! please enter correct data", "danger");
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
            } else {
                ShowAlert("", "please enter valid data for all required field", "danger");
            }
        });
       

    });
    </script>
    
   

</body>

</html>
