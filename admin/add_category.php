<?php include "includes/header.php" ?>
<?php
//create db object
$db = new Database();
if(isset($_POST['submit'])){
    // assign var
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    // validate
    if($name ==''){
        //set error
        $error = 'please fill out all required fields';
    }else{
        $query = "INSERT INTO categories
                  (name)
                  VALUES ('$name')";

        $insert_row = $db->insert($query);
    }
}
?>
<form method="post" action="add_category.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Category Name</label>
        <input name="name" type="text" class="form-control"  placeholder="Enter Category">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
    <br>
</form>
<?php include "includes/footer.php" ?>