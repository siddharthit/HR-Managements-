<?php 
include 'connect.php';
class  jobs extends connect
{
	public $id,$whid,$qoh,$ps;
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
		$r=mysqli_query($this->db_handle,"select * from jobs where  job_id='$value'");

		while($db_field=mysqli_fetch_assoc($r))
			{					
						$this->id=$db_field['job_id'];
						$this->whid=$db_field['job_tittle'];
						$this->qoh=$db_field['min_salary'];	
						$this->ps=$db_field['max_salary'];								
			}
	}
}
//To save 
	public function input()
	{
		if($this->db_handle)
		{
			$f=0;
			$r=mysqli_query($this->db_handle,"select job_id from jobs");
			while($db_field=mysqli_fetch_assoc($r))
			{
				if ($db_field['job_id']==$_POST['t1'])
				{
					$f=1;
					break;
				}
			}
			if($f==0)
			{
				$k="insert into jobs values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]')";
				mysqli_query($this->db_handle,$k);
				echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("jobs.php","_self")</script>';
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
				$r=mysqli_query($this->db_handle,"select * from jobs");
				echo "<center>";
				echo "<table border=1>
					<<tr>
					<th> Job id</th> 
					<th> Job Tittle </th> 
					<th> Min salary  </th> 
					<th> Max salary </th> 			
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['job_id']."</th>";
						echo "<th>".$db_field['job_tittle']."</th>";
						echo "<th>".$db_field['min_salary']."</th>";
						echo "<th>".$db_field['max_salary']."</th>";
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
			$value="$_POST[t5]";
				$r=mysqli_query($this->db_handle,"select * from jobs where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Job id</th> 
					<th> Job Tittle </th> 
					<th> Min salary  </th> 
					<th> Max salary </th> 			
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['job_id']."</th>";
					echo "<th>".$db_field['job_tittle']."</th>";
					echo "<th>".$db_field['min_salary']."</th>";
					echo "<th>".$db_field['max_salary']."</th>";
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
			  $k="update jobs set job_tittle='$_POST[t2]',min_salary='$_POST[t3]',max_salary='$_POST[t4]'
			  where job_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("jobs.php","_self")</script>';
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
			$sql="delete from jobs where job_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("jobs.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new jobs();
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




echo" <link rel='stylesheet' href='css/style_jobs.css'>
<form name=f method=post action=jobs.php> <center>
<marquee direction='down'  scrollamont=3>
 <center> <h1>Jobs Details </h1></marquee><body>
<table border=35 ";

    echo"<tr> <th> Job id</th> 
     <th> <input type =text name=t1 value=$ob->id> </th> </tr>";

    echo"<tr> <th> Job Tittle </th> 
    <th> <input type =text name=t2 value=$ob->whid> </th> </tr>";

     echo"<tr> <th> Min salary  </th> 
     <th> <input type =text name=t3 value=$ob->qoh> </th> </tr>";

     echo"<tr> <th> Max salary </th> 
     <th> <input type =text name=t4 value=$ob->ps > </th> </tr> </body>";

     echo"<tr> <th colspan='2'> 
	 <input type=reset value='New' class='reset1'>
<input type=submit name=bsave value='Save'> 
<input type=submit name=bupdate  value='Update'>
<input type=submit name=bdelete  value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
<thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
 <select name=s>
<option> job_tittle </option> 
<option> Job_Id </option>
</select>
   <input type=text name=t4>
   <input type=submit name=bsearch 	value='Search'>
   <input type=submit name=bsearchbyid 	value='Searchbyid'>
  </th></tr> </table> ";
   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");

?>