<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><?php echo $pageTitle; ?></h5>
    <?php if($view != "dashboard") {
        ?>
        <div class="align-right">
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-sm btn-primary">Back</a>
        </div>
        <?php
    }
    ?>
</div>