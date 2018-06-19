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
define('DB_NAME', 'aleks111_school');

/** Имя пользователя MySQL */
define('DB_USER', 'aleks111_school');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'M7a1V9e7');

/** Имя сервера MySQL */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '-g<(VvZ6ueVwp_W%a8/Dw-L6)d`t|}azWYFcLK?qd^H.;fJU.c=<s4ByzEBV$ppX');
define('SECURE_AUTH_KEY',  'Yw6zk/Y@`mN[5H|,4#t=xqg/,MmMW[R_L_^hR&`R)>mMWcEeEs]FB9b%%&ASXFrB');
define('LOGGED_IN_KEY',    'x*qqFl}!D4WefFBOT%qTG}[5MV^K6F)j./`&%?KI6]aV}jQz1/_(~8m^M(3;Wt1i');
define('NONCE_KEY',        'YSQ!0|OUPgo:^ lTf??bqYF 196^#*GHpp. rdcv+oC!Dq$4-#_Xlae-D`:v_WuX');
define('AUTH_SALT',        '<?-L%FN::QStLo3OV/[}(I2z8.grn5xY/6WZp)o*%]6%9TMqQXytkG}_k[0v?tj!');
define('SECURE_AUTH_SALT', '?CN}{)fH2LOktMAbLt9_gUq.ZUkK/eF^H@s(i8Z#P}u ;3IyAEsYcW>{e?PJn/jk');
define('LOGGED_IN_SALT',   'H6 Go>17-unxWb/S]2_?EM4]ah8jIk?jr]C0SHr*O:,.w3#|SN>,6=~pSShbgCW:');
define('NONCE_SALT',       '&10ZJArJ@cj(QXh;/n]n^x@C4N>>Ozduk@Agw@&z|D0[;kja* ze7EY!%|CS1sY$');

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
