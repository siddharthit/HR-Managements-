<?php 

include 'connect.php';
class  prod_desp extends connect
{
	public $id, $nm,$sp,$ps;
	public function __construct()
	{
		parent::__construct();
	}

	// to search by id
	public function searchbyid()
	{
		if ($this->db_handle)
		{
			$value="$_POST[t1]";
			$r=mysqli_query($this->db_handle,"select * from prod_desp where  prod_id='$value'");

			while($db_field=mysqli_fetch_assoc($r))
				{					
							$this->id=$db_field['prod_id'];
							$this->nm=$db_field['lan_id'];
							$this->sp=$db_field['trans_nm'];	
							$this->ps=$db_field['trans_desp'];							
				}
		}
	}
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into prod_desp values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("prod_desp.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
		
	}
	//end of save
		
	//for all search.
	public function allsearch()
	{
		if($this->db_handle)
			{
				$r=mysqli_query($this->db_handle,"select * from prod_desp");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Product  Id </th> 
					<th> Language  Date  id    </th> 
					<th> Translate_name      </th> 
					<th> Translate_description     </th> 		
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['prod_id']."</th>";
						echo "<th>".$db_field['lan_id']."</th>";
						echo "<th>".$db_field['trans_nm']."</th>";
						echo "<th>".$db_field['trans_desp']."</th>";
					echo "</tr>";					
				}
				echo "</table>";
			}
	}
	// end all search 
	//to psearch 
	public function search()
	{
		if($this->db_handle)
		{
			$fieldnm="$_POST[s]";
			$value="$_POST[t11]";
				$r=mysqli_query($this->db_handle,"select * from prod_desp where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th> Product  Id </th> 
				<th> Language  Date  id    </th> 
				<th> Translate_name      </th> 
				<th> Translate_description     </th> 		
				</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['prod_id']."</th>";
						echo "<th>".$db_field['lan_id']."</th>";
						echo "<th>".$db_field['trans_nm']."</th>";
						echo "<th>".$db_field['trans_desp']."</th>";
					echo "</tr>";				
				}
				echo "</table>";
			}
	}
	// end of search 
	  //for update
	  public function update()
	  {
		  if($this-> db_handle)
		  {
			  $k="update prod_desp set lan_id='$_POST[t2]',trans_nm='$_POST[t3]',trans_desp='$_POST[t4]'	
                where prod_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("prod_desp.php","_self")</script>';
		  }
		  else
		  {
			  echo"Data is not found";
		  }
  
	  }
	//end of update
	public function delete()
	{
		if($this->db_handle)
		{
			$sql="delete from prod_desp where prod_id ='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("prod_desp.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new prod_desp();
if(isset($_REQUEST["bsave"]))
	$ob->input();
if(isset($_REQUEST["bdelete"]))
	$ob->delete();
  if(isset($_REQUEST["bupdate"]))
	$ob->update();
	if(isset($_REQUEST["ballsearch"]))
	$ob->allsearch();
	if(isset($_REQUEST["bsearch"]))
	$ob->search();
	if(isset($_REQUEST["bsearchbyid"]))
	$ob->searchbyid();


	echo"<link rel='stylesheet' href='css/style_prod_desp.css'>
			<body>
			<form name=f method=post action=prod_desp.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Product_Desperation_Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
    echo"<tr> <th> Product  Id </th> 
     <th> <input type =text name=t1 value=$ob->id > </th> </tr>";

    echo"<tr> <th> Language  Date  id    </th> 
    <th> <input type =text name=t2value=$ob->nm> </th> </tr>";

     echo"<tr> <th> Translate_name      </th> 
     <th> <input type =text name=t3 $ob->sp> </th> </tr>";

     
     echo"<tr> <th> Translate_description     </th> 
     <th> <input type =text name=t4 value=$ob->ps> </th> </tr>";

     

     echo"<tr> <th colspan='2'> 
	 <input type=reset value='New' class='reset1'>
<input type=submit name=bsave value='Save'> 
<input type=submit name=bupdate value='Update'>
<input type=submit name=bdelete value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
   <select name=s>
    <option>  prod_id  </option> 
   <option>  lan_id  </option>
 
  
   </select>
   <input type=text name=t11>
   <input type=submit name=bsearch 	value='Search'>
   <input type=submit name=bsearch byid 	value='Search'></th></tr>";

   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");
?>