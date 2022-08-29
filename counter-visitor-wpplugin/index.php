<?php
/*
Plugin Name: Counter Visitor
Plugin URI:  
Description: 
Version: 1.0
Author: Md. Shahinur Islam
Author URI:  
*/

//-------------All post show------------//
function counterr_shortcode_wrapper($atts) {
ob_start(); 
?>	


<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wp";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "UPDATE Counter SET visits = visits+1 WHERE id = 1";
    $conn->query($sql);

    $sql = "SELECT visits FROM Counter WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "no results";
    }
    
    $conn->close();
?>

<!doctype html>  
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Visit counter</title>
    </head>
    <body>
        Visits: <?php print $visits; ?>

    </body>
</html>	 		
<?php
    return ob_get_clean();
}
add_shortcode('counter_visitor_view','counterr_shortcode_wrapper');

















<div class="wpb_column vc_column_container vc_col-sm-1/5 cms_animate"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="cms-counter-wraper layout-2 template-cms_counter_single--layout2 content-align-default " id="cms-counter-5" onclick="">
     <div class="cms-counter-single text-center"> 
        <div class="box">
            <span class="cms-icon"><i class="fas fa-laptop-code"></i></span>
			     <p id="counter_cms-counter-5" class="cms-counter stat-count zero" data-suffix="<span></span>" data-prefix="" data-type="zero" data-digit="12">[counter_visitor_view]</p>
                  <h4>visited</h4>                        
        </div> 
    </div> 
</div></div></div></div>
 
