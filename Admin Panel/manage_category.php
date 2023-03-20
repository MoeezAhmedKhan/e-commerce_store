<?php require_once("header.php") ?>

<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Manage Category</h4>

                    <?php 

                                        if(isset($_SESSION['error']) && $_SESSION['error'] == "Image extension is wrong || You can insert jpg, png, jpeg and gif")
                                        {
                                            ?>
                                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                                            <?php 

                                            unset($_SESSION['error']);

                                        }
                                        elseif(isset($_SESSION['error']) && $_SESSION['error'] == "Image Should be less then 5 Mb")
                                        {
                                            ?>
                                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                                            <?php 

                                            unset($_SESSION['error']);

                                        }
                                        elseif(isset($_SESSION['error']) && $_SESSION['error'] == "Something Went Wrong")
                                        {
                                            ?>
                                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                                            <?php 

                                            unset($_SESSION['error']);

                                        }
                                        elseif(isset($_SESSION['success']) && $_SESSION['success'] == "Category Updated Successfully")
                                        {
                                            ?>
                                            <div class="alert alert-success" role="alert"><?php echo $_SESSION['success'] ?></div>
                                            <?php 

                                            unset($_SESSION['success']);
                                        }
                                        

                                        ?>

                                    <div class="alert alert-danger" role="alert" id="error-mesg" style="display: none;"></div>


                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Id</th>
                                <th>Category name</th>
                                <th class="text-center">Category Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                                <th>Delete</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                            require_once("phpfiles/connection.php");
                            $select = "SELECT `id`, `category_name`, `category_image`, `created_at` FROM `category`";
                            $run = mysqli_query($conn, $select);
                            $row = mysqli_num_rows($run);
                            $index = 0;
                            if ($row > 0) {
                                while ($ar = mysqli_fetch_array($run)) {
                                    $sn = $index +1;
                            ?>
                                    <tr>
                                        <td><?php echo $sn ?></td>
                                        <td name="id"><?php echo $ar['id'] ?></td>
                                        <td name="category_name"><?php echo $ar['category_name'] ?></td>
                                        <td hidden name="category_image"><?php echo $ar['category_image'] ?></td>
                                        <td class="text-center"><a href="./upload/<?php echo $ar['category_image'] ?>"><img src="./upload/<?php echo $ar['category_image'] ?>" height="30" width="30"></a></td>
                                        <td><?php echo $ar['created_at'] ?></td>
                                        <td><Button class="btn btn-primary edit-btn" onclick="openAddMore(<?php echo $ar['id'].','.$index  ?>)">Update</Button></td>
                                        <td><Button class="btn btn-danger delete-btn" data-did="<?php echo $ar['id'] ?>">Delete</Button></td>
                                    </tr>
                            <?php
                            $index ++;
                                }
                            } else {
                                ?>
                                <tr>No Category Found</tr>
                                <?php 
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div> <!-- end row -->

            <div id="modal">
                <div id="modal-form">
                    <h2>Edit</h2>
                    <form method="POST" action="phpfiles/action.php" enctype="multipart/form-data">
                         <div class="form-row">
                         <input type="hidden" name="id" id="Id"> 
                            <div class="col-xl-12 mb-3">
                                <label for="validationDefault01">Category name</label>
                                <input type="text" class="form-control" name="cname" id="CAT_NAME" id="validationDefault01">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="validationDefault01">Category Image</label>
                                <input type="file" class="form-control" name="new_cimage">
                                <input type="hidden" class="form-control" name="old_cimage" id="CATE_IMG" id="validationDefault01">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="update_cat_btn">Update</button>
                    </form>
                    <div id="close-btn">X</div>
                </div>
            </div>

</div> <!-- container-fluid -->

<?php require_once("footer.php")  ?>

<script>
    // show modal
    $(document).on("click",".edit-btn",function(){
        $("#modal").show(); 
    });
    // hide modal
    $("#close-btn").on("click",function(){
        $("#modal").hide();
    });
    
    function openAddMore(id,index)
    {   
        document.getElementById('CAT_NAME').value = document.getElementsByName('category_name')[index].innerText;
        document.getElementById('CATE_IMG').value = document.getElementsByName('category_image')[index].innerText;
        document.getElementById('Id').value = document.getElementsByName('id')[index].innerText;
    }
</script>

<script>
    $(document).ready(function(){
        $(document).on("click",".delete-btn",function(){
            var id = $(this).data("did");
            var element = this
            
            if(confirm("Do you really want to delete this category"))
            {
                $.ajax({
                    url:"ajaxfiles/delete_category.php",
                    type:"POST",
                    data:{c_id:id},
                    success: function(data){
                        if(data == 1){
                            $(element).closest("tr").fadeOut();
                        }
                        else
                        {
                            $("#error-mesg").html("Something went wrong while deleting record").slideDown();;
                        }
                    }
                });
            }

        });
    });
</script>