<?php 

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED". mysqli_error($connection));
    }
}

function usersOnline(){

    if(isset($_GET['onlineusers'])){
    global $connection;

    if(!$connection){

        session_start();
        include("../../includes/db.php");

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 05;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $select_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select_query);

    if($count == NULL){
        mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES ('$session', '$time')");
    } else {
        mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
    }

    $users_online_query  = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
    echo $count_user = mysqli_num_rows($users_online_query);
    }


    }
}

usersOnline();

function addCategory (){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
                                    
           if($cat_title == "" || empty($cat_title)){
               echo "<small style='color:red;'>This field is compulsory</small>";
            } else {
               $query = "INSERT INTO categories(cat_title) ";
               $query .= "VALUE('{$cat_title}')";
               $add_category_query = mysqli_query($connection, $query);
            if(!$add_category_query){
                die("QUERY FAILED". mysqli_error($connection));
            }
           }
    }
                                
}


function findAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_categories)){
          $cat_id = $row['cat_id'];                    
          $cat_title = $row['cat_title'];
              echo "<tr>";
              echo "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>{$cat_id}</strong></td>";
              echo "<td>{$cat_title}</td>";
              echo "<td>
                          <div class='dropdown'>
                            <button type='button'' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                              <i class='bx bx-dots-vertical-rounded'></i>
                            </button>
                            <div class='dropdown-menu''>
                              <a class='dropdown-item' href='categories.php?edit={$cat_id};'
                                ><i class='bx bx-edit-alt me-1''></i>Edit</a
                              >
                              <a class='dropdown-item' href='categories.php?delete={$cat_id};'
                                ><i class='bx bx-trash me-1'></i>Delete</a>
                            </div>
                          </div>
                        </td>";
            echo "</tr>";
                }
}

function deleteQuery(){
    global $connection;
    
    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
                
}


?>
