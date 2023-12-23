<?php 

include 'connect.php';
class  locations extends connect
{
	public $id,$whid,$qoh,$pa,$ps,$pd;
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
		$r=mysqli_query($this->db_handle,"select * from locations where  loc_id='$value'");

		while($db_field=mysqli_fetch_assoc($r))
			{					
						$this->id=$db_field['loc_id'];
						$this->whid=$db_field['street_add'];
						$this->qoh=$db_field['postal_code'];
						$this->pa=$db_field['city'];
						$this->ps=$db_field['state_prov'];
						$this->pd=$db_field['country_id'];
					
				

				}
	}
}
//To save 
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into locations  values('$_POST[t1]','$_POST[t2]',
            '$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("Locations.php","_self")</script>';
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
				$r=mysqli_query($this->db_handle,"select * from locations");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Location Id </th> 
					<th> Street Address  </th> 
					<th> Postal Code    </th> 		
					<th> City </th>	
					<th> State Provine </th> 
					<th> Country Id  </th> 
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['loc_id']."</th>";
					echo "<th>".$db_field['street_add']."</th>";
					echo "<th>".$db_field['postal_code']."</th>";
					echo "<th>".$db_field['city']."</th>";
					echo "<th>".$db_field['state_prov']."</th>";	
					echo "<th>".$db_field['country_id']."</th>";
					
				echo "</tr>";
				echo "</table>";
			}
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
				$r=mysqli_query($this->db_handle,"select * from locations where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th> Location Id </th> 
				<th> Street Address  </th> 
				<th> Postal Code    </th> 		
				<th> City </th>	
				<th> State Provine </th> 
				<th> Country Id  </th> 
				</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['loc_id']."</th>";
						echo "<th>".$db_field['street_add']."</th>";
						echo "<th>".$db_field['postal_code']."</th>";
						echo "<th>".$db_field['city']."</th>";
						echo "<th>".$db_field['state_prov']."</th>";	
						echo "<th>".$db_field['country_id']."</th>";
						
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
			  $k="update locations set street_add='$_POST[t2]',postal_code='$_POST[t3]',city='$_POST[t4]',state_prov='$_POST[t5]',country_id='$_POST[t6]'
			  where loc_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("Locations.php","_self")</script>';
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
			$sql="delete from locations  where loc_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("Locations.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new locations();
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







	echo"<link rel='stylesheet' href='css/style_locations.css'>
			<body>
			<form name=f method=post action=locations.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Location_Details/h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
    echo"<tr> <th> Location Id </th> 
     <th> <input type =text name=t1  value=$ob->id> </th> </tr>";

    echo"<tr> <th> Street Address  </th> 
    <th> <input type =text name=t2 value=$ob->whid> </th> </tr>";

     echo"<tr> <th> Postal Code    </th> 
     <th> <input type =text name=t3 value=$ob->qoh> </th> </tr>";

     echo"<tr> <th> City </th> 
     <th> <input type =text name=t4 value=$ob->pa> </th> </tr>";
     
     echo"<tr> <th> State Provine </th> 
     <th> <input type =text name=t5 value=$ob->ps> </th> </tr>";
     
     echo"<tr> <th> Country Id  </th> 
     <th> <input type =text name=t6  value=$ob->pd> </th> </tr>";

     echo"<tr> <th colspan='2'> 
	 <input type=reset value='New' class='reset1'>
<input type=submit name=bsave  value='Save'> 
<input type=submit name=bupdate  value='Update'>
<input type=submit name=bdelete  value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
   <select name=s>
    <option>  loc_Id </option> 
   
   <option> City  </option>
  
   </select>
   <input type=text name=t12>
   <input type=submit name=bsearch 	value='Search'>
   <input type=submit name=bsearchbyid 	value='Searchbyid'></th></tr>";
   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");

?>