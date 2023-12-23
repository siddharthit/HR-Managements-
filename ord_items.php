<?php
include 'connect.php';
class  ord_items extends connect
{
	public $id,$nm,$sp,$ps,$rs;
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
			$r=mysqli_query($this->db_handle,"select * from ord_items where  ord_id='$value'");

			while($db_field=mysqli_fetch_assoc($r))
				{					
					$this->id=$db_field['ord_id'];
					$this->nm=$db_field['line_item_id'];
				$this->sp=	$db_field['prod_id'];
				$this ->ps=	$db_field['unit_price'];
				$this->rs=	$db_field['quantity'];
		
				}
		}
	}
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into ord_items values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]',
      '$_POST[t5]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("ord_items.php","_self")</script>';
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
				$r=mysqli_query($this->db_handle,"select * from ord_items");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th> Order  Id </th> 
			   <th> Line ITem id    </th> 
			   <th> Product ID     </th> 
			   <th> unit price     </th> 	
			   <th> Quantity   </th> 		
			   </tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['ord_id']."</th>";
					echo "<th>".$db_field['line_item_id']."</th>";
					echo "<th>".$db_field['prod_id']."</th>";
					echo "<th>".$db_field['unit_pri']."</th>";
					echo "<th>".$db_field['quantity']."</th>";
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
			$value="$_POST[t12]";
				$r=mysqli_query($this->db_handle,"select * from ord_items where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
					<tr>
					 <th> Order  Id </th> 
					<th> Line ITem id    </th> 
					<th> Product ID     </th> 
					<th> unit price     </th> 	
					<th> Quantity   </th> 		
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['ord_id']."</th>";
					echo "<th>".$db_field['line_item_id']."</th>";
					echo "<th>".$db_field['prod_id']."</th>";
					echo "<th>".$db_field['unit_pri']."</th>";
					echo "<th>".$db_field['quantity']."</th>";
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
			  $k="update ord_items set line_item_id='$_POST[t2]',prod_id='$_POST[t3]',unit_pri='$_POST[t4]',quantity='$_POST[t5]'
			  where ord_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("ord_items.php","_self")</script>';
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
			$sql="delete from ord_items  where ord_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("ord_items.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new ord_items();
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


	echo"<link rel='stylesheet' href='css/style_ord_items.css'>
			<body>
			<form name=f method=post action=ord_itmes.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>order_items_Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";  echo"<tr> <th> Order  Id </th> 
     <th> <input type =text name=t1 value=$ob->id > </th> </tr>";

    echo"<tr> <th> Line ITem id    </th> 
    <th> <input type =text name=t2value=$ob->nm> </th> </tr>";

     echo"<tr> <th> Product ID     </th> 
     <th> <input type =text name=t3 value=$ob->sp> </th> </tr>";

     
     echo"<tr> <th> unit price     </th> 
     <th> <input type =text name=t4  value=$ob->ps> </th> </tr>";

     echo"<tr> <th> Quantity   </th> 
     <th> <input type =text name=t5 value=$ob->rs> </th> </tr>";


     echo"<tr> <th colspan='2'> 
	 <input type=reset value='New' class='reset1'>
<input type=submit name=bsave value='Save'> 
<input type=submit name=bupdate value='Update'>
<input type=submit name=bdelete value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
   <select name=s>
   <option> ord_id </option> 
   <option> prod_id</option>
   </select>
   <input type=text name=t5>
   <input type=submit name=bsearch 	value='Search'>
   <input type=submit name=bsearchbyid 	value='Search'></th></tr>";
   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");

?>