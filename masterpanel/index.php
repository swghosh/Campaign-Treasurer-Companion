<?php
    include('head.php');

    $username = $_SERVER['PHP_AUTH_USER'];

    include('../db.php');

    $sql_cryptocurrencies = "SELECT name FROM cryptocurrencies;";
    $sql_commodities = "SELECT name FROM commodities;";
    $sql_stocks = "SELECT name FROM stocks;";

    $names = array();

    $res = mysqli_query($db, $sql_cryptocurrencies);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
    }

    $res = mysqli_query($db, $sql_commodities);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
    }

    $res = mysqli_query($db, $sql_stocks);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
    }

    $sql_users = "SELECT name FROM users;";
    $users = array();

    $res = mysqli_query($db, $sql_users);
    while($ar = mysqli_fetch_array($res)) {
        $users[] = $ar['name'];
    }
?>
        <table class="view" id="panel">
            
            <tr class="sector"><td class="user">masterpanel,<br>access granted to: <span class="user"><?php echo $username; ?></span><br></td></tr>
            
            <tr class="sector"><td colspan="4" class="sector">Home</td></tr>
            <tr class="stock" onclick="document.location = '/';"><td class="name"><a href="/" class="link">Campaign Treasurer Companion Home <span class="arrow ext">⎋</span></a></td></tr>
            
            <tr class="sector"><td colspan="4" class="sector">News Updates</td></tr>
            <tr class="stock" id="addnews"><td class="name">Add News Item <span id="addnews" class="arrow">⌵</span></td></tr>
            <tr class="news" id="addnews"><td class="time"></td><td class="news">
                <form method="POST" action="addnews.php">
                    <textarea name="content" placeholder="content of news"></textarea><br>
                    <br>
                    <i>current time will be used for the news update.</i><br>
                    <input type="submit" value="Post News" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'rollbacknews.php';"><td class="name"><a href="rollbacknews.php" class="link">Rollback News Item <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Cryptocurrencies, Comodities, Securities</td></tr>
            <tr class="stock" id="addstock"><td class="name">Add New Cryptocurrency / Commodity / Security <span id="addstock" class="arrow">⌵</span></td></tr>
            <tr class="news" id="addstock"><td class="time"></td><td class="news">
                <form method="POST" action="addstock.php">
                Commodities, cryptocurrencies do not have a sector name, previous close.<br>Cryptocurrencies do not have lower circuit, upper circuit.<br><br>
                    <select name="type" id="type">
                        <option value="stock">Security</option>
                        <option value="cryptocurrency">Cryptocurrency</option>
                        <option value="commodity">Commodity</option>
                    </select><br><br>
                    <input type="text" name="name" placeholder="name" /><br><br>
                    <input type="text" name="sector" placeholder="sector" /><br><br>
                    <label for="pclose">previous close $</label> <input type="number" step="any" name="pclose" placeholder="previous close" /><br><br>
                    <label for="ovalue">open value $</label> <input type="number" step="any" name="ovalue" placeholder="open value" /><br><br>
                    <label for="lcircuit">lower circuit $</label> <input type="number" step="any" name="lcircuit" placeholder="lower circuit" /><br><br>
                    <label for="ucircuit">upper circuit $</label> <input type="number" step="any" name="ucircuit" placeholder="upper circuit" /><br><br>
                    <textarea name="description" placeholder="description"></textarea><br><br>
                    <input type="submit" value="Add Listing" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" id="removestock"><td class="name">Remove Existing Cryptocurrency / Commodity / Security <span id="removestock" class="arrow">⌵</span></td></tr>
            <tr class="news" id="removestock"><td class="time"></td><td class="news">
                <form method="POST" action="removestock.php">
                    <select name="item">
                        <?php
                            foreach($names as $name) {
                                echo '<option value="'.$name.'">'.$name.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    <input type="submit" value="Remove Permanently" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" id="updateprice"><td class="name">Introduce Price Update to Cryptocurrency / Commodity / Security <span id="updateprice" class="arrow">⌵</span></td></tr>
            <tr class="news" id="updateprice"><td class="time"></td><td class="news">
                <form method="POST" action="updateprice.php">
                    <select name="item">
                        <?php
                            foreach($names as $name) {
                                echo '<option value="'.$name.'">'.$name.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    $ <input type="number" step="any" name="current" placeholder="new price" /><br>
                    <input type="submit" value="Update Price" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'rollbackprice.php';"><td class="name"><a href="rollbackprice.php" class="link">Rollback Price Update for Cryptocurrency / Commodity / Security <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Larger Display</td></tr>
            <tr class="stock" onclick="document.location = 'largescreenview.php';"><td class="name"><a href="largescreenview.php" class="link">Show Market Overview <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Trade</td></tr>
            <tr class="stock" id="reversetransaction"><td class="name">Reverse a Transaction <span id="reversetransaction" class="arrow">⌵</span></td></tr>
            <tr class="news" id="reversetransaction"><td class="time"></td><td class="news">
                <form method="POST" action="reversetransaction.php">
                    transaction <input type="number" step="any" name="id" placeholder="id" /><br>
                    <input type="submit" value="Reverse Transaction" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" id="reversefunding"><td class="name">Reverse a Funding Grant / Deduction <span id="reversefunding" class="arrow">⌵</span></td></tr>
            <tr class="news" id="reversefunding"><td class="time"></td><td class="news">
                <form method="POST" action="reversefunding.php">
                    funding <input type="number" step="any" name="id" placeholder="id" /><br>
                    <input type="submit" value="Reverse Funding" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'activebuyers.php';"><td class="name"><a href="activebuyers.php" class="link">Show Active Buyers <span class="arrow ext">⎋</span></a></td></tr>
            <tr class="stock" id="grantfunds"><td class="name">Grant Funds <span id="grantfunds" class="arrow">⌵</span></td></tr>
            <tr class="news" id="grantfunds"><td class="time"></td><td class="news">
                <form method="POST" action="grantfunds.php">
                    user <select name="user">
                        <?php
                            foreach($users as $name) {
                                echo '<option value="'.$name.'">'.$name.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    amount $ <input type="number" step="any" name="value" placeholder="amount" /><br>
                    <input type="submit" value="Grant Fund" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" id="deductfunds"><td class="name">Deduct Funds <span id="deductfunds" class="arrow">⌵</span></td></tr>
            <tr class="news" id="deductfunds"><td class="time"></td><td class="news">
                <form method="POST" action="deductfunds.php">
                    user <select name="user">
                        <?php
                            foreach($users as $name) {
                                echo '<option value="'.$name.'">'.$name.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    amount $ <input type="number" step="any" name="value" placeholder="amount" /><br>
                    <input type="submit" value="Deduct Fund" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'userbalances.php';"><td class="name"><a href="userbalances.php" class="link">User Balances <span class="arrow ext">⎋</span></a></td></tr>
            
            <tr class="sector"><td colspan="4" class="sector copyright"><b>Please do not use this panel without the authorisation/permission of the market administrator/stock exchange board.</b><br><br>© Campaign Treasurer, Prayas 17 Fest, Christ University.<br>Designed and Developed by <a href="https://github.com/swghosh" class="author">Swarup Ghosh</a>.</td></tr>
        </table>    
<?php
    $scripts = array('expanders.js', 'inpanel.js');
    include('foot.php');
?>