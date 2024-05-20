<?php 
session_start();
$_SESSION['user_id']= null;
?>
<script>
	location.href="index.php";
</script>

<?php 
exit();
 ?>