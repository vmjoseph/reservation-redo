<?php

    
    	    if(isset($_POST["submitMeta"])){
    	       
                $firstname = ucfirst(trim($_POST["firstname"]));
                $lastname= ucfirst(trim($_POST["lastname"]));
                $cwid= trim($_POST["cwid"]);
                $year= $_POST["year"];
                $laundry= ($_POST["laundry"]);
                $sservices= ($_POST["sservices"]);
                $kitchen=($_POST["kitchen"]);
                $residence= ($_POST["residence"]);
                #Placing each group of residence halls (halls for seniors/juniors, halls for freshman ect) into an array
                $seniorJunior= array("newfulton", "lowerwest","upperwest","fulton","talmadge");
                $freshman=array("sheahan","leo","marian","champagnat");
                $sophomore=array("midrise","gartland","foy","uppernew","lowernew");
                
                echo "<table>
                <tr><td>Name: </td><td>$firstname $lastname</td</tr>
                <tr><td>Year: </td><td>".ucfirst($year)."</td</tr>
                <tr><td>Residence Hall: </td><td>".ucfirst($residence)."</td</tr>
                <tr><td>Preferences: </td><td>Preference</td><td>Yes/No</td></tr>
                <tr><td></td><td> Kitchen: </td><td>$kitchen</td></tr>
                <tr><td></td><td> Laundry: </td><td>$laundry</td></tr>
                <tr><td></td><td>  Special Services: </td><td>$sservices</td></tr>
                </table>";
    	    }else{
    	        if(isset($_POST["submit"])){
    #declaring vars from previous index.html page
    $firstname = ucfirst(trim($_POST["firstname"]));
    $lastname= ucfirst(trim($_POST["lastname"]));
    $cwid= trim($_POST["cwid"]);
    $year= $_POST["year"];
    $laundry= isset($_POST["laundry"]);
    $sservices= isset($_POST["sservices"]);
    $kitchen=isset($_POST["kitchen"]);
    $residence= ($_POST["residence"]);
    #Placing each group of residence halls (halls for seniors/juniors, halls for freshman ect) into an array
    $seniorJunior= array("newfulton", "lowerwest","upperwest","fulton","talmadge");
    $freshman=array("sheahan","leo","marian","champagnat");
    $sophomore=array("midrise","gartland","foy","uppernew","lowernew");
    $errorCounter;
    
    echo $year."<br>";
    echo $residence."<br>";
    #testing Kitchen return value
    #echo $kitchen."<br>";
    
    #checks if a residence hall was selected
    	if ($residence== ""){
    		echo "You did not select a residence hall!!<br>";
    		$errorCounter++;
    	} else{
    #Checks to see if you are a freshman, then checks to see the selection you have chosen for residence halls
        if($year=="freshman"){
            #searches user-selected year's array for residence hall, if the hall is found in another group's array, returns error
            if(in_array($residence,$sophomore) || in_array($residence, $seniorJunior)){
                echo "Sorry, you are a $year, so you cannot chose $residence.<br>";
                $errorCounter++;
                }else {
                #checks to see if user wants a kitchen, if so and they have chosen Marian, the user will receieve an error
                    if($kitchen== TRUE && $residence=="marian" ){
                        // echo $residence."<br>";
                        echo "Sorry, $residence does not have the amenities you requested. Please try another residence hall. <br>";
                        $errorCounter++;
                    } else{
                    # echo "Congrats, you are a $year, so you can choose $residence. <br>";
                    }
            
            }
        }
    	
    	if ($year == "sophomore"){
    		if(in_array($residence,$freshman) || in_array($residence, $seniorJunior)){
    			echo "Sorry, you are a $year, so you cannot chose $residence. <br>";
    			$errorCounter++;
    		}else {
    			if($kitchen== TRUE && $residence=="midrise" ){
    				#checks to see if user wants a kitchen, if so and they have chosen Midrise, the user will receieve an error
    				echo "Sorry, $residence does not have the amenities you requested. Please try another residence hall. <br>";
    				$errorCounter++;
    			
    		} else{
    			#echo "Congrats, you are a $year, so you can choose $residence. <br>";
    				}
    			}
    	}
    	if ($year == "senior" || $year == "junior"){
    		if(in_array($residence,$freshman) || in_array($residence, $sophomore)){
    			echo "Sorry, you are a $year, so you cannot chose $residence. <br>";
    			$errorCounter++;
    		}else {
    			#echo "Congrats, you are a $year, so you can choose $residence. <br>";
    		}	
    	}
    
    	}	
    	
    	#checks if other fields were left empty
    	if (empty($firstname)){
    		echo "You did not input your name!!<br>";
    		$errorCounter++;
    	}else{
    	    echo "Your first name is ". $firstname.".<br>";
    	}
    	
    	if (empty($lastname)){
    		echo "You did not input your last name!!<br>";
    		$errorCounter++;
    	}else{
    		echo "Your last name is ". $lastname.".<br>";
    	}
    	
    	if (empty($cwid)){
    		echo "You did not input your CWID!!<br>";
    		$errorCounter++;
    	}else{
    		echo "Your CWID is ". $cwid.".<br>";
    	}
    	
    	if ($year== ""){
    		echo "You did not input your year!!<br>";
    		$errorCounter++;
    	}else{
    		echo "Your year is ". $year.".<br>";
    	}
    	$errorRate=(($errorCounter/5)*100)."%";
    	echo "Total Errors Caught: ".$errorCounter."<br> Error percentage: ".$errorRate."<br>";
    	if ($errorCounter>0){
    	    echo "<script>alert('Your submission has a few errors, please return to the form');</script>";
    	    echo "<button onclick='window.history.back()';>Go Back</button>";
    	    
    	}else{
    	    
    $laundryChoice;
    $kitchenChoice;
    $sservicesChoice;
    
        if($kitchen==1){
            $kitchenChoice="Yes";
        }
        else{
            $kitchenChoice="No";
        }
        
        if($laundry==1){
            $laundryChoice="Yes";
        }
        else{
            $laundryChoice="No";
        }
        if($sservices==1){
            $sservicesChoice="Yes";
        }
        else{
            $sservicesChoice="No";
        }
    	    echo "Please verify the information above. If there is an error, please go back.<br>";
    	    echo "<button onclick='window.history.back();'>Go Back</button>";
    	      echo "
    	    <form action=' ' method='post'>
    	    <input type='hidden' name='firstname' value=$firstname></input>
    	    <input type='hidden' name='lastname' value=$lastname></input>
    	    <input type='hidden' name='cwid' value=$cwid></input>
    	    <input type='hidden' name='year' value=$year></input>
    	    <input type='hidden' name='laundry' value=$laundryChoice></input>
    	    <input type='hidden' name='kitchen' value=$kitchenChoice></input>
    	    <input type='hidden' name='sservices' value=$sservicesChoice></input>
    	    <input type='hidden' name='residence' value=$residence></input>
    	    <input type='submit' name='submitMeta' value='Submit for Submission'>
    	    </form>";
    	        
    	    }
    	
    
}else{
    ?>
     <html>
	<head>
	</head>
<body>
	<form action=" " method="POST">
		<table>
			<tr><th colspan="2"> General Information: </th></tr>
			<tr><td> First Name: </td><td><input type="text" name="firstname"></td></tr>
			<tr><td> Last Name: </td><td><input type="text" name="lastname"></td></tr>
			<tr><td> CWID: </td><td><input type="text" name="cwid"></td></tr>
			<tr><td> Year </td><td>
							<select name= "year">
								<option value= "">Select a Year</option>
								<option value="freshman">Freshman</option>
								<option value="sophomore">Sophomore</option>
								<option value="junior">Junior</option>
								<option value="senior"> Senior </option>
							</select>
							</td></tr>
			<tr><th colspan="2">Preferences:</th></tr>
			<tr><td> Laundry?: </td><td><input type="checkbox" name="laundry"></td></tr>
			<tr><td> Special Services?: </td><td><input type="checkbox" name="sservices"></td></tr>
			<tr><td> Kitchen?: </td><td><input type="checkbox" name="kitchen"></td></tr>
			<tr><th colspan="2">Residence Selection</th></tr>
			<tr><td>Where would you like to live?:</td><td>
															<select name="residence">
																<option value="">Select a residence</option>
																<option value="champagnat">Champagnat Hall</option>
																<option value="leo">Leo Hall</option>
																<option value="marian">Marian Hall</option>
																<option value="sheahan">Sheahan Hall</option>
																<option value="midrise">Midrise Hall</option>
																<option value="foy">Foy Townhouses</option>
																<option value="gartland">Gartland Commons</option>
																<option value="uppernew">Upper New Townhouses</option>
																<option value="lowernew">Lower New Townhouses</option>
																<option value="newfulton">New Fulton Townhouses</option>
																<option value="lowerwest">Lower West Cedar Townhouses</option>
																<option value="upperwest">Upper West Cedar Townhouses</option>
																<option value="fulton">Fulton Street Townhouses</option>
																<option value="talmadge">Talmadge Court</option>
																<option value="offcampus">Off Campus</option>
															</td></tr>
			<tr><th colspan="2"><input type="submit" name="submit"value="Submit"></th></tr>
</body>
</html>
    <?php
}
        }
?>
       