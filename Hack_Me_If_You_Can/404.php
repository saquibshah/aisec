<?php include_once dirname(__FILE__) . '/appmanager.php'; ?>
<?php include_once dirname(__FILE__) . '/layouts/header.php'; ?>
<?php include_once dirname(__FILE__) . '/layouts/navigation.php'; ?>
<?php if (AppManager::isLoggedIn() && AppManager::isSolvedQr()) { ?>
<div class="col-md-10">
<?php } ?>
<h3 style="text-align: center; color: #fff;">
    404 Page not found!
</h3>
<?php if (AppManager::isLoggedIn() && AppManager::isSolvedQr()) { ?>
</div>
<?php } ?>
<?php include_once dirname(__FILE__) . '/layouts/footer.php'; ?>
