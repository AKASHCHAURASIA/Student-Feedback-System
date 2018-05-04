<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['student'];
$batch = $_SESSION['batch'];
$group = $_SESSION['group'];
$msg = "";
$flag="1";
require_once 'config/config.php';

function feedSubBox($teacher, $conn, $subject)
		{
        $conn = db();
            for($i=0;$i<count($teacher);$i++)
				{
                ?>
                    <li>
                        <div class='ch-item ch-img-1'>
                            
                            <div class='ch-info'>
                                <h3>Your Voice Matters</h3>
                                <form action='feedback.php' method='POST'>
                                    <input type='hidden' name='teacher' value='<?php echo $teacher[$i];?>'>
                                    <input type='hidden' name='subject' value='<?php echo $subject[$i];?>'>
                                    <button name='feed'>
                                        <span style="color: yellow">Fill in Feedback</span>
                                    </button>
                                </form>
                            </div>
                            <div class='box-title'><center><p style="font-size: 12px;"><?php echo $teacher[$i];?></p></center></div>
                        </div>
                   </li>
                <?php
                }
			}
?>