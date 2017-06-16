<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	<title></title>
</head>
<body>
	<style type="text/css">
		.col {
		  position: relative;
		}

		.col > *{
		  max-width: 100%;
		}
		.container,table,.form-inline,.form-group,.input-group{
			position: relative;
			width: 100%;
    		float: left;
		}
		.input-group input,.input-group select{
			 width: 18% !important;
			float: left !important;
			margin: 0 5px;
			height: 25px;
		}
		th,td{
    		max-width: 300px;

    		text-align: center;
		}
		.btn {
    	display: inline-block;
    	padding: 2px 8px !important;
		}
		th > div,td > div{
			overflow: auto;
			max-height: 100px;
		}
		.form-inline button,.form-inline,.info-left{
			float: left;
			margin: 0 5px;
		}
	</style>
	<?
		//var_dump($_SERVER);
	?>
	<div class="container-fluid container">
		<a href="/promo_code/promo_code/administrator/setting.feedback.php">Настройки</a>
		<form class="form-inline" style="margin: 10px auto">
  			<div class="form-group">
  				<div class="input-group">
  					 <input type="text" class="form-control" name="promo_code" placeholder="Промокод" value="<?php if (isset($_GET['promo_code'])) echo $_GET['promo_code'];?>">
						 <div class="info-left">с</div><input type="date" class="form-control" name="start" placeholder="" value="<? if (isset($_GET['start']) && $_GET['start']) echo $_GET['start'];?>">
						 <div class="info-left">до</div><input type="date" class="form-control" name="end" placeholder=""  value="<? if (isset($_GET['end']) && $_GET['end']) echo $_GET['end'];?>">
						 <div class="info-left">метрика</div><select name="type">
							 <option value="normal">Базовая</oprion>
							 <option value="checkbox_info" <?php if ($_GET['type'] == 'checkbox_info') echo 'selected';?>>Статистика опросника</option>
							 <option value="other" <?php if ($_GET['type'] == 'other') echo 'selected';?>>Прочее</option>
						 </select>
  					 <input type="hidden" name="action" value="search">
						 <button type="submit" class="btn btn-primary">Поиск</button>
						 <a class="btn btn-primary" href="/promo_code/promo_code/administrator/" role="button">Сбросить</a>

  				</div>
  			</div>

  		</form>

  		<?php
  			$t = array();
				//var_dump($_GET);

				if (($_GET['action'] == 'search') && ($_GET['start'])){
					$t['start'] = $_GET['start'];
				}
				if (($_GET['action'] == 'search') && ($_GET['end'])){
					$t['end'] = $_GET['end'];
				}
			//	var_dump($t);
			if (($_GET['action'] == 'search') && ($_GET['type'])){
				$t['type'] = $_GET['type'];
			}
				if (($_GET['action'] == 'search') && ($_GET['promo_code'] != ''))
				{
  				$t['promo_code'] = $_GET['promo_code'];

  			}
  		?>

		<table class="table-responsive table-striped table-bordered">
			<thead>
				<?php if (isset($_GET['type']) && $_GET['type'] == 'checkbox_info'){ ?>
				<tr>
					<th>Вопрос</th>
					<th>Положительных ответов</th>
				</tr>
				<?php } ?>
				<?php if (!isset($_GET['type']) || $_GET['type'] == 'normal'){ ?>
				<tr>
					<th>id</th>
					<th>Промокод</th>
					<th>Добавлен</th>
					<th>Реферер</th>
					<th>Страница входа</th>
					<th>IP</th>
					<th>Город</th>
					<th>Ключ(реферер)</th>
					<th>Канал</th>
					<th>№ посещ.</th>
					<th>Браузер</th>
					<th>Тип</th>
					<th>Возврат</th>
					<th>Первое окно</th>
					<th>Прочее</th>
				</tr>
				<?php } ?>
				<?php if (isset($_GET['type']) && $_GET['type'] == 'other'){ ?>
				<tr>
					<th>id</th>
					<th>Промокод</th>
					<th>Добавлен</th>
					<th>Реферер</th>
					<th>Страница входа</th>
					<th>IP</th>
					<th>Город</th>
					<th>Ключ(реферер)</th>
					<th>Канал</th>
					<th style="width: 40%">Прочее</th>
				</tr>
				<?php } ?>
			</thead>
			<tbody>
				<?php

					include '../api/metr.api.php';
					$page = new Metrik();

					if (count($t)){
						echo  $page->page($t);
					}else
					echo $page->page();
				?>
			</tbody>
		</table>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</body>
</html>
