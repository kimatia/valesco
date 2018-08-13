
 <div class="col-lg-12">
 <div class="panel panel-default">
 <center><h3><strong>Manifest Records</strong></h3></center>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Manifest  Type</th>
                    <th>Manifest No.</th>
                    <th>Bill of L. Numbers</th>
                    <th>Post Date</th>
                     <th>Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
<?php
 $stmt = $DB_con->prepare('SELECT * FROM tbl_manifest');
    $stmt->execute();



    if($stmt->rowCount() > 0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
                        
                 echo '<tr>';
                  echo '<td>'.$row['manifestName'].'</td>';
                  echo '<td>'.$row['manifestFileNumber'].'</td>';
                  echo '<td>'.$row['billOfLadingNumber'].'</td>';
                  echo '<td>'.$row['postDate'].'</td>';
                  echo '<td>
                  <a class="btn btn-small btn-primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    data-whatever="'.$row['id'].' ">Edit</a>
                  </td>';
                 echo '</tr>';
                         
                    ?>
    
                <?php
        }
    }

?>  
  
            
                </tbody>
            </table>
        </div>
        </div>
              