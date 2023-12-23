<?php
include 'connect.php';
class  customers extends connect
{
	public $id,$whid,$qoh,$pa,$ps,$pd,$pf,$sp,$pz,$so,$dp,$fp,$aa,$ss,$pp;
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
		$r=mysqli_query($this->db_handle,"select * from customers where  cust_id='$value'");

		while($db_field=mysqli_fetch_assoc($r))
		{					
						$this->id=$db_field['cust_id'];
						$this->whid=$db_field['cust_fnm'];
						$this->qoh=$db_field['cust_lnm'];
						$this->pa=$db_field['cust_add'];
						$this->ps=$db_field['ph_no'];
						$this->pd=$db_field['nls_lan'];
						$this->pf=$db_field['nls_terr'];
						$this->sp=$db_field['cre_lim'];
						$this->pz=$db_field['cust_eml'];
						$this->so=$db_field['acc_mgr_id'];
						$this->dp=$db_field['cust_geo_loc'];
						$this->fp=$db_field['dob'];
						$this->aa=$db_field['mari_stts'];
						$this->ss=$db_field['gender'];
					    $this->pp=$db_field['incm_lev'];
				

		}
	}
}
//To save 
	public function input()
	{
		if($this->db_handle)
		{
		
				$f=0;
				$r=mysqli_query($this->db_handle,"select cust_id from customers");

			while($db_field=mysqli_fetch_assoc($r))
			{
				if($db_field['cust_id']==$_POST['t1'])
				{
					$f=1;
					break;
				}
			}
			if($f==0)
		 {
			$k="insert into customers values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]',
			'$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]',
			'$_POST[t10]','$_POST[t11]','$_POST[t12]','$_POST[t13]','$_POST[t4]','$_POST[t14]')";
			mysqli_query($this->db_handle,$k);
			echo "<script>alert('Record Saved')</script>";
		  }
		  else if($f==1)
		  echo"<script>alert('Already exist')</script>";
		}
		else
			echo "<script>alert('Database Not Found')</script>";
	}
  // End of save
	
	//for all search.
	public function allsearch()
	{
		if($this->db_handle)
			{
				$r=mysqli_query($this->db_handle,"select * from customers");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> customer id</th>
					<th> Customer First Name</th> 
					<th>Cust last Name  </th> 
					<th> Cust Address</th> 	
					<th> Phone Number </th> 	
					<th> Nls Language  </th> 
					<th>  Nls_ territory</th> 	
					<th> Credit _limit </th> 
					<th> Cust email Pct</th> 
					<th> Account Mge Id </th> 
					<th> Cust geo location</th> 
					<th> Date_of_Birth</th>
					<th> Marital Status </th>
					<th> Gender </th> 
					<th> Income </th> 
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['cust_id']."</th>";
						echo "<th>".$db_field['cust_fnm']."</th>";
						echo "<th>".$db_field['cust_lnm']."</th>";
						echo "<th>".$db_field['cust_add']."</th>";
						echo "<th>".$db_field['ph_no']."</th>";
						echo "<th>".$db_field['nls_lan']."</th>";
						echo "<th>".$db_field['nls_terr']."</th>";
						echo "<th>".$db_field['cre_lim']."</th>";
						echo "<th>".$db_field['cust_eml']."</th>";
						echo "<th>".$db_field['acc_mgr_id']."</th>";
						echo "<th>".$db_field['cust_geo_loc']."</th>";
						echo "<th>".$db_field['dob']."</th>";
						echo "<th>".$db_field['mari_stts']."</th>";
						echo "<th>".$db_field['gender']."</th>";
						echo "<th>".$db_field['incm_lev']."</th>";
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
			$value="$_POST[t16]";
				$r=mysqli_query($this->db_handle,"select * from customers where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th> customer id </th>
				<th> Customer First Name</th> 
				<th>Cust last Name  </th> 
				<th> Cust Address</th> 	
				<th> Phone Number </th> 	
				<th> Nls Language  </th> 
				<th>  Nls_ territory</th> 	
				<th> Credit _limit </th> 
				<th> Cust email Pct</th> 
				<th> Account Mge Id </th> 
				<th> Cust geo location</th> 
				<th> Date_of_Birth</th>
				<th> Marital Status </th>
				<th> Gender </th> 
				<th> Income </th> 
				</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['cust_id']."</th>";
						echo "<th>".$db_field['cust_fnm']."</th>";
						echo "<th>".$db_field['cust_lnm']."</th>";
						echo "<th>".$db_field['cust_add']."</th>";
						echo "<th>".$db_field['ph_no']."</th>";
						echo "<th>".$db_field['nls_lan']."</th>";
						echo "<th>".$db_field['nls_terr']."</th>";
						echo "<th>".$db_field['cre_lim']."</th>";
						echo "<th>".$db_field['cust_eml']."</th>";
						echo "<th>".$db_field['acc_mgr_id']."</th>";
						echo "<th>".$db_field['cust_geo_loc']."</th>";
						echo "<th>".$db_field['dob']."</th>";
						echo "<th>".$db_field['mari_stts']."</th>";
						echo "<th>".$db_field['gender']."</th>";
						echo "<th>".$db_field['incm_lev']."</th>";
					echo "</tr>";				
				}
				echo "</table>";
			}
	}
	// end of search w
  //for update
  public function update ()
	{
		if($this-> db_handle)
		{
			$k="update customers set cust_fnm='$_POST[t2]',cust_lnm='$_POST[t3]',cust_add='$_POST[t4]',ph_no='$_POST[t5]',nls_lan='$_POST[t6]',nls_terr='$_POST[t7]',cre_lim='$_POST[t8]',
      cust_eml='$_POST[t9]',acc_mgr_id='$_POST[t10]',cust_geo_loc='$_POST[t11]',dob='$_POST[t12]',mari_stts='$_POST[t13]',gender='$_POST[t14]',incm_lev='$_POST[t15]'
			where cust_id='$_POST[t1]'";
			mysqli_query($this->db_handle,$k);
			echo"Record Update";
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
			$sql="delete from customers where cust_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo "Record Deleted....";
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new customers();
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






	echo"<link rel='stylesheet' href='css/style_customer.css'>
<form name=f method=post action=customer.php> <center>
<marquee direction='down' scrollamount='5'> <center>
<tittle> <h1> Customer_Detalis_List </h1></tittle> </marquee>
<body>
<table border=35 cellpadding='7' cellspacing=5";

echo"<tr> <th> Customer id</th> 
     <th> <input type =text name=t1  value=$ob->id> </th> </tr>";
 echo"<tr> <th> Customer First Name</th> 
 <th> <input type =text name=t2 value=$ob->whid> </th> </tr>";

     echo"<tr> <th>Cust last Name  </th> 
     <th> <input type =text name=t3 value=$ob->qoh> </th> </tr>";

     echo"<tr> <th> Cust Address</th> 
     <th> <input type =text name=t4 value=$ob->pa> </th> </tr>";

     echo"<tr> <th> Phone Number </th> 
     <th> <input type =text name=t5  value=$ob->ps> </th> </tr>";

     echo"<tr> <th> Nls Language  </th> 
     <th> <input type =text name=t6  value=$ob->pd> </th> </tr>";

     echo"<tr> <th>  Nls_ territory</th> 
     <th> <input type =text name=t7  value=$ob->pf> </th> </tr>";

     echo"<tr> <th> Credit _limit </th> 
     <th> <input type =text name=t8  value=$ob->sp> </th> </tr>";

     echo"<tr> <th> Cust email Pct</th> 
     <th> <input type =text name=t9  value=$ob->pz> </th> </tr>";

     echo"<tr> <th> Account Mge Id </th> 
     <th> <input type =text name=t10  value=$ob->so> </th> </tr>";

     echo"<tr> <th> Cust geo location</th> 
     <th> <input type =text name=t11  value=$ob->dp> </th> </tr>";

     echo"<tr> <th> Date_of_Birth</th> 
     <th> <input type =text name=t12  value=$ob->fp> </th> </tr>";

     echo"<tr> <th> Marital Status </th> 
     <th> <input type =text name=t13  value=$ob->aa> </th> </tr>";

     echo"<tr> <th> Gender </th> 
     <th> <input type =text name=t14   value=$ob->ss> </th> </tr>";

     echo"<tr> <th> Income </th> 
     <th> <input type =text name=t15  value=$ob->pp> </th> </tr> </body>";
 

echo"<tr> <th colspan='2'> 
<input type=reset value='New' class='reset1'>
<input type=submit name=bsave value='Save'> 
<input type=submit name=bupdate value='Update'>
<input type=submit name=bdelete value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch value='All Search'>
   <select name=s>
    <option> cust_fnm </option> 
   <option> nls_lan </option>
 
   </select>
   <input type=text name=t16>
   <input type=submit name=bsearch 	value='Search'>
   <input type=submit name=bsearchbyid 	value='Searchbyid'></th></tr> </table>";

   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");
?>