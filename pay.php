<?php
session_start();
include('indexDB.php');
if(isset($_POST['username']))
{
    $uname =$_POST['username'];
}
$fid=$_SESSION["flat_id"];
$bname=$_SESSION["buyer"];
$s1 = "SELECT uid,bid FROM flat  where flat_id=$fid";
$result = $conn->query($s1);
$row = mysqli_fetch_assoc($result);
if($row['bid']==NULL)
{
    $j=$row['uid'];
}
else
{
    $j=$row['bid'];
}
$Bname= $_POST['Bankname'];
$amount= $_POST['Amount'];
$loandetails=$_POST['Loandetails'];
$cnum= $_POST['Chequenumber'];
$popt= $_POST['Paymentoption'];
echo $popt;
$sql = "INSERT into payment (UID,buyer,Bank_name,amount,Loan_details,cheque_number,payment_opt) VALUES ($j,'$bname','$Bname',$amount,'$loandetails',$cnum,'$popt')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
if($_SESSION['type']=='builder')
{
    echo "<li><a  class='nav-link btnContact' href='builderHome.php'>Back to Home</a></li>";
}
else
{
    echo "<li><a class='nav-link btnContact' href='normalHomeSale.php'>Back to Home</a></li>";
}

mysqli_close($conn);
?>
