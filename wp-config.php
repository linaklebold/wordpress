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
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9urv?2v:m-?m=On1~S4{zYKDF>M=!YRD;Tf9nG?|C6y<bmFyM=nY:;xM03hh=rRF' );
define( 'SECURE_AUTH_KEY',  'V7Eng{E{}fF)u9+M]+s>1U!8 k[j%YcbL&13buUb66x9:a[5yupPs}wmxNll|MV5' );
define( 'LOGGED_IN_KEY',    '-}K-QsWOAs]Gwu7M%Bod6^5s+,GXD[(,P+[Qqf%S9O]eD:}m^:2NXq./r&#J?HK)' );
define( 'NONCE_KEY',        'T=5S`P@dMq?+CWWwT!C4mS]/`*M]O$X2^7(Tx1G+NAd|#gsgqH#TlRl.KMa5`([C' );
define( 'AUTH_SALT',        ')|BM>`^r4t?@8QGpl<];FtK^&Ans{x@qv8Afl(ynj81[gVDDLY309R|KF%Eqo.aI' );
define( 'SECURE_AUTH_SALT', 'I79xgN7E?1(D3] =t;C<62/UHeyS8$b|sX<v5!kNK9Ei.M}[IEZIL?Or]AEy:6%W' );
define( 'LOGGED_IN_SALT',   '=&U^vquVluTpmAZ%a`#nls-yj%Vt#a[1S^_nB8]W;o7,UY<Xf(T4]A7fvJDE7>c8' );
define( 'NONCE_SALT',       'sJs!.JP9T$8~kRP:AaYn=y;&;o*8}j8UwV-8^zxxyi#N+FJ/Spp],?qzywIfU)uJ' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
