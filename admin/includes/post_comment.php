<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Post Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Email</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php
            $get_comment = mysqli_real_escape_string($connection, $_GET['id']);
            $query = "SELECT * FROM comments WHERE comment_post_id = $get_comment";
            $select_all_comments_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_all_comments_query)){
                $comment_id = $row['comment_id'];
                $comment_author = $row['comment_author'];
                $comment_title = $row['comment_post_id'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_email = $row['comment_email'];
                $comment_date = $row['comment_date'];                                                                       
                        echo "<tr>";
                        echo "<td>{$comment_id}</td>";
                        echo "<td>{$comment_author}</td>";
                $comment_post_query = "SELECT * FROM posts WHERE post_id = {$comment_title}";
                $select_comment = mysqli_query($connection, $comment_post_query);
                
                while($row = mysqli_fetch_array($select_comment)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    
                        echo "<td><a href ='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
                }
                
                
                
                        echo "<td>{$comment_content}</td>";
                        echo "<td>{$comment_status}</td>";
                        echo "<td>{$comment_email}</td>";
                        echo "<td>{$comment_date}</td>";
                        echo "<td>
                                <div class='dropdown'>
                                <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                <i class='bx bx-dots-vertical-rounded'></i>
                                </button>
                                <div class='dropdown-menu'>
                                <a class='dropdown-item' href='comments.php?source=post_comment&approve=$comment_id&id=$get_comment'><i class='bx bx-edit-alt me-1'></i>Approve</a>
                                <a class='dropdown-item' href='comments.php?source=post_comment&unapprove=$comment_id&id=$get_comment'><i class='bx bx-edit-alt me-1'></i>Unapprove</a>
                                <a class='dropdown-item' onClick =\"javascript: return confirm('Are you sure you want to delete?')  \" href='comments.php?source=post_comment&delete=$comment_id&id=$get_comment'><i class='bx bx-edit-alt me-1'></i>Delete</a>
                            </div>
                            </div>
                            </td>";
                    echo "</tr>";

                }

     ?>
        </tbody>
    </table>
    <?php
    if(isset($_GET['approve'])){
        $the_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id}";
        $approve_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php?source=post_comment&id=$get_comment");
    }
    
    if(isset($_GET['unapprove'])){
        $the_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$the_comment_id}";
        $unapprove_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php?source=post_comment&id=$get_comment");
    }
    
    if(isset($_GET['delete'])){
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: comments.php?source=post_comment&id=$get_comment");
    }
    ?>
</div>
