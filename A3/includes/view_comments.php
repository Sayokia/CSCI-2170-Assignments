			<!-- This section of the code lets us view past comments -->
			<div class="py-5">

				<h3 class="h4 mb-3 font-weight-normal">C-3PO's historical ramblings</h3>

				<?php

					$sql = "SELECT * FROM mindfeed";
					$retrieve_feed_result = $conn->query($sql);

					if ($retrieve_feed_result->num_rows > 0) {
						while ($row = $retrieve_feed_result->fetch_assoc()) {
                            $m_name = $row['m_name'];
                            $m_date = $row['m_date'];
                            $m_thought = $row['m_thought'];


                            ?>

                            <div class="media border p-3 my-3">
                                <img src="img/defaultprofile.png" alt="C-3PO" class="mr-3 mt-3 rounded-circle"
                                     style="width:60px;">
                                <div class="media-body mt-3">
                                    <h4><?php echo $m_name; ?> <small class="text-muted"><span
                                                    class="small">on <?php echo $m_date; ?></span></small></h4>
                                    <p><?php echo $m_thought; ?></p>
                                </div>
                            </div>

                            <?php
                        }
						}
				?>

			</div>
