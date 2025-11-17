<?php

	define('DB_HOST', 'localhost');
	define('DB_USER', 'privoz_kolya');
	define('DB_PASS', '8CRG0cif');
	define('DB_BASE', 'privoz_kolya');
	
	// Парсим список Бирж
	$urls = [];
	$url = 'https://coinmarketcap.com/exchanges/volume/24-hour/';
	libxml_use_internal_errors(true);
	$dom = new DomDocument;
	$dom->loadHTMLFile($url);
	$xpath = new DomXPath($dom);
	
	$nodes = $xpath->query("//h3");
	foreach ($nodes as $i => $node) {
		$doc2 = new DOMDocument();
		$doc2->appendChild($doc2->importNode($node, true));
		$exchange = $doc2->saveHTML();
		$exchange = substr($exchange, strpos($exchange, 'href="')+strlen('href="'));
		$exchange = 'https://coinmarketcap.com'.substr($exchange, 0, strpos($exchange, '"'));
		$exchange = trim($exchange);
		$urls[] = $exchange;
	}
	file_put_contents('exchanges_'.date('Y-m-d').'.txt', join($urls, "\n"));
	/*	
	$urls = [
		'https://coinmarketcap.com/exchanges/bitfinex/',
		'https://coinmarketcap.com/exchanges/bithumb/',
		'https://coinmarketcap.com/exchanges/bittrex/',
		'https://coinmarketcap.com/exchanges/hitbtc/',
		'https://coinmarketcap.com/exchanges/bitflyer/',
		'https://coinmarketcap.com/exchanges/poloniex/',
		'https://coinmarketcap.com/exchanges/gdax/',
		'https://coinmarketcap.com/exchanges/kraken/',
		'https://coinmarketcap.com/exchanges/binance/',
		'https://coinmarketcap.com/exchanges/bitstamp/',
		'https://coinmarketcap.com/exchanges/coinone/',
		'https://coinmarketcap.com/exchanges/korbit/',
		'https://coinmarketcap.com/exchanges/lakebtc/',
		'https://coinmarketcap.com/exchanges/wex/',
		'https://coinmarketcap.com/exchanges/gemini/',
		'https://coinmarketcap.com/exchanges/yobit/',
		'https://coinmarketcap.com/exchanges/btcc/',
		'https://coinmarketcap.com/exchanges/coinsbank/',
		'https://coinmarketcap.com/exchanges/okcoin-cn/',
		'https://coinmarketcap.com/exchanges/liqui/',
		'https://coinmarketcap.com/exchanges/huobi/',
		'https://coinmarketcap.com/exchanges/bcc-exchange/',
		'https://coinmarketcap.com/exchanges/livecoin/',
		'https://coinmarketcap.com/exchanges/btc38/',
		'https://coinmarketcap.com/exchanges/bit-z/',
		'https://coinmarketcap.com/exchanges/xbtce/',
		'https://coinmarketcap.com/exchanges/bitbay/',
		'https://coinmarketcap.com/exchanges/allcoin/',
		'https://coinmarketcap.com/exchanges/getbtc/',
		'https://coinmarketcap.com/exchanges/exmo/',
		'https://coinmarketcap.com/exchanges/itbit/',
		'https://coinmarketcap.com/exchanges/coinexchange/',
		'https://coinmarketcap.com/exchanges/cex-io/',
		'https://coinmarketcap.com/exchanges/acx/',
		'https://coinmarketcap.com/exchanges/etherdelta/',
		'https://coinmarketcap.com/exchanges/okex/',
		'https://coinmarketcap.com/exchanges/bcex/',
		'https://coinmarketcap.com/exchanges/quadrigacx/',
		'https://coinmarketcap.com/exchanges/luno/',
		'https://coinmarketcap.com/exchanges/bitcoin-indonesia/',
		'https://coinmarketcap.com/exchanges/btc018/',
		'https://coinmarketcap.com/exchanges/coinfloor/',
		'https://coinmarketcap.com/exchanges/quoine/',
		'https://coinmarketcap.com/exchanges/paribu/',
		'https://coinmarketcap.com/exchanges/tidex/',
		'https://coinmarketcap.com/exchanges/cryptopia/',
		'https://coinmarketcap.com/exchanges/kucoin/',
		'https://coinmarketcap.com/exchanges/foxbit/',
		'https://coinmarketcap.com/exchanges/okcoin-intl/',
		'https://coinmarketcap.com/exchanges/c-cex/',
		'https://coinmarketcap.com/exchanges/btc-alpha/',
		'https://coinmarketcap.com/exchanges/btc-markets/',
		'https://coinmarketcap.com/exchanges/bx-thailand/',
		'https://coinmarketcap.com/exchanges/exrates/',
		'https://coinmarketcap.com/exchanges/negocie-coins/',
		'https://coinmarketcap.com/exchanges/gate-io/',
		'https://coinmarketcap.com/exchanges/bitso/',
		'https://coinmarketcap.com/exchanges/bl3p/',
		'https://coinmarketcap.com/exchanges/mercado-bitcoin/',
		'https://coinmarketcap.com/exchanges/dsx/',
		'https://coinmarketcap.com/exchanges/bitmarket/',
		'https://coinmarketcap.com/exchanges/localtrade/',
		'https://coinmarketcap.com/exchanges/btcturk/',
		'https://coinmarketcap.com/exchanges/fargobase/',
		'https://coinmarketcap.com/exchanges/independent-reserve/',
		'https://coinmarketcap.com/exchanges/novaexchange/',
		'https://coinmarketcap.com/exchanges/bitonic/',
		'https://coinmarketcap.com/exchanges/coinroom/',
		'https://coinmarketcap.com/exchanges/lykke-exchange/',
		'https://coinmarketcap.com/exchanges/litebit/',
		'https://coinmarketcap.com/exchanges/gatehub/',
		'https://coinmarketcap.com/exchanges/bitbank/',
		'https://coinmarketcap.com/exchanges/gatecoin/',
		'https://coinmarketcap.com/exchanges/bitcointoyou/',
		'https://coinmarketcap.com/exchanges/koinim/',
		'https://coinmarketcap.com/exchanges/therocktrading/',
		'https://coinmarketcap.com/exchanges/mercatox/',
		'https://coinmarketcap.com/exchanges/coinsquare/',
		'https://coinmarketcap.com/exchanges/hypex/',
		'https://coinmarketcap.com/exchanges/altcoin-trader/',
		'https://coinmarketcap.com/exchanges/bitstamp-ripple-gateway/',
		'https://coinmarketcap.com/exchanges/nevbit/',
		'https://coinmarketcap.com/exchanges/coinmate/',
		'https://coinmarketcap.com/exchanges/dcexchange/',
		'https://coinmarketcap.com/exchanges/coss/',
		'https://coinmarketcap.com/exchanges/coinrate/',
		'https://coinmarketcap.com/exchanges/ripplefox/',
		'https://coinmarketcap.com/exchanges/bits-blockchain/',
		'https://coinmarketcap.com/exchanges/waves-dex/',
		'https://coinmarketcap.com/exchanges/bittylicious/',
		'https://coinmarketcap.com/exchanges/tidebit/',
		'https://coinmarketcap.com/exchanges/bit2c/',
		'https://coinmarketcap.com/exchanges/bitstar/',
		'https://coinmarketcap.com/exchanges/easycoin/',
		'https://coinmarketcap.com/exchanges/ripple-china/',
		'https://coinmarketcap.com/exchanges/surbtc/',
		'https://coinmarketcap.com/exchanges/btc-trade-ua/',
		'https://coinmarketcap.com/exchanges/openledger/',
		'https://coinmarketcap.com/exchanges/kuna/',
		'https://coinmarketcap.com/exchanges/bitshares-asset-exchange/',
		'https://coinmarketcap.com/exchanges/bitex-la/',
		'https://coinmarketcap.com/exchanges/mr_ripple/',
		'https://coinmarketcap.com/exchanges/bitmaszyna/',
		'https://coinmarketcap.com/exchanges/infinitycoin-exchange/',
		'https://coinmarketcap.com/exchanges/triple-dice-exchange/',
		'https://coinmarketcap.com/exchanges/bit520/',
		'https://coinmarketcap.com/exchanges/tcc-exchange/',
		'https://coinmarketcap.com/exchanges/bleutrade/',
		'https://coinmarketcap.com/exchanges/decentrex/',
		'https://coinmarketcap.com/exchanges/btcxindia/',
		'https://coinmarketcap.com/exchanges/bitgrail/',
		'https://coinmarketcap.com/exchanges/trade-satoshi/',
		'https://coinmarketcap.com/exchanges/stellar-decentralized-exchange/',
		'https://coinmarketcap.com/exchanges/coingather/',
		'https://coinmarketcap.com/exchanges/bitsane/',
		'https://coinmarketcap.com/exchanges/braziliex/',
		'https://coinmarketcap.com/exchanges/bitlish/',
		'https://coinmarketcap.com/exchanges/bancor-decentralized-liquidity-network/',
		'https://coinmarketcap.com/exchanges/bitflip/',
		'https://coinmarketcap.com/exchanges/guldentrader/',
		'https://coinmarketcap.com/exchanges/cryptomate/',
		'https://coinmarketcap.com/exchanges/nocks/',
		'https://coinmarketcap.com/exchanges/idex/',
		'https://coinmarketcap.com/exchanges/ethexindia/',
		'https://coinmarketcap.com/exchanges/iota-exchange/',
		'https://coinmarketcap.com/exchanges/heat-wallet/',
		'https://coinmarketcap.com/exchanges/stocks-exchange/',
		'https://coinmarketcap.com/exchanges/isx/',
		'https://coinmarketcap.com/exchanges/bitkonan/',
		'https://coinmarketcap.com/exchanges/cryptobridge/',
		'https://coinmarketcap.com/exchanges/bisq/',
		'https://coinmarketcap.com/exchanges/dgtmarket/',
		'https://coinmarketcap.com/exchanges/ore-bz/',
		'https://coinmarketcap.com/exchanges/cryptox/',
		'https://coinmarketcap.com/exchanges/alcurex/',
		'https://coinmarketcap.com/exchanges/tux-exchange/',
		'https://coinmarketcap.com/exchanges/counterparty-dex/',
		'https://coinmarketcap.com/exchanges/southxchange/',
		'https://coinmarketcap.com/exchanges/rippex/',
		'https://coinmarketcap.com/exchanges/coingi/',
		'https://coinmarketcap.com/exchanges/nix-e/',
		'https://coinmarketcap.com/exchanges/cryptomarket/',
		'https://coinmarketcap.com/exchanges/nxt-asset-exchange/',
		'https://coinmarketcap.com/exchanges/leoxchange/',
		'https://coinmarketcap.com/exchanges/dc-ex/',
		'https://coinmarketcap.com/exchanges/burst-asset-exchange/',
		'https://coinmarketcap.com/exchanges/excambriorex/',
		'https://coinmarketcap.com/exchanges/virtacoinworld/',
		'https://coinmarketcap.com/exchanges/freiexchange/',
		'https://coinmarketcap.com/exchanges/coincorner/',
		'https://coinmarketcap.com/exchanges/coinsmarkets/',
		'https://coinmarketcap.com/exchanges/bter/',
		'https://coinmarketcap.com/exchanges/omni-dex/',
		'https://coinmarketcap.com/exchanges/cryptoderivatives/',
		'https://coinmarketcap.com/exchanges/aidos-market/',
	];
*/
	foreach($urls as $url) {
		libxml_use_internal_errors(true);
		$dom = new DomDocument;
		$dom->loadHTMLFile($url);
		$xpath = new DomXPath($dom);
		
		// Биржа
		$nodes = $xpath->query("//h1");
		foreach ($nodes as $i => $node) {
			$exchange = trim($node->nodeValue);
			$exchange		= str_replace(["'"], '', $exchange);
		}
		
		// Таблица
		$nodes = $xpath->query("//tr");
		$items = [];
		foreach ($nodes as $i => $node) {
			if ($i==0) continue;
			$item = [];
			foreach($node->childNodes as $k=>$child) {
				if ($k % 2 == 1) continue;
				$item[] = trim($child->nodeValue);
			}
			$items[] = $item;
		}
		
		//echo $exchange;
		
		// Сохраняем данные 
		foreach($items as $item) {
			$n				= $item[0]; 
			$currency		= $item[1];
			$pair			= $item[2];
			$volume24h		= $item[3];
			$price			= $item[4];
			$volumePercent	= $item[5];
			
			
			$currency		= str_replace(["'"], '', $currency);
			$volume24h		= str_replace(['$', ',', ' '], '', $volume24h);
			$price			= str_replace(['$', ',', ' '], '', $price);
			$volumePercent	= str_replace(['%', ',', ' '], '', $volumePercent);
			
			$sql= "INSERT INTO coinmarketcap (exchange, currency, pair,volume24,price,volume,created) VALUES ('$exchange','$currency','$pair','$volume24h','$price','$volumePercent', NOW());";
			dbQuery($sql);
			//echo "$sql<br>";
		}
		//echo '<br>';
	}
	

	
	function pr($v) {
		echo '<pre>';
		print_r($v);
		echo '</pre>';
	}
	
	// --- РАБОТА С БАЗАМИ ДАННЫХ --- 
	/**
	 * Выполняет запрос к базе данных (к какбинету или сайту)
	 * @param string $query
	 * @param bool $kabinet (TRUE - запрос для базы кабинета, FALSE - запрос к базе сайта)
	 * @return resource
	 */
	function dbQuery($query='') { // тут бы PDO...
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't connect to the MySQL server\n");
		mysqli_query($link, 'SET NAMES utf8') or die("Invalid set utf8 " . mysqli_error($link)."\n");
		$db = mysqli_select_db($link, DB_BASE) or die("db can't be selected\n");

		$result = mysqli_query($link, $query) or die("Query error: ".mysqli_error($link).'['.$query.']'."\n");
		mysqli_close($link);
		return $result;
	}
	
	/**
	 * Выполняет запрос к базе данных и возвращает массив
	 * @param string $query
	 * @return multitype:multitype:
	 */
	function dbQueryArray($query='') {
		$result = dbQuery($query);
		$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		mysqli_free_result($result);

		return $data;
	}