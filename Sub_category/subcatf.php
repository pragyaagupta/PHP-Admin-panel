<?php
include('header1.php');


//if(mysqli_num_rows($res1)>0){

      //while($rows=mysqli_fetch_assoc($res1)){

       // $subid=$rows['id'];//}
      //}

if(isset($_POST['submit'])){

    $title=$_POST['title'];
    $subid=$_POST['category'];
    $status=1;
    
    if(!empty($_FILES['image']['name'])){
        $img_name=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path='images/'.$img_name;
        move_uploaded_file($tmp_name,$path);
        
    }
    
    $sql="insert into subcategory(category_id,title,image,status) values('$subid','$title','$path','$status')";
    
    $res=mysqli_query($conn,$sql);
    
    if($res){

        echo "<script> window.location='subcat.php';</script>";

    }
    else{
        echo "not inserted";
    }
}

$sql2="select * from categorytable";
$res1=mysqli_query($conn,$sql2);


 




?>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="col-sm-2 text-center">Add Subcategory</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Category</label>
                                        <div class="col-sm-5">
                                            <select class="form-control"  name="category">

                                              
                                                <option value="" name="cat">Select Category</option>
                                                <?php   

                                                if(mysqli_num_rows($res1)>0){
                                                while($rows=mysqli_fetch_assoc($res1)){?>
                                                 <option value="<?php echo $rows['id'];?>"> <?php echo $rows['title'];?> </option>

                                                            
                                                          <?php  }
                                                        }?>

                                    
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Title</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"  name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Image</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" name="image" >
                                        </div>
                                    </div>
                                    
                                <div>

                                    <div class="col-sm-2 text-center">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            
                            </form>
                        
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           