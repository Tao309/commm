<?php

  if (isset($_GET['redirect'])){
    header('Location: /promo_code/promo_code/administrator/');
    exit;
  }
?>

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
    <?php
    //  echo ($_SERVER['DOCUMENT_ROOT']);
      $error = array(); //Массив ошибок
      $messege = array(); //Различные сообщения
      $stage = isset($_GET['stage']) ? intval($_GET['stage']) : 1;

      if (isset($_GET['action']))
      {
        //Стадия 1
        if ($_GET['stage'] == 1){
          //Заполнено ли поле Хост
          if (!isset($_GET['host']) || !$_GET['host']){
            $error['inputs']['host'] = 'has-error';
          }
          //Заполнено ли поле Имя пользователя
          if (!isset($_GET['user']) || !$_GET['user']){
            $error['inputs']['user'] = 'has-error';
          }
          //Заполнено ли поле Имя базы данных
          if (!isset($_GET['bd_name']) || !$_GET['bd_name']){
            $error['inputs']['bd_name'] = 'has-error';
          }
          //Заполнено ли поле Пароль базы данных
          if (!isset($_GET['bd_password']) || !$_GET['bd_password']){
            $error['inputs']['bd_password'] = 'has-error';
          }
     //     echo count($error['inputs']);
          if (isset($error['inputs']) && count($error['inputs']) == 0){
            $stage_1 = true;
         
            try {
                $dbh = new PDO('mysql:host='.$_GET['host'].';dbname='.$_GET['bd_name'], $_GET['user'], $_GET['bd_password']);
                $messege['text'][] = 'Подключение к базе установлено';
                $dbh = null;

            } catch (PDOException $e) {
                $stage_1 = false;
                $error['text'] = "Не удалось подкулючиться к базе";
                $error['inputs']['bd_password'] = 'has-error';
                $error['inputs']['bd_name'] = 'has-error';
                $error['inputs']['user'] = 'has-error';
                $error['inputs']['host'] = 'has-error';
            }

            if ($stage_1){
              try {
                $dbh = new PDO('mysql:host='.$_GET['host'].';dbname='.$_GET['bd_name'], $_GET['user'], $_GET['bd_password']);
                $stmt = $dbh->prepare("
                CREATE TABLE IF NOT EXISTS `application` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `promo_code` text NOT NULL,
                `enter_page` longtext NOT NULL,
                `ip` text NOT NULL,
                `city` text NOT NULL,
                `refer_key` longtext NOT NULL,
                `chanel` longtext NOT NULL,
                `data_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `refer` longtext NOT NULL,
                `count` int(11) NOT NULL DEFAULT '0',
                `browser` text NOT NULL,
                `device` text NOT NULL,
                `returned` int(11) NOT NULL DEFAULT '0',
                `first_answer` longtext NOT NULL,
                `other` longtext,
                PRIMARY KEY (`id`)
                ) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;
                ");
                $messege['text'][] = 'Подключение к таблице установлено';

                $conf = array(
            			'host' => $_GET['host'],
            			'user' => $_GET['user'],
            			'bd' => $_GET['bd_name'],
            			'table' => 'application',
            			'password' => $_GET['bd_password']
            		);
                file_put_contents("../api/.conf",json_encode($conf));
                $stmt->execute();

                $stmt = $dbh->prepare("
                CREATE TABLE IF NOT EXISTS `pc_fb_setting` (
                `basic` longtext NOT NULL,
                `first` longtext NOT NULL,
                `second` longtext NOT NULL,
                `id` int(11) NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (`id`)
              ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;");



                $stmt->execute();

                $stmt = $dbh->prepare("INSERT INTO `pc_fb_setting` (`basic`, `first`, `second`, `id`) VALUES
('{\"delay\":1,\"top_margin\":100,\"style\":\"\",\"fisrt_title\":\"Заголовок\",\"break\":0,\"phone\":\"79993332211\",\"to\":\"cnfc199321@yandex.ru\",\"from\":\"webmaster@example.com\"}', '[\"Вопрос 3\",\"Вопрос 2\",\"Вопрос 1\"]', '', 1);");



                $stmt->execute();

              }catch (PDOException $e) {
                $stage_1 = false;
                $error['text'] = "Ошибка при создании таблицы";
              }
            }


          }

        }
        if ($stage == 2){
          if (isset($_GET['admin_password']) && isset($_GET['admin_password_repeat']) && $_GET['admin_password_repeat'] != '' && $_GET['admin_password'] != ''){
            if ($_GET['admin_password_repeat'] === $_GET['admin_password']){
                // APR1-MD5 encryption method (windows compatible)
                function crypt_apr1_md5($plainpasswd) 
                {
                    $salt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
                    $len = strlen($plainpasswd);
                    $text = $plainpasswd.'$apr1$'.$salt;
                    $bin = pack("H32", md5($plainpasswd.$salt.$plainpasswd));
                    for($i = $len; $i > 0; $i -= 16) { $text .= substr($bin, 0, min(16, $i)); }
                    for($i = $len; $i > 0; $i >>= 1) { $text .= ($i & 1) ? chr(0) : $plainpasswd{0}; }
                    $bin = pack("H32", md5($text));
                    for($i = 0; $i < 1000; $i++)
                    {
                        $new = ($i & 1) ? $plainpasswd : $bin;
                        if ($i % 3) $new .= $salt;
                        if ($i % 7) $new .= $plainpasswd;
                        $new .= ($i & 1) ? $bin : $plainpasswd;
                        $bin = pack("H32", md5($new));
                    }
                    $tmp = '';
                    for ($i = 0; $i < 5; $i++)
                    {
                        $k = $i + 6;
                        $j = $i + 12;
                        if ($j == 16) $j = 5;
                        $tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
                    }
                    $tmp = chr(0).chr(0).$bin[11].$tmp;
                    $tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
                    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
                    "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");

                    return "$"."apr1"."$".$salt."$".$tmp;
                }

                // Password to be used for the user
                $username = 'admin';
                $password = $_GET['admin_password'];

                // Encrypt password
                $encrypted_password = crypt_apr1_md5($password);

                // Print line to be added to .htpasswd file
                file_put_contents(".htpasswd",$username . ':' . $encrypted_password);
                file_put_contents(".htaccess",'AuthType Basic
                AuthName "Admins zone!"
                AuthUserFile '.($_SERVER['DOCUMENT_ROOT']).'/promo_code/promo_code/administrator/.htpasswd
                Require valid-user
                <Files .htpasswd>
                   deny from all  #запрет доступа из браузера к .htpasswd
                </Files>
                ');
                //echo $username . ':' . $encrypted_password;
            }else{
              $error['inputs']['admin_password_repeat'] = 'has-error';
              $error['text'] = "Пароли не совпадают";
            }
          }else{
            $error['inputs']['admin_password'] = 'has-error';
            $error['inputs']['admin_password_repeat'] = 'has-error';
            $error['text'] = "Необзодимо заполнить поля";
          }
        }
      }
    ?>
    <div class="container">
      <?php
      /**Этап**/
      if (!isset($error['text']) && isset($_GET['stage']))
        $stage++;
      ?>
      <h2 class="text-center">Установка</h2>
      <h4 class="text-center">Этап <?=$stage;?></h4>
      <!--Выводим уведомления -->
      <?php if (isset($messege['text']) && count($messege['text'])) {
              foreach ($messege['text'] as $value) {
      ?>
        <div class="alert alert-success" role="alert"><?=$value;?></div>
      <?php }} ?>
      <!--Выводим предупреждения-->
      <?php if (isset($error['text'])) { ?> <div class="alert alert-danger" role="alert"><?=$error['text'];?></div> <?php } ?>
      <form class="form-horizontal" method="get" action="/promo_code/promo_code/administrator/install.php">
        <?php if ($stage == 3 ) {?>
          <input type="hidden" name="redirect" value="1">
          <div class="alert alert-info" role="alert">Для завершения установки необходимо скопировать данный код и вставить в футер сайта</div>
          <div class="alert alert-info" role="alert"><textarea id="text" style="width: 100%;height: 100px;">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="/promo_code/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/promo_code/script.js" defer></script></textarea></div>
          <button type="submit" class="btn btn-primary pull-right">Завершить</button>
        <? } ?>
        <!--Задаем паролль-->
        <?php if ($stage == 2 ) {?>
          <input type="hidden" name="stage" value="2">
          <input type="hidden" name="action" value="true">
          <div class="alert alert-info" role="alert">Необходимо установить пароль администратора</div>
          <div class="form-group <?=$error['inputs']['admin_password'];?>">
            <label class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="admin_password" class="form-control" placeholder="Пароль администратора">
            </div>
          </div>

          <div class="form-group <?=$error['inputs']['admin_password_repeat'];?>">
            <label class="col-sm-2 control-label">Подтвердить пароль</label>
            <div class="col-sm-10">
              <input type="password" name="admin_password_repeat" class="form-control" placeholder="Еще раз">
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
        <?php } ?>
        <!-- -->
        <?php if ($stage == 1 ) {?>
          <!--Скрытые поля-->
          <input type="hidden" name="action" value="true">
          <input type="hidden" name="stage" value="1">
          <!--Хост базы данных-->
          <div class="form-group <?=$error['inputs']['host'];?>">
            <label  class="col-sm-2 control-label">Хост</label>
            <div class="col-sm-10">
              <input type="text" name="host" class="form-control" value="localhost">
            </div>
          </div>
          <!--Пользователь-->
          <div class="form-group <?=$error['inputs']['user'];?>">
            <label class="col-sm-2 control-label">Пользователь</label>
            <div class="col-sm-10">
              <input type="text" name="user" class="form-control" placeholder="Имя пользователя">
            </div>
          </div>
          <!--База-->
          <div class="form-group <?=$error['inputs']['bd_name'];?>">
            <label class="col-sm-2 control-label">Имя базы данных</label>
            <div class="col-sm-10">
              <input type="text" name="bd_name" class="form-control" placeholder="Имя базы данных">
            </div>
          </div>
          <!--Пароль-->
          <div class="form-group <?=$error['inputs']['bd_password'];?>">
            <label class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="bd_password" class="form-control" placeholder="Пароль базы данных">
            </div>
          </div>

          <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
        <?php } ?>
      </form>
    </div>
  </body>
</html>
