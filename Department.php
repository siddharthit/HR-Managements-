<?php 
include 'connect.php';
class  Departments extends connect
{
	public $id,$nm,$mn_id,$loc_id;
	public function __construct()
	{
		parent::__construct();
	}

	//to search by id 
	public function searchbyid()
	{
		if ($this->db_handle)
		{
			$value="$_POST[t1]";
			$r=mysqli_query($this->db_handle,"select * from departments where  dep_id='$value'");

			while($db_field=mysqli_fetch_assoc($r))
				{					
							$this->id=$db_field['dep_id'];
							$this->nm=$db_field['dep_name'];
							$this->mn_id=$db_field['main_id'];	
							$this->loc_id=$db_field['loc_id'];					
				}
		}
	}
	// end of search by id
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into departments values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("Department.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
		
	}
  //End of save
  	
	//for all search.
	public function allsearch()
	{
		if($this->db_handle)
			{
				$r=mysqli_query($this->db_handle,"select * from departments");
				echo "<center>";
				echo "<table border=1 bgcolor=pink>
				<tr>
				<th> Department Id</th> 
				<th> Department Name  </th>
				<th> Manager Id   </th> 			
				<th> Location Id </th> 
				</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['dep_id']."</th>";
						echo "<th>".$db_field['dep_name']."</th>";
						echo "<th>".$db_field['main_id']."</th>";
						echo "<th>".$db_field['loc_id']."</th>";
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
				$r=mysqli_query($this->db_handle,"select * from departments where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1 bgcolor=pink>
					<tr>
					<th> Department Id</th> 
					<th> Department Name  </th>
					<th> Manager Id   </th> 			
					<th> Location Id </th> 
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['dep_id']."</th>";
					echo "<th>".$db_field['dep_name']."</th>";
					echo "<th>".$db_field['main_id']."</th>";
					echo "<th>".$db_field['loc_id']."</th>";
				echo "</tr>";					
				}
				echo "</table>";
			}
	}
	// end of search 
    //for update
	public function update ()
	{
		if($this-> db_handle)
		{
			$k="update departments set de_name='$_POST[t2]',man_id='$_POST[t3]',loc_id='$_POST[t4]'
			where dep_id='$_POST[t1]'";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record Update....?")</script>';
			echo '<script>window.open("Department.php","_self")</script>';
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
			$sql="delete from departments where dep_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("Department.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new Departments ();
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



	echo"<link rel='stylesheet' href='css/style_departmnts.css'>
			<form name=f method=post action=Department.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Departments Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
    echo"<tr> <th><font color=red> Department Id</th> 
     <th> <input type =text name=t1 value=$ob->id> </th> </tr>";

    echo"<tr> <th> <font color=red>Department Name  </th> 
    <th> <input type =text name=t2 value=$ob->nm> </th> </tr>";

     echo"<tr> <th><font color=red> Manager Id   </th> 
     <th> <input type =text name=t3 $ob->mn_id> </th> </tr>";

     echo"<tr> <th><font color=red> Location Id </th> 
     <th> <input type =text name=t4 $ob->loc_id> </th> </tr>";


echo"<tr> <th colspan='2'> 
<input type=reset value='New'>
<input type=submit name=bsave value='Save'> 
<input type=submit name=bupdate value='Update'>
<input type=submit name=bdelete value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch value='All Search'>
   <select name=s>
    <option>  dep_id </option> 
    <option> man_id </option>

   </select>
   <input type=text name=t5>
   <input type=sumbit name=bsearchbyid value='searchbyid'>
   <input type=submit name=bsearch	value='Search'></th></tr>";

   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");
?>