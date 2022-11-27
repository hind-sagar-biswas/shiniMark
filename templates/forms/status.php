<div class="container shadow d-flex justify-content-center mb-4 p-5 border col-sm ">
    <form action="run.php" method="POST" autocomplete="off">
        <!-- FORM INFORMATION -->
        <input type="hidden" name="action" value="<?php echo $type ?>">
        <input type="hidden" name="target" value="<?php echo $target ?>">
        <?php if ($type == 'update') { ?>
            <input type="hidden" name="id" value="<?php echo $actionId ?>">
        <?php } ?>

        <!-- TITLE -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="name" <?php if ($type == 'update') echo "value = '" . $targetData['status'] . "'"; ?> placeholder="Name" required>
        </div>

        <button type="submit" name="submit" class="btn btn-danger mb-1">SUBMIT</button>
        <a href="index.php" name="home" class="btn btn-secondary mb-1">HOME</a>
    </form>
</div>
<br>