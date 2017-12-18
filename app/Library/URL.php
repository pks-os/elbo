<?php

namespace Elbo\Library;

use Elbo\Exceptions\InvalidURLException;

class URL {
	const hostname_chars = 'abcdefghijklmnopqrstuvwxyz0123456789-.';
	const path_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789/-._~!$&\'()*+,;=?:%';
	const query_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._=&%+';
	const query_param_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._+';

	const tld_list = [
		"aaa" => true,
		"aarp" => true,
		"abarth" => true,
		"abb" => true,
		"abbott" => true,
		"abbvie" => true,
		"abc" => true,
		"able" => true,
		"abogado" => true,
		"abudhabi" => true,
		"ac" => true,
		"academy" => true,
		"accenture" => true,
		"accountant" => true,
		"accountants" => true,
		"aco" => true,
		"active" => true,
		"actor" => true,
		"ad" => true,
		"adac" => true,
		"ads" => true,
		"adult" => true,
		"ae" => true,
		"aeg" => true,
		"aero" => true,
		"aetna" => true,
		"af" => true,
		"afamilycompany" => true,
		"afl" => true,
		"africa" => true,
		"ag" => true,
		"agakhan" => true,
		"agency" => true,
		"ai" => true,
		"aig" => true,
		"aigo" => true,
		"airbus" => true,
		"airforce" => true,
		"airtel" => true,
		"akdn" => true,
		"al" => true,
		"alfaromeo" => true,
		"alibaba" => true,
		"alipay" => true,
		"allfinanz" => true,
		"allstate" => true,
		"ally" => true,
		"alsace" => true,
		"alstom" => true,
		"am" => true,
		"americanexpress" => true,
		"americanfamily" => true,
		"amex" => true,
		"amfam" => true,
		"amica" => true,
		"amsterdam" => true,
		"analytics" => true,
		"android" => true,
		"anquan" => true,
		"anz" => true,
		"ao" => true,
		"aol" => true,
		"apartments" => true,
		"app" => true,
		"apple" => true,
		"aq" => true,
		"aquarelle" => true,
		"ar" => true,
		"arab" => true,
		"aramco" => true,
		"archi" => true,
		"army" => true,
		"arpa" => true,
		"art" => true,
		"arte" => true,
		"as" => true,
		"asda" => true,
		"asia" => true,
		"associates" => true,
		"at" => true,
		"athleta" => true,
		"attorney" => true,
		"au" => true,
		"auction" => true,
		"audi" => true,
		"audible" => true,
		"audio" => true,
		"auspost" => true,
		"author" => true,
		"auto" => true,
		"autos" => true,
		"avianca" => true,
		"aw" => true,
		"aws" => true,
		"ax" => true,
		"axa" => true,
		"az" => true,
		"azure" => true,
		"ba" => true,
		"baby" => true,
		"baidu" => true,
		"banamex" => true,
		"bananarepublic" => true,
		"band" => true,
		"bank" => true,
		"bar" => true,
		"barcelona" => true,
		"barclaycard" => true,
		"barclays" => true,
		"barefoot" => true,
		"bargains" => true,
		"baseball" => true,
		"basketball" => true,
		"bauhaus" => true,
		"bayern" => true,
		"bb" => true,
		"bbc" => true,
		"bbt" => true,
		"bbva" => true,
		"bcg" => true,
		"bcn" => true,
		"bd" => true,
		"be" => true,
		"beats" => true,
		"beauty" => true,
		"beer" => true,
		"bentley" => true,
		"berlin" => true,
		"best" => true,
		"bestbuy" => true,
		"bet" => true,
		"bf" => true,
		"bg" => true,
		"bh" => true,
		"bharti" => true,
		"bi" => true,
		"bible" => true,
		"bid" => true,
		"bike" => true,
		"bing" => true,
		"bingo" => true,
		"bio" => true,
		"biz" => true,
		"bj" => true,
		"black" => true,
		"blackfriday" => true,
		"blanco" => true,
		"blockbuster" => true,
		"blog" => true,
		"bloomberg" => true,
		"blue" => true,
		"bm" => true,
		"bms" => true,
		"bmw" => true,
		"bn" => true,
		"bnl" => true,
		"bnpparibas" => true,
		"bo" => true,
		"boats" => true,
		"boehringer" => true,
		"bofa" => true,
		"bom" => true,
		"bond" => true,
		"boo" => true,
		"book" => true,
		"booking" => true,
		"boots" => true,
		"bosch" => true,
		"bostik" => true,
		"boston" => true,
		"bot" => true,
		"boutique" => true,
		"box" => true,
		"br" => true,
		"bradesco" => true,
		"bridgestone" => true,
		"broadway" => true,
		"broker" => true,
		"brother" => true,
		"brussels" => true,
		"bs" => true,
		"bt" => true,
		"budapest" => true,
		"bugatti" => true,
		"build" => true,
		"builders" => true,
		"business" => true,
		"buy" => true,
		"buzz" => true,
		"bv" => true,
		"bw" => true,
		"by" => true,
		"bz" => true,
		"bzh" => true,
		"ca" => true,
		"cab" => true,
		"cafe" => true,
		"cal" => true,
		"call" => true,
		"calvinklein" => true,
		"cam" => true,
		"camera" => true,
		"camp" => true,
		"cancerresearch" => true,
		"canon" => true,
		"capetown" => true,
		"capital" => true,
		"capitalone" => true,
		"car" => true,
		"caravan" => true,
		"cards" => true,
		"care" => true,
		"career" => true,
		"careers" => true,
		"cars" => true,
		"cartier" => true,
		"casa" => true,
		"case" => true,
		"caseih" => true,
		"cash" => true,
		"casino" => true,
		"cat" => true,
		"catering" => true,
		"catholic" => true,
		"cba" => true,
		"cbn" => true,
		"cbre" => true,
		"cbs" => true,
		"cc" => true,
		"cd" => true,
		"ceb" => true,
		"center" => true,
		"ceo" => true,
		"cern" => true,
		"cf" => true,
		"cfa" => true,
		"cfd" => true,
		"cg" => true,
		"ch" => true,
		"chanel" => true,
		"channel" => true,
		"chase" => true,
		"chat" => true,
		"cheap" => true,
		"chintai" => true,
		"christmas" => true,
		"chrome" => true,
		"chrysler" => true,
		"church" => true,
		"ci" => true,
		"cipriani" => true,
		"circle" => true,
		"cisco" => true,
		"citadel" => true,
		"citi" => true,
		"citic" => true,
		"city" => true,
		"cityeats" => true,
		"ck" => true,
		"cl" => true,
		"claims" => true,
		"cleaning" => true,
		"click" => true,
		"clinic" => true,
		"clinique" => true,
		"clothing" => true,
		"cloud" => true,
		"club" => true,
		"clubmed" => true,
		"cm" => true,
		"cn" => true,
		"co" => true,
		"coach" => true,
		"codes" => true,
		"coffee" => true,
		"college" => true,
		"cologne" => true,
		"com" => true,
		"comcast" => true,
		"commbank" => true,
		"community" => true,
		"company" => true,
		"compare" => true,
		"computer" => true,
		"comsec" => true,
		"condos" => true,
		"construction" => true,
		"consulting" => true,
		"contact" => true,
		"contractors" => true,
		"cooking" => true,
		"cookingchannel" => true,
		"cool" => true,
		"coop" => true,
		"corsica" => true,
		"country" => true,
		"coupon" => true,
		"coupons" => true,
		"courses" => true,
		"cr" => true,
		"credit" => true,
		"creditcard" => true,
		"creditunion" => true,
		"cricket" => true,
		"crown" => true,
		"crs" => true,
		"cruise" => true,
		"cruises" => true,
		"csc" => true,
		"cu" => true,
		"cuisinella" => true,
		"cv" => true,
		"cw" => true,
		"cx" => true,
		"cy" => true,
		"cymru" => true,
		"cyou" => true,
		"cz" => true,
		"dabur" => true,
		"dad" => true,
		"dance" => true,
		"data" => true,
		"date" => true,
		"dating" => true,
		"datsun" => true,
		"day" => true,
		"dclk" => true,
		"dds" => true,
		"de" => true,
		"deal" => true,
		"dealer" => true,
		"deals" => true,
		"degree" => true,
		"delivery" => true,
		"dell" => true,
		"deloitte" => true,
		"delta" => true,
		"democrat" => true,
		"dental" => true,
		"dentist" => true,
		"desi" => true,
		"design" => true,
		"dev" => true,
		"dhl" => true,
		"diamonds" => true,
		"diet" => true,
		"digital" => true,
		"direct" => true,
		"directory" => true,
		"discount" => true,
		"discover" => true,
		"dish" => true,
		"diy" => true,
		"dj" => true,
		"dk" => true,
		"dm" => true,
		"dnp" => true,
		"do" => true,
		"docs" => true,
		"doctor" => true,
		"dodge" => true,
		"dog" => true,
		"doha" => true,
		"domains" => true,
		"dot" => true,
		"download" => true,
		"drive" => true,
		"dtv" => true,
		"dubai" => true,
		"duck" => true,
		"dunlop" => true,
		"duns" => true,
		"dupont" => true,
		"durban" => true,
		"dvag" => true,
		"dvr" => true,
		"dz" => true,
		"earth" => true,
		"eat" => true,
		"ec" => true,
		"eco" => true,
		"edeka" => true,
		"edu" => true,
		"education" => true,
		"ee" => true,
		"eg" => true,
		"email" => true,
		"emerck" => true,
		"energy" => true,
		"engineer" => true,
		"engineering" => true,
		"enterprises" => true,
		"epost" => true,
		"epson" => true,
		"equipment" => true,
		"er" => true,
		"ericsson" => true,
		"erni" => true,
		"es" => true,
		"esq" => true,
		"estate" => true,
		"esurance" => true,
		"et" => true,
		"etisalat" => true,
		"eu" => true,
		"eurovision" => true,
		"eus" => true,
		"events" => true,
		"everbank" => true,
		"exchange" => true,
		"expert" => true,
		"exposed" => true,
		"express" => true,
		"extraspace" => true,
		"fage" => true,
		"fail" => true,
		"fairwinds" => true,
		"faith" => true,
		"family" => true,
		"fan" => true,
		"fans" => true,
		"farm" => true,
		"farmers" => true,
		"fashion" => true,
		"fast" => true,
		"fedex" => true,
		"feedback" => true,
		"ferrari" => true,
		"ferrero" => true,
		"fi" => true,
		"fiat" => true,
		"fidelity" => true,
		"fido" => true,
		"film" => true,
		"final" => true,
		"finance" => true,
		"financial" => true,
		"fire" => true,
		"firestone" => true,
		"firmdale" => true,
		"fish" => true,
		"fishing" => true,
		"fit" => true,
		"fitness" => true,
		"fj" => true,
		"fk" => true,
		"flickr" => true,
		"flights" => true,
		"flir" => true,
		"florist" => true,
		"flowers" => true,
		"fly" => true,
		"fm" => true,
		"fo" => true,
		"foo" => true,
		"food" => true,
		"foodnetwork" => true,
		"football" => true,
		"ford" => true,
		"forex" => true,
		"forsale" => true,
		"forum" => true,
		"foundation" => true,
		"fox" => true,
		"fr" => true,
		"free" => true,
		"fresenius" => true,
		"frl" => true,
		"frogans" => true,
		"frontdoor" => true,
		"frontier" => true,
		"ftr" => true,
		"fujitsu" => true,
		"fujixerox" => true,
		"fun" => true,
		"fund" => true,
		"furniture" => true,
		"futbol" => true,
		"fyi" => true,
		"ga" => true,
		"gal" => true,
		"gallery" => true,
		"gallo" => true,
		"gallup" => true,
		"game" => true,
		"games" => true,
		"gap" => true,
		"garden" => true,
		"gb" => true,
		"gbiz" => true,
		"gd" => true,
		"gdn" => true,
		"ge" => true,
		"gea" => true,
		"gent" => true,
		"genting" => true,
		"george" => true,
		"gf" => true,
		"gg" => true,
		"ggee" => true,
		"gh" => true,
		"gi" => true,
		"gift" => true,
		"gifts" => true,
		"gives" => true,
		"giving" => true,
		"gl" => true,
		"glade" => true,
		"glass" => true,
		"gle" => true,
		"global" => true,
		"globo" => true,
		"gm" => true,
		"gmail" => true,
		"gmbh" => true,
		"gmo" => true,
		"gmx" => true,
		"gn" => true,
		"godaddy" => true,
		"gold" => true,
		"goldpoint" => true,
		"golf" => true,
		"goo" => true,
		"goodhands" => true,
		"goodyear" => true,
		"goog" => true,
		"google" => true,
		"gop" => true,
		"got" => true,
		"gov" => true,
		"gp" => true,
		"gq" => true,
		"gr" => true,
		"grainger" => true,
		"graphics" => true,
		"gratis" => true,
		"green" => true,
		"gripe" => true,
		"grocery" => true,
		"group" => true,
		"gs" => true,
		"gt" => true,
		"gu" => true,
		"guardian" => true,
		"gucci" => true,
		"guge" => true,
		"guide" => true,
		"guitars" => true,
		"guru" => true,
		"gw" => true,
		"gy" => true,
		"hair" => true,
		"hamburg" => true,
		"hangout" => true,
		"haus" => true,
		"hbo" => true,
		"hdfc" => true,
		"hdfcbank" => true,
		"health" => true,
		"healthcare" => true,
		"help" => true,
		"helsinki" => true,
		"here" => true,
		"hermes" => true,
		"hgtv" => true,
		"hiphop" => true,
		"hisamitsu" => true,
		"hitachi" => true,
		"hiv" => true,
		"hk" => true,
		"hkt" => true,
		"hm" => true,
		"hn" => true,
		"hockey" => true,
		"holdings" => true,
		"holiday" => true,
		"homedepot" => true,
		"homegoods" => true,
		"homes" => true,
		"homesense" => true,
		"honda" => true,
		"honeywell" => true,
		"horse" => true,
		"hospital" => true,
		"host" => true,
		"hosting" => true,
		"hot" => true,
		"hoteles" => true,
		"hotels" => true,
		"hotmail" => true,
		"house" => true,
		"how" => true,
		"hr" => true,
		"hsbc" => true,
		"ht" => true,
		"hu" => true,
		"hughes" => true,
		"hyatt" => true,
		"hyundai" => true,
		"ibm" => true,
		"icbc" => true,
		"ice" => true,
		"icu" => true,
		"id" => true,
		"ie" => true,
		"ieee" => true,
		"ifm" => true,
		"ikano" => true,
		"il" => true,
		"im" => true,
		"imamat" => true,
		"imdb" => true,
		"immo" => true,
		"immobilien" => true,
		"in" => true,
		"industries" => true,
		"infiniti" => true,
		"info" => true,
		"ing" => true,
		"ink" => true,
		"institute" => true,
		"insurance" => true,
		"insure" => true,
		"int" => true,
		"intel" => true,
		"international" => true,
		"intuit" => true,
		"investments" => true,
		"io" => true,
		"ipiranga" => true,
		"iq" => true,
		"ir" => true,
		"irish" => true,
		"is" => true,
		"iselect" => true,
		"ismaili" => true,
		"ist" => true,
		"istanbul" => true,
		"it" => true,
		"itau" => true,
		"itv" => true,
		"iveco" => true,
		"iwc" => true,
		"jaguar" => true,
		"java" => true,
		"jcb" => true,
		"jcp" => true,
		"je" => true,
		"jeep" => true,
		"jetzt" => true,
		"jewelry" => true,
		"jio" => true,
		"jlc" => true,
		"jll" => true,
		"jm" => true,
		"jmp" => true,
		"jnj" => true,
		"jo" => true,
		"jobs" => true,
		"joburg" => true,
		"jot" => true,
		"joy" => true,
		"jp" => true,
		"jpmorgan" => true,
		"jprs" => true,
		"juegos" => true,
		"juniper" => true,
		"kaufen" => true,
		"kddi" => true,
		"ke" => true,
		"kerryhotels" => true,
		"kerrylogistics" => true,
		"kerryproperties" => true,
		"kfh" => true,
		"kg" => true,
		"kh" => true,
		"ki" => true,
		"kia" => true,
		"kim" => true,
		"kinder" => true,
		"kindle" => true,
		"kitchen" => true,
		"kiwi" => true,
		"km" => true,
		"kn" => true,
		"koeln" => true,
		"komatsu" => true,
		"kosher" => true,
		"kp" => true,
		"kpmg" => true,
		"kpn" => true,
		"kr" => true,
		"krd" => true,
		"kred" => true,
		"kuokgroup" => true,
		"kw" => true,
		"ky" => true,
		"kyoto" => true,
		"kz" => true,
		"la" => true,
		"lacaixa" => true,
		"ladbrokes" => true,
		"lamborghini" => true,
		"lamer" => true,
		"lancaster" => true,
		"lancia" => true,
		"lancome" => true,
		"land" => true,
		"landrover" => true,
		"lanxess" => true,
		"lasalle" => true,
		"lat" => true,
		"latino" => true,
		"latrobe" => true,
		"law" => true,
		"lawyer" => true,
		"lb" => true,
		"lc" => true,
		"lds" => true,
		"lease" => true,
		"leclerc" => true,
		"lefrak" => true,
		"legal" => true,
		"lego" => true,
		"lexus" => true,
		"lgbt" => true,
		"li" => true,
		"liaison" => true,
		"lidl" => true,
		"life" => true,
		"lifeinsurance" => true,
		"lifestyle" => true,
		"lighting" => true,
		"like" => true,
		"lilly" => true,
		"limited" => true,
		"limo" => true,
		"lincoln" => true,
		"linde" => true,
		"link" => true,
		"lipsy" => true,
		"live" => true,
		"living" => true,
		"lixil" => true,
		"lk" => true,
		"loan" => true,
		"loans" => true,
		"locker" => true,
		"locus" => true,
		"loft" => true,
		"lol" => true,
		"london" => true,
		"lotte" => true,
		"lotto" => true,
		"love" => true,
		"lpl" => true,
		"lplfinancial" => true,
		"lr" => true,
		"ls" => true,
		"lt" => true,
		"ltd" => true,
		"ltda" => true,
		"lu" => true,
		"lundbeck" => true,
		"lupin" => true,
		"luxe" => true,
		"luxury" => true,
		"lv" => true,
		"ly" => true,
		"ma" => true,
		"macys" => true,
		"madrid" => true,
		"maif" => true,
		"maison" => true,
		"makeup" => true,
		"man" => true,
		"management" => true,
		"mango" => true,
		"map" => true,
		"market" => true,
		"marketing" => true,
		"markets" => true,
		"marriott" => true,
		"marshalls" => true,
		"maserati" => true,
		"mattel" => true,
		"mba" => true,
		"mc" => true,
		"mckinsey" => true,
		"md" => true,
		"me" => true,
		"med" => true,
		"media" => true,
		"meet" => true,
		"melbourne" => true,
		"meme" => true,
		"memorial" => true,
		"men" => true,
		"menu" => true,
		"meo" => true,
		"merckmsd" => true,
		"metlife" => true,
		"mg" => true,
		"mh" => true,
		"miami" => true,
		"microsoft" => true,
		"mil" => true,
		"mini" => true,
		"mint" => true,
		"mit" => true,
		"mitsubishi" => true,
		"mk" => true,
		"ml" => true,
		"mlb" => true,
		"mls" => true,
		"mm" => true,
		"mma" => true,
		"mn" => true,
		"mo" => true,
		"mobi" => true,
		"mobile" => true,
		"mobily" => true,
		"moda" => true,
		"moe" => true,
		"moi" => true,
		"mom" => true,
		"monash" => true,
		"money" => true,
		"monster" => true,
		"mopar" => true,
		"mormon" => true,
		"mortgage" => true,
		"moscow" => true,
		"moto" => true,
		"motorcycles" => true,
		"mov" => true,
		"movie" => true,
		"movistar" => true,
		"mp" => true,
		"mq" => true,
		"mr" => true,
		"ms" => true,
		"msd" => true,
		"mt" => true,
		"mtn" => true,
		"mtr" => true,
		"mu" => true,
		"museum" => true,
		"mutual" => true,
		"mv" => true,
		"mw" => true,
		"mx" => true,
		"my" => true,
		"mz" => true,
		"na" => true,
		"nab" => true,
		"nadex" => true,
		"nagoya" => true,
		"name" => true,
		"nationwide" => true,
		"natura" => true,
		"navy" => true,
		"nba" => true,
		"nc" => true,
		"ne" => true,
		"nec" => true,
		"net" => true,
		"netbank" => true,
		"netflix" => true,
		"network" => true,
		"neustar" => true,
		"new" => true,
		"newholland" => true,
		"news" => true,
		"next" => true,
		"nextdirect" => true,
		"nexus" => true,
		"nf" => true,
		"nfl" => true,
		"ng" => true,
		"ngo" => true,
		"nhk" => true,
		"ni" => true,
		"nico" => true,
		"nike" => true,
		"nikon" => true,
		"ninja" => true,
		"nissan" => true,
		"nissay" => true,
		"nl" => true,
		"no" => true,
		"nokia" => true,
		"northwesternmutual" => true,
		"norton" => true,
		"now" => true,
		"nowruz" => true,
		"nowtv" => true,
		"np" => true,
		"nr" => true,
		"nra" => true,
		"nrw" => true,
		"ntt" => true,
		"nu" => true,
		"nyc" => true,
		"nz" => true,
		"obi" => true,
		"observer" => true,
		"off" => true,
		"office" => true,
		"okinawa" => true,
		"olayan" => true,
		"olayangroup" => true,
		"oldnavy" => true,
		"ollo" => true,
		"om" => true,
		"omega" => true,
		"one" => true,
		"ong" => true,
		"onl" => true,
		"online" => true,
		"onyourside" => true,
		"ooo" => true,
		"open" => true,
		"oracle" => true,
		"orange" => true,
		"org" => true,
		"organic" => true,
		"origins" => true,
		"osaka" => true,
		"otsuka" => true,
		"ott" => true,
		"ovh" => true,
		"pa" => true,
		"page" => true,
		"panasonic" => true,
		"panerai" => true,
		"paris" => true,
		"pars" => true,
		"partners" => true,
		"parts" => true,
		"party" => true,
		"passagens" => true,
		"pay" => true,
		"pccw" => true,
		"pe" => true,
		"pet" => true,
		"pf" => true,
		"pfizer" => true,
		"pg" => true,
		"ph" => true,
		"pharmacy" => true,
		"phd" => true,
		"philips" => true,
		"phone" => true,
		"photo" => true,
		"photography" => true,
		"photos" => true,
		"physio" => true,
		"piaget" => true,
		"pics" => true,
		"pictet" => true,
		"pictures" => true,
		"pid" => true,
		"pin" => true,
		"ping" => true,
		"pink" => true,
		"pioneer" => true,
		"pizza" => true,
		"pk" => true,
		"pl" => true,
		"place" => true,
		"play" => true,
		"playstation" => true,
		"plumbing" => true,
		"plus" => true,
		"pm" => true,
		"pn" => true,
		"pnc" => true,
		"pohl" => true,
		"poker" => true,
		"politie" => true,
		"porn" => true,
		"post" => true,
		"pr" => true,
		"pramerica" => true,
		"praxi" => true,
		"press" => true,
		"prime" => true,
		"pro" => true,
		"prod" => true,
		"productions" => true,
		"prof" => true,
		"progressive" => true,
		"promo" => true,
		"properties" => true,
		"property" => true,
		"protection" => true,
		"pru" => true,
		"prudential" => true,
		"ps" => true,
		"pt" => true,
		"pub" => true,
		"pw" => true,
		"pwc" => true,
		"py" => true,
		"qa" => true,
		"qpon" => true,
		"quebec" => true,
		"quest" => true,
		"qvc" => true,
		"racing" => true,
		"radio" => true,
		"raid" => true,
		"re" => true,
		"read" => true,
		"realestate" => true,
		"realtor" => true,
		"realty" => true,
		"recipes" => true,
		"red" => true,
		"redstone" => true,
		"redumbrella" => true,
		"rehab" => true,
		"reise" => true,
		"reisen" => true,
		"reit" => true,
		"reliance" => true,
		"ren" => true,
		"rent" => true,
		"rentals" => true,
		"repair" => true,
		"report" => true,
		"republican" => true,
		"rest" => true,
		"restaurant" => true,
		"review" => true,
		"reviews" => true,
		"rexroth" => true,
		"rich" => true,
		"richardli" => true,
		"ricoh" => true,
		"rightathome" => true,
		"ril" => true,
		"rio" => true,
		"rip" => true,
		"rmit" => true,
		"ro" => true,
		"rocher" => true,
		"rocks" => true,
		"rodeo" => true,
		"rogers" => true,
		"room" => true,
		"rs" => true,
		"rsvp" => true,
		"ru" => true,
		"rugby" => true,
		"ruhr" => true,
		"run" => true,
		"rw" => true,
		"rwe" => true,
		"ryukyu" => true,
		"sa" => true,
		"saarland" => true,
		"safe" => true,
		"safety" => true,
		"sakura" => true,
		"sale" => true,
		"salon" => true,
		"samsclub" => true,
		"samsung" => true,
		"sandvik" => true,
		"sandvikcoromant" => true,
		"sanofi" => true,
		"sap" => true,
		"sapo" => true,
		"sarl" => true,
		"sas" => true,
		"save" => true,
		"saxo" => true,
		"sb" => true,
		"sbi" => true,
		"sbs" => true,
		"sc" => true,
		"sca" => true,
		"scb" => true,
		"schaeffler" => true,
		"schmidt" => true,
		"scholarships" => true,
		"school" => true,
		"schule" => true,
		"schwarz" => true,
		"science" => true,
		"scjohnson" => true,
		"scor" => true,
		"scot" => true,
		"sd" => true,
		"se" => true,
		"search" => true,
		"seat" => true,
		"secure" => true,
		"security" => true,
		"seek" => true,
		"select" => true,
		"sener" => true,
		"services" => true,
		"ses" => true,
		"seven" => true,
		"sew" => true,
		"sex" => true,
		"sexy" => true,
		"sfr" => true,
		"sg" => true,
		"sh" => true,
		"shangrila" => true,
		"sharp" => true,
		"shaw" => true,
		"shell" => true,
		"shia" => true,
		"shiksha" => true,
		"shoes" => true,
		"shop" => true,
		"shopping" => true,
		"shouji" => true,
		"show" => true,
		"showtime" => true,
		"shriram" => true,
		"si" => true,
		"silk" => true,
		"sina" => true,
		"singles" => true,
		"site" => true,
		"sj" => true,
		"sk" => true,
		"ski" => true,
		"skin" => true,
		"sky" => true,
		"skype" => true,
		"sl" => true,
		"sling" => true,
		"sm" => true,
		"smart" => true,
		"smile" => true,
		"sn" => true,
		"sncf" => true,
		"so" => true,
		"soccer" => true,
		"social" => true,
		"softbank" => true,
		"software" => true,
		"sohu" => true,
		"solar" => true,
		"solutions" => true,
		"song" => true,
		"sony" => true,
		"soy" => true,
		"space" => true,
		"spiegel" => true,
		"spot" => true,
		"spreadbetting" => true,
		"sr" => true,
		"srl" => true,
		"srt" => true,
		"st" => true,
		"stada" => true,
		"staples" => true,
		"star" => true,
		"starhub" => true,
		"statebank" => true,
		"statefarm" => true,
		"statoil" => true,
		"stc" => true,
		"stcgroup" => true,
		"stockholm" => true,
		"storage" => true,
		"store" => true,
		"stream" => true,
		"studio" => true,
		"study" => true,
		"style" => true,
		"su" => true,
		"sucks" => true,
		"supplies" => true,
		"supply" => true,
		"support" => true,
		"surf" => true,
		"surgery" => true,
		"suzuki" => true,
		"sv" => true,
		"swatch" => true,
		"swiftcover" => true,
		"swiss" => true,
		"sx" => true,
		"sy" => true,
		"sydney" => true,
		"symantec" => true,
		"systems" => true,
		"sz" => true,
		"tab" => true,
		"taipei" => true,
		"talk" => true,
		"taobao" => true,
		"target" => true,
		"tatamotors" => true,
		"tatar" => true,
		"tattoo" => true,
		"tax" => true,
		"taxi" => true,
		"tc" => true,
		"tci" => true,
		"td" => true,
		"tdk" => true,
		"team" => true,
		"tech" => true,
		"technology" => true,
		"tel" => true,
		"telecity" => true,
		"telefonica" => true,
		"temasek" => true,
		"tennis" => true,
		"teva" => true,
		"tf" => true,
		"tg" => true,
		"th" => true,
		"thd" => true,
		"theater" => true,
		"theatre" => true,
		"tiaa" => true,
		"tickets" => true,
		"tienda" => true,
		"tiffany" => true,
		"tips" => true,
		"tires" => true,
		"tirol" => true,
		"tj" => true,
		"tjmaxx" => true,
		"tjx" => true,
		"tk" => true,
		"tkmaxx" => true,
		"tl" => true,
		"tm" => true,
		"tmall" => true,
		"tn" => true,
		"to" => true,
		"today" => true,
		"tokyo" => true,
		"tools" => true,
		"top" => true,
		"toray" => true,
		"toshiba" => true,
		"total" => true,
		"tours" => true,
		"town" => true,
		"toyota" => true,
		"toys" => true,
		"tr" => true,
		"trade" => true,
		"trading" => true,
		"training" => true,
		"travel" => true,
		"travelchannel" => true,
		"travelers" => true,
		"travelersinsurance" => true,
		"trust" => true,
		"trv" => true,
		"tt" => true,
		"tube" => true,
		"tui" => true,
		"tunes" => true,
		"tushu" => true,
		"tv" => true,
		"tvs" => true,
		"tw" => true,
		"tz" => true,
		"ua" => true,
		"ubank" => true,
		"ubs" => true,
		"uconnect" => true,
		"ug" => true,
		"uk" => true,
		"unicom" => true,
		"university" => true,
		"uno" => true,
		"uol" => true,
		"ups" => true,
		"us" => true,
		"uy" => true,
		"uz" => true,
		"va" => true,
		"vacations" => true,
		"vana" => true,
		"vanguard" => true,
		"vc" => true,
		"ve" => true,
		"vegas" => true,
		"ventures" => true,
		"verisign" => true,
		"versicherung" => true,
		"vet" => true,
		"vg" => true,
		"vi" => true,
		"viajes" => true,
		"video" => true,
		"vig" => true,
		"viking" => true,
		"villas" => true,
		"vin" => true,
		"vip" => true,
		"virgin" => true,
		"visa" => true,
		"vision" => true,
		"vista" => true,
		"vistaprint" => true,
		"viva" => true,
		"vivo" => true,
		"vlaanderen" => true,
		"vn" => true,
		"vodka" => true,
		"volkswagen" => true,
		"volvo" => true,
		"vote" => true,
		"voting" => true,
		"voto" => true,
		"voyage" => true,
		"vu" => true,
		"vuelos" => true,
		"wales" => true,
		"walmart" => true,
		"walter" => true,
		"wang" => true,
		"wanggou" => true,
		"warman" => true,
		"watch" => true,
		"watches" => true,
		"weather" => true,
		"weatherchannel" => true,
		"webcam" => true,
		"weber" => true,
		"website" => true,
		"wed" => true,
		"wedding" => true,
		"weibo" => true,
		"weir" => true,
		"wf" => true,
		"whoswho" => true,
		"wien" => true,
		"wiki" => true,
		"williamhill" => true,
		"win" => true,
		"windows" => true,
		"wine" => true,
		"winners" => true,
		"wme" => true,
		"wolterskluwer" => true,
		"woodside" => true,
		"work" => true,
		"works" => true,
		"world" => true,
		"wow" => true,
		"ws" => true,
		"wtc" => true,
		"wtf" => true,
		"xbox" => true,
		"xerox" => true,
		"xfinity" => true,
		"xihuan" => true,
		"xin" => true,
		"xn--11b4c3d" => true,
		"xn--1ck2e1b" => true,
		"xn--1qqw23a" => true,
		"xn--2scrj9c" => true,
		"xn--30rr7y" => true,
		"xn--3bst00m" => true,
		"xn--3ds443g" => true,
		"xn--3e0b707e" => true,
		"xn--3hcrj9c" => true,
		"xn--3oq18vl8pn36a" => true,
		"xn--3pxu8k" => true,
		"xn--42c2d9a" => true,
		"xn--45br5cyl" => true,
		"xn--45brj9c" => true,
		"xn--45q11c" => true,
		"xn--4gbrim" => true,
		"xn--54b7fta0cc" => true,
		"xn--55qw42g" => true,
		"xn--55qx5d" => true,
		"xn--5su34j936bgsg" => true,
		"xn--5tzm5g" => true,
		"xn--6frz82g" => true,
		"xn--6qq986b3xl" => true,
		"xn--80adxhks" => true,
		"xn--80ao21a" => true,
		"xn--80aqecdr1a" => true,
		"xn--80asehdb" => true,
		"xn--80aswg" => true,
		"xn--8y0a063a" => true,
		"xn--90a3ac" => true,
		"xn--90ae" => true,
		"xn--90ais" => true,
		"xn--9dbq2a" => true,
		"xn--9et52u" => true,
		"xn--9krt00a" => true,
		"xn--b4w605ferd" => true,
		"xn--bck1b9a5dre4c" => true,
		"xn--c1avg" => true,
		"xn--c2br7g" => true,
		"xn--cck2b3b" => true,
		"xn--cg4bki" => true,
		"xn--clchc0ea0b2g2a9gcd" => true,
		"xn--czr694b" => true,
		"xn--czrs0t" => true,
		"xn--czru2d" => true,
		"xn--d1acj3b" => true,
		"xn--d1alf" => true,
		"xn--e1a4c" => true,
		"xn--eckvdtc9d" => true,
		"xn--efvy88h" => true,
		"xn--estv75g" => true,
		"xn--fct429k" => true,
		"xn--fhbei" => true,
		"xn--fiq228c5hs" => true,
		"xn--fiq64b" => true,
		"xn--fiqs8s" => true,
		"xn--fiqz9s" => true,
		"xn--fjq720a" => true,
		"xn--flw351e" => true,
		"xn--fpcrj9c3d" => true,
		"xn--fzc2c9e2c" => true,
		"xn--fzys8d69uvgm" => true,
		"xn--g2xx48c" => true,
		"xn--gckr3f0f" => true,
		"xn--gecrj9c" => true,
		"xn--gk3at1e" => true,
		"xn--h2breg3eve" => true,
		"xn--h2brj9c" => true,
		"xn--h2brj9c8c" => true,
		"xn--hxt814e" => true,
		"xn--i1b6b1a6a2e" => true,
		"xn--imr513n" => true,
		"xn--io0a7i" => true,
		"xn--j1aef" => true,
		"xn--j1amh" => true,
		"xn--j6w193g" => true,
		"xn--jlq61u9w7b" => true,
		"xn--jvr189m" => true,
		"xn--kcrx77d1x4a" => true,
		"xn--kprw13d" => true,
		"xn--kpry57d" => true,
		"xn--kpu716f" => true,
		"xn--kput3i" => true,
		"xn--l1acc" => true,
		"xn--lgbbat1ad8j" => true,
		"xn--mgb9awbf" => true,
		"xn--mgba3a3ejt" => true,
		"xn--mgba3a4f16a" => true,
		"xn--mgba7c0bbn0a" => true,
		"xn--mgbaakc7dvf" => true,
		"xn--mgbaam7a8h" => true,
		"xn--mgbab2bd" => true,
		"xn--mgbai9azgqp6j" => true,
		"xn--mgbayh7gpa" => true,
		"xn--mgbb9fbpob" => true,
		"xn--mgbbh1a" => true,
		"xn--mgbbh1a71e" => true,
		"xn--mgbc0a9azcg" => true,
		"xn--mgbca7dzdo" => true,
		"xn--mgberp4a5d4ar" => true,
		"xn--mgbgu82a" => true,
		"xn--mgbi4ecexp" => true,
		"xn--mgbpl2fh" => true,
		"xn--mgbt3dhd" => true,
		"xn--mgbtx2b" => true,
		"xn--mgbx4cd0ab" => true,
		"xn--mix891f" => true,
		"xn--mk1bu44c" => true,
		"xn--mxtq1m" => true,
		"xn--ngbc5azd" => true,
		"xn--ngbe9e0a" => true,
		"xn--ngbrx" => true,
		"xn--node" => true,
		"xn--nqv7f" => true,
		"xn--nqv7fs00ema" => true,
		"xn--nyqy26a" => true,
		"xn--o3cw4h" => true,
		"xn--ogbpf8fl" => true,
		"xn--p1acf" => true,
		"xn--p1ai" => true,
		"xn--pbt977c" => true,
		"xn--pgbs0dh" => true,
		"xn--pssy2u" => true,
		"xn--q9jyb4c" => true,
		"xn--qcka1pmc" => true,
		"xn--qxam" => true,
		"xn--rhqv96g" => true,
		"xn--rovu88b" => true,
		"xn--rvc1e0am3e" => true,
		"xn--s9brj9c" => true,
		"xn--ses554g" => true,
		"xn--t60b56a" => true,
		"xn--tckwe" => true,
		"xn--tiq49xqyj" => true,
		"xn--unup4y" => true,
		"xn--vermgensberater-ctb" => true,
		"xn--vermgensberatung-pwb" => true,
		"xn--vhquv" => true,
		"xn--vuq861b" => true,
		"xn--w4r85el8fhu5dnra" => true,
		"xn--w4rs40l" => true,
		"xn--wgbh1c" => true,
		"xn--wgbl6a" => true,
		"xn--xhq521b" => true,
		"xn--xkc2al3hye2a" => true,
		"xn--xkc2dl3a5ee0h" => true,
		"xn--y9a3aq" => true,
		"xn--yfro4i67o" => true,
		"xn--ygbi2ammx" => true,
		"xn--zfr164b" => true,
		"xperia" => true,
		"xxx" => true,
		"xyz" => true,
		"yachts" => true,
		"yahoo" => true,
		"yamaxun" => true,
		"yandex" => true,
		"ye" => true,
		"yodobashi" => true,
		"yoga" => true,
		"yokohama" => true,
		"you" => true,
		"youtube" => true,
		"yt" => true,
		"yun" => true,
		"za" => true,
		"zappos" => true,
		"zara" => true,
		"zero" => true,
		"zip" => true,
		"zippo" => true,
		"zm" => true,
		"zone" => true,
		"zuerich" => true,
		"zw" => true
	];

