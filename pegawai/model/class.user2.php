<?php

class Database
{   
    private $host = "localhost";
    private $db_name = "gis_map";
    private $username = "root";
    private $password = "";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;

    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$name,$upass)
	{
		try
		{
			$new_password = md5($upass, PASSWORD_DEFAULT);
			$id='';
			$stmt = $this->conn->prepare("INSERT INTO checker VALUES(:id, :uname, :name, :upass)");
			$stmt->bindparam(":id", $id);						  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$name,$upass)
	{
		try 
		{
			$stmt = $this->conn->prepare("SELECT * FROM checker WHERE username=:uname OR nama=:name ");
			$stmt->execute(array(':uname'=>$uname, ':name'=>$name));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(md5($upass, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}



}
?>