<html>

<head>
<title>Hit Counter</title>
<style>

/*This is all css styling all for the elements*/

body{
	text-align:center;
	background: #82dfff;
}

/*This is the container for all the content within the counter*/
#content {
	width: 500px;
	background: #cccccc;
	margin: auto;
	margin-top: 260px;
	border-radius: 25px 25px 25px 25px;
	box-shadow: 10px 10px 5px grey;
	padding-bottom: 100px;
	padding-top: 100px;
}	

/*The hit counter*/
h2{
	width: 165px;
	margin-top: 0px;
	padding-top: 0px;
	margin: auto;
	color: white;
	background: black;
	padding-top: 5px;
	padding-bottom: 5px;
}

/*The button*/
.button{
	width: 165px;
	text-align: center;
	display: inline-block;
	font-size: 16px;
	border-radius: 5px 5px 5px 5px;
	color: buttontext;
    background-color: buttonface;
	box-shadow: 1px 1px 1px 1px;
}

/*The black object on the right*/
.notch{
	poistion: fixed;
	transform: translate(330px,-270px);	
}

/*The grey object above the button*/
.tally{
	transform: translate(-35px, -400px);
}

</style>
</head>


<body>

<!--This div is a wrapper for all of the content-->
<div id='content'>

<!--This is the button that will reset the count-->
<form method="post">
	<input class="button" type="submit" name="submit">
</form>

<?php


//This is the path to my txt file where the visitor hits will be stored
$path = 'C:\xampp\htdocs/projects/countlog.txt';

//Opens countlog.txt to read the number of hits.
//the "r" stands for read only
$file  = fopen( $path, 'r' );

//Gets the line with the amount of hits
//The "1000" stands for the file size (1000kb)
$count = fgets( $file, 1000 );

//Closes the file
fclose( $file );

//Updates the count
$count = abs( intval( $count ) ) + 1;

//Opens countlog.txt to change new hit number.
//The "w" stands for write only
$file = fopen( $path, 'w' );

//updates the count in the txt file
fwrite( $file, $count );

//closes the txt file
fclose( $file );

//printing text on screen

echo "<h1>Hit Counter</h1>";

//checks if the button has been clicked. If it has been clicked it will set the value of the text file value to 0
if(isset($_POST['submit'])){
	echo "Count Reset";
	$path = 'C:\xampp\htdocs/projects/countlog.txt';
	$reset = "0";
	$file  = fopen( $path, 'w' );
	$open_reset = fopen( $path, 'w' );
	file_put_contents($path , $reset);
	fclose($file);

//if the button hasnt been clicked then it will tell the user to click the button to reset the count	
}else{
	echo"Press Button To Reset Count";
}

//outputs the hit count to the user


echo "<h2>$count</h2></div>"; 
?>

<!--These are the images used to make the object look like a tally counter-->
<img class="notch"src="notch.png">
<img class="tally"src="tally-counter.png">

<script>
//this creates a pop up whenever a user clicks on the page
alert("Welcome to the Website Hit Counter this application counts the amount of visitors a website has.Press the submit button if you want to reset the count then close the page and re-open it. The count will then be reset. You can also check the text file for the count.");
</script>

</body>

</html>