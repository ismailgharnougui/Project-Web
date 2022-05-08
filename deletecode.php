<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'crudm');

if(isset($_POST['deletedata']))
{
    $idm = $_POST['delete_id'];

    $query = "DELETE FROM mannequin WHERE idm='$idm'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:index.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>