<?php
$server ="localhost";
$username ="root";
$password = "";
$con =mysqli_connect($server, $username, $password);

if(!$con){
    die("Failed" . mysqli_connect_error());
}
else{
    echo"Successful!";
}

// Creating database
$var_name ="Create database abc";
$DatabaseResult =mysqli_query($con, $var_name);

if($DatabaseResult){
    echo"Database is created";
}


// Creating table
$table = "
 create table info 
 ( id int primary key  not null auto_increment , 
 name varchar(50), 
 email varchar(50),
 password varchar(50)
 )
";

$TableResult = mysqli_query($con, $table);

if ($tableResult) {
    echo "Table is created ";
}

// Insert query
$name = "Aisha";
$email = "a@gmail.com";
$password = "123456";
$insert = "insert into info (name, email, password) values('$name', '$email', '$password')";
$InsertResult = mysqli_query($con, $insert);

if ($InsertResult) {
    echo "Inserted!";
}

// Read Data Query
$sql = "Select * from info";
$ReadResult = mysqli_query($con, $sql);

$TotalRows = mysqli_num_rows($result);
echo "my total rows = " . $TotalRows . "<br>";

// Fetching each record of the table
$row = mysqli_fetch_assoc($result);
echo "<br> First row " . var_dump($row);

$row = mysqli_fetch_assoc($result);
echo "<br> Second row  " . var_dump($row);

// Fetching all records of the table
if ($TotalRows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name = " . $row["name"] . "<br>";
        echo "email = " . $row["email"] . "<br>";
        echo "password = " . $row["password"] . "<br>";
    }
}

// Update Query
$updateName = "Aisha Maryam";
$updateEmail = "am@gmail.com";
$updatePassword = "654321";
$updateQuery = "UPDATE info SET name='$updateName', email='$updateEmail', password='$updatePassword' WHERE id = 1"; 
$updateResult = mysqli_query($con, $updateQuery);

if ($updateResult) {
    echo "Record updated successfully!<br>";
} else {
    echo "Error in updating the record! " . mysqli_error($con) . "<br>";
}


// Delete Query
$deleteId = 3; 
$deleteQuery = "DELETE FROM info WHERE id=$deleteId";
$deleteResult = mysqli_query($con, $deleteQuery);

if ($deleteResult) {
    echo "Record deleted successfully!<br>";
} else {
    echo "Error in updating the record! " . mysqli_error($con) . "<br>";
}

?>
