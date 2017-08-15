<?php
    $current_script = $_SERVER['SCRIPT_NAME'];
    $pages = array(
        '/index.php' => array('Home', '🏠'),
        '/details.php' => array('Details', '📈'),
        '/trader' => array('Trader', '💵'),
        '/news.php' => array('News', '📰'),
        '/about.php' => array('About', '🔬')
    );
    $page_title = $pages[$current_script][0];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Campaign Treasurer Companion | <?php echo $page_title; ?></title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="base.css" type="text/css" />
        <meta name="theme-color" content="#326e82">
        <meta name="author" content="SwG Ghosh">
        <meta name="description" content="The Campaign Treasurer Companion Web App for Prayas'17 fest.">
        <meta name="og:url" content="http://campaigntreasurercompanionwebapp.ap-south-1.elasticbeanstalk.com">
    </head>
    <body>
        <div class="bars">
            <div class="topbar">
                <h1>
                    Campaign Treasurer Companion
                </h1>
                <small class="time">18/08/17 20:00:00</small>
            </div>
            <div class="bottombar">
                <ul class="tabs">
                    <?php
                        foreach($pages as $script_name => $page) {
                            $title = $page[0];
                            $emoji = $page[1];
                            
                            if(strpos($script_name, $current_script) != -1) {
                                $str = '<a href="'.$script_name.'" class="tabitem"><li id="selected"><span class="emoji">'.$emoji.'</span><br>'.$title.'</li></a>';
                            }
                            else {
                                $str = '<a href="'.$script_name.'" class="tabitem"><li><span class="emoji">'.$emoji.'</span><br>'.$title.'</li></a>';
                            }
                            echo $str."\n";
                        }
                    ?>
                </ul>
            </div>
        </div>