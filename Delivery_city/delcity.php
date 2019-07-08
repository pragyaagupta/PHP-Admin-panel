<?php

session_start();
include('connection.php');

  $userId=$_POST['c'];
  
  $sql2="DELETE from citytable WHERE city_id=$userId";
  $res2=mysqli_query($conn,$sql2);

  $req="SELECT * from citytable";
  $res1=mysqli_query($conn,$req);




?>
     <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" id="data1">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb" >
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="cityf.php">Add City</a></li>
                                  
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" >
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row" >
                    <div class="col-12">
                        <div class="card">
                            
                        
                        
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Available Cities</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered" >
                                        <thead>
                                          <tr>
                                          <th>S.no</th>
                                            <th>Name</th>
                                        
                                            <th>Pincode</th>
                                            <th>Status</th>
                                            <th colspan="2">Settings</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody>

                                                    
                                                    <?php
                                                    if(mysqli_num_rows($res1)>0){ $count=1;
                                                        while($rows=mysqli_fetch_assoc($res1)){?>
                                                        <tr>
                                                        <td> <?php echo $count;?></td>
                                                        <td> <?php echo $rows['name'];?></td>
                                                        <td> <?php echo $rows['pincode'];?></td>
                                                       
                                                       
                            
                                                      <td> <select>
                                                        <option value="0" <?php if($rows['status']==0){echo "selected";}?>> not available </option>

                                                        <option value="1" <?php if($rows['status']==1){echo "selected";}?>>available </option>

                                                      </select></td>
                                                        <td><input type="hidden" id="dataa_<?php echo $rows['id'];?>" value="<?php echo $rows['id'];?>"/>
                                                      <button type="button" id="cgg_<?php echo $rows['id'];?>">Edit</button>

                                                      <script type="text/javascript">
                                                  $(document).ready(function(){

                                                    $("#cgg_<?php echo $rows['id'];?>").click(function(){
                                                      var x=$("#dataa_<?php echo $rows['id'];?>").val();
                                                      

                                                         
                                                      $.ajax({
                                                          type:"post",
                                                          url:"editcity.php",
                                                          data:{x:x},
                                                          success:function(data){
                                                            $('#data1').css('display','block');
                                                            $('#data1').replaceWith(data);
                                                          }
                                                        });
                                                      });

                                                    


                                                  });
                                                </script>

                                                    </td>
                                                    
                                                    <td>
                                                      <input type="hidden" id="data_<?php echo $rows['id'];?>" value="<?php echo $rows['id'];?>"/>
                                                      <button type="button" id="cg_<?php echo $rows['id'];?>">Delete</button>
                                                      <script type="text/javascript">
                                                  $(document).ready(function(){

                                                    $("#cg_<?php echo $rows['id'];?>").click(function(){
                                                      var c=$("#data_<?php echo $rows['id'];?>").val();

                                                         
                                                      $.ajax({
                                                          type:"post",
                                                          url:"delcity.php",
                                                          data:{c:c},
                                                          success:function(data){
                                                            $('#data1').css('display','block');
                                                            $('#data1').replaceWith(data);
                                                          }
                                                        });
                                                      });

                                                    


                                                  });
                                                </script>
                                                    </td>

                                                        </tr>
                                                        <?php $count++; }   }
                                                     ?>
                                                        
     
                                                  </tbody>
                                            
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
           
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>