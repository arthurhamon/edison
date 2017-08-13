<?php
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
define('DB_NAME', 'u0282713_edison');

/** Имя пользователя MySQL */
define('DB_USER', 'u0282713_edison');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Qt13Bu4T');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'n}U,<3|6jqSj5uCJHqe)5$a33G6}d|2Eb?(vIZ)2v}l]6`s7CT)f9nHHi+ng^%5M');
define('SECURE_AUTH_KEY',  '$h~#PF]WI+H>5hxE<i1Xz}jEkS{C=ndw~^Dci51:h!,{+xvDa]r![1%(ggpx7`8+');
define('LOGGED_IN_KEY',    'BE%wRu9<I(H6g?E1?BB|RW.ucbx9=#q%;?J[n,PPuMO^]1eL4iPMZ7&KK(Hh^MF9');
define('NONCE_KEY',        'HW^k>`g?gSU.&/kdZNx2?N2Ohg{E#XlQr}2Da[|K/[6`|Y4A@-|;inLC=>mGq-H%');
define('AUTH_SALT',        '~`&tTP.>Un@rcEt#[_,9E!(MIPAncV3w3%b#(&pl$JtfA+e:ipXweff]<G` .por');
define('SECURE_AUTH_SALT', '>|n_5fiOd.RxcwuMiAyX7W`jZ<ROPO_!-Qb+%paT:{}TWh1K*I%v*Wsa* uTtbsY');
define('LOGGED_IN_SALT',   'SgYBEB1<{[j3rUCD/#z8PWB}?%i{gq342?6nPti*h*AV% ws_UgV61^^5C/AAISw');
define('NONCE_SALT',       '8^hjvv0,+| 5NtmZMX.f#X<pp:$|{zc~,Ft~15HwL6d9]IJvC5w`u/G7>Nn$(L{&');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
