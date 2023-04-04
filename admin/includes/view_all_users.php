<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
<!--                <th>Image</th>-->
                <th>Role</th>
<!--                <th>Date</th>-->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php
            $query = "SELECT * FROM users";
            $select_all_users_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_all_users_query)){
                $user_id = $row['user_id'];
                $username = $row['username'];
                $firstname = $row['user_firstname'];
                $lastname = $row['user_lastname'];
                $email = $row['user_email'];
                $image = $row['user_image'];
                $role = $row['user_role'];                                                            
                        echo "<tr>";
                        echo "<td>{$user_id}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$firstname}</td>";
                        echo "<td>{$lastname}</td>";
                        echo "<td>{$email}</td>";
                        // echo "<td><img width = '100' src = './images/{$user_image}'></td>";
                        echo "<td>{$role}</td>";
                        // echo "<td>{$post_date}</td>";
                        echo "<td>
                                <div class='dropdown'>
                                <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                <i class='bx bx-dots-vertical-rounded'></i>
                                </button>
                                <div class='dropdown-menu'>
                                <a class='dropdown-item' href='users.php?source=edit_user&user_id=$user_id'><i class='bx bx-edit-alt me-1'></i>Edit</a>
                                <a class='dropdown-item' onClick =\"javascript: return confirm('Are you sure you want to delete?')  \" href='users.php?delete=$user_id'><i class='bx bx-edit-alt me-1'></i>Delete</a>
                            </div>
                            </div>
                            </td>";

                    echo "</tr>";

                }

     ?>
        </tbody>
    </table>
    <?php
    if(isset($_GET['delete'])){
        $the_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
        $delete_user_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }
    ?>
</div>
