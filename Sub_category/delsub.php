  
<?php
session_start();
include('connection.php');

$sql2="select subcategory.*,categorytable.title as categoryName from subcategory left join categorytable on subcategory.category_id=categorytable.id ";
$res1=mysqli_query($conn,$sql2);

  $userId=$_POST['c'];
  
  $sql2="DELETE from subcategory WHERE id=$userId";
  $res2=mysqli_query($conn,$sql2);

  $req="SELECT * from categorytable";
  $req2=mysqli_query($conn,$req);




?>








  <div class="page-wrapper" id="data2">
            <!-- ============================================================== -->
            <!-- Bread c_rumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Products</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="subcatf.php">Add subcategory</a></li>
                                  
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                        
                        
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sub category table</h5>
                                <div class="table-responsive">
                                    <table id="dat" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                          <th>S.no</th>
                                          <th>Category</th>
                                          
                                            <th>Title</th>
                                      
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th colspan="2">Settings</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody>

                                                    
                                                    <?php
                                                      $i=1;
                                                        while($rows=mysqli_fetch_assoc($res1)){?>
                                                        <tr>
                                                        <td> <?php echo $i;?></td>
                                                        <td><?php echo $rows['categoryName'];?></td>
                                                      
                                                        <td> <?php echo $rows['title'];?></td>
                                                       
                                                        
                                                      <td> <img src="<?php echo $rows['image'];?>" style="width:100px; height=:100px;"</td>
                                                      <td> <select id="sel_<?php echo $rows['id'];?>" >

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
                                                          url:"editsub.php",
                                                          data:{x:x },
                                                          success:function(data){
                                                            $('#data2').css('display','block');
                                                            $('#data2').replaceWith(data);
                                                          }
                                                        });
                                                      });


                                                    $("#sel_<?php echo $rows['id'];?>").change(function(){
                                                      var x=$("#dataa_<?php echo $rows['id'];?>").val();
                                                       var status= $("#sel_<?php echo $rows['id'];?>").val();
                                                       
                                                      
                                                         
                                                      $.ajax({
                                                          type:"post",
                                                          url:"status.php",
                                                          data:{x:x , status:status},
                                                          success:function(data){
                                                            return false;
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
                                                          url:"delsub.php",
                                                          data:{c:c},
                                                          success:function(data){
                                                            $('#data2').css('display','block');
                                                            $('#data2').replaceWith(data);
                                                          }
                                                        });
                                                      });

                                                    


                                                  });
                                                </script>
                                                    </td>

                                                        </tr>
                                                        <?php $i++; } 
                                                     ?>
                                                        
     
                                                  </tbody>
                                            
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
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
</html