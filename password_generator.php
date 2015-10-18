<!--Script created by Nazmus at www.EasyProgramming.net -->

<html xmlns="http://www.w3.org/1999/xhtml">
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<body>
    <div class="container">
    <div class="row container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
<h2>EP Random Password Generator</h2>
<!--        HTML Form for end user - reloads on same page -->
<form role="form" method="POST" action="<?php htmlentities($_SERVER["PHP_SELF"])?>">
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="lowerc" value="Lower Case" <?php if(isset($_POST[ 'lowerc'])) echo 'checked';?>>Lower Case</label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="upperc" value="Upper Case" <?php if(isset($_POST[ 'upperc'])) echo 'checked';?>>Upper Case</label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="numbers" value="numbers" <?php if(isset($_POST[ 'numbers'])) echo 'checked';?>>Numbers</label>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="symbols" value="Symbols" <?php if(isset($_POST[ 'symbols'])) echo 'checked';?>>Symbols</label>
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="psize">Max Size of Password:</label>
        <input id="length" type="number" min="6" max="100" name="psize" maxlength="3" size="3" value="6">
        <br />
    </div>
    <div class="form-group">
        <div id="slider"></div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
</form>
<!--End form-->
<?php
//    Start PHP password generation
    $password1=""; //    declare $password1 variable
    $lowercase = 'abcdefghijklmnopqrstuvwxyz'; //all lowercase letters
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; //all upper case letters
    $numbers = '0123456789'; // Numbers
    $symbols = '!@#$%^&*()?'; // Certain symbols

// Activates code block if submit button is clicked
    if(isset($_POST['submit'])){
	//Defaults to lower case password if no checkbox is selected - to prevent a NULL return
        if(!isset($_POST['lowerc']) && !isset($_POST['upperc']) && !isset($_POST['numbers']) && !isset($_POST['symbols']))
           {
               $password1 = $lowercase;
           }
        // Checks to see if lowercase checkbox is checked
        if(isset($_POST['lowerc'])){
            $password1 = $lowercase;
        }
        // Checks to see if uppercase checkbox is checked
        if(isset($_POST['upperc'])){
            $password1 .= $uppercase;
        }
        // Checks to see if numbers checkbox is checked
        if(isset($_POST['numbers'])){
            $password1 .= $numbers;
        }
        // Checks to see if symbols checkbox is checked
        if(isset($_POST['symbols'])){
            $password1 .= $symbols;
        }
        // Checks to see if size of password is provided
        if(isset($_POST['psize'])){
            $maxsize = $_POST['psize'];
        }

        // Allows repeatable characters with str_repeat, and shuffles the string pseudorandomly
        $shuffle = str_shuffle(str_repeat($password1,$maxsize));
        
        // Truncates the shuffled string at maxsize
        $finpass = substr($shuffle, 0, $maxsize);
        
//        End PHP Password generation

?>
<!--        Form input to display generated password - only appears if submitted -->
        <input class="form-control" type="text" size="50" value="<?php echo $finpass;?>">

<?php
	   echo '<br /> The length of your password is: '.strlen($finpass);
    }
?>
    </div> 
    </div>
    </div>
</body>
    
  <?php include_once("includes/pwslider.php");?>  
</html>
