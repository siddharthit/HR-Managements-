<?php 
include 'connect.php';
class  inventories extends connect
{
	public $id,$whid,$qoh;
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
		$r=mysqli_query($this->db_handle,"select * from inventories where  prod_id='$value'");

		while($db_field=mysqli_fetch_assoc($r))
			{					
						$this->id=$db_field['prod_id'];
						$this->whid=$db_field['whouse_id'];
						$this->qoh=$db_field['qua_on_hand'];								
			}
	}
}
//To save 
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into inventories values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("inventories.php","_self")</script>';
			
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
				$r=mysqli_query($this->db_handle,"select * from inventories");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Product id</th> 
					<th> Warhouse Id </th> 
					<th>Quantity_on_hand </th>				
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					
						echo "<th>".$db_field['prod_id']."</th>";
						echo "<th>".$db_field['whouse_id']."</th>";
						echo "<th>".$db_field['qua_on_hand']."</th>";
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
			$value="$_POST[t4]";
				$r=mysqli_query($this->db_handle,"select * from inventories where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Product id</th> 
					<th> Warhouse Id </th> 
					<th>Quantity_on_hand </th>				
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					
						echo "<th>".$db_field['prod_id']."</th>";
						echo "<th>".$db_field['whouse_id']."</th>";
						echo "<th>".$db_field['qua_on_hand']."</th>";
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
			  $k="update inventories set whouse_id='$_POST[t2]',qua_on_hand='$_POST[t3]'
			  where prod_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			  echo '<script>window.open("inventories.php","_self")</script>';
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
			$sql="delete from inventories where prod_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("inventories.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new inventories();
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



	echo"<link rel='stylesheet' href='css/style_inventories.css'>
			<body>
			<form name=f method=post action=inventories.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Inventories_Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
echo"<tr> <th> Product id</th> 
     <th> <input type =text name=t1 value=$ob->id> </th> </tr>";

 echo"<tr> <th> Warhouse Id </th> 
 <th> <input type =text name=t2 value=$ob->whid> </th> </tr>";

     echo"<tr> <th>Quantity_on_hand </th> 
     <th> <input type =text name=t3 value=$ob->qoh> </th> </tr>";

     echo"<tr> <th colspan='2'> 
	 <input type=reset value='New' class='reset1'>
     <input type=submit name=bsave value='Save'> 
     <input type=submit name=bupdate  value='Update'>
     <input type=submit name=bdelete  value='Delete'>
	 <input type=button value='Menu' onclick='menu()'> <br>
      <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
        <select name=s>
         <option> ord_id </option> 
        <option> prod_id</option>
     
        </select>
        <input type=text name=t4>
		<input type=submit name=bsearch 	value='Search'>
		<input type=submit name=bsearchbyid 	value='Searchbyid'></th></tr>";
     
		echo ("<script>
		function menu()
		{
			window.open('menu.html','_self')
		}
		</script>");
     ?>
