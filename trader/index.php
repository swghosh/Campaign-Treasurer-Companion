<?php 
    include('../head.php'); 
    include('tradingfunctions.php');

    $username = $_SERVER['REMOTE_USER'];
    $balance = balance($username);
?>
    <table class="view">
        <tr class="sector">
            <td class="user">username: <span class="user"><?php echo $username; ?></span> (logged-in)<br>available balance: <span class="user">$<?php echo $balance; ?></span></td>
        </tr>
        

        <tr class="sector"><td colspan="4" class="sector">Transact</td></tr>
        <tr class="stock"><td class="name">Buy Commodity / Cryptocurrency / Security <span id="about" class="arrow">⌵</span></td></tr>
        <tr class="news"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>
        <tr class="stock"><td class="name">Sell Commodity / Cryptocurrency / Security <span id="rules" class="arrow">⌵</span></td></tr>
        <tr class="news"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>

        <tr class="sector"><td colspan="4" class="sector">History</td></tr>
        <tr class="stock"><td class="name">Purchased<span id="about" class="arrow">⌵</span></td></tr>
        <tr class="news"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>
        <tr class="stock"><td class="name">Order Book<span id="rules" class="arrow">⌵</span></td></tr>
        <tr class="news"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>

    </table>
<?php 
    $scripts = array();
    include('../foot.php'); 
?>