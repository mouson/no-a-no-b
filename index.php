<!DOCTYPE HTML>
<html>
<head>

	<title>Project Lunchbox</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css?<?php echo time()?>">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="./html2canvas.js?"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script type="text/javascript">

var imgToPost = "";

function uploadToImgur(){

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
            alert('上傳成功!');
            $("#iuLink").css('display',"");
            $("#iuLink").val(response.data.link);
        }
    }
});
}

	function create(){
    $("#result-cb").html($("#input-cb").val());
    $("#result-cs").html($("#input-cs").val());
    $("#result-eb").html($("#input-eb").val());
    $("#result-es").html($("#input-es").val());
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
	<div class="creator-form">
		<h1>Project Lunchbox</h1>
		<h4>歡迎使用 No A No B 產生器<br>請填入資料即可產生相關圖片 ^.<</h4>

<div id="data-form">
		中文大字：<input id="input-cb" placeholder="反呵呵"><br>
		中文小字：<input id="input-cs" placeholder="不要再有下一個QQQ"><br>
		英文大字：<input id="input-eb" placeholder="No KEKE"><br>
		英文小字：<input id="input-es" placeholder="No More KerKerKer"><br>
		<button onclick="create()" class="go-button">Create</button>
</div>
	</div>

   <div id="canvas-container"></div>

   <div id="post2iu" style="display:none">
     <button onclick="uploadToImgur()" class="post-button">上傳到ImgUR</button><br><br>
     <input id="iuLink" size="30" onclick="this.setSelectionRange(0, this.value.length)" style="display: none" />
   </div>
	<div id="flag-outline">
		<ul class="flag-info">
			<span id="result-cb" class="results">反呵呵</span>
			<span id="result-cs" class="results">不要再有下一個QQQ</span>
			<span id="result-eb" class="results">No KEKE</span>
			<span id="result-es" class="results">No More KerKerKer</span>
		</ul>
	</div>

	<div id="footer">by Shouko</div>
</body>
</html>