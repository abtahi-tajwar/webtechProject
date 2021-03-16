<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/header.php';  
?>
<center>
    <table width="1100">
        <td><?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/backend/sidenav.php';  ?></td>
        <td>
            <h2>Admin</h2>
            <ul>
                <li>abtahitajwar@gmail.com</li>
            </ul>
            <h2>Manager</h2>
            <ul>
                <li>ibrahimmohim@gmail.com</li>
                <li>abtahitajwar@gmail.com</li>
            </ul>
            <h2>Rider</h2>
            <ul>
                <li>hasan.mehedi@gmail.com</li>
                <li>ibrahimmohim@gmail.com</li>
                <li>waythinmarma@gmail.com</li>
                <li>abtahitajwar@gmail.com</li>
            </ul>
        </td>
        <td>
            <h2>Search Users with their email</h2>
            <form action="" method="POST">
                <input type="email" name="email">
                <input type="submit" name="user_search" value="Search">
            </form>
        </td>
    </table>
</center>

<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/footer.php'; ?>