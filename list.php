<?php

require_once('lib.php');

function generatePager($p){
    $start = ($p-1)/10;
  $start = floor($start);
  $start *= 10;
  $start += 1;

if($p != 1){
  echo '<a href="list.php">&lt;&lt; 最新</a>&nbsp;&nbsp;';
  echo '<a href="list.php?p=';
  echo $p-1;
  echo '">&lt; 較新</a>&nbsp;&nbsp;';
}

for($i = 0; $i < 10; $i++){
  if( $start+$i != $p){
    echo '<a href="list.php?p=';
    echo $start+$i;
    echo '">';
  }
  echo $start+$i;
  if( $start+$i != $p){
    echo '</a>';
  }
  echo '&nbsp;&nbsp;';
}

echo '<a href="list.php?p=';
echo $p + 1;
echo '">較舊 &gt;</a>';

}

if(isset($_GET['p']) && $_GET['p']!=0){
  $p = abs($_GET['p']);
}else{
  $p = 1;
}

?>
<!DOCTYPE HTML>
<html>
<head>

  <title>我是牛，我反芻 產生器 - 網友作品</title>
  <meta charset="UTF-8">

<meta property="og:title" content="我是牛，我反芻 產生器 - 最新作品" />
<meta property="og:type" content="article" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:description" content="" />

  <link rel="stylesheet" href="style.css?11">

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
    <h1>我是牛，我反芻</h1>
    <h4 class="navbar"><a href="./">[產生器]</a> <a href="provide.php">[背景圖投稿]</a> <a href="list.php">[網友作品]</a></h4>
    <h4>歡迎使用 我是牛，我反芻 產生器<br>請填入資料即可產生相關圖片 ^.<<br>
    <h4><div class="fb-like-box" data-href="https://www.facebook.com/ruminant.cattle" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true"></div>
</h4>
</div>
<div class="pager">
<?php
generatePager($p);
?>
</div><br>
<table class="flag-backs">
<?php
$limit = ($p - 1)*16;
$query = "SELECT img, time FROM record ORDER by time DESC LIMIT ".$limit.",16";
$result = qMysql($query);
$count = 0;
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if($count % 4 == 0){
	echo "<tr>";
}
    echo '<td><a href="./?u='.$row[0].'"><img src="http://i.imgur.com/'.$row[0].'t.png"></a><br>'.date2before(strtotime($row[1]));
    echo "</td><td> </td>";
if($count % 4 == 3){
	echo "</tr><tr><td> </td></tr><tr><td> </td></tr>";
}
$count++;
}
?>
</table>
<br>
<div class="pager">
<?php
generatePager($p);
?>
</div>
<br>
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
