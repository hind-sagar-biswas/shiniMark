<div class="container shadow d-flex justify-content-center mb-4 p-5 border col-sm ">
    <form action="run.php" method="POST" autocomplete="off">
        <!-- FORM INFORMATION -->
        <input type="hidden" name="type" value="<?php echo $type ?>">
        <input type="hidden" name="target" value="<?php echo $target ?>">
        <?php if ($type == 'update') { ?>
            <input type="hidden" name="id" value="<?php echo $actionId ?>">
        <?php } ?>

        <!-- TITLE -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="name" value="
                <?php if ($type == 'update') echo $targetData['name']; ?>
            " placeholder="Name" required>
        </div>

        <!-- LINK -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="url" class="form-control" id="link" name="link" value="
                <?php if ($type == 'update') echo $targetData['link']; ?>
            " placeholder="https://">
        </div>

        <!-- CATEGORIES -->
        <div class="input-group mb-1 mr-sm-1">
            <select class="form-control" name="category">
                <?php foreach ($categoryList as $category) { ?>
                    <option value="<?php echo $category['id'] ?>" <?php if ($type == 'update' && $category['id'] = $targetData['category_id']) echo 'selected'; ?>>
                        <?php echo $category['category'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- CURRENT & lATEST CHAPTER -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="number" class="form-control" step="0.1" value="
                <?php if ($type == 'update') echo $targetData[''];
                else echo 0; ?>
            " name="current" placeholder="Current" required>
        </div>
        <div class="input-group mb-1 mr-sm-1">
            <input type="number" class="form-control" step="0.1" value="
                <?php if ($type == 'update') echo $targetData[''];
                else echo 1; ?>
            " name="latest" placeholder="Latest" required>
        </div>

        <!-- STATUS -->
        <div class="input-group mb-1 mr-sm-1">
            <select class="form-control" name="status">
                <?php foreach ($statusList as $status) { ?>
                    <option value="<?php echo $status['id'] ?>" <?php if ($type == 'update' && $status['id'] = $targetData['status_id']) echo 'selected'; ?>>
                        <?php echo $status['status'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-danger mb-1">SUBMIT</button>
        <a href="index.php" name="home" class="btn btn-secondary mb-1">HOME</a>
    </form>
</div>
<br>