<?php
declare(strict_types=1);

const ROOT_DIR = __DIR__;
const DS = DIRECTORY_SEPARATOR;

require ROOT_DIR.DS."vendor".DS."autoload.php";

$templateData = [
    "query" => isset($_GET["q"])&&!empty($_GET["q"])?$_GET["q"]:"@pilulka OR @pilulkacz OR #pilulka OR #pilulkacz OR pilulka OR pilulka.cz",
    "error" => null,
    "statuses" => null
];

// Initialize Twitter model and get Tweets
$config = parse_ini_file(ROOT_DIR.DS."config".DS."config.ini");

\PTA\Helper\Filesystem::checkDirectory(ROOT_DIR.DS.$config["CACHE_DIR"]);

$twitterModel = new \PTA\Model\Twitter($config["TWITTER_OATUH_TOKEN"]);
$templateData = array_merge($templateData, $twitterModel->getTweets($templateData["query"]));

$engine = new Latte\Engine();
$engine->setTempDirectory(ROOT_DIR.DS.$config["CACHE_DIR"]);

$engine->render(ROOT_DIR.DS."templates".DS."index.latte", $templateData);