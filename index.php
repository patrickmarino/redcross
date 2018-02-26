<?php
    include_once 'includes/connect.php';
    include_once 'includes/login.php';
    
     ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="img/red.png" type="image/gif" >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Philippine Redcross QC Chapter</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <?php include_once 'common/nav.php'; ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Button trigger modal -->
                <br>
                <br>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h5 class="modal-title" id="exampleModalLabel">Add a Volunteer
                                </center>
                                </h5>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
                            <div class="modal-body">
                                <form action ="" method="POST" id="insert_form">
                                    <div class="form-group">
                                        <div class="container">
                                            <div class="row">
                                                <!-- Column 1 -->
                                                <div class="col-sm">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="ln" id="ln" required><br>
                                                    <label>Blood Type</label>
                                                    <select class="custom-select" name="bloodtype" id="bloodtype" required>
                                                        <option>A-</option>
                                                        <option>A+</option>
                                                        <option>AB-</option>
                                                        <option>AB+</option>
                                                        <option>B+</option>
                                                        <option>B-</option>
                                                        <option>O-</option>
                                                        <option>O+</option>
                                                    </select>
                                                    <label> <br>Age</label>
                                                    <input type="text" class="form-control" name="age"  id="age" required><br>
                                                    <label>Profession</label>
                                                    <input type="text" class="form-control" name="profession" id="profession" required><br>       
                                                </div>
                                                <!-- Column 2 -->
                                                <div class="col-sm">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="fn" id="fn" required><br>
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" name="contact" id="contact" maxlength="11" required><br>
                                                    <label>Birthdate</label>
                                                    <input class="form-control" type="date"  name="bday" id="bday" required><br>
                                                    <label>MAAB</label>
                                                    <input class="form-control" type="date"  name="maab" id="maab" required><br>
                                                </div>
                                                <!-- Column 3 -->
                                                <div class="col-sm">
                                                    <label>Middle Name</label>
                                                    <input type="text" class="form-control" name="mn" id="mn" required>
                                                    <label><br>Volunteer Type</label>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="volunteer-type" name="volunteer_type[]" value="green army">Green Army</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="volunteer-type" name="volunteer_type[]" value="red army">Red Army</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="volunteer-type" name="volunteer_type[]" value="emergency response unit" >Emergency Response Unit</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="volunteer-type" name="volunteer_type[]" value="dms instructor" >DMS Instructor</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="volunteer-type" name="volunteer_type[]" value="ss instructor" >SS Instructor</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="volunteer-type" name="volunteer_type[]" value="redcross youth" >Redcross Youth</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><label>Street</label>
                                                    <input type="text" class="form-control street" name="street" id="street" value="delapaz" required>
                                                </div>
                                                <div class="col">
                                                    <label>District</label>
                                                    <input type="text" class="form-control district" name="district_name" id="district_name" value="pag-asa" required>
                                                </div>
                                                <div class="col">
                                                    <label>Barangay</label>
                                                    <input type="text" class="form-control barangay" name="barangay"  id="barangay" value="caniogan" required>
                                                </div>
                                                <div class="col"><label>City</label>
                                                    <input  type="text" class="form-control city" name="ct"  id="ct" value="pasig" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="form-label">Status: </label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input status" type="radio" name="status_option" id="statusOption1" value="active" checked>
                                                            <label class="form-check-label" for="statusOption1">
                                                            Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input status" type="radio" name="status_option" id="statusOption2" value="inactive">
                                                            <label class="form-check-label" for="statusOption2">
                                                            Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div id="map"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="submit" id="submit" class="btn btn-danger " value="Add Volunteer" >
                                        <input type="hidden" name="volunteer_id" id="volunteer_id" />
                                        <input type="hidden" class="latitude" name="latitude">
                                        <input type="hidden" class="longitude" name="longitude">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        /*if (isset($_POST['submit'])) 
                        {
                          $volunteer_type=$_POST['voltype'];
                            $last_name=$_POST['ln'];
                            $first_name=$_POST['fn'];
                            $middle_name=$_POST['mn'];
                            $full_name = $first_name . " " . $middle_name . " " . $last_name;
                            $blood_type=$_POST['bloodtype'];
                            $profession=$_POST['profession'];
                            $age=$_POST['age'];
                            $contact=$_POST['contact'];
                            $birthdate=$_POST['bday'];
                            $street=$_POST['street'];
                            $barangay=$_POST['barangay'];
                            $district_id=$_POST['district'];
                            $city=$_POST['ct']; 
                            $volunteer_id =$_POST['volunteer_id'];
                            $latitude = $_POST['latitude'];
                            $longitude = $_POST['longitude'];
                        
                            if($_POST['volunteer_id'] !='')
                            {
                        
                                 if(mysqli_query($conn,
                                  "UPDATE volunteers 
                                   SET volunteer_type = '$volunteer_type',
                                   last_name = '$last_name',
                                   first_name = '$first_name',
                                   middle_name = '$middle_name',
                                   blood_type = '$blood_type',
                                   profession = '$profession',
                                   age = '$age',
                                   contact_number = '$contact',
                                   birthdate = '$birthdate',
                                   street = '$street',
                                   barangay = '$barangay',
                                   district_id = '$district_id',
                                   city = '$city'
                                   WHERE volunteer_id = '$volunteer_id' "));
                                  {
                                  echo "<meta http-equiv='refresh' content='0'>";
                                  }
                            }
                            else
                            {
                                  if(mysqli_query($conn,"INSERT INTO volunteers(volunteer_type,last_name,first_name,middle_name,full_name,blood_type,profession,age,contact_number,birthdate,street,barangay,district_id,city, latitude, longitude) 
                                VALUES('$volunteer_type','$last_name','$first_name','$middle_name','$full_name','$blood_type','$profession','$age','$contact','$birthdate','$street','$barangay','$district_id','$city', '$latitude', '$longitude');"))
                            {
                            echo "<meta http-equiv='refresh' content='0'>";
                          }
                        
                            }
                        }*/
                        
                        ?>
                    <br>
                    <!-- /Card Columns-->
                </div>
                <!-- Example DataTables Card-->
                <!-- Example split danger button -->
                &nbsp;&nbsp; <button type="button" id="add" class="btn btn-danger pull-right" data-toggle="modal" data-target="#exampleModal">Add Volunteer</button><br><br>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Volunteers
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Volunteer ID</th>
                                    <th>Volunteer Type</th>
                                    <th>Volunteer Name</th>
                                    <th>Blood Type</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                ?>
                            <tr>
                                <td><?php echo $row["volunteer_id"]; ?></td>
                                <td><?php echo $row["volunteer_type"]; ?></td>
                                <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?></td>
                                <td><?php echo $row['blood_type']; ?></td>
                                <td>
                                    <input type="button" name="view" value="View" id="<?php echo $row["volunteer_id"]; ?>" class="btn btn-primary btn-sm view_data"/>
                                </td>
                                <td>
                                    <input type="button" name="edit" value="Edit" id="<?php echo $row["volunteer_id"]; ?>" class="btn btn-primary btn-sm edit_data"/>
                                </td>
                                <td>
                                    <input type="button" onclick="return checkDelete()" name="delete" value="Delete" id="<?php echo $row["volunteer_id"]; ?>"onclick="return checkDelete()" class="btn btn-danger btn-sm delete_data"/>
                                </td>
                            </tr>
                            <?php 
                                } // closure ng while loop 
                                ?>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <?php include_once 'common/footer.php';?>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
        </a>
        <script src="js/pouchdb-1.1.0.js"></script>
       <script src="js/leaflet-src.js"></script>
       <script src="js/map.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-datatables.min.js"></script>
        <script src="js/sb-admin-charts.min.js"></script>
        <?php include_once 'common/je-scripts.php'; ?>
        </div>
    </body>
