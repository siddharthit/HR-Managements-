<?php 
include 'connect.php';
class  orders  extends connect
{
	public $id,$nm,$sp,$ps,$rs,$pc,$wt,$pp;
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
			$r=mysqli_query($this->db_handle,"select * from orders where  ord_id='$value'");

			while($db_field=mysqli_fetch_assoc($r))
				{					
					$this->id=$db_field['ord_id'];
					$this->nm=$db_field['ord_date'];
				$this->sp=	$db_field['ord_mode'];
				$this ->ps=	$db_field['cust_id'];
				$this->rs=	$db_field['ord_stts'];
				$this->pc=	$db_field['ord_tot'];
				$this->wt=	$db_field['sales_rep_id'];
				$this->pp=	$db_field['prom_id'];
				}
		}
	}
	public function input()
	{
		if($this->db_handle)
		{
			$k="insert into orders  values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]',
      '$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]')";
			mysqli_query($this->db_handle,$k);
			echo '<script>alert("Record saved....?")</script>';
			echo '<script>window.open("orders.php","_self")</script>';
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
				$r=mysqli_query($this->db_handle,"select * from orders");
				echo "<center>";
				echo "<table border=1>
				<tr>
				<th> Order  Id </th> 
				<th> Order Date  id    </th> 
				<th> Order Mood      </th> 
				<th>Customer Id     </th> 	
				<th> Order Status </th> 
				<th> Total Order </th> 
				<th> Sales_Rep_Id </th> 
				<th> Promotion Id </th> 
		
			</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
						echo "<th>".$db_field['ord_id']."</th>";
						echo "<th>".$db_field['ord_date']."</th>";
						echo "<th>".$db_field['ord_mode']."</th>";
						echo "<th>".$db_field['cust_id']."</th>";
						echo "<th>".$db_field['ord_stts']."</th>";
						echo "<th>".$db_field['ord_tot']."</th>";
						echo "<th>".$db_field['sales_rep_id']."</th>";
						echo "<th>".$db_field['prom_id']."</th>";
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
				$r=mysqli_query($this->db_handle,"select * from orders where $fieldnm='$value'");
				echo "<center>";
				echo "<table border=1>
						<tr>
						<th> Order  Id </th> 
						<th> Order Date  id    </th> 
						<th> Order Mood      </th> 
						<th>Customer Id     </th> 	
						<th> Order Status </th> 
						<th> Total Order </th> 
						<th> Sales_Rep_Id </th> 
						<th> Promotion Id </th> 
				
					</tr>";
				
				while($db_field=mysqli_fetch_assoc($r))
				{					
					echo "<tr>";
					echo "<th>".$db_field['ord_id']."</th>";
					echo "<th>".$db_field['ord_date']."</th>";
					echo "<th>".$db_field['ord_mode']."</th>";
					echo "<th>".$db_field['cust_id']."</th>";
					echo "<th>".$db_field['ord_stts']."</th>";
					echo "<th>".$db_field['ord_tot']."</th>";
					echo "<th>".$db_field['sales_rep_id']."</th>";
					echo "<th>".$db_field['prom_id']."</th>";
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
			  $k="update orders set ord_date='$_POST[t2]',ord_mode='$_POST[t3]',cust_id='$_POST[t4]',ord_stts='$_POST[t5]',ord_tot='$_POST[t6]',sales_rep_id='$_POST[t7]',prom_id='$_POST[t8]'
			  where ord_id='$_POST[t1]'";
			  mysqli_query($this->db_handle,$k);
			  echo '<script>alert("Record update....?")</script>';
			echo '<script>window.open("orders.php","_self")</script>';
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
			$sql="delete from orders  where ord_id='$_POST[t1]' ";
			mysqli_query($this->db_handle,$sql);
			echo '<script>alert("Record delete....?")</script>';
			echo '<script>window.open("orders.php","_self")</script>';
		}
		else
		{
			echo "Database Not Found";
		}
	}
	
}
$ob=new orders();
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

echo"<link rel='stylesheet' href='css/style_order.css'> 
<form name=f method=post actio=orders.php  > <center>
<marquee direction='down'  scrollamont=3>
<center> <h1>ORSERS_DETAILS</h1></marquee><body>

<table border=35";

    echo"<tr> <th> Order  Id </th> 
     <th> <input type =text name=t1 value=$ob->id > </th> </tr>";

    echo"<tr> <th> Order Date  id    </th> 
    <th> <input type =text name=t2 value=$ob->nm> </th> </tr>";

     echo"<tr> <th> Order Mood      </th> 
     <th> <input type =text name=t3value=$ob->sp> </th> </tr>";

     
     echo"<tr> <th>Customer Id     </th> 
     <th> <input type =text name=t4 value=$ob->ps> </th> </tr>";

     echo"<tr> <th> Order Status </th> 
     <th> <input type =text name=t5 value=$ob->rs> </th> </tr>";

     echo"<tr> <th> Total Order </th> 
     <th> <input type =text name=t6 value=$ob->pc> </th> </tr>";

     echo"<tr> <th> Sales_Rep_Id </th> 
     <th> <input type =text name=t7 value=$ob->wt> </th> </tr>";

     echo"<tr> <th> Promotion Id </th> 
     <th> <input type =text name=t8  value=$ob->pp> </th> </tr></body>";


     echo"<tr> <th colspan='2'> 
	 <input type=reset value='New' class='reset1'>
<input type=submit name=bsave  value='Save'> 
<input type=submit name=bupdate value='Update'>
<input type=submit name=bdelete  value='Delete'>
<input type=button value='Menu' onclick='menu()'> <br>
 <thcolspan='2'><input type=submit name=ballsearch  value='All Search'>
   <select name=s>
    <option>  ord_id  </option> 
   <option>  ord_date </option>
   <option> cust_Id </option>
  
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