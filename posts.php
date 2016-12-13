<?php include  'includes/header.php'?>

<?php
// create DB object
$db = new Database();
// check url for category

if(isset($_GET['category'])){
    $category = $_GET['category'];
    //  create query
    $query = "SELECT * FROM posts WHERE  category =".$category." ORDER BY id DESC";
    // run Query
    $posts = $db->select($query);
} else{
    //  create query
    $query = "SELECT * FROM posts ORDER BY id DESC";
     // run Query
    $posts = $db->select($query);
}


//  create query
$query = "SELECT * FROM categories";
// run Query
$categories = $db->select($query);
?>

<?php if($posts): ?>
    <?php while($row = $posts->fetch_assoc()) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?> </h2>
            <p class="blog-post-meta"><?php echo formatDate( $row['data']);?> by <a href="#"><?php echo $row['author'] ?></a></p>
            <?php echo shortenText($row['body']);?>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']);?>">Read More</a>
        </div>
        <!-- /.blog-post -->
    <?php endwhile; ?>


<?php else :?>
    <p>  There re no posts yet</P>
<?php endif; ?>
<?php include  'includes/footer.php'?>


