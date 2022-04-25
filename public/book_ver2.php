<?php

include "dbConfig.php";

class book 
{
    public $id;
    public $name;
    public $category;
    public $image;
    public $cost;
    public $type;
    protected $errors = [];

    public function __construct()
    {
        
    }     
    public static function selectAll(){
        $books = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $book = static::createFromDb($row);
                $books[] = $book;
            }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $books;
        $conn->close();
    }
    static function createFromDb(array $data){
        $book = new book();
        $book->id = $data['ID_Book'];
        $book->name = $data['Name_Book']; 
        $book->category = $data['ID_Category']; 
        $book->cost = $data['Cost'];
        $book->image = $data['Link'];
        
      /* if($data['ID_Category'] == 1){
            $book->type = "Truyện Tranh";
        }else if( $data['ID_Category'] == 2 ){
            $book->type = "Sách Giáo Khoa";
        }else if( $data['ID_Category'] == 3 ){
            $book->type = "Sách Văn Học";
        }else if( $data['ID_Category'] == 4 ){
            $book->type = "Sách Kinh Tế";
        }*/
        return $book;
    }
    public static function selectByID($id){
        
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book WHERE ID_Book=$id";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();
                $book = static::createFromDb($row);
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $book;
        $conn->close();
    }
    public static function selectByName($name){
        $books = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book WHERE Name_Book LIKE '%{$name}%'";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $book = static::createFromDb($row);
                    $books[] = $book;
                }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $books;
        $conn->close();
    }
    public static function displayCategory(){
        $categorys = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
       // $sql = " SELECT * FROM  category  ";
       $sql="SELECT DISTINCT * FROM book b, category c WHERE b.ID_category=c.id_category group by c.id_category ;";
        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                 //   $category = static::createFromDb($row);
                    $categorys[] = $row;
                }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $categorys;
        $conn->close();
    }
    public static function selectBook($id){
        $books = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book WHERE ID_category=\"$id\"";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $book = static::createFromDb($row);
                    $books[] = $book;
                }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $books;
        $conn->close();
    }
    public static function selectComic(){
        $books = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book WHERE ID_category=1";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $book = static::createFromDb($row);
                    $books[] = $book;
                }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $books;
        $conn->close();
    }
    public static function selectSchoolBook(){
        $books = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book WHERE ID_category=2";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $book = static::createFromDb($row);
                    $books[] = $book;
                }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $books;
        $conn->close();
    }
    public static function selectVanHoc(){
        $books = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book WHERE ID_category=3";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $book = static::createFromDb($row);
                    $books[] = $book;
                }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $books;
        $conn->close();
    }
    public static function selectKinhTe(){
        $books = [];
        $conn = Database::connect();

        if($conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT * FROM book WHERE ID_category=4";

        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $book = static::createFromDb($row);
                    $books[] = $book;
                }
            }
        }
        else{
            printf("Query failed: %s\n", $conn->error);
        }
        return $books;
        $conn->close();
    }

}
?>