<?php

require_once('lib.php');

$currentPage="http://trending.shouko.tw/no-a-no-b/";
$bigImage = "demo.png";

if(isset($_GET['u'])){
	$bigImage = $_GET['u'];
	$bigImage = preg_replace("/[^a-zA-Z0-9]+/", "", $bigImage);
	$currentPage .= "?u=".$bigImage;
	$bigImage = "http://i.imgur.com/".$bigImage.".png";
}

?>
<!DOCTYPE HTML>
<html>
<head>

  <title>我是牛，我反芻 產生器</title>
  <meta charset="UTF-8">

<meta property="og:title" content="我是牛，我反芻 產生器" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $bigImage; ?>" />
<meta property="og:url" content="" />
<meta property="og:description" content="" />

  <link rel="stylesheet" href="style.css?10">
  <script src="./html2canvas.js?"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript">

var imgToPost = "";

function uploadToImgur(sType){

var img = imgToPost.split(',')[1];

$.ajax({
    url: 'https://api.imgur.com/3/image',
    type: 'post',
    headers: {
        Authorization: 'Client-ID 72c62382d2a73f2'
    },
    data: {
        image: img
    },
    dataType: 'json',
    success: function(response) {
        if(response.success) {
            console.log(response.data.link);
        	var imglink = response.data.link;
        	imglink = imglink.split('.com/');
			imglink = imglink[1].split('.png');
			imglink = imglink[0];
            $("#record").attr('src','record.php?u='+imglink);
        	if(sType==0){
				// show alert when upload success
    	        alert('上傳成功!');
        	    $("#iuLink").css('display',"");
	            $("#iuLink").val(response.data.link);
            }else{
            	switch(sType){

            	case 1:

            	// share to facebook
					 window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('https://cattle.shouko.tw/?u='+imglink),
      'facebook-share-dialog',
      'width=626,height=436');

      				break;

      			case 2:
      			// share to plurk
      				window.open('https://www.plurk.com/?qualifier=shares&status='.concat(encodeURIComponent('https://cattle.shouko.tw/?u='+imglink)).concat(' ').concat('(').concat(encodeURIComponent(document.title)).concat(')'));
      				break;

      			}


            }
        }
    }
});
}

  function create(){
    $("#result-cb").html($("#input-cb").val());
    $("#result-cs").html($("#input-cs").val());
    $("#result-eb").html($("#input-eb").val());
    $("#result-es").html($("#input-es").val());
    $("#flag-outline").css('background-image', "url('flag_back/"+$('input[name=input-back]:checked').val()+".png')");
    $("#flag-outline").css('visibility', "visible");
        html2canvas($("#flag-outline"), {
         onrendered: function(canvas) {
        imgToPost = canvas.toDataURL('image/png');
          $("#canvas-container").html('<img id="finalFlag" src="">');
          $("#finalFlag").attr('src',imgToPost);
       $("#flag-outline").css('visibility', "hidden");
       $("#post2iu").css('display',"");
       $("#iuLink").css('display',"none");
        }
       });
  }
  </script>
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
    <h1>我是牛，我反芻 產生器</h1>
    <h4 class="navbar"><a href="./">[產生器]</a> <a href="provide.php">[背景圖投稿]</a> <a href="list.php">[網友作品]</a></h4>
    <h4>歡迎使用 我是牛，我反芻 產生器<br>請填入資料即可產生相關圖片 ^.<<br>
    <h4><div class="fb-like-box" data-href="https://www.facebook.com/ruminant.cattle" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true"></div>
</h4>

<div id="data-form">
    中文大字：<input id="input-cb" placeholder="反呵呵"><br>
    中文小字：<input id="input-cs" placeholder="不要再有下一個QQQ"><br>
    英文大字：<input id="input-eb" placeholder="No KEKE"><br>
    英文小字：<input id="input-es" placeholder="No More KerKerKer"><br>
    選擇背景：
    <button onclick="create()" class="go-button">Create</button>
</div>
  </div>

    <table class="flag-backs">
      <tr>
        <td><label><input type="radio" name="input-back" value="taiwan" checked />台灣</label></td>
        <td><label><input type="radio" name="input-back" value="cow" />牛</label></td>
        <td><label><input type="radio" name="input-back" value="dog" />狗</label></td>
        <td><label><input type="radio" name="input-back" value="fish" />魚</label></td>
        <td><label><input type="radio" name="input-back" value="jet" />戰機</label></td>
        <td><label><input type="radio" name="input-back" value="kuma" />熊</label></td>
        <td><label><input type="radio" name="input-back" value="cat" />貓</label></td>
        <td><label><input type="radio" name="input-back" value="man" />人</label></td>
        <td><label><input type="radio" name="input-back" value="nerv" />NERV</label></td>
        <td><label><input type="radio" name="input-back" value="buddha" />大佛</label></td>
        <td><label><input type="radio" name="input-back" value="police" />警察</label></td>
      </tr>
      <tr>
        <td><img src="flag_back/taiwan.png" class="thumb" /></td>
        <td><img src="flag_back/cow.png" class="thumb" /></td>
        <td><img src="flag_back/dog.png" class="thumb" /></td>
        <td><img src="flag_back/fish.png" class="thumb" /></td>
        <td><img src="flag_back/jet.png" class="thumb" /></td>
        <td><img src="flag_back/kuma.png" class="thumb" /></td>
        <td><img src="flag_back/cat.png" class="thumb" /></td>
        <td><img src="flag_back/man.png" class="thumb" /></td>
        <td><img src="flag_back/nerv.png" class="thumb" /></td>
        <td><img src="flag_back/buddha.png" class="thumb" /></td>
        <td><img src="flag_back/police.png" class="thumb" /></td>
      </tr>
    </table>

   <div id="canvas-container">
     <img src="<?php echo $bigImage; ?>" /><br>
    <div class="fb-like" data-href="<?php echo $currentPage; ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
   </div>

   <div id="post2iu" style="display:none">
     <button onclick="uploadToImgur(0)" class="post-button">上傳到ImgUR</button>
     <button onclick="uploadToImgur(1)" class="post-button">分享到FB</button>
     <button onclick="uploadToImgur(2)" class="post-button">分享到Plurk</button><br><br>
     <input id="iuLink" size="30" onclick="this.setSelectionRange(0, this.value.length)" style="display: none" /><br>
     <img id="record" src="" style="visibility:hidden" />
</div>
<br><br>

<table class="flag-backs">
<tr><td></td><td></td><td>最新作品:</td><td></td><td></td></tr>
<?php
$query = "SELECT img, time FROM record ORDER by time DESC LIMIT 0,5";
$result = qMysql($query);
$count = 0;

  echo "<tr>";
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    echo '<td><a href="./?u='.$row[0].'"><img src="http://i.imgur.com/'.$row[0].'t.png"></a><br>'.date2before(strtotime($row[1])).'</td>';
$count++;
}
echo "</tr>";
?>
<tr><td></td><td></td><td><a href="list.php">[看更多作品]</a></td><td></td><td></td></tr>
</table>

<br><br>
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
  <div id="flag-outline" style="background-image: url('flag_back/taiwan.png'); visibility: hidden">
    <ul class="flag-info">
      <span id="result-cb" class="results">反呵呵</span>
      <span id="result-cs" class="results">不要再有下一個QQQ</span>
      <span id="result-eb" class="results">No KEKE</span>
      <span id="result-es" class="results">No More KerKerKer</span>
    </ul>
  </div>

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
