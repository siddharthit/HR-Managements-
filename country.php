
<?php 
include 'connect.php';
class  countries extends connect
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
			$r=mysqli_query($this->db_handle,"select * from countries where  country_id='$value'");

			while($db_field=mysqli_fetch_assoc($r))
				{					
							$this->id=$db_field['country_id'];
							$this->nm=$db_field['country_name'];
							$this->regid=$db_field['region_id'];								
				}
		}
	}
	//To save 
	public function input()
	{
		if($this->db_handle)
		{
			$f=0;
			$r=mysqli_query($this->db_handle,"select country_id from countries");
			while($db_field=mysqli_fetch_assoc($r))
			{
				if ($db_field['country_id']==$_POST['t1'])
				{
					$f=1;
					break;
				}
			}
			if($f==0)
			{
				$k="insert into countries values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
				mysqli_query($this->db_handle,$k);
				echo '<script>alert("Record saved....?")</script>';
				echo '<script>window.open("country.php","_self")</script>';
			}
			else if($f==1)
			echo"<script>alert('Already exist')</script>";
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
				$r=mysqli_query($this->db_handle,"select * from countries");
				echo "<center>";
				echo "<table border=1>
					<tr>
						<th>Country Id</th>
						<th>Country Name</th>
						<th>Region ID</th>				
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['country_id']."</th>";
						echo "<th>".$db_field['country_name']."</th>";
						echo "<th>".$db_field['region_id']."</th>";
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
				$r=mysqli_query($this->db_handle,"select * from countries where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
					<tr>
						<th>Country Id</th>
						<th>Country Name</th>
						<th>Region ID</th>				
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['country_id']."</th>";
						echo "<th>".$db_field['country_name']."</th>";
						echo "<th>".$db_field['region_id']."</th>";
					echo "</tr>";				
				}
				echo "</table>";
			}
	}
	// end of search 
	// for update
	public function update ()
	{
		if($this-> db_handle)
		{
			$k="update countries set country_name='$_POST[t2]',region_id='$_POST[t3]'
			where country_id='$_POST[t1]'";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("country.php","_self")</script>';
		}
		else
		{
			echo"Data is not found";
		}

	}
	
	public function delete()
	{
		if($this->db_handle)
		{
			$sql="delete from countries where country_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("country.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
	$ob=new countries();
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

			echo"<link rel='stylesheet' href='css/style_country.css'>
			<body>
			<form name=f method=post action=country.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Countries Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
				echo"<tr> <th><p> Country  Id </th> 
				<th> <input type =text name=t1 value=$ob->id ></th> </tr>";

				echo"<tr> <th><p> Country Name   </th> 
				<th> <input type =text name=t2 value=$ob->nm></th> </tr>";

				echo"<tr> <th><p > region Name     </th> 
				<th> <input type =text name=t3  value=$ob->regid></th> </tr>";

     echo"<tr> <th colspan='2'> 
		<input type=reset value='New' class='reset1'>
		<input type=submit name=bsave value='Save'> 
		<input type=submit name=bupdate value='Update'>
		<input type=button value='Menu' onclick='menu()'> 
		<input type=submit name=bdelete value='Delete'><br>
	<thcolspan='2'>
			
	<input type=submit name=ballsearch value='All Search'>
    <select name=s>
    <option>  country_Id </option> 
    <option> region_id </option>
    </select>
		<input type=text name=t4>
		<input type=submit name=bsearch	value='Search'>
		<input type=submit value='SearchById' name=bsearchbyid> </th>
		</tr>";
	echo ("<script>
	function menu()
	{
		window.open('menu.html','_self')
	}
	</script>");

?>