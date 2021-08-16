<?php
    class Database{
         private $host = 'localhost';
         private $user = 'root';
         private $password = '';
         public  $dbname = 'hms';
         public $connection;
         public  $errors = array();
        //public $success = array();
        public function __construct()
        {
            $this->connection = new mysqli($this->host,$this->user,$this->password,$this->dbname);
            if($this->connection->connect_error)
            {
                echo "connection failed";
            }
            else{
                return $this->connection;
            }
        }
       
       /////////////////Login function///////
        public function loginRecord($data,$table)
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($email)||empty($password))
            {
                array_push($this->errors," Fields must not be empty");
            }

            if(count($this->errors)==0)
            {
                $sql = "SELECT * FROM $table WHERE email='$email' ";
                $logged = $this->connection->query($sql);
                $email_count = $logged->num_rows;
                if($email_count)
                {   
                    $email_pass = $logged->fetch_assoc();
                    $db_pass = $email_pass['password'];
                    $_SESSION['username'] = $email_pass['username'];
                    $_SESSION['email'] = $email_pass['email']; //for appointment purpose
                    $_SESSION['id'] = $email_pass['id']; //for appointment purpose
                    //$user_type = $email_pass['user_type'];
                    if($db_pass==$password)
                    {
                    return true; 
                    }
                    else{
                        array_push($this->errors,"Incorrect Password");
                    }
                }
                else{
                    array_push($this->errors,"Email not found");
                }
            }
        }
      
        public function displayRecord($table)
        {
            $sql = "SELECT * FROM $table";
            $result = $this->connection->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                   $data[] = $row;  
                }
                return $data;
            }
        }
       
        public function displaySingleRecord($table,$currentUser)
        {
            if($table=="pharmacists")
            {
                $sql = "SELECT * FROM $table WHERE id='$currentUser'";
            }
            else{
                 $sql = "SELECT username,email,password,phone,gender FROM $table WHERE id='$currentUser'";
            }
            
            $result = $this->connection->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                   $data[] = $row;  
                }
                return $data;
            }
        }
      
         //update-medicine//
        public function displayRecordById($editid,$table)
        {
            $sql = "SELECT * FROM $table WHERE id ='$editid'";
            $result = $this->connection->query($sql);
            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                return $row;
            }
           
        }

        /////////Update-profile Record/////
       
        public function updateSingleRecord($data,$table,$currentUser)
        {
            $uName = $_POST['username'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            if($table=="pharmacists"){  $address = $_POST['address']; }
          
            if(empty($uName)||empty($password))
            {
                array_push($this->errors," Fields must not be empty");
            }
            if(count($this->errors)==0)
            {
                if($table=="pharmacists")
                {
                    $sql = "UPDATE $table SET username='$uName',password='$password',address='$address',phone='$phone',gender='$gender' WHERE id='$currentUser'";
                }
                $result = $this->connection->query($sql);
                if($result)
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        ////////Delete Record/////
        public function delete($deleteid,$table)
        {
            $sql = "DELETE FROM $table WHERE id = '$deleteid'";
            $result = $this->connection->query($sql);
            if($result)
            {
                return true;
            }
            else{
                return false;
            }
        }


        /////add medicine//////
        public function addMedicine($data,$table)
        {
            $Name = $_POST['mName'];
            $generic = $_POST['generic'];
            $type = $_POST['mType'];
            $quantity = $_POST['quantity'];
            $unitPrice = $_POST['unitPrice'];
            $file=$_FILES['file'];
            $file_name=$_FILES['file']['name'];
            $file_tmp=$_FILES['file']['tmp_name'];
            $file_type=$_FILES['file'] ['type'];
 
            $file_destination = "../views/upload-images/".$file_name;
            move_uploaded_file($file_tmp,$file_destination);
 
            $file_ext = explode('.',$file_name);
            $file_ext_check=strtolower(end($file_ext));
            $valid_file_ext = array('png','jpg','jpeg');
            
            
            if(empty($Name)||empty($generic)||empty($type)||empty($quantity)||empty($unitPrice))
            {
                array_push($this->errors," Fields must not be empty");
       
            }
    
            if(count($this->errors)==0)
            {
                if(in_array($file_ext_check,$valid_file_ext)){
                $sql = "SELECT * FROM $table WHERE mName='$Name' ";
                $logged = $this->connection->query($sql);
                $Name_count = $logged->num_rows;
                if($Name_count>0)
                {
                    array_push($this->errors,"Medicine already exits");
                }
                else{
                    
                 $sql = "INSERT INTO $table(mName,generic,mType,quantity,unitPrice,image) VALUES('$Name','$generic','$type','$quantity','$unitPrice','$file_destination')";
                 $create = $this->connection->query($sql);
                    if($create)
                    {
                    return true;
                    }
                    else{
                        return false;
                    }
                }
            }else{
                array_push($this->errors,"Invalid image Format");
            }
            }
        }

        public function updateMedicine($data,$table)
        {
            $Name = $_POST['mName'];
            $generic = $_POST['generic'];
            $type = $_POST['mType'];
            $quantity = $_POST['quantity'];
            $unitPrice = $_POST['unitPrice'];
            $editid=$_POST['hid'];
 
            //$editid = $_POST['hid'];
 
            if(empty($quantity)||empty($unitPrice))
            {
                array_push($this->errors," Fields must not be empty");
            }
            else{
                if(count($this->errors)==0)
                { 
                    $sql = "UPDATE $table SET mName='$Name',generic='$generic',mType='$type',quantity='$quantity',unitPrice='$unitPrice' WHERE id='$editid'";
 
                    $result = $this->connection->query($sql);
                    if($result)
                    {
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            } 
        }

    }
?>