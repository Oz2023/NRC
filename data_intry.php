<?php
class script{

public $con;

public function __construct(){
        $server = "mysqldb2020.ckuvxa2mv4r2.us-east-1.rds.amazonaws.com";
        $user = "mysqldb2020";
        $pass = "mysqldb2020";
        $db = "bookdb";

        $this->con = mysqli_connect($server,$user,$pass,$db) or die("unable to connect");

}

public function add($name,$price){

        $sql = "insert into books(bookname,price) values('".urlencode($name)."','".urlencode($price)."')";
        $res = mysqli_query($this->con,$sql) or die("Unable to perform operation");

        if($res){
                echo "Data added!";
        }else{
                echo "Operational Failure!";
        }
        }
        public function getdata(){
          $sql = "select * from books";
          $res = mysqli_query($this->con,$sql) or die("Unable to fetch");
          $cp = mysqli_fetch_assoc($res);
  //var_dump($cp);
          if(count($cp)){
                  echo ' 
                         <table>
                                  <tr>
                                  <th>Book Name</th>
                                  <th>price</th>
                                  </tr>
                      ';
                  while($row = mysqli_fetch_array($res)){
                   echo ' 
                                  <tr>
                                  <td>'.urldecode($row['bookname']).'</td>
                                  <td>'.urldecode($row['price']).'</td>
                                  </tr>
                      ';
                  }
                  echo '
                          </table>
                       ';
                  }else{
                          echo "No data found!";
                  }
  } 
  }
  ?>
  
<html>
<head>
  <title>NRC</title>
 
</body>
</html>
<from method="post">
  <p>Name: <input type="text" name="bname"</p>
  <p>Price: <input type="text" name="bprice"</p>
  <p>input <input type="submit" name="sub"</p>
  
</from>
<?php
$script = new script();
if(isset($_POST['sub'])){
        //$script = new script();       
        $script->add($_POST['bname'],$_POST['bprice']);
}
$script->getdata();

?>
</body>
</html>
