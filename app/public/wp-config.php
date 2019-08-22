<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'z7MPjNJ+FE4FJkPavKHx6+Ado95qimOjvfrWw8GSI5tx7XnZvVEM3W7wBQkOuzgTAuyn2fmR3yhWMijd/uLQ5w==');
define('SECURE_AUTH_KEY',  '43DwCYThg1A58Tq5xHadiY/NUfETAmhI9lNlDq876TIaJtYA/5aAwLGDOcUWVYIquVmMBhynh6pn4rTDS/h65w==');
define('LOGGED_IN_KEY',    'hsfcawoPDrsoXW95okWnDK0FHlJintjxUshIGnrYkS7IZ0ey/chHttv4MGfLTz5ohbIMzvQaKrsTot7ZTWq4Uw==');
define('NONCE_KEY',        '2H8ng8CRM0OfSnnNBeWSuJXECL8T5dp+d+m5lRe0DYFDnaFU1WsLD1tTHjVe4Pc5lB03HhZKhdeaHJRVaUv+eA==');
define('AUTH_SALT',        'hcGzN0PVoSobV1nxUsxvuA6ZuDeDYI4gp9oDeVJpf12adfT52or0HP9U7cQkuaKhdfi0pmkREczT+TfQ58Cu1A==');
define('SECURE_AUTH_SALT', 'LSH8yIE9P8tX8kKgOyqoch+nZY0fCaDNsiW2651JOkPPjqJhFQqC5QP/Kjf+qTi0+Jqqf0BqWzpl7K1Jt6jK6g==');
define('LOGGED_IN_SALT',   'lMqDCV+f490545tYWo+otfFpqilz/3up/1G/UaICTRmDtXz/5DkkK0FJafQNcMZ+nbBTfHveLE2b3JzriOnE5w==');
define('NONCE_SALT',       'HkPsKpL7bwZxT7sSLHuBSQiM3gkTHEq+tP07P7QlxT8+lwF+qddRDutofHc0lFC0OJPkCxS6/DUX4nUTUhqAOw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
