<?php
$data = json_decode($_POST['data'], true);
?>

<nav>
    <ul class="pagination justify-content-center">
        <?php if ($data['current'] == 1) : ?>
            <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                <span class="page-link" aria-hidden="true">
                    <i class="fa fa-angle-double-left"></i>
                </span>
            </li>
            <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                <span class="page-link" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
            </li>
        <?php else : ?>
            <li class="page-item">
                <a class="page-link text-danger" onclick="pageChange(1)" rel="first" aria-label="First">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link text-danger" onclick="pageChange(<?= $data['current'] - 1 ?>)" rel="prev" aria-label="Previous">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $data['pages']; $i++) : ?>
            <?php if ($i == $data['current']) : ?>
                <li class="page-item" aria-current="page"><span class="page-link text-white bg-danger"><?= $data['current'] ?></span></li>
            <?php else : ?>
                <li class="page-item"><a class="page-link text-danger" onclick="pageChange(<?= $i ?>)"><?= $i ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($data['current'] == $data['pages']) : ?>
            <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                <span class="page-link" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
            </li>
            <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                <span class="page-link" aria-hidden="true">
                    <i class="fa fa-angle-double-right"></i>
                </span>
            </li>
        <?php else : ?>
            <li class="page-item">
                <a class="page-link text-danger" onclick="pageChange(<?= $data['current'] + 1 ?>)" rel="next" aria-label="Next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link text-danger" onclick="pageChange(<?= $data['pages'] ?>)" rel="last" aria-label="Last">
                    <i class="fa fa-angle-double-right"></i>
                </a>
            </li>

        <?php endif; ?>
    </ul>
</nav>