</html>
<div id ="volunteerModal" class="modal fade">
    <div class = "modal-dialog modal-dialog-centered">
        <div class ="modal-content">
            <div class = "modal-header">
                <center>
                    <h5 class="modal-title" id="exampleModalLabel">Volunteer Details
                </center>
                </h5>
            </div>
            <div class="modal-body" id="volunteer_detail">
                <label>Enter Employee Name</label>  
                <input type="text" name="name" id="name" class="form-control" />  
            </div>
            <div class ="modal-footer">
                <button type = "button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
    
    
      $('#add').click(function(){  
         $('#exampleModalLabel').text('Add a Volunteer');
             $('#insert').val("Insert");  
             $('#insert_form')[0].reset(); 
              $('#submit').val('Add Volunteer');  
        });  
      $('#insert_form').on("submit", function(event){  
      });
    
      //editing
     $(document).on('click', '.edit_data', function(){  
             var volunteer_id = $(this).attr("id");  
             $.ajax({  
                  url:"fetch.php",  
                  method:"POST",  
                  data:{volunteer_id:volunteer_id},  
                  dataType:"json",  
                  success:function(data){  
                       $('#ln').val(data.last_name);  
                       $('#bloodtype').val(data.blood_type);  
                       $('#age').val(data.age);    
                       $('#fn').val(data.first_name);  
                       $('#voltype').val(data.volunteer_type); 
                       $('#contact').val(data.contact_number);  
                       $('#mn').val(data.middle_name);  
                       $('#profession').val(data.profession); 
                       $('#bday').val(data.birthdate);  
                       $('#street').val(data.street);  
                       $('#barangay').val(data.barangay); 
                       $('#district_name').val(data.district_name);  
                       $('#ct').val(data.city); 
                       $('#volunteer_id').val(data.volunteer_id); 
                       $('#submit').val('Update'); 
                       $('#exampleModalLabel').text('Update this');

                       // For additional Fields
                       // latitude
                       $(".latitude").val(data.latitude);
                       // longitude
                       $(".longitude").val(data.longitude);
                       // maab
                       $("#maab").val(data.maab);

                       // status
                       $('input:radio.status[value="'+ data.status +'"]').prop("checked", "checked");
                       // volunteer type
                       var splittedVolunteerType= data.volunteer_type.split(",");
                       for(var x = 0; x < splittedVolunteerType.length; x++) {
                            $('input:checkbox.volunteer-type[value="'+ splittedVolunteerType[x] +'"]').prop("checked", "checked");
                       }
                       $('#exampleModal').modal('show');  
                  }  
             });  
        });  
    
     //deleting
      $(document).on('click', '.delete_data', function(){  
    
             var result = confirm("Are you sure you want to delete this volunteer?") 
             if (result)
             {
    
                  var volunteer_id = $(this).attr("id");  
                  $.ajax({  
                  url:"delete.php",  
                  method:"POST",  
                  data:{volunteer_id:volunteer_id},   
                  success:function(data){      
                       $('#volunteer_id').val(data.volunteer_id); 
                       window.location.reload();
                  }  
             });  
    
             }
        });  
    
      //viewing
      $('.view_data').click(function(){
        var volunteer_id = $(this).attr("id");
    
        $.ajax({
            url:"select.php",
            method:"POST",
            data:{volunteer_id:volunteer_id},
            success:function(data){
              $('#volunteer_detail').html(data);
              $('#volunteerModal').modal("show");
            }
        });
      });
    
      //datatable
      $('#dataTable').DataTable();
    
    });
</script>