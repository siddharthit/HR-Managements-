<?php 

include 'connect.php';
class  employees extends connect
{
	public $id,$whid,$qoh,$pa,$ps,$pd,$pf,$sp,$pz,$so,$dp;
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
		$r=mysqli_query($this->db_handle,"select * from employees where  emp_id='$value'");

		while($db_field=mysqli_fetch_assoc($r))
			{					
						$this->id=$db_field['emp_id'];
						$this->whid=$db_field['fname'];
						$this->qoh=$db_field['lname'];
						$this->pa=$db_field['phone_no'];
						$this->ps=$db_field['email'];
						$this->pd=$db_field['haire_date'];
						$this->pf=$db_field['job_id'];
						$this->sp=$db_field['salary'];
						$this->pz=$db_field['comm_pct'];
						$this->so=$db_field['manager_id'];
						$this->dp=$db_field['dep_id'];
						
				

				}
	}
}
//To save 
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into employees values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]',
      '$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]','$_POST[t10]','$_POST[t11]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("employees.php","_self")</script>';
			
			
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
				$r=mysqli_query($this->db_handle,"select * from employees");
				echo "<center>";
				echo "<table border=1>
				<tr>
					<th> Employee id</th> 
					<th> First Name</th> 
					<th>Last Name  </th> 		
					<th> @Email</th> 
					<th> Phone Number </th> 
					<th> Haire Date </th> 
					<th> Job Id</th>
					 <th> Salary </th> 
					 <th> Commission Pct</th> 
					 <th> Manager Id </th> 
					 <th> Department  id</th> 
				</tr>";
			
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['emp_id']."</th>";
						echo "<th>".$db_field['fname']."</th>";
						echo "<th>".$db_field['lname']."</th>";
						echo "<th>".$db_field['phone_no']."</th>";
						echo "<th>".$db_field['email']."</th>";
						echo "<th>".$db_field['haire_date']."</th>";
						echo "<th>".$db_field['job_id']."</th>";
						echo "<th>".$db_field['salary']."</th>";
						echo "<th>".$db_field['comm_pct']."</th>";
						echo "<th>".$db_field['manager_id']."</th>";
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
			$value="$_POST[t12]";
				$r=mysqli_query($this->db_handle,"select * from employees where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Employee id</th> 
					<th> First Name</th> 
					<th>Last Name  </th> 		
					 <th> @Email</th> 
						<th> Phone Number </th> 
						<th> Haire Date </th> 
						<th> Job Id</th>
						 <th> Salary </th> 
						 <th> Commission Pct</th> 
						 <th> Manager Id </th> 
						 <th> Department  id</th> 
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['emp_id']."</th>";
					echo "<th>".$db_field['fname']."</th>";
					echo "<th>".$db_field['lname']."</th>";
					echo "<th>".$db_field['phone_no']."</th>";
					echo "<th>".$db_field['haire_date']."</th>";
					echo "<th>".$db_field['job_id']."</th>";
					echo "<th>".$db_field['salary']."</th>";
					echo "<th>".$db_field['comm_pct']."</th>";
					echo "<th>".$db_field['manager_id']."</th>";
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
			  $k="update employees set fname='$_POST[t2]',lname='$_POST[t3]',email='$_POST[t4]',phone_no='$_POST[t5]',hire_date='$_POST[t6]',job_is='$_POST[t7]',salary='$_POST[t8]',
			comm_pct='$_POST[t9]',manager_id='$_POST[t10]',dep_id='$_POST[t11]'
			  where emp_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("employees.php","_self")</script>';
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
			$sql="delete from employees where emp_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("employees.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new employees();
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



	echo"<link rel='stylesheet' href='css/style_employee.css'>
			<body>
			<form name=f method=post action=employees.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Employee_Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";


echo"<tr> <th> Employee id</th> 
     <th> <input type =text name=t1  value=$ob->id> </th> </tr>";
 echo"<tr> <th> First Name</th> 
 <th> <input type =text name=t2 value=$ob->whid> </th> </tr>";

     echo"<tr> <th>Last Name  </th> 
     <th> <input type =text name=t3 value=$ob->qoh > </th> </tr>";

     echo"<tr> <th> @Email</th> 
     <th> <input type =text name=t4 value=$ob->pa> </th> </tr>";

     echo"<tr> <th> Phone Number </th> 
     <th> <input type =text name=t5  value=$ob->ps> </th> </tr>";

     echo"<tr> <th> Haire Date </th> 
     <th> <input type =text name=t6  value=$ob->pd> </th> </tr>";

     echo"<tr> <th> Job Id</th> 
     <th> <input type =text name=t7 value=$ob->pf> </th> </tr>";

     echo"<tr> <th> Salary </th> 
     <th> <input type =text name=t8 value=$ob->sp> </th> </tr>";

     echo"<tr> <th> Commission Pct</th> 
     <th> <input type =text name=t9 value=$ob->pz> </th> </tr>";

     echo"<tr> <th> Manager Id </th> 
     <th> <input type =text name=t10  value=$ob->so> </th> </tr>";

     echo"<tr> <th> Department  id</th> 
     <th> <input type =text name=t11  value=$ob->dp> </th> </tr>";
 

echo"<tr> <th colspan='2'> 
<input type=reset value='New' class='reset1'>
<input type=submit name=bsave value='Save'> 
<input type=submit name=bupdate value='Update'>
<input type=submit name=bdelete value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch value='All Search'>
   <select name=s>
    <option> Emp Id </option> 
   <option> Job Id </option>
   <option> Department ID  </option>
   <option>Fname </option> 
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