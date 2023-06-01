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

        public function add_post($data){
            $post_title = $data['post_title'];
            $post_content = $data['post_content'];
            $post_img = $_FILES['post_img']['name'];
            $post_img_tmp = $_FILES['post_img']['tmp_name'];
            $post_cat = $data['post_cat'];
            $post_sumary = $data['post_sumary'];
            $post_tag = $data['post_tag'];
            $post_status = $data['post_status'];

            $query = "INSERT INTO post_tab(post_title, post_content, post_img, post_cat, post_author, post_date, post_comment, post_sumary, post_tag, post_status) 
            VALUES ('$post_title','$post_content','$post_img',$post_cat,'Apu',now(),3,'$post_sumary','$post_tag','$post_status')";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($post_img_tmp, '../upload/'.$post_img);
                return "Add Post Successfully!";
            }
        }


        public function post_display(){
            $query = "SELECT * FROM post_with_cat";

            if(mysqli_query($this->conn, $query)){
                $post = mysqli_query($this->conn, $query);
                return $post;
            }
        }

        public function post_display_publish(){
            $query = "SELECT * FROM post_with_cat WHERE post_status=1";

            if(mysqli_query($this->conn, $query)){
                $post = mysqli_query($this->conn, $query);
                return $post;
            }
        }

    }

?>