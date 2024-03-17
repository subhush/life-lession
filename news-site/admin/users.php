<?php include "header.php"; 
if($_SESSION["user_role"] == '0'){
    header("location: http://localhost/news-site/admin/post.php");
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                <?php
                include 'config.php';
                $limit = 4; // how many record you want to show
                // $page = $_GET['page']; // to get the passed in url of page
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
            

                $sql = "SELECT * FROM user ORDER BY user_id ASC LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn,$sql) or die("Query Unsuccessful : ");
                if(mysqli_num_rows($result) > 0){


                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                         <?php
                      while ($row = mysqli_fetch_assoc($result))  {
                      
                      ?>
                          <tr>
                              <td class='id'><?php echo $row['user_id']; ?></td>
                              <td><?php echo $row['first_name'] . " ". $row['last_name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php 
                              if($row['role'] == 1){
                                echo "ADMIN";
                              }else{
                                echo "NORMAL";
                              }
                              ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                         <?php
                      }?>
                      </tbody>
                  </table>
                  <?php
                  }

                  $sql1 = "SELECT * FROM user";

                  $result1 = mysqli_query($conn,$sql1) or die("Paginaion error");

                  if(mysqli_num_rows($result1)>0){
                    $total_records = mysqli_num_rows($result1); // Total no. of record
                    

                    $total_page = ceil($total_records / $limit); // ceil give upper value 
                    // record divided in pages
                    echo '<ul class="pagination admin-pagination">';
                    if($page > 1)
                    {
                        echo '<li><a href ="users.php?page='.($page - 1).'">PREV</a></li>';
                    }
                    for($i = 1 ; $i <= $total_page ; $i++) // for page 
                    { //for li color after color
                        if($i == $page){
                            $active = "active";
                        }else{
                            $active ="";
                        }
                        echo '<li class="'.$active.'"><a href = "users.php?page='.$i.'">'.$i.'</a></li>';

                    }
                    if($total_page > $page)
                    {
                        echo '<li><a href ="users.php?page='.($page + 1).'">NEXT</a></li>';
                    }
                   
                    echo '</ul>';
                  }

                  ?>
                  <!-- <ul class='pagination admin-pagination'> -->
                  
              </div>
          </div>
      </div>
  </div>
<?php include "header.php"; ?>