	private $protocol;
	private $hostname;
	private $port;
	private $path;

	public static function determineProtocol($url) {
		$protocol = preg_replace('/^([a-z]+):\/\/.*/i', '$1', $url);
		return ($protocol === $url) ? '' : strtolower($protocol);
	}

	public static function determineHostName($url) {
		# Get the hostname+port, then remove the port segment, to be able to differentiate
		# invalid cases such as 'https:/foo/'
		$hostname = preg_replace('/^(?:[a-z]+:\/\/)?([^\/]+).*/i', '$1', $url);
		$hostname = preg_replace('/:[0-9]+$/', '', $hostname);

		if (strlen($hostname) === 0) {
			throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
		}

		# IPv6 addresses
		if ($hostname[0] === '[' && $hostname[strlen($hostname) - 1] === ']') {
			if (filter_var(substr($hostname, 1, -1), FILTER_VALIDATE_IP,
				FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
				throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
			}

			return $hostname;
		}

		# IPv4 addresses
		if (preg_match('/^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/', $hostname)) {
			if (filter_var($hostname, FILTER_VALIDATE_IP,
				FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
				throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
			}

			if (ip2long($hostname) >> 24 === 127) {
				throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
			}

			return $hostname;
		}

		# Domain names
		$hostname = idn_to_ascii($hostname, 0, INTL_IDNA_VARIANT_UTS46);

		if ($hostname === false) {
			throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
		}

		# A dot at the end is perfectly valid!
		if ($hostname[-1] === '.') {
			$hostname = substr($hostname, 0, -1);
		}

		if (strlen($hostname) > 253) {
			throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
		}

		$hostname = strtolower($hostname);
		$segments = explode('.', $hostname);
		$segments_count = 0;

		foreach ($segments as $segment) {
			$segments_count++;
			$len = strlen($segment);

			for ($i = 0; $i < $len; $i++) {
				if (strpos(self::hostname_chars, $segment[$i]) !== false) {
					if ($segment[$i] === '-' && ($i === 0 || $i === $len - 1)) {
						throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
					}
				}
				else {
					throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
				}
			}
		}

		if ($segments_count < 2 || $segments_count > 63) {
			throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
		}

		if (!isset(self::tld_list[$segments[$segments_count - 1]])) {
			throw new InvalidURLException('Invalid hostname', InvalidURLException::INVALID_HOSTNAME);
		}

		return $hostname;
	}

	public static function determinePort($url) {
		# Get the hostname+port, then remove everything except the port.
		$url = preg_replace('/^(?:[a-z]+:\/\/)?([^\/]+).*/i', '$1', $url);
		$port = preg_replace('/.*:([0-9]+)$/', '$1', $url);

		if ($port === $url) {
			return 0;
		}

		$port = (int)$port;
		if ($port >= 65535) {
			throw new InvalidURLException('Invalid port number', InvalidURLException::INVALID_PORT);
		}
		return (int)$port;
	}

	public static function determinePath($url) {
		$path = preg_replace('/^(?:[a-z]+:\/\/)?(?:[^\/]+)(.*)/i', '$1', $url);
		return ($path === $url || $path === '') ? '/' : $path;
	}

	public static function urlEncodePath($path) {
		$len = strlen($path);
		$query_string = false;
		$query_param = false;
		$page_anchor = false;
		$ret = '';

		for ($i = 0; $i < $len; $i++) {
			if ($path[$i] === '#') {
				$page_anchor = true;
			}

			if ($page_anchor || (!$query_string && strpos(self::path_chars, $path[$i]) !== false) ||
			    ($query_string && strpos(self::query_chars, $path[$i]) !== false)) {
				if ($path[$i] === '?') {
					$query_string = true;
				}
				else if ($query_string && $path[$i] === '=') {
					$query_param = true;
				}
			
				$ret .= $path[$i];
			}
			else {
				# PHP's urlencode function encodes things as if they were query strings!
				if ($path[$i] === ' ' && !$query_string) {
					$ret .= '%20';
				}
				else {
					$ret .= urlencode($path[$i]);
				}
			}
		}

		return $ret;
	}

	public static function removeRedundantPercentEncoding($path) {
		$ret = '';
		$i = 0;
		$len = strlen($path);
		$query_string = false;
		$query_param = false;

		while ($i < $len) {
			if ($path[$i] === '#') {
				$ret .= substr($path, $i);
				break;
			}
			else if ($path[$i] === '%') {
				$pct_encoded = substr($path, $i, 3);
				$pct_decoded = urldecode($pct_encoded);
				if ($pct_decoded === $pct_encoded) {
					# Invalid %xx.
					throw new InvalidURLException('Invalid path', InvalidURLException::INVALID_PATH);
				}
				else if ((!$query_string && strpos(self::path_chars, $pct_decoded) !== false) ||
				         ($query_string && !$query_param && strpos(self::query_chars, $pct_decoded) !== false) ||
				         ($query_string && $query_param && strpos(self::query_param_chars, $pct_decoded) !== false)) {
					$ret .= $pct_decoded;
					$i += 2;
				}
				else {
					# Keep things just as they are, by preserving the urlencoded string,
					# but convert it to uppercase, to keep things consistent.
					$ret .= strtoupper($pct_encoded);
					$i += 2;
				}
			}
			else if (($query_string && strpos(self::query_chars, $path[$i]) !== false) ||
			         (!$query_string && strpos(self::path_chars, $path[$i]) !== false)) {
				if ($path[$i] === '?') {
					$query_string = true;
				}
				else if ($query_string && $path[$i] === '=') {
					$query_param = true;
				}
				else if ($query_string && $path[$i] === '&') {
					$query_param = false;
				}

				$ret .= $path[$i];
			}
			$i++;
		}

		return $ret;
	}

	public function getProtocol() {
		return $this->protocol;
	}

	public function getHost() {
		return $this->hostname;
	}

	public function getPort() {
		return $this->port;
	}

	public function getPath() {
		return $this->path;
	}

	public function getURL() {
		$ret = $this->protocol.'://'.$this->hostname;

		if (($this->protocol === 'http' && $this->port !== 80) || ($this->protocol === 'https' && $this->port !== 443)) {
			$ret .= ':'.$this->port;
		}

		$ret .= $this->path;
		return $ret;
	}

	public function __toString() {
		return $this->getURL();
	}

	public function __construct($url) {
		$url = trim($url);

		$protocol = $this->determineProtocol($url);
		$port = $this->determinePort($url);

		if ($protocol === '') {
			$protocol = 'http';
		}

		if ($protocol === 'http') {
			if ($port === 0) {
				$port = 80;
			}
		}
		else if ($protocol == 'https') {
			if ($port === 0) {
				$port = 443;
			}
		}
		else {
			throw new InvalidURLException('Unsupported protocol', InvalidURLException::UNSUPPORTED_PROTOCOL);
		}

		$hostname = $this->determineHostName($url);
		$path = $this->determinePath($url);
		$path = $this->urlEncodePath($path);
		$path = $this->removeRedundantPercentEncoding($path);

		$this->protocol = $protocol;
		$this->hostname = $hostname;
		$this->port = $port;
		$this->path = $path;
	}
};
