<?php

session_start();
ob_start();

define('URL', 'http://localhost/SGA/');

define('CONTROLER', 'Login');
define('METODO', 'login');

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'registro-alunos');
