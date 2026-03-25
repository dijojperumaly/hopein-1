<?php 
include_once("db_connection.php");
include("adminsession.php");
if(isset($_REQUEST["id"])){
    $id=$_REQUEST["id"];
    //echo $id;
    $sql = "SELECT  appid,
        admissionyear,
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
                        <li><a href="admin-application-list.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Application Details</a>
                        </li>
                        <li class="page-back"><a href="index.php"><i class="fa fa-backward" aria-hidden="true"></i> Back to Website</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="row">
                    <div class="input-field col s12">                                                
                        <input type="button" id="btnprinttop" name="btnprinttop" class="btn-primary" value="Print">
                    </div>
                </div>
                <div class="sb2-2-3">
                    <div class="row" id="print">
                        <div class="col-md-12">
						<div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <img src="images/log.png" col-lg-4 style="float:left; max-width:80px;"/><h3 style="text-align:center;color:white;">Vidyadhiraja Vidya Bhavan H S School (VVBHSS) <br> Aluva, Ernakulam-683101</h3>
                                    
                                    <!--<p>Here you can edit your website basic details URL, Phone, Email, Address, User and password and more</p>-->
                                </div>                                
                                <div class="tab-inn">
                                <h4 style="text-align:center;">Application Informations - <?php echo $appno; ?></h4>
                                    <form>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Academic Year</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $admissionyear; ?>                                              
                                            </div>                                           
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Full Name</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $name; ?>                                                
                                            </div>
                                            <!--<div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Regional Language</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                               <?php //echo $regionallanguage; ?>                                               
                                            </div>-->
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Sex</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $sex; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Aadhar No</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $aadharno; ?>
                                                
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Blood Group</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $bloodgroup; ?>
                                              
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Admission Standard</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $admissionstandard; ?>
                                                
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Email</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $email; ?>
                                              
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Contact</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $contact; ?>                                               
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Alternate Contact</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $alternatecontact; ?>
                                               
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Father Name</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $fathername; ?>
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Father Occupation</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $fatheroccupation; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Address</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $address; ?>
                                               
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Mother Name</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $mothername; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Mother Occupation</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $motheroccupation; ?>
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Guardian Name</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $guardianname; ?>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Guardian Relation</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $guardianrelation; ?>
                                              
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Guardian Occupation</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $guardianoccupation; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Guardian Address</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $guardianaddress; ?>
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Previous School</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $previousschool; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Year Studed</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $yearstuded; ?>
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Standared Studed</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $standaredstuded; ?>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Date Admission</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $dateadmission; ?>
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Date Leaving</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $dateleaving; ?>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Remarks</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $remarks; ?>
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Date of Birth</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $dateofbirth; ?>                                              
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Age</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $age; ?>
                                                
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Religion</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $religion; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Caste</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $caste; ?>
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Place of Birth</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $placebirth; ?>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Nationality</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $nationality; ?>
                                              
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">State</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $state; ?>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Community</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $community; ?>
                                               
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Mother Tongue</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $mothertongue; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">TC No</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $tcno; ?>
                                                
                                            </div>                                        
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Vaccination Date</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $vaccinationdate; ?>
                                                
                                            </div>
                                        </div><div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Body Mark 1</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $bodymark1; ?>
                                              
                                            </div>                                       
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Body Mark 1</b>
                                                <span style="display: inline-block; width: 15%;">:</span>
                                                <?php echo $bodymark2; ?>
                                               
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
                                                <a href="admin-application-edit.php?id=<?php echo $appid; ?>&prv=1" class='ad-st-edit' style="padding:8px 12px;">edit</a>
                                               <!-- <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="submit" class="waves-button-input" value="Edit"></i>-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" style="text-align:center;">                                                
                            <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="button" id="btnprint" name="btnprint" class="waves-button-input" value="Print"></i>
                        </div>
                    </div>
                </div>

                

            </div>
            
        </div>
    </div>
    <?php
     include("admin-fooder.php");
     
    ?>  
    
    <!--Import jQuery before materialize.js-->
    <!--<script src="js/main.min.js"></script>-->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <!--<script src="js/materialize.min.js"></script>-->
    <!--<script src="js/custom.js"></script>-->

    <script>
        $(document).ready(function() {
            function printDiv() {
                //var divToPrint = document.getElementsByClassName('print')[0];
                var divToPrint = document.getElementById('print');
                var anotherWindow = window.open('VIDYADHIRAJA VIDYABHAVAN HIGHER SECONDARY SCHOOL', 'Print-Window');
                anotherWindow.document.open();
                anotherWindow.document.write('<html><style>.function-print{height: 99%;}.function-print body{height: 99%;} input[type="button"], input[type="submit"], input[type="reset"] {display: none;} a{display: none;} h3{color:black !important;}</style><body onload="window.print()">' + divToPrint.innerHTML + ' <br>I here by declare that the particulars entered in this form are true to the best of my knowledge and that I have read the rules of discipline of the school and that I undertake that my son/daughter will abide by them. I further declare that the date of birth of my daughter/son given above is correct and that I will not apply in future for correction of the date of birth<br><p style="col-6;float:left;">Date:</p><p style="col-6;" align="right">Signature of Applicant</p></body></html>');
                anotherWindow.document.close();
                setTimeout(function() {
                    anotherWindow.close();
                }, 10);
            }

            $('#btnprint').click(function() {                 
                printDiv();
            });
            $('#btnprinttop').click(function() {                 
                printDiv();
            });
        });

    </script>

</body>


</html>

<?php
//$con->close();
?>