<?php

    class adminBlog{
        private $conn;

        public function __construct()
        {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'myblog';

            $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if(!$this->conn){
                die("Database Connection Error.");
            }
        }

        public function admin_login($data){
            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);

            $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";
            $sql = mysqli_query($this->conn, $query);

            if($sql){
                $admin_info = $sql;

                if($admin_info){
                    header('location:dashboard.php');
                    $admin_data = mysqli_fetch_assoc($admin_info);

                    session_start();
                    $_SESSION['adminID']=$admin_data['id'];
                    $_SESSION['admin_name']=$admin_data['admin_name'];
                }
            }

        }

        public function adminlogout(){
            unset($_SESSION['adminID']);
            unset($_SESSION['admin_name']);
            header("location:index.php");
        }

        public function addcategory($data){
            $cat_name = $data['cat_name'];
            $cat_des = $data['cat_des'];

            $query = "INSERT INTO category(cat_name,cat_des) 
            VALUES('$cat_name','$cat_des')";

            $sql = mysqli_query($this->conn, $query);

            if($sql){
                return "Category Added Successfully!";
            }
        } 

        public function display_category(){
            $query = "SELECT * FROM category";
            $sql = mysqli_query($this->conn, $query);

            if($sql){
                $category = $sql;
                return $category;
            }
        }

        public function delet_category($id){
            $query = "DELETE FROM category WHERE cat_id=$id";
            if(mysqli_query($this->conn, $query)){
                return "Delete Category Successfull";
            }
        }

    }

?>