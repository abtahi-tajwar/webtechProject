<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/menu.php';

    class Menu {
        protected $title, $subtitle, $desc, $price, $image, $type;
        function __construct($title, $subtitle, $desc, $price, $image, $type) {
            $this->title = $title;
            $this->subtitle = $subtitle;
            $this->desc = $desc;
            $this->price = $price;
            $this->image = $image;
            $this->type = $type;
        }

        public function save() {
            $msg = insertMenuItem($this->title, $this->subtitle, $this->desc, $this->price, $this->image, $this->type);
            return $msg;
        }
        public static function getMenuByType($type) {
            return getMenuByType($type);
        }
        public static function getFullMenu() {
            return getFullMenu();
        }
        public static function showFeaturedMenu() {
            $menu = getFeaturedMenu();
            echo '<table width="1000px">';
            foreach($menu as $key=>$item) {
                if($key%2 === 0) {
                    echo "<tr>
                    <td>
                        <table>
                            <tr>
                                <td rowspan=\"2\"><img height=\"100\" width=\"100\" src=".$item['image']."></td>
                                <td>".$item['title']."</td>
                                <td rowspan=\"2\">".$item['price']."/-</td>
                            </tr>
                            <tr>
                                <td>".$item['subtitle']."</td>
                            </tr>
                        </table>
                    </td>";
                } else {
                    echo "<td>
                    <table>
                        <tr>
                            <td rowspan=\"2\"><img height=\"100\" width=\"100\" src=".$item['image']."></td>
                            <td>".$item['title']."</td>
                            <td rowspan=\"2\">".$item['price']."/-</td>
                        </tr>
                        <tr>
                            <td>".$item['subtitle']."</td>
                        </tr>
                    </table>
                    </td>
                </tr>";
                }
            }
            if(sizeof($menu)%2 == 1) {
                echo '</tr>';
            }
            echo '<table>';
        }
    }
?>