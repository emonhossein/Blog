<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php 
    if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL ) {
        header('Location: inbox.php');
    }else {
        $id = $_GET['msgid'];
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>View Message</h2>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        echo "<script>window.location = 'inbox.php';</script>";
    }
?>
    <div class="block">               
            <form action="" method="post">
            <?php 
                $query = "SELECT * FROM tbl_contact WHERE id ='$id'";
                $view = $db->select($query);
                if ($view) {
                    while ($result = $view->fetch_assoc()) {
		        ?>
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $result['firstname'].' '.$result['lastname'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="email" readonly value="<?php echo $result['email'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $fm->formatdate($result['date']);?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea class="tinymce" ><?php echo $result['body'];?></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input style="color: green; background:black ;" type="submit" name="submit" Value="OK" />
                        </td>
                    </tr>
                </table>
                <?php } }?>
            </form>
        </div> 
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'?>