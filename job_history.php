<?php

include 'connect.php';
class  job_history  extends connect
{
	public $id,$whid,$qoh,$ps,$sp;
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
		$r=mysqli_query($this->db_handle,"select * from job_history where  emp	='$value'");

		while($db_field=mysqli_fetch_assoc($r))
			{					
						$this->id=$db_field['emp'];
						$this->whid=$db_field['start_date'];
						$this->qoh=$db_field['end_date'];	
						$this->ps=$db_field['job_id'];		
						$this->sp=$db_field['dep_id'];						
			}
	}
}
//To save 
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into job_history  values('$_POST[t1]','$_POST[t2]','$_POST[t3]',
			'$_POST[t4]','$_POST[t5]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("job_history.php","_self")</script>';
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
				$r=mysqli_query($this->db_handle,"select * from job_history");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th> Employee Id </th>
				<th> Start Date</th> 
				<th>End Date</th>	
				<th> Job Id </th>
				<th> Department Id </th>
				</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['emp']."</th>";
					echo "<th>".$db_field['start_date']."</th>";
					echo "<th>".$db_field['end_date']."</th>";
					echo "<th>".$db_field['job_id']."</th>";
					echo "<th>".$db_field['dep_id']."</th>";
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
				$r=mysqli_query($this->db_handle,"select * from job_history where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Employee Id </th>
					<th> Start Date</th> 
					<th>End Date</th>	
					<th> Job Id </th>
					<th> Department Id </th>
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['emp']."</th>";
						echo "<th>".$db_field['start_date']."</th>";
						echo "<th>".$db_field['end_date']."</th>";
						echo "<th>".$db_field['job_id']."</th>";
						echo "<th>".$db_field['dep_id']."</th>";
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
			  $k="update job_history set start_date='$_POST[t2]',end_date='$_POST[t3]',job_id='$_POST[t4]',dep_id='$_POST[t5]'
			  where emp='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("job_history.php","_self")</script>';
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
			$sql="delete from job_history where emp='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("job_history.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new job_history();
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





	echo"<link rel='stylesheet' href='css/style_job_history.css'>
			<body>
			<form name=f method=post action=job_history.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Jobs_History_Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
echo " <tr> <th> Employee Id </th>
    <th> <input type=text name=t1 value=$ob->id> </th> </tr>";


 echo "<tr> <th> Start Date</th> 
    <th > <input type= text name=t2 value=$ob->whid> </th> </tr>";


 echo "   <tr> <th>End Date</th>
 <th> <input type= text name=t3 value=$ob->qoh> </th> </tr>";


 echo"    <tr> <th> Job Id </th>
     <th> <input type=text name=t4 value=$ob->ps > </th> </tr>";


  echo"   <tr> <th> Department Id </th>
     <th> <input type= text name=t5 value=$ob->sp> </th> </tr> ";


 echo"<tr> <th colspan='2'><input type=reset value='New' class='reset1'>
        <input type=submit name=bsave value='Save'> 
        <input type=submit name=bupdate  value='Update'>
        <input type=submit name=bdelete  value='Delete'>
		<input type=button value='Menu' onclick='menu()'> <br>
         <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
           <select name=s>
            <option> Emp Id </option> 
           <option> Job Id </option>
           <option> Department </option></select>
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