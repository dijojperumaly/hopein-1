<?php 
include("adminsession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("admin-header-links.php"); ?>
    <title>Vidyadhiraja-Application List</title>
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
                        <li class="active-bre"><a href="#">Application List</a>
                        </li>
                        <li class="page-back"><a href="index.php"><i class="fa fa-backward" aria-hidden="true"></i> Back to Website</a>
                        </li>
                    </ul>
                </div>
                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Application List</h4>
                                    <!--<p>All about students like name, student id, phone, email, country, city and more</p>-->
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi" id="table_div">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
													<th>Application No</th>
                                                    <th>Sex</th>
													<th>Contact</th>
													<th>Standard</th>
													<th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">Acive</span>
                                                    </td>
													<td><a href="#!" target="_blank" class="ad-st-view"></a></td>
													<td><a href="admin-page-edit.html" class="ad-st-view"></a></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include("admin-fooder.php"); ?>

<script>
$(document).ready(function() {

        window.all = function() {
            // Ajax config
            //alert("called all");
            $.ajax({
                type: "GET", //we are using GET method to get all record from the server
                url: 'admin-application-all.php', // get the route value
                beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click									
                    //$(".se-pre-con").fadeIn("slow");									
                    $("#table_div").html("<center><img src='images/loader.gif' width='50px'/></center>");
                },
                success: function(response) { //once the request successfully process to the server side it will return result here
                    //alert(response);
                    // Parse the json result
                    response = JSON.parse(response);

                    //var html = '<table class="table table-striped" id="tablepaging">';
                    var html = '<table class="table table-hover tableData" id="tablepaging">';
   
                    html += "<thead>"+                       
                        "<tr>" +
                        "<th><input type='checkbox' name='selectAll' id='selectAll' class='select-checkbox' onclick='selectAll(this)' style='position: relative !important; opacity: 1 !important;left: unset !important;'></th>" +
                        "<th style='display:none;'>Admissionyear</th>" +
                        "<th>Name</th>" +
                        "<th>Application No</th>" +
                        "<th>Sex</th>" +
                        "<th>Contact</th>" +
                        "<th>Standard</th>" +                                                                       
                        "<th  style='display:none;'>Aadhar No</th>" +
                        "<th  style='display:none;'>Bloodgroup  </th>" +
                        "<th  style='display:none;'>Email </th>" +
                        "<th  style='display:none;'>fathername </th>" +
                        "<th  style='display:none;'>Fatheroccupation </th>" +
                        "<th  style='display:none;'>Address </th>" +
                        "<th  style='display:none;'>Mothername </th>" +
                        "<th  style='display:none;'>Motheroccupation </th>" +
                        "<th  style='display:none;'>Guardianname </th>" +
                        "<th  style='display:none;'>Guardianrelation </th>" +
                        "<th  style='display:none;'>Guardianoccupation </th>" +
                        "<th  style='display:none;'>Guardianaddress </th>" +
                        "<th  style='display:none;'>Previousschool </th>" +
                        "<th  style='display:none;'>Yearstuded </th>" +
                        "<th  style='display:none;'>Standaredstuded </th>" +
                        "<th  style='display:none;'>DateofAdmission </th>" +
                        "<th  style='display:none;'>DateLeaving </th>" +
                        "<th  style='display:none;'>Remarks </th>" +
                        "<th  style='display:none;'>DateofBirth </th>" +
                        "<th  style='display:none;'>Age </th>" +
                        "<th  style='display:none;'>Religion </th>" +
                        "<th  style='display:none;'>Caste </th>" +
                        "<th  style='display:none;'>Placebirth </th>" +
                        "<th  style='display:none;'>Nationality </th>" +
                        "<th  style='display:none;'>State</th>" +
                        "<th  style='display:none;'>Community</th>" +
                        "<th  style='display:none;'>Mothertongue</th>" +
                        "<th  style='display:none;'>VaccinationDate</th>" +
                        "<th  style='display:none;'>Body Mark1</th>" +
                        "<th  style='display:none;'>Body Mark2 </th>" +
                        
                        "<th></th>" +
                        "<th></th>" +
                        "<th></th>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody>";
                    // Check if there is available records
                    if (response.length) {
                        //html += '<div class="list-group">';
                        // Loop the parsed JSON
                        $.each(response, function(key, value) {                              
                            if(value.isreaded==0)                          {
                                html += "<tr>" ;
                            }else{
                                html += "<tr style='background-color:#e3e8ea;'>" ;
                            }
                            html += 
                                "<td width='5%'>"+
                                "<input type='checkbox' name='chkselect' id='chkselect' value='"+ value.appid +"' style='position: relative !important; opacity: 1 !important;left: unset !important;'></td>" +
                                "<td width='20%' style='display:none;'><b>" + value.admissionyear +  "</td>" + 
                                "<td width='20%'><a href='admin-application-details.php?id="+value.appid+"'><b>" + value.name +  "</b></a></td>" +                                            
                                "<td width='20%'><a href='admin-application-details.php?id="+value.appid+"'>" +  value.appno + "</a></td>" +                                
                                "<td width='10%'>" + value.sex + "</td>" +                                 
                                "<td width='20%'>" + value.contact + ", <br>" + value.alternatecontact + "</td>" +                                            
                                "<td width='10%'>"+ value.admissionstandard +"</td>" +    
                                "<td width='10%' style='display:none;'>"+ value.aadharno +"</td>" +                              
                                "<td width='10%' style='display:none;'>"+ value.bloodgroup +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.email +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.fathername +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.fatheroccupation +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.address +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.mothername +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.motheroccupation +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.guardianname +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.guardianrelation +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.guardianoccupation +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.guardianaddress +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.previousschool +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.yearstuded +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.standaredstuded +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.dateadmission +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.dateleaving +"</td>" +
                                "<td width='10%' style='display:none;'>"+ value.remarks +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.dateofbirth +"</td>" +  
                                "<td width='10%' style='display:none;'>"+ value.age +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.religion +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.caste +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.placebirth +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.nationality +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.state +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.community +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.mothertongue +"</td>" + 
                                "<td width='10%' style='display:none;'>"+ value.vaccinationdate +"</td>" +
                                "<td width='10%' style='display:none;'>"+ value.bodymark1 +"</td>" +
                                "<td width='10%' style='display:none;'>"+ value.bodymark2 +"</td>" +                         
                                "<td>" +                                            
                                "<a href='admin-application-details.php?id="+value.appid+"' class='ad-st-view'>view</a></td>" +
                                "<td>" +                                            
                                "<a href='admin-application-edit.php?id="+value.appid+"' class='ad-st-edit'>edit</a></td>" +
                                "<td>" +                                            
                                "<a href='#' class='ad-st-delete' onClick='deleteItem(" + value.appid + ",this)'>delete</a></td>" +
                                "</tr>";
                        });
                        html += "</tbody></table>";
                        html += '<p><input type="button" name="btndeleteall" id="btndeleteall" class="btn btn-danger" value="Delete" onclick="getSelected(this)" style="float:left;margin:2px 6px;"></p>';                        
                        //html += '</div>';
                    } else {
                        html += '<div class="alert alert-warning">';
                        html += 'No records found!';
                        html += '</div>';
                    }
                    
                    $("#table_div").html(html);
                    //$("#tablepaging").html(html);
                    $(".se-pre-con").fadeOut("slow");
                    tablePagination();
                },
                complete: function(data) {
                    // Hide image container
                    $(".se-pre-con").fadeOut("slow");
                }
            });
        }

        window.tablePagination = function() {
            //new DataTable('#tablepaging');
            //$('#tablepaging').DataTable();
            new DataTable('#tablepaging', {
                layout: {
                    extend: "pdf",
                    exportOptions: {
                        columns: [1,2]
                    },
                    topStart: {
                        //buttons: ['pageLength','copy', 'excel', 'pdf','print']// 'colvis'],
                        buttons: [
                            'pageLength',
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    //columns: [0, ':visible']
                                    columns: [1, 2, 3, 4, 5]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [2,3,4,5,7,25]
                                }
                            },
                            
                        ]
                    },
                    
                    
                },
                
                responsive: true,
                columnDefs: [ {
                    'targets': [0,6,7,8], 
                    'orderable': false, 
                }],
                
            });
            //$('.dataTables_length').addClass('bs-select');
            /*var table = $('#tablepaging').DataTable({
                rowReorder: false,
                pageLength: 10,
                sPaginationType: "first_last_numbers", //"full", //"simple_numbers" //"simple",	
                stateSave: true,
                "bDestroy": true, 
                "order": [], //Initial no order.
                "aaSorting": [],
                columnDefs: [ {
                    'targets': [0], 
                    'orderable': false, 
                }],                            
            }); */                
            
        }

    window.deleteItem=function (id, obj,delbtn=0) {
        //alert(id);
        let caption=obj.value;
        bootbox.confirm({
            //title: "Delete",
            onEscape: true,
            size: 'small',
            message: 'Are you sure? do you want to delete!',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result) {
                    obj.value="Processing...";
                    obj.disabled=true;
                    $.ajax({
                        type: "GET", //we are using POST method to submit the data to the server side
                        url: "admin-application-delete.php?delid=" + id, // get the route value								
                        //data: JSON.stringify({delcid:id}), // our serialized array data for server side
                        timeout: 100,
                        async: false,
                        beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click
                            //$this.attr('disabled', true).html("Processing...");
                            $(".se-pre-con").fadeIn("slow");
                        },
                        success: function(response) { //once the request successfully process to the server side it will return result here
                            //$this.attr('disabled', false).html($caption);
                            //alert(response);
                            try {
                                var json = $.parseJSON(response);
                                //var json = JSON.parse(response);
                                var res_status = json["status"];
                                if (res_status == "success") {
                                    ShowAlert("", "Successfully Deleted ", "success");
                                    $(obj).closest('tr').remove();
                                    if(delbtn==1){
                                        all();
                                        //tablePagination();
                                    }
                                    

                                } else {
                                    ShowPopUpAlert("", "Not saved! please enter correct data", "danger");
                                    obj.value=caption;
                                    obj.disabled=false;
                                }
                            } catch (e) {
                                ShowPopUpAlert("", "Not saved! please enter correct data/try after sometime", "danger");
                                obj.value=caption;
                                obj.disabled=false;
                            }

                            // Reset form

                        },
                        complete: function(data) {
                            // Hide image container
                            $(".se-pre-con").fadeOut("slow");
                            obj.value=caption;
                            obj.disabled=false;
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            ShowPopUpAlert(textStatus, errorThrown, "danger");
                            $(".se-pre-con").fadeOut("slow");
                            obj.value=caption;
                            obj.disabled=false;
                        }
                    });
                }
            }
        });
    }

    all();
    //tablePagination();
});

