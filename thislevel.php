<?php // подключение констант и подобного

// в файлах, лежащих на этом же уровне, будет включена эта переменная
$level = ''; // ../ == папка, уровень выше на 1

require_once($level.'includes/db_connection.php');
require_once($level.'includes/db_functions.php');
require_once($level.'includes/const.php');
require_once($level.'includes/functions.php');

require_once($level.LAYOUT.'functions-layout.php');



// итемы левого сайдбара в этой папке
		$sidebar = array(                            								
				
				 );
