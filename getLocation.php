<?php

include_once 'inc/required/sessions.php';
// $pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
// if($pos===false)
//   die(header("location:/index"));

function is_bot($user_agent) {
 
    $botRegexPattern = "(googlebot\/|Googlebot\-Mobile|Googlebot\-Image|Google favicon|Mediapartners\-Google|bingbot|slurp|java|wget|curl|Commons\-HttpClient|Python\-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST\-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub\.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum\.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips\-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail\.RU_Bot|discobot|heritrix|findthatfile|europarchive\.org|NerdByNature\.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb\-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web\-archive\-net\.com\.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks\-robot|it2media\-domain\-crawler|ip\-web\-crawler\.com|siteexplorer\.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki\-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e\.net|GrapeshotCrawler|urlappendbot|brainobot|fr\-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf\.fr_bot|A6\-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive\.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|lipperhey|y!j\-asr|Domain Re\-Animator Bot|AddThis)";
    return preg_match("/{$botRegexPattern}/", $user_agent);
}

   if(!isset($botRegexPattern)){
   $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );
   $ipcountryCode = ($geoplugin['geoplugin_countryCode']);
   $ipcountry = ($geoplugin['geoplugin_countryName']);
   $ipregionCode = ($geoplugin['geoplugin_regionCode']);
   $ipregion = ($geoplugin['geoplugin_regionName']);
   $ipcity = ($geoplugin['geoplugin_city']);
   $ipcurrencyCode = ($geoplugin['geoplugin_currencyCode']);
   $ipcurrency = ($geoplugin['geoplugin_currencySymbol']);
   $ipcurrencySymbol = ($geoplugin['geoplugin_currencySymbol_UTF8']);
   $ipcurrencyConversion = ($geoplugin['geoplugin_currencyConverter']);
   
   $_SESSION['ipcountryCode'] = $ipcountryCode;
   $_SESSION['ipcountry'] = $ipcountry;
   $_SESSION['ipregionCode'] = $ipregionCode;
   $_SESSION['ipregion'] = $ipregion;
   $_SESSION['ipcity'] = $ipcity;
   $_SESSION['ipcurrencyCode'] = $ipcurrencyCode;
   $_SESSION['ipcurrency'] = $ipcurrency;
   $_SESSION['ipcurrencySymbol'] = $ipcurrencySymbol;
   $_SESSION['ipcurrencyConversion'] = $ipcurrencyConversion;
}