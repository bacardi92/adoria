<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'adoriasoft');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '123456');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Vq{Ap v?#G]R018k]$0_D*;e;0Y.x:HCd[%T<Z(m{@GY?Ew*cgM5mtdw=ald~p`e');
define('SECURE_AUTH_KEY',  '|mJK`8W97R?&1Te&blCkwiHx:i2=m9|<.NKBb@^|c$NTT{R+XZMOuFA%xUA+;jaS');
define('LOGGED_IN_KEY',    'o2S/n*!P~dV=2Dhd)N&eN|`!?xWNtbA1/i;Pt~W3~$$x.4LXboT%Kgo^ZqjjZkCQ');
define('NONCE_KEY',        '(!Irvfpi3m-dU |Q4:bzA!e?T=TL`=!PPZu1iQT+VpAgj(MTa/3^jLtkzo*KCX#!');
define('AUTH_SALT',        '5=6!fkk3=QgjEsSBzCVVGp$$Buw-]~UR`Tu4WLdeq{OUqMRcW.2Z0NF2}TzeZI`_');
define('SECURE_AUTH_SALT', 'Kksh62;wQ^69Mu%C=eOp:E.7X$$rp9mRTAb?a?E:7-C-<[!5.qd25(mM`dyO7~eb');
define('LOGGED_IN_SALT',   '()@NK7~y6cB}#2w5P:d5{bqtP{u2|q&R]l5+|x0ZV1v,T;4lDf(`V5&;}}Nj`Ng#');
define('NONCE_SALT',       '(+=+<q`SUbnVp9O]%)H$vVyt)?2`aY@RUAVny9HRUC})R~{+PV~DTn:D<G>tQ6hk');
/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'st_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
