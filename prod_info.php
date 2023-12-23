<?php 


include 'connect.php';
class  prod_info extends connect
{ 
	public $id,$nm,$des,$cid,$wcl, $wp,$sid,$ps,$lp,$mp,$cu;
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
			$r=mysqli_query($this->db_handle,"select * from prod_info where  prod_id='$value'");

			while($db_field=mysqli_fetch_assoc($r))
				{					
							$this->id=$db_field['prod_id'];
							$this->nm=$db_field['prod_nm'];
							$this->des=$db_field['prod_desp'];
							$this->cid=$db_field['catg_id'];	
							$this->wcl= $db_field['weight_cl'];
							$this->wp= $db_field['warr_prd'];
							 $this->sid=$db_field['splr_id'];
							$this->ps= $db_field['prod_stts'];
							$this->ls= $db_field['list_pri'];		
							$this->mp= $db_field['min_pri'];	
						$this->cu= $db_field['cata_url'];					
				}
		}
	}
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into prod_info  values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]',
      		'$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]','$_POST[t10]','$_POST[t11]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("prod_info.php","_self")</script>';
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
				$r=mysqli_query($this->db_handle,"select * from prod_info");
				echo "<center>";
				echo "<table border=1>
					<tr>
					<th> Prodict id</th>
					<th> Product  Name</th> 
					<th>Product Description  </th> 
					<th> Category Id</th> 
					<th> WEIGHT class </th> 
					<th> Warranty Period </th>	
					<th>  Suppplier Id </th>
					<th> Product Status  </th>  
					<th> List_Price</th> 
					<th> Min_Price  </th>	
					<th> Catalog_url  </th> 	
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['prod_id']."</th>";
					echo "<th>".$db_field['prod_nm']."</th>";
					echo "<th>".$db_field['prod_desp']."</th>";
					echo "<th>".$db_field['catg_id']."</th>";
					echo "<th>".$db_field['weight_cl']."</th>";
					echo "<th>".$db_field['warr_prd']."</th>";
					echo "<th>".$db_field['splr_id']."</th>";
					echo "<th>".$db_field['prod_stts']."</th>";
					echo "<th>".$db_field['list_pri']."</th>";
					echo "<th>".$db_field['min_pri']."</th>";
					echo "<th>".$db_field['cata_url']."</th>";
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
				$r=mysqli_query($this->db_handle,"select * from prod_info where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
						<tr>
						<th> produvt id </th>
					<th> Product  Name</th> 
					<th>Product Description  </th> 
					<th> Category Id</th> 
					<th> WEIGHT class </th> 
					<th> Warranty Period </th>	
					<th>  Suppplier Id </th>
					<th> Product Status  </th>  
					<th> List_Price</th> 
					<th> Min_Price  </th>	
					<th> Catalog_url  </th> 	
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['prod_id']."</th>";
						echo "<th>".$db_field['prod_nm']."</th>";
						echo "<th>".$db_field['prod_desp']."</th>";
						echo "<th>".$db_field['catg_id']."</th>";
						echo "<th>".$db_field['weight_cl']."</th>";
						echo "<th>".$db_field['warr_prd']."</th>";
						echo "<th>".$db_field['splr_id']."</th>";
						echo "<th>".$db_field['prod_stts']."</th>";
						echo "<th>".$db_field['list_pri']."</th>";
						echo "<th>".$db_field['min_pri']."</th>";
						echo "<th>".$db_field['cata_url']."</th>";
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
			  $k="update prod_info set prod_nm='$_POST[t2]',prod_desp='$_POST[t3]',catg_id='$_POST[t4]',weight_cl='$_POST[t5]',warr_prd='$_POST[t6]'
              ,splr_id='$_POST[t7]',prod_stts='$_POST[t8]',list_pri='$_POST[t9]',min_pri='$_POST[t10]',cata_url='$_POST[t11]'
			  where prod_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record Update....?")</script>';
			echo '<script>window.open("prod_info.php","_self")</script>';
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
			$sql="delete from prod_info where prod_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record Delete....?")</script>';
			echo '<script>window.open("prod_info.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new prod_info();
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

	echo"<link rel='stylesheet' href='css/style_prod_info.css'>
			<body>
			<form name=f method=post action=prod_info.php>
			<center>
			<marquee direction	='down' scrollamount='5'><center>
			<h1>Product_information_Details</h1></marquee>
			<table border='21' cellpadding='15' cellspacing='8' >";
				echo"<body>";
echo"<tr> <th> Product id</th> 
     <th> <input type =text name=t1 value=$ob->id > </th> </tr>";

 echo"<tr> <th> Product  Name</th> 
 <th> <input type =text name=t2 value=$ob->nm> </th> </tr>";

     echo"<tr> <th>Product Description  </th> 
     <th> <input type =text name=t3 value=$ob->des> </th> </tr>";

     echo"<tr> <th> Category Id</th> 
     <th> <input type =text name=t4 value=$ob->cid> </th> </tr>";

     echo"<tr> <th> WEIGHT class </th> 
     <th> <input type =text name=t5 value=$ob->wcl> </th> </tr>";

     echo"<tr> <th> Warranty Period </th> 
     <th> <input type =text name=t6 value=$ob->wp> </th> </tr>";

     echo"<tr> <th>  Suppplier Id </th> 
     <th> <input type =text name=t7 value=$ob->sid> </th> </tr>";

     echo"<tr> <th> Product Status  </th> 
     <th> <input type =text name=t8 $ob->ps> </th> </tr>";

     echo"<tr> <th> List_Price</th> 
     <th> <input type =text name=t9 $ob->lp> </th> </tr>";

     echo"<tr> <th> Min_Price  </th> 
     <th> <input type =text name=t10 $ob->mp> </th> </tr>";

     echo"<tr> <th> Catalog_url  </th> 
     <th> <input type =text name=t11 $ob->cu> </th> </tr>";

     echo"<tr> <th colspan='2'> 
	 <input type=reset value='New' class='reset1'>
<input type=submit name=bsave value='Save'> 
<input type=submit name=bupdate  value='Update'>
<input type=submit name=bdelete  value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
   <select name=s>
    <option> prod_Id </option> 
   <option> splr_Id </option>
   <option> cata_id </option>

   </select>
   <input type=text name=t12>
   <input type=submit name=bsearch 	value='Search'>
   <input type=submit name=bsearchByid 	value='Search'></th></tr>";

   echo ("<script>
   function menu()
   {
	   window.open('menu.html','_self')
   }
   </script>");
?>