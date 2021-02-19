<!DOCTYPE html>
<html>

<head>
    <script src="stocks.js"></script>
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <link rel="stylesheet" type="text/css" href="stocks.css">
</head>

<body>
    <?php
        //Input Name (ipn)
        $ipn = 'awli';
		// Watch List Items (wli)
		$wli = array('NASDAQ:TSLA','NASDAQ:AAPL');
		// On Watch List (owl)
		$owl = "'" . $wli[0] . "', '" . $wli[1] . "'";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($ipn === "awli"){
                // Add Watch List Item (awli)
                if(isset($_POST['awli'])){
                    $awli = $_POST['awli'];
                    $wli[2] = $awli;
                    $owl = "" . $owl . ",'" . $wli[2] . "'";
                    $ipn = 'awlit';
                }
            }
        }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($ipn === "awlit"){
                // Add Watch List Item (awli)
                if(isset($_POST['awlit'])){
                    $awlit = $_POST['awlit'];
                    $wli[3] = $awlit;
                    $owl = "" . $owl . ",'" . $wli[3] . "'";
                    $ipn = 'awlith';
                }
            }
        }
	?>
	<p id='test'></p>
	<div id="addtick">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input type="text" id="input" name="<?php echo $ipn; ?>">
		</form>
		<input type="submit" value="Submit">
	</div>
	<script type="text/javascript">
		document.getElementById('test').innerHTML = "<?php echo $line; ?>";
        console.log("<?php $awli; ?>");
	</script>
    <!-- TradingView Widget BEGIN -->
    <div class="tracker">
        <div class="tradingview-widget-container">
            <div id="tradingview_3e3d6"></div>
            <div id='trackwin'class="tradingview-widget-copyright"><a href= "https://www.tradingview.com/symbols/AMEX-VFH/" rel="noopener" target="_blank"></a></div>
            <script type="text/javascript">
                var watch = [<?php echo $owl?>];

                new TradingView.widget({
                    "width": 980,
                    "height": 610,
                    "symbol": "AMEX:VFH",
                    "interval": "D",
                    "timezone": "US/Mountain",
                    "theme": "dark",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "withdateranges": true,
                    "allow_symbol_change": true,
                    "watchlist": watch,
                    "container_id": "tradingview_3e3d6"
                });

            </script>
        </div>
    </div>
    <!-- TradingView Widget END -->
</body>
</html>
