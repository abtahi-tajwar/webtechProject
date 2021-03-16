<?php include $_SERVER['DOCUMENT_ROOT'] . '/webtechProject/views/header.php' ?>
<center>
    <table width="1100">
        <td>            
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/webtechProject/views/backend/sidenav.php' ?>
        </td>
        <td>
            <form action="http://localhost/webtechProject/controllers/handlers/handleCreateMenu.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="title">Title</label></td>
                        <td><input type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td><label for="subtitle">Sub-Title</label></td>
                        <td><input type="text" name="subtitle"></td>
                    </tr>
                    <tr>
                        <td><label for="desc">Description</label></td>
                        <td><textarea name="desc"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="price">price</label></td>
                        <td><input type="number" name="price"></td>
                    </tr>
                    <tr>
                        <td><label for="image">Select Image For dish</label></td>
                        <td><input type="file" name="imageFile"></td>
                    </tr>
                    <tr>
                        <td><label for="type">Select Type</label></td>
                        <td>
                            <select name="type" id="type">
                                <option value="appetizer">Appetizer</option>
                                <option value="dessert">Dessert</option>
                                <option value="setmeal">Set Meal</option>
                                <option value="drinks">Shakes/Drinks</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="create_menu" value="Create Menu"></td>
                    </tr>
                </table>
            </form>
        </td>
        <td>
        <table>
            <tr>
                <td rowspan="2"><img height="100" width="100" src="../../image/menu/chicken-masala.jpg"></td>
                <td>Chicken Masala</td>
                <td rowspan="2">150/-</td>
            </tr>
            <tr>
                <td>chicken | spicy | sauce</td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="2"><img height="100" width="100" src="../../image/menu/chicken-masala.jpg"></td>
                <td>Chicken Masala</td>
                <td rowspan="2">150/-</td>
            </tr>
            <tr>
                <td>chicken | spicy | sauce</td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="2"><img height="100" width="100" src="../../image/menu/chicken-masala.jpg"></td>
                <td>Chicken Masala</td>
                <td rowspan="2">150/-</td>
            </tr>
            <tr>
                <td>chicken | spicy | sauce</td>
            </tr>
        </table>
        <a href="">view all</a>
        </td>
    </table>
</center>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/webtechProject/views/footer.php' ?>