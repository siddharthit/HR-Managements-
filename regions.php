<?php 


include 'connect.php';
class  regions extends connect
{
	public $id,$nm,$regid;
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
				$r=mysqli_query($this->db_handle,"select * from regions  where  region_id='$value'");
	
				while($db_field=mysqli_fetch_assoc($r))
					{					
								$this->id=$db_field['region_id'];
								$this->nm=$db_field['region_name'];
														
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
			$r=mysqli_query($this->db_handle,"select region_id from regions");
			while ($db_field=mysqli_fetch_assoc($r))
			{
				if($db_field['region_id']==$_POST['t1'])
				{
					$f=1;
					break;
				}
			}
			if($f==0)
			{
					$k="insert into regions  values('$_POST[t1]','$_POST[t2]')";
					mysqli_query($this->db_handle,$k);
					echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("regions.php","_self")</script>';
			}
			else if($f==1)
			echo"<script>alert('already Exist')</script>";
		}
			else
		
				echo "<script>alert('Database Not Found')</script>";	
	}

	//end of save
		
	//for all search.
	public function allsearch()
	{
		if($this->db_handle)
			{
				$r=mysqli_query($this->db_handle,"select * from regions");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Regions Id   </th> 	
					<th> Regions  Name   </th> 		
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['region_id']."</th>";
						echo "<th>".$db_field['region_name']."</th>";
					echo "</tr>";			
				}
				echo "</table>";
			}
	}
	// end all search 
	//to search 
	public function search()
	{
		if($this->db_handle)
		{
			$fieldnm="$_POST[s]";
			$value="$_POST[t5]";
				$r=mysqli_query($this->db_handle,"select * from regions where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th> Regions Id   </th> 	
				<th> Regions  Name   </th> 		
				</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['region_id']."</th>";
						echo "<th>".$db_field['region_name']."</th>";
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
			  $k="update regions set region_name='$_POST[t2]'
			  where region_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			  echo '<script>window.open("regions.php","_self")</script>';
		  }
		  else
		  {
			  echo"Data is not found";
		  }
  
	  }
	//end of update
	//To delete
	public function delete()
	{
		if($this->db_handle)
		{
			$sql="delete from regions  where region_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("regions.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	//end of delete 
	
}
$ob=new regions();
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


	echo"<link rel='stylesheet' href='css/style_regions.css'>
			<body>
			<form name=f method=post action=regions.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Regions_Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
    echo"<tr> <th> Regions  Id </th> 
     <th> <input type =text name=t1 value=$ob->id> </th> </tr>";

    echo"<tr> <th> Regions  Name   </th> 
    <th> <input type =text name=t2 value=$ob->nm> </th> </tr>";

    echo"<tr> <th colspan='2'> 
	<input type=reset value='New' class='reset1'>
    <input type=submit name=bsave value='Save'> 
    <input type=submit name=bupdate  value='Update'>
    <input type=submit name=bdelete value='Delete'>
	<input type=button value='Menu' onclick='menu()'> <br>
     <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
       <select name=s>
        <option>Region_Id</option> 
     
      
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