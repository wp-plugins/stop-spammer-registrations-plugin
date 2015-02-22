<?php


if (!defined('ABSPATH')) exit;

class kpg_ss_get_options { 
	public function process($ip,&$stats=array(),&$options=array(),&$post=array()) {
		// yes no options
		$options=get_option('kpg_stop_sp_reg_options');
		// Allow List yn options
		// not all yn options can be changed, but we need them for the load loops
		$defaultWL= array(
		'chkadminlog'=>'Y',
		'chkaws'=>'N',
		'chkcloudflare'=>'Y',
		'chkgcache'=>'Y',
		'chkgenallowlist'=>'N',
		'chkgoogle'=>'Y',
		'chkmiscallowlist'=>'Y',
		'chkpaypal'=>'Y',
		'chkscripts'=>'Y',
		'chkvalidip'=>'Y',
		'chkwlem'=>'Y',
		'chkwlist'=>'Y',
		'chkyahoomerchant'=>'Y'
		);	
		// Deny List Y/N settiings
		$defaultBL= array(
		'chk404'=>'Y',
		'chkaccept'=>'Y',
		'chkadmin'=>'Y',
		'chkagent'=>'Y',
		'chkamazon'=>'N',
		'chkbcache'=>'Y',
		'chkblem'=>'Y',
		'chkblip'=>'Y',
		'chkbotscout'=>'Y',
		'chkdisp'=>'Y',
		'chkdnsbl'=>'Y',
		'chkexploits'=>'Y',
		'chkgooglesafe'=>'N',
		'chkhoney'=>'Y',
		'chkhosting'=>'Y',
		'chkinvalidip'=>'Y',
		'chklong'=>'Y',
		'chkbbcode'=>'Y',
		'chkreferer'=>'Y',
		'chksession'=>'Y',
		'chksfs'=>'Y',
		'chkspamwords'=>'Y',
		'chktld'=>'Y',
		'chkubiquity'=>'Y',
		'chkakismet'=>'Y',
		'chkmulti'=>'Y'
		);
		// control options that can be set - not checks
		$defaultsCTRL=array(
		'chkemail'=>'Y',
		'chkip'=>'Y',
		'chkcomments'=>'Y', //????
		'chksignup'=>'Y', //????
		'chkxmlrpc'=>'Y', //????
		'chkwpmail'=>'Y',
		'addtoallowlist'=>'Y',
		'wlreqmail'=>'', // email where the request go to
		'wlreq'=>'Y', // using this to see iff we display the notify form
		'redir'=>'N',
		'chkcaptcha'=>'Y',
		'chkxff'=>'N', //????
		'notify'=>'Y',
		'chkspoof'=>'N' //???
		);
		$defaultARRAY=array(
		'badagents'=>array(
			"Abonti",
			"aggregator",
			"AhrefsBot",
			"asterias",
			"BDCbot",
			"BLEXBot",
			"BuiltBotTough",
			"Bullseye",
			"BunnySlippers",
			"ca-crawler",
			"CCBot",
			"Cegbfeieh",
			"CheeseBot",
			"CherryPicker",
			"CherryPickerElite",
			"CherryPickerSE",
			"CopyRightCheck",
			"cosmos",
			"Crescent Internet ToolPak",
			"Crescent",
			"discobot",
			"DittoSpyder",
			"DOC",
			"DotBot",
			"Download Ninja",
			"EasouSpider",
			"EmailCollector",
			"EmailSiphon",
			"EmailWolf",
			"EroCrawler",
			"Exabot",
			"ExtractorPro",
			"Fasterfox",
			"FeedBooster",
			"Foobot",
			"Genieo",
			"grub-client",
			"Harvest",
			"hloader",
			"httplib",
			"HTTrack",
			"humanlinks",
			"ieautodiscovery",
			"InfoNaviRobot",
			"IstellaBot",
			"Java/1.",
			"JennyBot",
			"k2spider",
			"Kenjin Spider",
			"Keyword Density/0.9",
			"larbin",
			"LexiBot",
			"libWeb",
			"libwww",
			"LinkextractorPro",
			"linko",
			"LinkScan/8.1a Unix",
			"LinkWalker",
			"LNSpiderguy",
			"lwp-trivial",
			"lwp-trivial",
			"magpie",
			"Mata Hari",
			'MaxPointCrawler',
			'MegaIndex',
			"Microsoft URL Control",
			"MIIxpc",
			"Mippin",
			"Missigua Locator",
			"Mister PiX",
			"MJ12bot",
			"moget",
			"MSIECrawler",
			"NetAnts",
			"NICErsPRO",
			"Niki-Bot",
			"NPBot",
			"Nutch",
			"Offline Explorer",
			"Openfind data gathere",
			"Openfind",
			'panscient.com',
			"PHP/5.{",
			"ProPowerBot/2.14",
			"ProWebWalker",
			"Python-urllib",
			"QueryN Metasearch",
			"RepoMonkey",
			"RepoMonkey",
			"RMA",
			'SemrushBot',
			"SeznamBot ",
			"SISTRIX",
			"sitecheck.Internetseer.com",
			"SiteSnagger",
			"SnapPreviewBot",
			"Sogou",
			"SpankBot",
			"spanner",
			"spbot",
			"Spinn3r",
			"suzuran",
			"Szukacz/1.4",
			"Teleport Pro/1.29",
			"Teleport",
			"TeleportPro",
			"Telesoft",
			"The Intraformant",
			"TheNomad",
			"TightTwatBot",
			"Titan",
			"toCrawl/UrlDispatcher",
			"True_Robot",
			"True_Robot/1.0",
			"turingos",
			"TurnitinBot",
			"UbiCrawler",
			"UnisterBot",
			"URLy Warning",
			"VCI WebViewer VCI WebViewer Win32",
			"VCI",
			"WBSearchBot",
			"Web Downloader/6.9",
			"Web Image Collector",
			"WebAuto",
			"WebBandit",
			"WebBandit/3.50",
			"WebCopier v4.0",
			"WebCopier",
			"WebEnhancer",
			"WebmasterWorldForumBot",
			"WebReaper",
			"WebSauger",
			"Website Quester",
			"Webster Pro",
			"WebStripper",
			"WebZip",
			"Wotbox",
			"wsr-agent",
			"WWW-Collector-E",
			"Xenu",
			"yandex",
			"Zao",
			"Zeus",
			"Zeus",
			"ZyBORG",
			'coccoc',
			'Incutio',
			'lmspider',
			'memoryBot',
			'SemrushBot',
			'serf',
			'Unknown',
			'uptime files'
		),
		'badTLDs'=>array(),
		'blist'=>array(),
		'payoptions'=>array(),

		'wlist'=>array(),
		'spamwords'=>array(
		'-online',
		'4u',
		'4-u',
		'adipex',
		'advicer',
		'baccarrat',
		'blackjack',
		'bllogspot',
		'booker',
		'byob',
		'car-rental-e-site',
		'car-rentals-e-site',
		'carisoprodol',
		'casino',
		'chatroom',
		'cialis',
		'coolhu',
		'credit-card-debt',
		'credit-report',
		'cwas',
		'cyclen',
		'cyclobenzaprine',
		'dating-e-site',
		'day-trading',
		'debt-consolidation',
		'debt-consolidation',
		'discreetordering',
		'duty-free',
		'dutyfree',
		'equityloans',
		'fioricet',
		'flowers-leading-site',
		'freenet-shopping',
		'freenet',
		'gambling-',
		'hair-loss',
		'health-insurancedeals',
		'homeequityloans',
		'homefinance',
		'holdem',
		'hotel-dealse-site',
		'hotele-site',
		'hotelse-site',
		'incest',
		'insurance-quotes',
		'insurancedeals',
		'jrcreations',
		'levitra',
		'macinstruct',
		'mortgagequotes',
		'online-gambling',
		'onlinegambling',
		'ottawavalleyag',
		'ownsthis',
		'paxil',
		'penis',
		'pharmacy',
		'phentermine',
		'poker-chip',
		'poze',
		'pussy',
		'rental-car-e-site',
		'ringtones',
		'roulette',
		'shemale',
		'slot-machine',
		'thorcarlson',
		'top-site',
		'top-e-site',
		'tramadol',
		'trim-spa',
		'ultram',
		'valeofglamorganconservatives',
		'viagra',
		'vioxx',
		'xanax',
		'zolus',
		'ambien',
		'poker',
		'bingo',
		'allstate',
		'insurnce',
		'work-at-home',
		'workathome',
		'home-based',
		'homebased',
		'weight-loss',
		'weightloss',
		'additional-income',
		'extra-income',
		'email-marketing',
		'sibutramine',
		'seo-',
		'fast-cash',
		'Buy direct',
		'Free gift card',
		'Meet singles',
		'Hot men',
		'Hot women',
		'Easy date',
		'Score tonight',
		'Dear Friend',
		'Additional income',
		'Double your income',
		'Home based',
		'Income from home',
		'Urgent proposal',
		'Opportunity',
		'Be your own boss',
		'Make $',
		'Online biz opportunity',
		'Potential earnings',
		'Earn extra cash',
		'Extra income',
		'Home based business',
		'Make money',
		'Online degree',
		'University diplomas',
		'Work from home',
		'You’re a winner',
		'Financial Schemes',
		'$$$',
		'Beneficiary',
		'One hundred percent free',
		'Save big money',
		'Unsecured debt',
		'Cash bonus',
		'Collect your prize',
		'Refinance',
		'Million dollars',
		'Mortgage',
		'Check or money order',
		'Stock alert',
		'Social Security Number',
		'Lead generation',
		'Search Engine Optimization',
		'Web traffic',
		'Email harvest',
		'Increase sales',
		'Internet marketing',
		'Marketing solutions',
		'Month trial offer',
		'Increase traffic',
		'Direct marketing',
		'Sign-up free today',
		'Cures baldness',
		'Viagra',
		'Lose weight',
		'Online pharmacy',
		'Stop snoring',
		'Removes wrinkles',
		'Reverses aging',
		'Perform in bed',
		'CraigsList Ads Posting',
		'BackPage Posting',
		'home security systems',
		'blackjack',
		'real money',
		'nike',
		'air max',
		'BackPage Ads Posting',
		'Shox',
		'barbour northumbria'
		)
		);
		$defaultSVC=array(
		'apikey'=>'',
		'honeyapi'=>'',
		'botscoutapi'=>'',
		'googleapi'=>'',
		'recaptchaapisecret'=>'',
		'recaptchaapisite'=>'',
		'solvmediaapivchallenge'=>'',
		'solvmediaapiverify'=>'',
		'blogseyekey'=>'',
		'sesstime'=>4,
		'sfsfreq'=>0,
		'hnyage'=>9999,
		'botfreq'=>0,
		'sfsage'=>9999,
		'hnylevel'=>5,
		'botage'=>9999,
		'multicnt'=>5,
		'multitime'=>3
		);
		$force=true;
		$defaults=array(
		'version'=>KPG_SS_VERSION,
		'kpg_sp_cache'=>25,
		'kpg_sp_hist'=>25,
		'kpg_sp_good'=>2,
		'kpg_sp_cache_em'=>4,
		'redirurl'=>'', 
		'logfilesize'=>0,
		'rejectmessage'=>"Access Denied<br/>
This site is protected by the Stop Spammer Registrations Plugin.<br/>"
		);
		$defaultCOUNTRY=array( // all Yes!!!!! - changed to no (coward)
		'chkafrica'=>'N','chkAD'=>'N','chkAE'=>'N','chkAF'=>'N','chkAL'=>'N','chkAM'=>'N','chkAR'=>'N',
		'chkAT'=>'N','chkAU'=>'N','chkAX'=>'N','chkAZ'=>'N','chkBA'=>'N','chkBB'=>'N','chkBD'=>'N',
		'chkBE'=>'N','chkBG'=>'N','chkBH'=>'N','chkBN'=>'N','chkBO'=>'N','chkBR'=>'N','chkBS'=>'N',
		'chkBY'=>'N','chkBZ'=>'N','chkCA'=>'N','chkCD'=>'N','chkCH'=>'N','chkCL'=>'N','chkCN'=>'N',
		'chkCO'=>'N','chkCR'=>'N','chkCU'=>'N','chkCW'=>'N','chkCY'=>'N','chkCZ'=>'N','chkDE'=>'N',
		'chkDK'=>'N','chkDO'=>'N','chkDZ'=>'N','chkEC'=>'N','chkEE'=>'N','chkES'=>'N','chkEU'=>'N',
		'chkFI'=>'N','chkFJ'=>'N','chkFR'=>'N','chkGB'=>'N','chkGE'=>'N','chkGF'=>'N','chkGI'=>'N',
		'chkGP'=>'N','chkGR'=>'N','chkGT'=>'N','chkGU'=>'N','chkGY'=>'N','chkHK'=>'N','chkHN'=>'N',
		'chkHR'=>'N','chkHT'=>'N','chkHU'=>'N','chkID'=>'N','chkIE'=>'N','chkIL'=>'N','chkIN'=>'N',
		'chkIQ'=>'N','chkIR'=>'N','chkIS'=>'N','chkIT'=>'N','chkJM'=>'N','chkJO'=>'N','chkJP'=>'N',
		'chkKG'=>'N','chkKH'=>'N','chkKR'=>'N','chkKW'=>'N','chkKY'=>'N','chkKZ'=>'N','chkLA'=>'N',
		'chkLB'=>'N','chkLK'=>'N','chkLT'=>'N','chkLU'=>'N','chkLV'=>'N','chkMD'=>'N','chkMK'=>'N',
		'chkMM'=>'N','chkMN'=>'N','chkMO'=>'N','chkMP'=>'N','chkMQ'=>'N','chkMT'=>'N','chkMV'=>'N',
		'chkMX'=>'N','chkMY'=>'N','chkNC'=>'N','chkNI'=>'N','chkNL'=>'N','chkNO'=>'N','chkNP'=>'N',
		'chkNZ'=>'N','chkOM'=>'N','chkPA'=>'N','chkPE'=>'N','chkPG'=>'N','chkPH'=>'N','chkPK'=>'N',
		'chkPL'=>'N','chkPR'=>'N','chkPS'=>'N','chkPT'=>'N','chkPW'=>'N','chkPY'=>'N','chkQA'=>'N',
		'chkRO'=>'N','chkRS'=>'N','chkRU'=>'N','chkSA'=>'N','chkSE'=>'N','chkSG'=>'N','chkSI'=>'N',
		'chkSK'=>'N','chkSV'=>'N','chkSX'=>'N','chkSY'=>'N','chkTH'=>'N','chkTJ'=>'N','chkTM'=>'N',
		'chkTR'=>'N','chkTT'=>'N','chkTW'=>'N','chkUA'=>'N','chkUK'=>'N','chkUS'=>'N','chkUY'=>'N',
		'chkUZ'=>'N','chkVC'=>'N','chkVE'=>'N','chkVN'=>'N','chkYE'=>'N','chkBF'=>'N','chkMA'=>'N',
		'chkME'=>'N','chkZA'=>'N'
		);

		$ansa=array_merge($defaultWL,$defaultsCTRL,$defaultBL,$defaultARRAY,$defaultSVC,$defaultCOUNTRY,$defaults);
		// to keep from getting option creep we then set the options from opts back into the ansa
		// had to do this to get rid of obsolete or mistaken options.
		if (empty($options)||!is_array($options)) {
			$options=array();
		}

		foreach($options as $key=>$val) {
			if (array_key_exists($key,$ansa)) {
				$ansa[$key]=$options[$key];
			} else {
				//sfs_debug_msg("option $key missing from $options");
			}
		}
		$ansa['version']=KPG_SS_VERSION;
		// check the numeric varables for numericness - user can enter anything
		
		if (!is_numeric($ansa['botage'])) $ansa['botage']=9999;
		if (!is_numeric($ansa['botfreq'])) $ansa['botfreq']=0;
		if (!is_numeric($ansa['hnyage'])) $ansa['hnyage']=9999;
		if (!is_numeric($ansa['hnylevel'])) $ansa['hnylevel']=5;
		if (!is_numeric($ansa['kpg_sp_cache'])) $ansa['kpg_sp_cache']=25;
		if (!is_numeric($ansa['kpg_sp_cache_em'])) $ansa['kpg_sp_cache_em']=10;
		if (!is_numeric($ansa['kpg_sp_good'])) $ansa['kpg_sp_good']=2;
		if (!is_numeric($ansa['kpg_sp_hist'])) $ansa['kpg_sp_hist']=25;
		if (!is_numeric($ansa['sesstime'])) $ansa['sesstime']=4;
		if (!is_numeric($ansa['sfsage'])) $ansa['sfsage']=9999;
		if (!is_numeric($ansa['sfsfreq'])) $ansa['sfsfreq']=0;
		if (!is_numeric($ansa['kpg_sp_good'])) $ansa['kpg_sp_good']=0;
		if (!is_numeric(trim($ansa['logfilesize']))) $ansa['logfilesize']=0;

		kpg_ss_set_options($ansa); // new version, need to set the new options
		//sfs_debug_msg("in get options\r\n".print_r($ansa,true));		

		return $ansa;
	}
}
?>