function getSelected(obj){
    var pid="0";    
    $('input[name="chkselect"]:checked').each(function() {
    pid+=","+this.value;
    });	
   
    if(pid!="0"){
        deleteItem(pid,obj,1);
    }else{
        bootbox.alert('Please select delete item!');
        //alert("select item");
    }

}

function selectAll(obj) {
    //e.preventDefault();
    var selectedIds = [];        
    if(obj.checked){
    $('#tablepaging').find('input:checkbox').prop('checked', true);
    }else{
    $('#tablepaging').find('input:checkbox').prop('checked', false);
    }

}
function getStatus(statusvalue,obj){
    var pid="0";
    $('input[name="chkselect"]:checked').each(function() {
    pid+=","+this.value;
    });	
    let productstatus=$("#productstatus").val();
    if(pid!="0"){
    //alert(productstatus+" "+pid);
    bootbox.confirm({
    //title: "Delete",
    onEscape: true,
    size: 'small',
    message: 'Are you sure? do you want to update the product status!',
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-danger'
        },
        cancel: {
            label: 'No',
            className: 'btn-success'
        }
    },
    callback: function(result) {                
        if (result) {
            obj.value="Processing...";
            obj.disabled=true;
            $.ajax({
                type: "GET", //we are using POST method to submit the data to the server side
                url: "product_status_update.php?id=" + pid + "&productstatus="+productstatus, // get the route value								
                //data: JSON.stringify({delcid:id}), // our serialized array data for server side
                timeout: 100,
                async: false,
                beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click
                    //$this.attr('disabled', true).html("Processing...");
                    $(".se-pre-con").fadeIn("slow");
                },
                success: function(response) { //once the request successfully process to the server side it will return result here
                    //$this.attr('disabled', false).html($caption);
                    //alert(response);
                    try {
                        var json = $.parseJSON(response);
                        //var json = JSON.parse(response);
                        var res_status = json["status"];
                        if (res_status == "success") {
                            ShowAlert("", "Successfully Updated ", "success");
                            $(obj).closest('tr').remove();
                            all();
                            tablePagination();

                        } else {
                            ShowPopUpAlert("", "Not saved! please enter correct data", "danger");
                        }
                    } catch (e) {
                        ShowPopUpAlert("", "Not saved! please enter correct data/try after sometime", "danger");
                    }

                    // Reset form

                },
                complete: function(data) {
                    // Hide image container
                    $(".se-pre-con").fadeOut("slow");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    ShowPopUpAlert(textStatus, errorThrown, "danger");
                    $(".se-pre-con").fadeOut("slow");
                }
            });
        }
    }
});
}else{
    bootbox.alert('Please select update item!');
}

}
</script>

</body>


</html>