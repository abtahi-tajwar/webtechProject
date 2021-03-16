<?php
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/user.php';

class User {
    protected $role;
    protected $name;
    protected $email;
    protected $contact_no;
    public $location;
    protected $password;
    protected $image;
    public $error;

    function __construct($role, $name, $email, $contact_no, $location, $password, $image) {
        $this->role = $role;
        $this->name = $name;
        $this->email = $email;
        $this->contact_no = $contact_no;
        $this->location = $location;
        $this->password = $password;
        $this->image = $image;
    }
    public function save() {
        $msg = insertUser($this->role, $this->name, $this->email, $this->contact_no, $this->location, $this->password, $this->image);
        return $msg;
    }
    public function edit($role, $name, $email, $contact_no, $location, $image) {
        $msg = editUser($role, $name, $email, $contact_no, $location, $image);
        return $msg;
    }
    public static function getUsers() {
        return getUsers();
    }
    public static function getUser($email) {
        return getUserWithEmail($email);
    }
    public static function getUserWithId($id) {
        return getUserWithId($id);
    }
    public static function checkUserPassword($id, $pwd) {
        $user = getPassword($id);
        if($pwd === $user['password']) {
            return true;
        } else {
            return false;
        }
    }
    public static function changePassword($id, $pwd) {
        return changePassword($id, $pwd);
    }
    public static function updateProfilePicture($id, $img) {
        return updateProfilePicture($id, $img);
    }
}


?>

