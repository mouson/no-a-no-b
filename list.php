<?php

function qMysql($str){
   $link = mysql_connect("localhost", "nanb", "nanb");
   if (!$link) {
    die('Could not connect: ' . mysql_error());
   }
   mysql_select_db("nanb", $link) or die(mysql_error());
   mysql_query("SET NAMES 'utf8'"); 
   mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
   mysql_query("SET CHARACTER_SET_RESULTS=utf8"); 
   $result = mysql_query($str, $link) or die(mysql_error());
   mysql_close($link);
   return $result;
}

$bigImage = "demo.png";

?>
<!DOCTYPE HTML>
<html>
<head>

  <title>我是XX 我反XX 產生器 - 網友作品</title>
  <meta charset="UTF-8">

<meta property="og:title" content="我是XX 我反XX 產生器 - 最新作品" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $bigImage; ?>" />
<meta property="og:url" content="" />
<meta property="og:description" content="" />

  <link rel="stylesheet" href="style.css?10">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="./html2canvas.js?"></script>

</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=757338127631275&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div class="creator-form">
    <h1>我是XX 我反XX 產生器</h1>
    <h4 class="navbar"><a href="./">[產生器]</a> <a href="provide.php">[背景圖投稿]</a> <a href="list.php">[網友作品]</a></h4>
    <h4>歡迎使用 No A No B 產生器<br>請填入資料即可產生相關圖片 ^.<<br>
    <h4><div class="fb-like" data-href="<?php echo $currentPage; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
</h4>
</div>

<table class="flag-backs">
<?php
$query = "SELECT img FROM record ORDER by time DESC LIMIT 0,16";
$result = qMysql($query);
$count = 0;
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if($count % 4 == 0){
	echo "<tr>";
}
    echo '<td><a href="./?u='.$row[0].'"><img src="http://i.imgur.com/'.$row[0].'t.png"></a>';
    echo '<br><div class="fb-like" data-href="http://trending.shouko.tw/no-a-no-b/?u='.$row[0].'" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>';
    echo "</td><td> </td>";
if($count % 4 == 3){
	echo "</tr><tr><td> </td></tr><tr><td> </td></tr>";
}
$count++;
}
?>
</table>

<div class="adsense">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-5458419594845683"
     data-ad-slot="9742241244"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

   <div class="fb-comments" data-href="http://trending.shouko.tw/no-a-no-b/" data-numposts="5" data-colorscheme="light"></div>

  <div id="footer">by Shouko</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45786123-3', 'shouko.tw');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

</body>
</html>