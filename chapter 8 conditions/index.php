<?php
/*
    В документации на сайте http://php.net найдите описание функций file _get _сontents ()
    и file _put _ contents (), которые позволяют читать и записывать содержимое файла. Создайте два скрипта, первый должен записывать строку
    "Hello, world!" в файл hello.txt, а второй- считывать содержимое файла hello.txt
    и выводить его в окно браузера.
    2. Напишите скрипт, который при вызове создает в текущем каталоге файл с именем, отражающем текущие дату и время в формате "год-месяц-число-часминута-секунда", например 2017-04-16-13-10-13.txt. В файл запишите случайное
    число от О до максимально возможного целого числа в РНР.
    3. Напишите скрипт, который при вызове создает два файла: со списком всех возможных расширений extensions.txt и со списком всех предопределенных констант РНР constants.txt.
 */

//task1

$file = 'hello.txt';

$current = file_get_contents($file);
$current = "Hello World!";

file_put_contents($file, $current);

//task2

$createDateFile = date("Y-m-d-H-i-s")  . ".txt";
$currentDateFile = mt_rand(0, 9223372036854775807);

file_put_contents($createDateFile, $currentDateFile);

//task3

$extension = 'extension.txt';
$constants = 'constants.txt';

$currentExtension = get_loaded_extensions();
$currentConstants = get_defined_constants();

echo print_r($currentExtension);
echo print_r($currentConstants);

file_put_contents($extension, $currentExtension);
file_put_contents($constants, $currentConstants);