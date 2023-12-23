<?php 

include 'connect.php';
class  warehouse  extends connect
{
	public $id,$nm,$loc_id,$wh_geo;
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
				$r=mysqli_query($this->db_handle,"select * from warehouse where  whouse_id='$value'");
	
				while($db_field=mysqli_fetch_assoc($r))
					{					
								$this->id=$db_field['whouse_id'];
								$this->nm=$db_field['whouse_spec'];
								$this->wh_nm=$db_field['whouse_nm'];
								$this->loc_id=$db_field['loc_id'];
								$this->wh_geo=$db_field['wh_geo_loc'];	

					}
			}
		}
		//To save 
	//To save
	public function input()
	{
		if($this->db_handle)
		{
			$f=0;
			$r=mysqli_query($this->db_handle,"select whouse_id from warehouse");
			while($db_field=mysqli_fetch_assoc($r))
			{
				if ($db_field['whouse_id']==$_POST['t1'])
				{
					$f=1;
					break;
				}
			}
			if($f==0)
			{
					$k="insert into warehouse values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]',
			        '$_POST[t5]')";
					mysqli_query($this->db_handle,$k);
					echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("warehouse.php","_self")</script>';
			}
				else if($f==1)
				echo"<script>alert('Already exist')</script>";
		}
			else
			
			echo "<script>alert('Database Not Found')</script>";
	}
	// end of save
		
	//for all search.
	public function allsearch()
	{
		if($this->db_handle)
			{
				$r=mysqli_query($this->db_handle,"select * from warehouse");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th>warehouse id</th>
				<th> Warehouse_spec</th> 
				<th> Warehouse_name</th> 
				<th> Location_id </th> 
				<th> Wh_geo_Location </th> 
						
			</tr>";
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['whouse_id']."</th>";
					echo "<th>".$db_field['whouse_spec']."</th>";
					echo "<th>".$db_field['whouse_nm']."</th>";
					echo "<th>".$db_field['loc_id']."</th>";
					echo "<th>".$db_field['wh_geo_loc']."</th>";
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
				$value="$_POST[t6]";
					$r=mysqli_query($this->db_handle,"select * from warehouse where $fieldnm='$value'");
					echo "<center>";
					echo "<table border=1>
					<tr>
				<th>warehouse id</th>
				<th> Warehouse_spec</th> 
				<th> Warehouse_name</th> 
				<th> Location_id </th> 
				<th> Wh_geo_Location </th> 
						
			</tr>";
					
					
			while($db_field=mysqli_fetch_assoc($r))
				{					
				echo "<tr>";
				echo "<th>".$db_field['whouse_id']."</th>";
				echo "<th>".$db_field['whouse_spec']."</th>";
				echo "<th>".$db_field['whouse_nm']."</th>";
				echo "<th>".$db_field['loc_id']."</th>";
				echo "<th>".$db_field['wh_geo_loc']."</th>";
					echo "</tr>";
					echo "</table>";
				}
			}
		}
		// end of search 
	

	  //for update
	  public function update()
	  {
		  if($this-> db_handle)
		  {

			  $k="update warehouse set whouse_spec='$_POST[t2]',whouse_nm='$_POST[t3]',loc_id='$_POST[t4]',wh_geo_loc='$_POST[t5]'
			  where whouse_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("warehouse.php","_self")</script>';
		  }
		  else
		  {
			  echo"Data is not found";
		  }
  
	  }
	//end of update
	//To Delete
	public function delete()
	{
		if($this->db_handle)
		{
			$sql="delete from warehouse  where whouse_id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("warehouse.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new warehouse();
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


	echo"<link rel='stylesheet' href='css/style_whouse.css'>";
echo"<form name=f method=post action=warehouse.php> <center>
<head><tittle> <h1>WARE HOUSES </h1></tittle> </head>
<table border=18";

echo"<tr> <th> Warehouse id</th> 
     <th> <input type =text name=t1 value=$ob->id> </th> </tr>";

 echo"<tr> <th> Warehouse_spec</th> 
 <th> <input type =text name=t2 value=$ob->nm> </th> </tr>";

     echo"<tr> <th>warehouse_Name   </th> 
     <th> <input type =text name=t3 value=$ob->wh_nm> </th> </tr>";

     echo"<tr> <th> Location_id </th> 
     <th> <input type =text name=t4 value=$ob->loc_id > </th> </tr>";

     echo"<tr> <th> Wh_geo_Location </th> 
     <th> <input type =text name=t5 value=$ob->wh_geo>  </th> </tr>";

echo"<tr> <th colspan='2'> 
<input type=reset value='New' class='reset1'>
<input type=submit name=bsave  value='Save'> 
<input type=submit name=bupdate  value='Update'>
<input type=submit name=bdelete  value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
   <select name=s>
    <option> warehouse_id  </option> 
   <option> location_id   </option>

   </select>
   <input type=text name=t6>
   <input type=submit name=bsearch 	value='Search'>
   <input type=submit name=bsearchByid 	value='Search'></th></tr>";

   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");
?>