<?php

include "../connection.php";



?>
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>AGENT-DETAILS</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-striped text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Agent Name</th>
                                                                <th>Agent Email</th>
                                                                <th>Password</th>
                                                                <th>Branch Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                           $query = mysqli_query($connection,"select agent.*,branch.branch_name from agent join branch on branch.branch_id = agent.branch_id");
                                                           
                                                           foreach($query as $value){
                                                            ?>
                                                            <tr>
                                                                <td> <?php echo $value['agent_id']?> </td>
                                                                <td> <?php echo $value['agent_name']?> </td>
                                                                <td> <?php echo $value['agent_email']?> </td>
                                                                <td> <?php echo $value['agent_password']?> </td>
                                                                <td> <?php echo $value['branch_name']?> </td>
                                                                <td>
                                                                <!-- delete -->
                                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                                                                data-bs-target="#delete<?php echo $value['agent_id']?>">Delete</button>


                                                                <!-- edit/update -->
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" 
                                                                data-bs-target="#edit<?php echo $value['agent_id']?>">Edit</button>

                                                                <button type="button" class="btn btn-primary" 
                                                                    onclick="window.open('agent_report.php?id=<?php echo $value['agent_id']; ?>')">
                                                                    Download Info
                                                                </button>

                                                                
                                                                </td>
                                                            </tr>
                                                                <!-- delete -->
                                                <!-- Modal -->
                                                <!-- Modal for Delete -->

                                                <div class="modal fade" id="delete<?php echo $value['agent_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content modal-confirm">
                                                        <form action="public.php?agent-details" method="post">
                                                    <div class="modal-header flex-column">
                                                        <div class="icon-box">
                                                            <i class="material-icons">&#xE5CD;</i>
                                                        </div>						
                                                        <h4 class="modal-title w-100">Are you sure?</h4>	
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?php echo $value['agent_id']?>">
                                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger" name="agent_delete">Delete</button>
                                                    </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>



                                                <!-- EDIT MODAL -->

                                                <!-- Modal -->
                                                 <!-- Modal for Edit -->
                                                 <div class="modal fade" id="edit<?php echo $value['agent_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="public.php?agent-details" method="post">
                                                                    <div class="modal-header bg-primary text-white">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Agent Details</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="agent_id" value="<?php echo $value['agent_id']; ?>">

                                                                        <div class="row">
                                                                            <div class="col-12 mb-3">
                                                                                <label class="form-label fw-bold">Agent Name</label>
                                                                                <input type="text" name="agentname" value="<?php echo $value['agent_name']; ?>" class="form-control" placeholder="Enter agent name" required>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <label class="form-label fw-bold">Agent Email</label>
                                                                                <input type="email" name="agentemail" value="<?php echo $value['agent_email']; ?>" class="form-control" placeholder="Enter agent email" required>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <label class="form-label fw-bold">Agent Password</label>
                                                                                <input type="text" name="agentpassword" value="<?php echo $value['agent_password']; ?>" class="form-control" placeholder="Enter agent password" required>
                                                                            </div>
                                                                            <label class="form-label fw-bold">Branch Name:</label>
                                                                                <select class="form-control" name="branch_id" required>
                                                                                    <?php
                                                                                        $branches = mysqli_query($connection, "SELECT * FROM branch");
                                                                                        while ($branch = mysqli_fetch_assoc($branches)) {
                                                                                            $selected = $branch['branch_id'] == $value['branch_id'] ? 'selected' : '';
                                                                                            echo "<option value='{$branch['branch_id']}' $selected>{$branch['branch_name']}</option>";
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="agent_edit" class="btn btn-success">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                                  
                                                         
                                        <!-- Background Utilities table end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Custom js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

        <!-- Del Modal -->
        <link rel="stylesheet" href="assets/css/delmodal.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>






<?php
// DELETE AGENT 
if(isset($_POST['agent_delete'])){

    // echo "<script>
    //     alert('Data deleted successfully')
    //     </script>";

    // die();
    $agent_id = $_POST['id'];
    $deleteData = mysqli_query($connection, "DELETE FROM agent WHERE agent_id = '$agent_id'");
    if($deleteData){
        echo "<script>
        alert('Data deleted successfully')
        location.assign('public.php?agent-details')
        </script>";
    }
}

// UPDATE AGENT code
if(isset($_POST['agent_edit'])){

    //  echo "<script>
    //     alert('hellooo')
    //     </script>";

    // die();

    $agentid = $_POST['agent_id'];
    $agentName=$_POST['agentname'];
    $agentemail=$_POST['agentemail'];
    $agentpassword=$_POST['agentpassword'];
    $branch_id = $_POST['branch_id'];
    

    $editQuery = mysqli_query($connection, "UPDATE agent SET agent_name = '$agentName', agent_email = '$agentemail', agent_password ='$agentpassword', branch_id = '$branch_id' WHERE agent_id = '$agentid'");
    if($editQuery){
        echo "<script>
        alert('Data updated successfully')
         location.assign('public.php?agent-details')
        </script>";
    }
}

?>