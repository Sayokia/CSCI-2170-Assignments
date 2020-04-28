<?php include "includes/header.php"; ?>

		<main class="container">

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus euismod, elit sed euismod tempor, enim elit lacinia lectus, ac gravida lectus justo ut lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut massa pulvinar, lobortis nisi eget, malesuada nisi. Etiam vitae tortor ligula. Aliquam erat volutpat. Sed ac pellentesque nisi, nec lobortis nisi. Vestibulum id turpis aliquam erat rutrum efficitur. Curabitur aliquam rutrum tempus. Fusce auctor, risus at porttitor lobortis, quam libero dapibus turpis, quis consectetur tellus risus et magna. Aliquam nec vestibulum velit. Nulla varius eget velit finibus vestibulum. Nam bibendum magna et sem lobortis luctus. Donec vel lorem varius mauris pretium tempor. Ut luctus, libero sed viverra eleifend, lorem ex laoreet nibh, vitae bibendum felis lectus sit amet diam. Suspendisse maximus elementum dolor eget consectetur. Sed lobortis malesuada sem, a ultricies sem dictum sit amet.</p>

			<p>Etiam aliquet elit nec tristique sagittis. Donec id lectus eu arcu sollicitudin venenatis. Nam auctor suscipit convallis. Etiam tristique leo nisl, id tincidunt nibh rutrum at. Curabitur elementum odio et sem mattis egestas. Nulla facilisi. Proin condimentum, nisl vitae mollis vulputate, leo tortor pharetra justo, a scelerisque tortor leo sollicitudin enim. Pellentesque ut consectetur nisl, quis eleifend ligula. In feugiat, quam eu imperdiet vehicula, enim ipsum ultrices enim, quis condimentum ligula enim eu est. Aliquam vel est vehicula, imperdiet nunc sed, blandit neque.</p>

			<?php include "includes/post_comment.php" ?>
            <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
               include "includes/view_comments.php";
            }
            ?>


		</main>

<?php include "includes/footer.php"; ?>