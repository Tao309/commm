<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  function update_db($col,$query){
    //echo $query;
    try {
      $conf = (array)json_decode(file_get_contents('../api/.conf', FILE_USE_INCLUDE_PATH));
      $dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['bd'],$conf['user'],$conf['password']);
      $query = $dbh->quote($query);
    //  echo $query;
      $stmt = $dbh->prepare('UPDATE pc_fb_setting  SET `'.$col.'` = '.($query).' WHERE id = 1');
      $stmt->execute();
      $dbh = null;
    }catch (PDOException $e) {
      var_dump($e);
      echo "Ошибка подключенияк базе";
    }
  }

  if (count($_GET)){
    if (isset($_GET['action'])){
      if ($_GET['action'] == 'save')
      {
        if ($_GET['lavel'] == 'basic'){
          $basic = array();
          $basic['delay'] = intval($_GET['delay']);
          $basic['top_margin'] = intval($_GET['top_margin']);
          $basic['break'] = intval($_GET['break']);
          $basic['style'] = ($_GET['style']);
          $basic['fisrt_title'] = ($_GET['fisrt_title']);
          $basic['phone'] = ($_GET['phone']);
          $basic['to'] = ($_GET['to']);
          $basic['from'] = ($_GET['from']);
          update_db('basic',json_encode($basic));
        }
        if ($_GET['lavel'] == 'first'){
          $first = $_GET['fisrt_l'];
          update_db('first',json_encode($first));
        }
        if ($_GET['lavel'] == 'basic_and_first'){
          $basic = array();
          $basic['delay'] = intval($_GET['delay']);
          $basic['top_margin'] = intval($_GET['top_margin']);
          $basic['break'] = intval($_GET['break']);
          $basic['style'] = ($_GET['style']);
          $basic['fisrt_title'] = ($_GET['fisrt_title']);
          $basic['phone'] = ($_GET['phone']);
          $basic['to'] = ($_GET['to']);
          $basic['from'] = ($_GET['from']);
          update_db('basic',json_encode($basic));
          $first = $_GET['fisrt_l'];
          update_db('first',json_encode($first));
        }
      }
    }
  }

  $conf = (array)json_decode(file_get_contents('../api/.conf', FILE_USE_INCLUDE_PATH));
  $dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['bd'],$conf['user'],$conf['password']);
  $stmt = $dbh->prepare('SELECT `basic`,`first`,`second` FROM pc_fb_setting LIMIT 1');
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_LAZY);
  $dbh = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<title></title>
</head>
<body>
  <div class="container">
    <a href="/promo_code/promo_code/administrator/">Статистика</a>
    <h2>Настройки модуля feedback</h2>
    <p class="bg-info">Общие настройки</p>
    <?php  $basic = (array)json_decode($row->basic);?>
    <form>
      <input type="hidden" value="save" name="action"/>
      <input type="hidden" value="basic_and_first" name="lavel"/>
      <div class="form-group">
        <label>Задержка перед перед включением скрипта в секундах</label>
        <input type="text" name="delay" class="form-control" placeholder="" value="<?=$basic["delay"];?>">
      </div>
      <div class="form-group">
        <label>Отсуп от верха в px, в котором срабатывает скрипт</label>
        <input type="text" name="top_margin" class="form-control" placeholder="" value="<?=$basic["top_margin"];?>">
      </div>
      <div class="form-group">
        <label>Заголовок пероого окна</label>
        <input type="text" name="fisrt_title" class="form-control" placeholder="" value="<?=$basic["fisrt_title"];?>">
      </div>
      <div class="form-group">
        <label>Стили</label>
        <textarea type="text" name="style" class="form-control" placeholder=""><?=$basic["style"];?></textarea>
      </div>
      <div class="form-group">
        <label>Ящик для отправки сообщений</label>
        <input type="text" name="from" class="form-control" placeholder="" value="<?=$basic["from"];?>">
      </div>
      <div class="form-group">
        <label>Ящик куда отправлять сообщения</label>
        <input type="text" name="to" class="form-control" placeholder="" value="<?=$basic["to"];?>">
      </div>
      <div class="form-group">
        <label>Номер телефона</label>
        <input type="text" name="phone" class="form-control" placeholder="" value="<?=$basic["phone"];?>">
      </div>
      <div class="form-group">
        <label>Номер вопроса прерывания (0 - нет)</label>
        <input type="text" name="break" class="form-control" placeholder="" value="<?=$basic["break"];?>">
      </div>
     

    <p class="bg-info">Настройки первого окна</p>
    <div class=" form_first">
      <input type="hidden" value="save" name="action"/>
     <!-- <input type="hidden" value="first" name="lavel"/> -->
      <?php
          $first = (array)json_decode($row->first);
          foreach ($first as $key => $value) {
            ?>
              <div  name="first_<?=$key;?>" class="form-group"><input type="text" value="<?=$value;?>" name="fisrt_l[]" class="form-control" placeholder="Текст вопроса"><button class="btn btn-danger del" name="first_<?=$key;?>">Удалить</button></div>
            <?php
          }
      ?>
      <button type="button" class="btn btn-default add">Добавить</button><button type="submit" class="btn btn-default save btn-success" >Save</button>
    </form>
    </form>
    <script>
      function del(){
        $('button.btn.del').click(function(){
          var name = $(this).attr('name');

          $('.form-group[name="'+name+'"]').remove();
          return false;
        });
      };
      del();
      $('button.btn.add').click(function(){
        var c = $('.form_first input[type="text"]').length;
        if ($('.form_first .btn-danger').length)
          {
            $('.form_first .btn-danger').last().after('<div  name="first_'+c+'" class="form-group"><input type="text" name="fisrt_l[]" class="form-control" placeholder="Текст вопроса"><button class="btn btn-danger del" name="first_'+c+'">Удалить</button></div>');
          }
        else{
          $('.form_first input[name="lavel"]').last().after('<div  name="first_'+c+'" class="form-group"><input type="text" name="fisrt_l[]" class="form-control" placeholder="Текст вопроса"><button class="btn btn-danger del" name="first_'+c+'">Удалить</button></div>');
        }
        del();
      });
    </script>
    <p class="bg-info" style="display: none">Настройки второго окна</p>


  </div>

<style>
.form_first .form-group{
  width: 100%;
}
.btn.save{
  float: right;
  display: block;
  margin-top: 30px;
}
.form_first button{
  margin: 4px;
  display: inline-block;
}
.form_first .form-group input{
  width: 70% !important;
  display: inline-block;
  margin: 4px;
}
</style>
</body>
</html>
