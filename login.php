<?php 
include 'connect.php';




class  login extends connect
{
	public function __construct()
	{
		parent::__construct();
	}
    public function login()
	{
		if($this->db_handle)
        {
            $f=0;
            $r=mysqli_query($this->db_handle,"select * from login");
            while($db_field=mysqli_fetch_assoc($r))
            {
                if($db_field['id']==$_POST['t1'])
                {
                    if($db_field['password']==$_POST['t2'])
                    {
                        $f=1;
                        break;
                    }
                }
            }
            if($f==1)  {
            echo"<script>window.open('menu.html','_self')</script>";
            }
            else{
             echo"<script>alert('wrong ID and password')</script>";
             echo"<script>window.open('index.html','_self')</script>";
            }
        }
    }

}
  $ob=new login();
  if(isset($_REQUEST["blogin"])){
  $ob->login();
  }


?>
