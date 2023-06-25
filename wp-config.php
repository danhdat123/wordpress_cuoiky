<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'MyprojectCk' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xtvlPO9AKxp27pBuyv7DO5BFu7KnY3LPXoALhlyEfqFWEJ5T6Ee6dOJwlF5Oj4DW' );
define( 'SECURE_AUTH_KEY',  'hRVtyVpPfEQ7HtODqX49jW0HnsASrCfJKLoIhj4CLfELfasEFgEeeMMH8CgHTuI2' );
define( 'LOGGED_IN_KEY',    'sidk7ouhLXetsAPzc63Ya68kfmmWLyJA7owobm5pfDgjlQ4gnBqORcqusOjm8VPN' );
define( 'NONCE_KEY',        'yftYsU479hq4T39CC1nHABkoCQOgITdgdz3vTAwPJXj9bd3vhoeYJy2e5GvFhaNG' );
define( 'AUTH_SALT',        'BnnyqNMJrXe3yhd4Bv05RfWBPbt2c22dUgl7cSM9cUPnCP9DekoEIxVCr95aLHmW' );
define( 'SECURE_AUTH_SALT', 'NPFpYgRbYfCpipeYmD0UJoTeH6f6wXv5gUtL7WNVGirVHvKfWE0fkYzpMj8QZ8uH' );
define( 'LOGGED_IN_SALT',   'fJ2T7yxxYsw9Yulwcq85Uoay5d5mUIZskUr6yryNbUKBy4fV7DK70FqpkoKCo469' );
define( 'NONCE_SALT',       'O9oBrMKw0DCEYeaVnrKlw2csWKdnF6u1Dn2WcLT3HABZDUmY40ioIrlsCLeLR0Qr' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
