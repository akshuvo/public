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
define('AUTH_KEY',         'xJyO3dV6vKN4g/nKmxl1YXFAjcQdxEPj7yAo5ZlqZMHNmDiikjg99TSRVJpgFG5PxUY1ayKgGPF5UceBy3jaeQ==');
define('SECURE_AUTH_KEY',  'yfPy5B6gzxmmYsMmFHpsVP1J+GzLB4BzPSFbxwG8iaaIsCxe4NORjSCtkkX819nZ4LlUC9OaEO5RS/GgjW6ZzA==');
define('LOGGED_IN_KEY',    '7A7rV6jdpPOSGKy5NENJXJBTiABDDZasxPFAmUvTKpM39fJYMSsNFM9E4cj85D5Cwy6zbIcRXTy0/yKeJ26iUg==');
define('NONCE_KEY',        'EeKhGD4bDhEGOgZOXlLfiXjYQqYY5TXKLJtai2fQw+CKvAGKDLWYp1bHRKeE4egwEHkxKwUAe6gWZwpgC51jkQ==');
define('AUTH_SALT',        'zvsWJo6/luYpnbJhzkpYkiQegQ2XSeSJbgvWI3CHSIKwT1O/1mgsHuMx/XRDdU08BAUEgxnFbS6EndxN0PHfYA==');
define('SECURE_AUTH_SALT', 'byxrOm4smlD3qpaj1ZuCaHx5b+yPBu1R10sblmw36Ze8YTinuN28PBmbk8RjARUxqljx/9CQAjYJtv8j5hTHgQ==');
define('LOGGED_IN_SALT',   'yidxnYnZXpnsbKUroyHpsHGUjHora2FgQYLtAYnd2hY1UXGJyhIZK9TLV7aGTMnq+9lkmvo/TexxbCNNWVlZwg==');
define('NONCE_SALT',       'tt52jjAYce00WOvLTRL/DIbDBZdDudpwngwkTa51UykqJOzA7f0qk9qpB6VN53BF+qR8bN4DFOueSiOEoctNfw==');

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
