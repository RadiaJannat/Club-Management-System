<?php 
session_start();
if(isset($_SESSION['UserID'])){

?>

<!DOCTYPE html>
<html>

<head>
<title>Projects</title>
</head>

<body>
    <h1>This is the Projects Page</h1>
    <p>Here you will access your projects</p>
    <?php
        include 'db_connection.php';
        $user_query = $conn->prepare('SELECT * FROM available_food');
        $user_query->execute();
        $result = $user_query->get_result();
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <form action="./project.php" id='project_submission' method='post'>
                <input type="hidden" name="projectID" value='<?php echo $row['ID']?>'/>
                <button type="submit" name="Submit" value='Submit'><?php echo $row['PName']?></button>
            </form>
            <?php
        }
    ?>
    <a href="./homepage.php">homepage</a><br>
</body>
</html>
<?php 
}
else{
    header('Location: ./index.php?');
    exit();
}
?>