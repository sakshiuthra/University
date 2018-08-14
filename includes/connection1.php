<?php
$errorMsg="";

date_default_timezone_set("Asia/Kolkata");
#connection file 
class connection
{
  public $database;
	private $host='localhost';
	private $databaseName='question_bank';
	private $username='root';
	private $password='';
	public $currentDate;
	public $currentTime;
	public $currentSqlDate;
	public $currentSqlTime;
	
    public function __construct()
	{
		/*$database_connection='';
		try
        {
	        


$database_connection= new pdo("mysql:host=".$this->host.";dbname=".$this->databaseName,$this->username,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$database_connection->query('SET NAMES utf8');

        }catch(PDOException $database_error)
        {
	        die('Could not connect to the database because:' . $database_error->getMessage());
        }
		
		$this->database=$database_connection;
		
		$database_connection = null;*/
		#current date and time store
		
		$this->currentDate = date("Y-m-d");
		$this->currentTime = date("H:i:s");
		$this->currentSqlDate = date("Ymd");
		$this->currentSqlTime = date("His");
		
	}
	
	function create_Connection()
	{
		$database_connection='';
		try
        {
	        $database_connection= new pdo("mysql:host=".$this->host.";dbname=".$this->databaseName,$this->username,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }catch(PDOException $database_error)
        {
	        die('Could not connect to the database because:' . $database_error->getMessage());
        }
		
		$this->database=$database_connection;
		$database_connection = null;
	}
	
	function aNumRow($query)
	{
		// echo '<br><br>'.$query.'<br><br>';
		$this->create_Connection();
		$queryRun = $this->database->query($query);
		$this->database = null;
		return $queryRun->rowCount();
	}
	
	function aAllRow($query)
	{
		// echo '<br><br>'.$query.'<br><br>';
		$this->create_Connection();
		$queryRun = $this->database->query($query);
		$this->database = null;
		return $queryRun->fetchAll();
	}
	
	function aSinRow($query)
	{
		// echo '<br><br>'.$query.'<br><br>';
		$this->create_Connection();
		$queryRun = $this->database->query($query);
		$this->database = null;
		return $queryRun->fetch(PDO::FETCH_ASSOC);
	}
	
	function aRunQuery($query)
	{
		// echo '<br><br>'.$query.'<br><br>';
		$this->create_Connection();
		$queryRun = $this->database->query($query);
		$this->database = null;
		if($queryRun)
		{
			return 1;
		}else
		{
			return 0;
		}
	}
	
	function aMakeBackup($query)
	{
		$queryBackup="INSERT INTO `backup` ( `command`, `createDate`, `createTime`) VALUES (".'"'.$query.'"'.", '$this->currentSqlDate', '$this->currentSqlTime')";
		$this->create_Connection();
		$queryRun = $this->database->query($queryBackup);
		$this->database = null;
	}
	
	function aLastId($query)
	{
		// echo '<br><br>'.$query.'<br><br>';
		$this->create_Connection();
		$queryRun = $this->database->query($query);
		
		if($queryRun)
		{
			$a = $this->database->lastInsertId();
			$this->database = null;
			return $a;
		}else
		{	
			$this->database = null;
			return 0;
		}
		
	}

}

$myDate = date("d-m-Y");
$myTime = date("H:i:s");
$mySqlDate = date("Ymd");
$mySqlTime = date("His");
$mySqlYear = date("Y");

?>
