<?php

require "db.php";
if(isset($_POST['send'])){
if(trim($_POST['name']) == "" || trim($_POST['message'])==""){
	$error="Заполните все поля";
}else{

$koments = R::dispense('koments');
$koments->name=$_POST['name'];
$koments->message=$_POST['message'];
$koments->date=date("H:i  d.m.Y ");

R::store($koments);
header('location:/');
}
}
?>

<html>
<head>
	<title>Создание комментирования на сайте</title>
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/normalize.css">
</head>
<body>
   

<div class="header">
	<div class="wrapper">
<ul class="nav">
	<li><a href="tel:+(499)340-94-71">Телефон: (499) 340-94-71 </a></li>
	<li><a href="mailto:info@future-group.ru">Email: info@future-group.ru  </a></li>
</ul>
<div class="navigation">
	<p class="text">Комментарии</p>
<img class="img" src="img/Без имени.png">

</div>
<div id="line">
</div>
</div>
</div>
<?php $komen = mysqli_query($con,"SELECT * FROM `koments` ORDER BY `id`  DESC LIMIT 3")?>
<?php while($kom=mysqli_fetch_assoc($komen)){?>
<div class="koment">
<div class="wrapper">
	<div class="name"><?= $kom['name']?></div>
	<div class="i">
		<?=$kom['date']?>
		<i class="fa fa-clock-o"></i>
	</div>
	
	<div class="message"><?= $kom['message']?></div>
	<br>
	</div>
	<?php } ?>
	<center><div id="line1"></center>
	</div>
</div>

	<div class="banner">
		<div class="wrapper">
			<p class="text1">Оставить комментарий</p>
			<form id="form" action="" method="post">
				<label for="name">Ваше имя</label><br>
					<input class="m2" type="text" name="name" id="name" ><br><br>
					<label for="message">Ваш комментарий </label><br>
					<textarea class="m1" type="text" name="message"id="message" ></textarea>
					<br><br>
					<button id="mess_send" class="send" type="submit" name="send" >Отправить</button>
					<?= '<div style=color:"black">'.$error.'</div>'?>
				</form>
		</div>
	</div>



	

	<div class="footer">
	<div class="wrapper">
		<img class="img1" src="img/Без имени.png">
		<ul class="nav1">
			<li><a href="tel:+(499)340-94-71">Телефон: (499) 340-94-71 </a></li>
	<li><a href="mailto:info@future-group.ru">Email: info@future-group.ru  </a></li>
	<li><a href="https://yandex.ru/maps/213/moscow/house/2_ya_ulitsa_mashinostroyeniya_7s1/Z04YcABhSk0GQFtvfXtwc39nZA==/?ll=37.671382%2C55.712340&source=wizgeo&utm_medium=maps-desktop&utm_source=serp&z=17">Адрес: 115088 Москва,ул.2-я Машиностроения,д.7 стр.1  </a></li>
		</ul>
		<p class="text2">© 2010-2014 Future, Все права защищены</p>
	</div>
</div>


</body>
</html>

