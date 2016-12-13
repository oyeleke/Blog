<?php include "includes/header.php"?>
<?php

    //create new DB object

    $db = new Database();

     if(isset($_POST['submit'])){
         //assign vars

         $title = mysqli_real_escape_string($db->link, $_POST['title']);
         $body = mysqli_real_escape_string($db->link, $_POST['body']);
         $category = mysqli_real_escape_string($db->link, $_POST['Category']);
         $author = mysqli_real_escape_string($db->link, $_POST['author']);
         $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

         // simple validation
         if($title == '' || $body == ''|| $category == '' || $author == '' ){
             //set error
             $error = 'Please fill out all the required fields';
         }
         else{
             $query = "INSERT INTO posts
                       (title, body,  category, author, tags)
                 VALUES ('$title', '$body', '$category', '$author', '$tags')";

             $insert_row = $db->insert($query);
         }
     }
?>
<?php
    //  create query
    $query = "SELECT * FROM categories";
    // run Query
    $categories = $db->select($query);
?>
    <!-- |Content here -->


            <form method="post" action="add_post.php">
                <div class="form-group" >
                    <label>Post Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter Title">
                </div>

                <div class="form-group" >
                    <label>Post Body</label>
                    <textarea name="body" class="form-control" placeholder="Enter Post body"></textarea>
                </div>

                <div class="form-group" >
                    <label>Category</label>
                    <select name="Category" class="form-control" >
                        <?php while($rows = $categories->fetch_assoc()):?>
<!--                            --><?php

                                $selected = '';
                                    ?>
                            <option <?php echo $selected; ?> value="<?php echo $rows["id"]; ?>"><?php echo $rows['name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group" >
                    <label>Author</label>
                    <input name="author" type="text" class="form-control" placeholder="Enter Author name">
                </div>
                <div class="form-group" >
                    <label>Tags</label>
                    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
                </div>
                <div>
                    <input name="submit" type="submit" class="btn btn-default" value="Submit" />
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </div>
                <br>
             </form>


<?php include "includes/footer.php"?>