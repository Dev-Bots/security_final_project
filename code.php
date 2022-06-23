<?php
session_start();
//require 'dbcon.php';
require 'config.php';

if(isset($_POST['save']))
{
    // $name = mysqli_real_escape_string($conn, $_GET['name']);
    // $email = mysqli_real_escape_string($conn, $_GET['email']);
    $f_id=$_SESSION['user_id'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $filename=$_FILES['file']['name'];
    $destination='upload/' . $filename;
    $extension=pathinfo($filename,PATHINFO_EXTENSION);
    $file=$_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
   

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        $_SESSION['message'] = "File must be zip, pdf or docx";
        header("Location: complain_add.php");
        exit(0);
    } elseif ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        $_SESSION['message'] = "File size must be reduced";
        header("Location: complain_add.php");
        exit(0);
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {



    // $pname=rand(1000,10000)."-".$_FILES["file"]["name"];
    // $tname=$_FILES["files"]["tmp_name"];
    // $uploads_dir='upload/';
    // move_uploaded_file($tname,$uploads_dir.'/'.$pname);



    $query = "INSERT INTO user_comment (f_id, comment,fname) VALUES ('$f_id','$comment','$filename')";
        }

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Complaint Created Successfully";
        header("Location: user_page.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Complaiant Not Created";
        header("Location: complain_add.php");
        exit(0);
    }
}
}

if(isset($_POST['update']))
{
    
    $id=$_POST['id'];
    $tbl="SELECT * FROM user_comment where id=$id";
    $sqll= mysqli_query($conn,$tbl);
    $result=mysqli_fetch_object($sqll);

    unlink('upload/'.$result->file);




    
    // $name = mysqli_real_escape_string($conn, $_POST['name']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    $f_id=$_SESSION['user_id'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    // $file = mysqli_real_escape_string($conn, $_POST['fname']);
    // $filename=$_POST['file'];
    // $fileName=$filename;

    // if ($_FILES['fname']['error']== 0)
    // {
    //     $name=uniqid(time());
    //     $extension= pathinfo($_FILES['fname']['file'], PATHINFO_EXTENSION);
    //     $fileName=$name . "." . $extension;
    //     $hasFileUploaded= move_uploaded_file($_FILES['fname']['tmp_name'], 'upload/' . $fileName);

    // }

    $file=time().$_FILES['file']['name'];
    $dir="upload/".$file;
    $extension=pathinfo($filename,PATHINFO_EXTENSION);
    $tem_loc=$_FILES['file']['tmp_name'];
    move_uploaded_file($tem_loc,$dir);

    

    
    $query = "UPDATE user_comment SET comment='$comment', fname='$file' f_id='$f_id' WHERE id='$_POST[id]'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: user_page.php");//should be redirected to user page. just to check it out
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Updated";
        header("Location: complain_edit.php");
        exit(0);
    }

}


?>