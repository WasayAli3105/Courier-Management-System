<?php

include "../connection.php";

?>
    <!-- Delete Modal Links -->
    <link rel="stylesheet" href="assets/css/delmodal.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        
                                        <!-- Courier Details Table Start -->
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>COURIERS-Details</h5>
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
                                                    <table class="table table-striped jambo_table table-hover text-center">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th class="column-title">Sender&nbsp;Name</th>&nbsp;&nbsp;&nbsp;
                                                                <th>Sender Email</th>
                                                                <th>Sender&nbsp;Contact</th>
                                                                <th>Courier&nbsp;Type</th>
                                                                <th>Receiver&nbsp;Name</th>
                                                                <th>Receiver&nbsp;Email</th>
                                                                <th>Receiver&nbsp;Contact</th>
                                                                <th>Receiver&nbsp;Address</th>
                                                                <th>Parcel&nbsp;Weight</th>
                                                                <th>Price</th>
                                                                <th>Status</th>
                                                                <th>Tracking&nbsp;ID</th>
                                                                <th>Branch&nbsp;Name</th>
                                                                <th>Delete&nbsp;Action</th>
                                                                <th>Update&nbsp;Action</th>
                                                                <th>Shipment&nbsp;Report</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        <?php
                                                        // View Courier 

                                                        $courier_query = mysqli_query($connection,"SELECT courier.*,branch.branch_name
                                                                        FROM courier JOIN branch on branch.branch_id = courier.branch_id");

                                                        foreach($courier_query as $value){
                                                            ?>
                                                        
                                                            <tr>
                                                                <th scope="row"><?php echo $value['courier_id']  ?></th>
                                                                <td class=""><?php echo $value['sender_name']  ?></td>
                                                                <td><?php echo $value['sender_email']  ?></td>
                                                                <td><?php echo $value['sender_contact']  ?></td>
                                                                <td><?php echo $value['courier_type']  ?></td>
                                                                <td><?php echo $value['receiver_name']  ?></td>
                                                                <td><?php echo $value['receiver_email']  ?></td>
                                                                <td><?php echo $value['receiver_contact']  ?></td>
                                                                <td><?php echo $value['receiver_address']  ?></td>
                                                                <td><?php echo $value['parcel_weight']  ?></td>
                                                                <td><?php echo $value['price']  ?></td>
                                                                <td><?php echo $value['status']  ?></td>
                                                                <td><?php echo $value['tracking_no']  ?></td>
                                                                <td><?php echo $value['branch_name']  ?></td>
                                                                <!-- Edit Courier -->
                                                                <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value['courier_id'] ?>">Delete</button></td>
                                                                <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $value['courier_id'] ?>">Update</button></td>
                                                                <td><a href="shipmentreport.php?id=<?php echo $value['courier_id']?>"><button type="button" class="btn btn-primary">Download Report</button></a></td>

                                                            </tr>
                                                            
                                                                                                                        
                                                        <!-- </tbody> -->

                                        <!-- delete -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete<?php echo $value['courier_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-confirm">
                                                <form action="../code.php" method="post">
                                            <div class="modal-header flex-column">
                                                <div class="icon-box">
                                                    <i class="material-icons">&#xE5CD;</i>
                                                </div>						
                                                <h4 class="modal-title w-100">Are you sure?</h4>	
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $value['courier_id']?>">
                                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" name="courierDelete">Delete</button>
                                            </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                        

                                        <!-- edit modal -->

                                        <!-- Modal -->
                                        <!-- Modal -->
                                            <div class="modal fade" id="edit<?php echo $value['courier_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form action="../code.php" method="post" enctype="multipart/form-data">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Box</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?php echo $value['courier_id']?>">

                                                                <div class="row">
                                                                    <!-- Sender Information -->
                                                                    <div class="col-md-6">
                                                                        <h6 class="text-primary">Sender Information</h6>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Sender Name</label>
                                                                            <input type="text" name="senderName" value="<?php echo $value['sender_name']?>" class="form-control" placeholder="Sender Name">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Sender Email</label>
                                                                            <input type="email" name="senderEmail" value="<?php echo $value['sender_email']?>" class="form-control" placeholder="Sender Email">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Sender Contact</label>
                                                                            <input type="text" name="senderContact" value="<?php echo $value['sender_contact']?>" class="form-control" placeholder="Sender Contact">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Sender Address</label>
                                                                            <input type="text" name="senderAddress" value="<?php echo $value['sender_address']?>" class="form-control" placeholder="Sender Address">
                                                                        </div>
                                                                    </div>

                                                                    <!-- Receiver Information -->
                                                                    <div class="col-md-6">
                                                                        <h6 class="text-primary">Receiver Information</h6>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Receiver Name</label>
                                                                            <input type="text" name="receiverName" value="<?php echo $value['receiver_name']?>" class="form-control" placeholder="Receiver Name">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Receiver Email</label>
                                                                            <input type="email" name="receiverEmail" value="<?php echo $value['receiver_email']?>" class="form-control" placeholder="Receiver Email">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Receiver Contact</label>
                                                                            <input type="text" name="receiverContact" value="<?php echo $value['receiver_contact']?>" class="form-control" placeholder="Receiver Contact">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Receiver Address</label>
                                                                            <input type="text" name="receiverAddress" value="<?php echo $value['receiver_address']?>" class="form-control" placeholder="Receiver Address">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <!-- Parcel Details -->
                                                                    <div class="col-md-6">
                                                                        <h6 class="text-primary">Parcel Details</h6>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Parcel Weight (kg)</label>
                                                                            <input type="text" id="parcelWeight" name="parcelWeight" value="<?php echo $value['parcel_weight']; ?>" class="form-control" placeholder="weight (e.g., 1kg)" oninput="calculatePrice()">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Price </label>
                                                                            <input type="text" id="price" name="price" value="<?php echo $value['price']; ?>" class="form-control" placeholder="Price" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Status -->
                                                                    <div class="col-md-6">
                                                                        <h6 class="text-primary">Status</h6>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Select Status</label>
                                                                            <select name="status" class="form-select">
                                                                                <option disabled selected>Select Status</option>
                                                                                <option value="processing">Processing</option>
                                                                                <option value="delivered">Delivered</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="courierUpdate" class="btn btn-success">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php }  ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                        <!-- Courier Details Table End -->
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

    


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<script> 
    function calculatePrice() {
    let weightInput = document.getElementById('parcelWeight').value.trim();
    
    // Remove all non-numeric characters except decimal
    let weight = parseFloat(weightInput.replace(/[^\d.]/g, ''));
    
    let pricePerKg = 1100; // Price per kg
    
    if (!isNaN(weight)) { 
        let totalPrice = weight * pricePerKg;
        document.getElementById('price').value = totalPrice.toFixed(2); 
    } else {
        document.getElementById('price').value = ''; 
    }
}
window.onload = function() {
        document.getElementById('parcelWeight').addEventListener('input', calculatePrice);
    };
// Ensure price updates when user changes weight
// document.getElementById('parcelWeight').addEventListener('input', calculatePrice);

</script>