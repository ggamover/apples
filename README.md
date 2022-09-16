<div align="center">
    <a href="https://github.com/ggamover/apples" target="_blank">
        <img src="http://gamover.ru/images/gapp-logo.png" height="100px">
    </a>
    <h1 align="center">Яблоки</h1>
    <p>Проверочное приложение для ООО «ПО», разработано Дмитрием Евдокимовым</p>
    <br>
</div>

<h5>Описание установки</h5>
Для примера установим в директорию /home/user/project/prh-app
<ol>
  <li>Зайти в директорию, где будет проект<br><code>cd /home/user/project</code></li>
  <li>скачать репозиторий <br><code>git clone https://github.com/ggamover/apples.git apples-app</code><br> 
  где 'apples-app' - название директории в которую будет скачиваться проект</li>
  <li>зайти в директорию проекта <code>cd apples-app</code></li>
  <li>Выполнить <code>composer install</code></li>
  <li>Выполнить <code>init --env=Production --overwrite=All</code></li>
  <li>Создать базу данных, например apples, прописать параметры подключения в common/config/main-local.php</li>
  <li>Запустить миграцию: <code>yii migrate</code></li>
  <li>Установить пароль для backend: <br><code>yii auth/set-pwd &lang;пароль&rang;</code></li>
  <li>Настроить http сервер для backend и frontend согласно документации Yii2:
    <a href="https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation"></a>
     см. раздел 'Preparing application', п.4
  </li>
</ol>
