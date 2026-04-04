<?php

include "../connection.php";

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Shipment Report</title>
  </head>
  <body>

  <?php
	 
	 if(isset($_GET['id'])){

		$shipmentdownload=mysqli_query($connection,"SELECT courier.*,branch.branch_name
       FROM courier JOIN branch on branch.branch_id = courier.branch_id where courier_id= '".$_GET['id']."'");

		// convert into array

		$value = mysqli_fetch_assoc($shipmentdownload);

		?>

  <table class="table  table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Sender Name</th>
                                                                <th>Sender Email</th>
                                                                <th>Sender Contact</th>
                                                                <th>Courier Type</th>
                                                                <th>Receiver Name</th>
                                                                <th>Receiver Email</th>
                                                                <th>Receiver Contact</th>
                                                                <th>receiver Address</th>
                                                                <th>Parcel Weight</th>
                                                                <th>Price</th>
                                                                <th>Tracking ID</th>
                                                                <th>Branch Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"><?php echo $value['courier_id']  ?></th>
                                                                <td><?php echo $value['sender_name']  ?></td>
                                                                <td><?php echo $value['sender_email']  ?></td>
                                                                <td><?php echo $value['sender_contact']  ?></td>
                                                                <td><?php echo $value['courier_type']  ?></td>
                                                                <td><?php echo $value['receiver_name']  ?></td>
                                                                <td><?php echo $value['receiver_email']  ?></td>
                                                                <td><?php echo $value['receiver_contact']  ?></td>
                                                                <td><?php echo $value['receiver_address']  ?></td>
                                                                <td><?php echo $value['parcel_weight']  ?></td>
                                                                <td><?php echo $value['price']  ?></td>
                                                                
                                                                <td><?php echo $value['tracking_no']  ?></td>
                                                                <td><?php echo $value['branch_name']  ?></td>

                                                            </tr>
                                                            
                                                                                                                        
                                                        <!-- </tbody> -->
                                        
                                  
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                        }
                                                        ?>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>

<?php

echo "<script>

window.print();
</script>"

?>


