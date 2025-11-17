<?php
$url = isset($_GET['url']) ? $_GET['url'] : false; // здесь нам надо получить сам адрес вставки
if (!$url) die(); // если его нет - ничего не делаем
$url = urldecode($url); // расдекодим все его вопросики и апресанды после передачи
$content = file_get_contents($url); // вся магия - получаем содержимое айфрейма
$content = str_replace('</head>','<script type="text/javascript">$(document).ready(function(){
    $.fn.replaceUrl = function(){
    var regexp = /((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi;
    this.each(function(){
    $(this).html(
    $(this).html().replace(regexp,"<a href=\"$1\">$1</a>"));
 });
    return $(this);
}
    $("#result").replaceUrl();
});
</script></head>', $content); // производим все замены, в данном случаем перед закрывающемся <head> добавим новый файл стилей
echo $content; // выводим измененное содержимое
?>