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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
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
define('AUTH_KEY',         'EmBU71HG9dT6/uOEnWtcY42pJs8+obTziqd7+UEwhUy0uGpDIu2tRUtByy6o1OSvkaL+ZARTMi3tiYD89YfaLw==');
define('SECURE_AUTH_KEY',  'JofuLTvnUNyo5otXiSYM6GUTaEcWJJtIZ9x9qgER2MYctCNVTx938UZtsOzVCmStih8eD+9wW7+BVQm7T8B3ZA==');
define('LOGGED_IN_KEY',    'vsH6g3yKkWeyO5fvAe9cP6T6MSV/gqHEQfLeWBxfT7Ryii8ZNVSzv5ynar/mtMBuanbnIol+R8tF71RXXUaf1w==');
define('NONCE_KEY',        'FORcsZc9f0IY9y4tHPRyud7GzxC2wZDnYuPNIHV+N+kJKEExejkxpvNDduQqKlObj8im5CrOghvPzOWFkTiGeg==');
define('AUTH_SALT',        'oLVTC3vvl7Y4djTjwLFhj2rMZVlj/ifF7bLCu5xUyZryDJeDyMvpx9EhZ2N7R0yehHRaQ9Ce9GAdufj0bMUYXw==');
define('SECURE_AUTH_SALT', 'yWoXWTd9cYHKOGf9mzyV3C8OHm0SfZJOkshAyK8MsE3CP5zWc3FaeQ62ejl9olSdsDDNZVnV9uIvINjO6DmhIQ==');
define('LOGGED_IN_SALT',   'un/GRbTTrmuL+lM7iT4IEZf2hoBoNkbx/OwBsL/lZviJpg2aM6XgbOOe+6bYYmh0AF3nwV1vNYMeSRyhjztIhw==');
define('NONCE_SALT',       'ZdsktW6OJjKyTACV7lUk5pZVNrdM7RbVzP9spf90v4xHi5BG9PT/iF+yPjZiMwBSBkpvRRLnRgUljStQgKB6Vw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
