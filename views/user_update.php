<?php include 'header.php' ?>

<link rel="stylesheet" href="../css/style1.css" />

<?php
    include '../User.php';
    $user = new User();
    $info = $user->getInfo($_SESSION['user'][0]['id']);
    if(isset($_POST['sub-update'])) {
        $user->edit($_POST, $_SESSION['user'][0]['id']);
    }
?>

<div id="contents">
		<div id="about">
            <h1>Update</h1>
            <form  method="POST" enctype="multipart/form-data" id="HDpro">
                <img style="width: 160px; height: 160px; border-radius: 80px" src="../images/avata/<?php echo $info[0]['image'] ?>" >
                <br>

                <label>Username</label>
                <input type="text" class="form-control" name="txt-username" value="<?php echo $info[0]['username'] ?>" />

                <!-- <label>Upload avata</label>
                <input type="file" class="form-control" name="file-avata" value="<?php echo $info[0]['image'] ?>" /> -->

                <label>Password</label>
                <input type="password" class="form-control" name="password"  value="<?php echo $info[0]['password_current'] ?>" />

                <label>Address email</label>
                <input type="email" class="form-control" name="email"  value="<?php echo $info[0]['email'] ?>" />

                <label>Phone number</label>
                <input type="text" class="form-control" name="txt-num-phone"  value="<?php echo $info[0]['num_phone'] ?>" />

                <label>Address</label>
                <input type="text" class="form-control" name="txt-address"  value="<?php echo $info[0]['address'] ?>" />

                <label>Birthday date</label>
                <input type="date" class="form-control" name="date-birthday"  value="<?php echo $info[0]['birthday'] ?>" />

                <input type="submit"name="sub-update" value="Update" style="margin-top: 10px" />
            </form>
        </div>
	</div>

<?php include 'footer.php' ?>
