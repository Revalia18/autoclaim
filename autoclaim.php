<?php
error_reporting(0);
const
title = "biowallet",
versi = "1.0",
status = "online",
host = "https://www.xrppromo.online/",
youtube = "https://youtu.be/4KTY30sLvas",
b = "\033[1;34m",c = "\033[1;36m",d = "\033[0m",h = "\033[1;32m",k = "\033[1;33m",m = "\033[1;31m",n = "\n",p = "\033[1;37m",u = "\033[1;35m";

function Curl($u, $h = 0, $p = 0,$c = 0) {while(true){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $u);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_COOKIE,TRUE);if($p) {curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $p);}if($h) {curl_setopt($ch, CURLOPT_HTTPHEADER, $h);}curl_setopt($ch, CURLOPT_HEADER, true);$r = curl_exec($ch);$c = curl_getinfo($ch);if(!$c) return "Curl Error : ".curl_error($ch); else{$hd = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$bd = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);if(!$bd){print m."Check your Connection!";sleep(2);print "\r                    \r";continue;}return $bd;}}}
function Bn(){system('clear');print h."Script by ".k."iewil\n";print line();}
function Tmr($tmr){date_default_timezone_set("UTC");$timr = time()+$tmr;$len = 21;while(true){$ran = rand(1,4);$str = c.str_repeat('•',$ran);print "\r                                                  \r";$res=$timr-time();if($res < 1) {break;}print str_repeat(" ",$len-$ran).c.$str.p.date('H:i:s',$res).c.$str;sleep(1);}}
function Simpan($n){if(file_exists($n)) {$d = file_get_contents($n);}else{$d = readline(m."Input ".$n.k." : ".h.n);print n;file_put_contents($n,$d);}return $d;}
function Slow($msg){$slow = str_split($msg);foreach( $slow as $slowmo ){print $slowmo; usleep(70000);}}
function Line(){return u.str_repeat('─',50).n;}
function h(){$h = ["cookie: ".simpan("Cookie"),"user-agent: ".simpan("User_Agent")];return $h;}Bn();
cookie:
simpan("Cookie");simpan("User_Agent");$wallet = simpan("Wallet Xrp");$tag = simpan("Xrp Tag");
Bn();print slow(p."Jangan lupa \033[101m\033[1;37m Subscribe! \033[0m youtub saya :D");sleep(2);system("termux-open-url ".youtube);Bn();
$r = curl(host."dashboard",h());
$user = explode('</font>',explode("<font color=black>",$r)[1])[0];
$bal = str_replace(["\n"," "],[m."/".k,""],strip_tags(explode('</div>',explode('<img src="assets/xrp.png" alt="" class="logo-img" style="width: 25px;">',$r)[1])[0]));
if(!$user){unlink("Cookie");goto cookie;}
print h."Username ".p."-> ".k.$user.n;
print h."Balance  ".p."-> ".k.$bal.n;
print line();
while(true){
	$r = curl(host."dashboard",h());
	if(preg_match('/Cloudflare/',$r)){print m."Cloudflare deteck\n";print line();unlink("Cookie");goto cookie;}
	$id = explode("'",explode("<a href='withdraw_xrp?sc=",$r)[1])[0];
	if($id){
		$r = curl(host."withdraw_xrp?sc=".$id,h());
		$amm = trim(explode('XRP</b>',explode('<font color=red>You can withdraw <b>',$r)[1])[0]);
		$data = "vericode=".$id."&memotag=".$tag."&dogeaddress=".$wallet."&theamount=".$amm;
		$arr = ["referer: ".host."withdraw_xrp?sc=".$id,"x-requested-with: XMLHttpRequest"];
		$r = curl(host."includes/withdraw_xrp_func.php",h(),$data);
		sleep(3);
		$ss = explode(",",explode("<div class='container-fluid p-2 text-white text-center' style='background-color: green;'>",$r)[1])[0];
		if($ss){
			print h.$ss.n;
		}
	}
	tmr(60);
}
