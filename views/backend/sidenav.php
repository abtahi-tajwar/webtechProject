<?php $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject'; ?>
    <h1>Dashboard</h1>
    <ul>
        <li><a href="<?php echo $path.'/views/backend/dashboard.php'; ?>">Menus</a></li>
        <li><a href="<?php echo $path.'/views/backend/manageOrders.php'; ?>">Orders</a></li>
        <li><a href="<?php echo $path.'/views/backend/managePermissions.php'; ?>">Permissions</a></li>
    </ul>