<?php

/* 身長と体重の両方が入力されていなければ、入力されていない旨のメッセージを表示。　*/
if( empty( $_REQUEST["height"] ) || empty( $_REQUEST["weight"] ) ){
	print( "体重、身長の両方が入力されていません。<br /><br />" );
	print '<a href="index.html">入力画面に戻る</a>';
	print "<body style='background-color:#d8bfd8'>";
	exit;
 
}

/*入力されてきた身長をセンチに直し整数に変換。また体重を身長で割りBMIを算出　*/
$height = intval( $_REQUEST["height"] ) / 100;
$bmi = intval( $_REQUEST["weight"] ) / ( $height * $height ) ;


//input.htmlからの結果をとりだし分岐でカテゴリー分けしてある。
if( $bmi  < 18.5){
	$grade ="低体重(やせ型)";
	$photo ="pics/photo1.jpg";
	$nut_adv="バランスよくタンパク質と脂質をとりましょう。";
}elseif( $bmi  < 25){
	$grade ="普通体重";
	$photo ="pics/photo2.jpg";
	$nut_adv="食生活がとてもよいです。";
}elseif( $bmi  < 30){
	$grade ="やや肥満(1度)";
	$photo ="pics/photo3.jpg";
	$nut_adv="野菜を多めにとりましょう。";
}elseif( $bmi  < 35){
	$grade ="だいぶ肥満(2度)";
	$photo ="pics/photo4.jpg";
	$nut_adv="脂質がとても多いようです";

}elseif( $bmi  < 40){
	$grade ="かなり肥満(3度)";
	$photo ="pics/photo5.jpg";
	$nut_adv="カロリーコントロールをしましょう。";

}else {
	$grade ="危険な肥満(4度)";
	$photo ="pics/photo6.jpg";
	$nut_adv="すぐに病院へいってください。";

}

?>

<!--  下記からBootstrapで画面の作成-->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP-BMI検査</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>

<!-- BMIの結果にあった写真の表示 -->
<h1 class="page-header">BMIの計算結果とアドバイス</h1>
<img src="<?php print (htmlspecialchars($photo, ENT_QUOTES) ); ?> " class="pull-left" style="width:200px; 
	margin-right:35px;"  />

<!--検査結果を下記のHTML上で表示-->
<table class="result-tbl">
	<tr>
		<th>BMI:</th>
		<td><?php print (htmlspecialchars( floor($bmi) , ENT_QUOTES) ); ?></td>
	</tr>

	<tr>
		<th>判定:</th>
		<td><?php print (htmlspecialchars($grade , ENT_QUOTES) ); ?></td>
	</tr>

	<tr>
		<th>栄養士:</th>
		<td><?php print (htmlspecialchars($nut_adv , ENT_QUOTES) ); ?></td>
	</tr>
</table>

<div class="table-responsive">
<table class="table table-hover table-bordered second_tbl" >
 
	<thead>
		<tr ><th>BMI指数</th><th>BMI診断判定表</th><th>Test Results</th></tr>
	</thead>

	<tbody>
		<tr><td>18未満</td><td>痩せすぎ</td><td>Significantly skinny</td></tr>
		<tr><td>20～25%未満</td><td>普通体重</td><td>Normal range</td></tr>
		<tr><td>25～30%未満</td><td>過体重</td><td>Overweight</td></tr>
		<tr><td>30～35%未満</td><td>肥満（1度）</td><td>Obese class 1</td></tr>
		<tr><td>30～35%未満</td><td>肥満（2度）</td><td>Obese class 2</td></tr>
		<tr><td>40以上%</td><td>肥満（3度）</td><td>Obese class 3</td></tr>
	</tbody>
 
</table>
 </div><!--END table-responsive-->


<button class="btn btn-success center-block" style="width:420px; margin-top:20px;" onClick="location.href='index.html' ">検査画面に戻る</button> 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

