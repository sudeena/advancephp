<?php
	include 'corelib/functions/function.autoload.php';
	include_once('includes/loginheader.php');
	$dbConnObj = new dbConn();
	//$testObj = new Test();  error
	$dbConnObj->connectToDb('localhost','root','','student');
	?>
	<?php 
	 	
		if(@$_GET['msg']){ //show div class notify only if get 'msg'
					?>
		<div class="notify">
        	<p>
            		<?php
            				
							if(@$_GET['msg']==1){
								echo "Username password mismatched";
							}
							else if($_GET['msg']==2){
								echo "This username has already in used plz choose next username.";
							}
							else if(@$_GET['msg']==3){
								echo "Your record updated successfully.";
							}
							else if($_GET['msg']==4){
								echo "Selected row has been deleted successfully";
							}
					?>
            </p>
        </div>
<?php } ?>
<?php
	
	if(@$_GET['view']){
		if(@$_GET['folder']=='user'){
			include 'views/user/'.$_GET['view'].'.php';
		}
		
	}
	else {
		include 'views/user/login.php';
	}