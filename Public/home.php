<?php
include("db.php");
$error = "";
if (isset($_POST['submit'])) {
    if (empty($_POST['todo'])) {
        $error = "Empty Field!!";
    }else{
        $todo = $_POST['todo'];
        
        $sql = "INSERT INTO todo_work (todo) VALUES ('$todo')";
        mysqli_query($conn, $sql);

        header('location: home.php');
    }
}
if (isset($_GET['del_todo'])) {
$id = $_GET['del_todo'];
mysqli_query($conn, "DELETE FROM todo_work where id=$id");
header('location: home.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title >To-Do Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="heading">
		<h1>To-Do Application</h1>
	</div>
	<form method="post" action="home.php" class="form_input">
		<input type="text" name="todo" class="todo_input">
        <button type="submit" name="submit" id="add_btn" class="add_btn">Add To-Do</button> 
        <?php if (isset($error)) { ?>
	<p><?php echo $error; ?></p>
<?php } ?>
    </form>
    
    <table>
	<thead>
		<tr>
			<th>Sr.No.</th>
			<th>To-Dos'</th>
			<th>Remove</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$todos = mysqli_query($conn, "SELECT * FROM todo_work");
        $i=1;
		while ($row = mysqli_fetch_array($todos)) { ?>
			<tr>
                <td> 
                    <?php echo $i; ?> </td>
				<td class="todo"> <?php echo $row['todo']; ?> </td>
				<td class="delete"> 
                    <a href="home.php?del_todo=<?php echo $row['id'] ?>" ><i class="fa fa-trash"></i></a>
				</td>
			</tr>
        <?php $i++; } ?>	
	</tbody>
    </table>

</body>
</html>