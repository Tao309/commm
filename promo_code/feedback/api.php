<?php

  //Смотрим пришли ли параметры
  if (count($_POST)){
    if (isset($_POST['action'])){
      if ($_POST['action'] == 'get_setting'){
        $conf = (array)json_decode(file_get_contents('../promo_code/api/.conf', FILE_USE_INCLUDE_PATH));
        $dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['bd'],$conf['user'],$conf['password']);

        $stmt = $dbh->prepare('SELECT `basic`,`first`,`second` FROM pc_fb_setting LIMIT 1');
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_LAZY);
        $dbh = null;
        echo json_encode($row);
      }
      if ($_POST['action'] == 'email'){
        if ($_POST['promo_code'])
        {
          $to  = $_POST['to'];
          $subject = 'Новый лид ООО "Организация"!';
          $headers = 'Content-type: text/html; charset=utf-8' ."\r\n".
          'From: '.$_POST['from']. "\r\n" .
    'Reply-To: '.$_POST['from']. "\r\n" .
    'X-Mailer: PHP/' . phpversion();
          $message = "Обратный звонок<br>";;
          $message .= 'Ключ: '.$_POST['key']."<br>";
          $message .= 'Промо-код: '.$_POST['promo_code']."<br>";
          $message .= 'Город: '.$_POST['city']."<br>";
          $message .= 'Телефон: '.$_POST['phone']."<br>";
          mail($to, $subject, $message, $headers);
        }
      }

      if ($_POST['action'] == 'returned'){
        if ($_POST['promo_code'])
        {
        //  var_dump($_POST);
          $conf = (array)json_decode(file_get_contents('../promo_code/api/.conf', FILE_USE_INCLUDE_PATH));
          $dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['bd'],$conf['user'],$conf['password']);
          $stmt = $dbh->prepare('UPDATE `application` SET returned = 1 WHERE promo_code = '.$_POST['promo_code'].' ORDER BY id DESC LIMIT 1');
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_LAZY);
          $dbh = null;
        }
      }

      if ($_POST['action'] == 'first_line_update'){
        if ($_POST['first_line'] && $_POST['promo_code'])
        {
        //  var_dump($_POST);
          $conf = (array)json_decode(file_get_contents('../promo_code/api/.conf', FILE_USE_INCLUDE_PATH));
          $dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['bd'],$conf['user'],$conf['password']);
          $query = $dbh->quote($_POST['first_line']);
          $stmt = $dbh->prepare('UPDATE `application` SET `first_answer` = '.$query.' WHERE promo_code = '.$_POST['promo_code'].' ORDER BY id DESC  LIMIT 1');
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_LAZY);
          $dbh = null;
        }
      }

      if ($_POST['action'] == 'other_update'){
        if ($_POST['other_update'] && $_POST['promo_code'])
        {
        //  var_dump($_POST);
          $conf = (array)json_decode(file_get_contents('../promo_code/api/.conf', FILE_USE_INCLUDE_PATH));
          $dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['bd'],$conf['user'],$conf['password']);
          $query = $dbh->quote($_POST['other_update']);
          $stmt = $dbh->prepare('UPDATE `application` SET `other` = '.$query.' WHERE promo_code = '.$_POST['promo_code'].' ORDER BY id DESC  LIMIT 1');
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_LAZY);
          $dbh = null;
        }
      }

    }
  }

?>
