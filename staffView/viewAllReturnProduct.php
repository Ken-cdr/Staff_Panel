<div id="returnProductsBtn" >
  <h2>Return Products</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>I.D.</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>OrderDate</th>
        <th>Payment Method</th>
        <th>Process Status</th>
        <th>Product Status</th>
        <th>More Details</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from return_products";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["rp_id"]?></td>
          <td><?=$row["delivered_to"]?></td>
          <td><?=$row["phone_no"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["pay_method"]?></td>
           <?php 
                if($row["process_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeStatus('<?=$row['rp_id']?>')">Pending</button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeStatus('<?=$row['rp_id']?>')">In Process</button></td>
        
            <?php
            }
                if($row["product_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangeProductStatus('<?=$row['rp_id']?>')">Disposal</button></td>
            <?php
                        
            }else if($row["product_status"]==1){
            ?>
                <td><button class="btn btn-warning" onclick="ChangeProductStatus('<?=$row['rp_id']?>')"> Resalable</button></td>
            <?php

            }else if($row["product_status"]==2){
            ?>
                  <td><button class="btn btn-success" onclick="ChangeProductStatus('<?=$row['rp_id']?>')">Completed </button></td>
            <?php
              }

            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?rpID=<?=$row['rp_id']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>

<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>