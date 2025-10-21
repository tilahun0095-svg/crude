<?php
include 'conn.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['insert'])){
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $age=$_POST['age'];
        $email=$_POST['email'];

$sql="INSERT INTO student (name, sex,age,email) VALUES('$name','$sex','$age','$email')";
$conn->query($sql);
}
if(isset($_POST['update'])){
  $stud_id=$_POST['stud_id'];
  $name=$_POST['name'];
  $sex=$_POST['sex'];
  $age=$_POST['age'];
  $email=$_POST['email'];

  $sql="UPDATE student SET name='$name',sex='$sex',age='$age',email='$email' where stud_id=$stud_id";
  $conn->query($sql);

}
}

if(isset($_GET['delete'])){
  $stud_id=$_GET['delete'];
  
  $sql="DELETE FROM student where stud_id=$stud_id";
  $conn->query($sql);
}


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <div class="con">
        <fieldset>
          <h1>GROUP TWO STUDENTS </h1>
          <form method="post"  action="student.php">
            <input type="hidden" name="insert"><br><br>
            <label for="">Name:</label>
            <input type="text" name="name" required><br>
              <label for="">Sex:</label>
            <input type="text" name="sex" required><br>
              <label for="">Age:</label>
            <input type="text" name="age" required><br>
              <label for="">Email:</label>
            <input type="email" name="email" required><br>
            <input type="submit" value="Insert">
        </form>
<br><br>
      <form method="post"  action="student.php">
            <input type="hidden" name="update"><br>
           <label for="">ID:</label>
            <input type="text" name="stud_id" required><br>
            <label for="">Name:</label>
            <input type="text" name="name" required><br>
              <label for="">Sex:</label>
            <input type="text" name="sex" required><br>
              <label for="">Age:</label>
            <input type="text" name="age" required><br>
              <label for="">Email:</label>
            <input type="email" name="email" required><br>
            <input type="submit" value="Update">
        </form>
        </fieldset>
<br><br>
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Age</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
<?php
$sql="SELECT*FROM student";
$result = $conn->query($sql);
if($result->num_rows > 0){
  while($row=$result->fetch_assoc()){
    echo"<tr>";
    echo"<td>".$row['stud_id']."</td>";
    echo"<td>".$row['name']."</td>";
    echo"<td>".$row['sex']."</td>";
    echo"<td>".$row['age']."</td>";
    echo"<td>".$row['email']."</td>";
    echo "<td> <a href='student.php?delete=".$row['stud_id']."'>Delete </a></td>";
    echo"</tr>";
  }
}
?>
        </table>
    </div>
</body>
</html>
