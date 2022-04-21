<!doctype html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<head>
    <title>IMOCHA CODE</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function()
        {
            $('$submit').click(function()
          {
                var name =$('#name').val();
                var dob =$('#dob').val();
                var address =$('#address').val();
                var postcode =$('#postcode').val();
                var state =$('#state_id').val();
               
                $.ajax({
                    url: 'setdata.php',
                    method: 'POST',
                    data:
                    {
                      name: name;
                      dob: dob;
                      address: address;
                      postcode: postcode;
                      state_id: state;
                    };
                    
                    successs.function(result)
                    {
                        alert(result);
                    }
                });
          });
        });

    </script>


        <script src="js/bootstrap.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript"></script>
        <script>
            
            function GetDetail(str){
                if(str.length == 0) {
                    document.getElementbyId("state_id").value ="";
                    return;
                }
                else {
                   var xmlhttp= new XMLHttpRequest();
                   xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200){
                        var myObj = JSON.parse(this.responseText);
                        document.getElementById("state_id").value = myObj[0];
                        }
                    };

                    xmlhttp.open("GET", "postcode.php?postcode=" + str, true);
                    xmlhttp.send();
                }
            }
    </script>
</head>

<body>

    <form action="setdata.php" method="POST">

    <ul class="form-style-1">

    <h2>IMOCHA PROGRAMMING TEST</h2>

    <li>
        <label> Name <span class="required">*</span></label>
        <input type="text" name="name" id="name" class="field-divided" placeholder="First" />
     </li>

     <li>
        <label>DOB <span class="required">*</span></label>
        <input type="date" name="dob" id="dob" class="field-divided" />
    </li>

    <li>
        <label>Address <span class="required">*</span></label>
        <input type="text" name="address" id="address" class="field-long field-textarea" />
    </li>

    <li>
        <label>PostCode <span class="required" >*</span></label>
        <input type="text" name="postcode" id="postcode" class="field-divided" onkeyup="GetDetail(this.value)" />
    </li>
    
    <li>
        <label>State <span class="required">*</span></label>
        <input type="text" name="state_id" id="state_id" class="field-divided" placeholder="State" />
    </li>

    <li>
        <button type="submit" name="submit" id="submit" >Submit Form</button>
    </li>
  </ul>
 </form>

<?php

$hostname="localhost";
$dbname="imocha";
$username="root";
$password="";

$conn= mysqli_connect ($hostname,$username,$password,$dbname) ;


  if (!$conn)
  {
      die("Connection Failed : ".mysqli_connect_error());
  }

  $sql= 'select * from form';
  $query= mysqli_query($conn,$sql);

  if(!$query)

  {
      die ('error found'.mysqli_error($conn));
  }
  
  echo "
  
  <h2>&nbsp;&nbsp;Results:</h2>

      <table class='table'>
  <tr>
  <th scope='col'>Name</th>
  <th scope='col'>Age</th>
  <th scope='col'>Address</th>
  <th scope='col'>Postcode</th>
  <th scope='col'>State</th>
  </tr>";

  while ($row = mysqli_fetch_array($query))
  {
    echo '

  <tr>      <br>
  <td>'.$row['name'].'</td>
  <td>'.$row['dob'].'</td>
  <td>'.$row['address'].'</td>
  <td>'.$row['postcode'].'</td>
  <td>'.$row['state_id'].'</td>
 </tr>';
  }

  "</table>";

?>

</body>


<style type="text/css">

.form-style-1 {
	margin:10px auto;
	max-width: 100%;
	padding: 20px 12px 10px 20px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
	padding: 5px;
	display: block;
	list-style: none;
	margin: 10px 0 0 0;
    width: 100%;
}
.form-style-1 label{
	margin:0 0 6px 0;
	padding:0px;
	display:block;
	font-weight: bold;
    
}

.form-style-1 h2{
	margin:0 0 18px 0;
	padding:2px;
	font-weight: bold;
    text-allign:center;
    
}

.form-style-1 button{
	margin:0 0 6px 0;
	padding:0px;
	display:block;
    color: white;
    background-color: #278AF0;
    
}

.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 button[type=submit],

text, 
select{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border:1px solid #BEBEBE;
	padding: 7px;
	margin:0px;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;
	outline: none;	
}

.form-style-1 select:focus{
	-moz-box-shadow: 0 0 8px #88D5E9;
	-webkit-box-shadow: 0 0 8px #88D5E9;
	box-shadow: 0 0 8px #88D5E9;
	border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
	width: 100%;
}

.form-style-1 .field-long{
	width: 100%;
}
.form-style-1 .field-select{
	width: 100%;
}
.form-style-1 .field-textarea{
	height: 100px;
}

.form-style-1 .required{
	color:red;
}
</style>

</html>