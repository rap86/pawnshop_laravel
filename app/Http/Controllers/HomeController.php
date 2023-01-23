<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function dbdownload()
    {
        return view('dbdownload');
    }

    function download_database(){
		
		$this->backupDatabase();
        return redirect()->route('home.dbdownload')->with('flash_success', 'Database downloaded!');
		
	}
	
	function backupDatabase($dbHost='localhost',$dbUsername='root',$dbPassword='',$dbName='pawnshop_dev',$tables = '*'){
		//connect & select the database
		
		  //ENTER THE RELEVANT INFO BELOW
          $mysqlHostName      = env('DB_HOST');
          $mysqlUserName      = env('DB_USERNAME');
          $mysqlPassword      = env('DB_PASSWORD');
          $DbName             = env('DB_DATABASE');
          $backup_name        = "mybackup.sql";
          $tables             = array(
                                    "users",
                                    "customers",
                                    "transactions", 
                                    "books", 
                                    "items"); //here your tables...
  
          $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
          $get_all_table_query = "SHOW TABLES";
          $statement = $connect->prepare($get_all_table_query);
          $statement->execute();
          $result = $statement->fetchAll();
  
  
          $output = '';
          foreach($tables as $table)
          {
           $show_table_query = "SHOW CREATE TABLE " . $table . "";
           $statement = $connect->prepare($show_table_query);
           $statement->execute();
           $show_table_result = $statement->fetchAll();
  
           foreach($show_table_result as $show_table_row)
           {
            $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
           }
           $select_query = "SELECT * FROM " . $table . "";
           $statement = $connect->prepare($select_query);
           $statement->execute();
           $total_row = $statement->rowCount();
  
           for($count=0; $count<$total_row; $count++)
           {
            $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
            $table_column_array = array_keys($single_result);
            $table_value_array = array_values($single_result);
            $output .= "\nINSERT INTO $table (";
            $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
            $output .= "'" . implode("','", $table_value_array) . "');\n";
           }
          }

          $directoryName = 'C:/pawnshopDatabase/'.date('Y-m-d');
          if(!is_dir($directoryName)){
          
              mkdir($directoryName, 0755, true);
              
          }
                  
          //save file
  
          $file_name = fopen($directoryName.'/'.date('Y-m-d').'.sql','w+');
          fwrite($file_name, $output);
          fclose($file_name);
  
	}
}
