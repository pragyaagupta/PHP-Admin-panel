<?php

include('header1.php');

$sql2="select * from categorytable";
$res1=mysqli_query($conn,$sql2);

if(isset($_POST['edit'])){
   // echo "hello";die;
    $title=$_POST['title'];
    $id=$_POST['idd'];
    if(!empty($_FILES['image']['name'])){
        $img_name=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path='images/'.$img_name;
        move_uploaded_file($tmp_name,$path);
        
    }
    
    $sql="UPDATE categorytable SET title='$title', image='$path' WHERE id=$id";
    
    $res=mysqli_query($conn,$sql);
    
    if($res){

        echo "<script> window.location='tablee1.php';</script>";

    }
    else{
        echo "not inserted";
    }


}

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
                        <h4 class="page-title">Products</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="form_b.php">Add Category</a></li>
                                  
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
                                <h5 class="card-title">Category table</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered" >
                                        <thead>
                                          <tr>
                                          <th>S.no</th>
                                            <th>Title</th>
                                      
                                            <th>Image</th>
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
                                                        <td> <?php echo $rows['title'];?></td>
                                                       
                                                        
                                                      <td> <img src="<?php echo $rows['image'];?>" style="width:100px; height=:100px;"</td>
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
                                                          url:"editcat.php",
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
                                                          url:"delcat.php",
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