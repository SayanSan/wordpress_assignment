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
define( 'DB_NAME', 'example_db' );

/** Database username */
define( 'DB_USER', 'sayan_user' );

/** Database password */
define( 'DB_PASSWORD', 'sayandb_pw' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'u0yuWDk(8l[h7?TL&!Q>W)TG<tc&Pv=f=2KS<?W |8[dFY#CF=kCfPsk}FV$Dc81' );
define( 'SECURE_AUTH_KEY',  'nIQ$d]TI|QoGIio dESSTVzYG7BUab&~m]|<-to%6!#X`%%t9rwYk1ZVngdNfeg-' );
define( 'LOGGED_IN_KEY',    'abNcn;3W^x7yMtMg*=evH^vUt$NQcH6o-$h4n$VOS^};CD3p0Si$x*#O|~4?Bv?s' );
define( 'NONCE_KEY',        'J=|eAwDcBh%y;X%(Ib|Ss >Y;(*B5NFNQ`VPid*Tuj)1*mgmuU.i!S4VNT$:C6C.' );
define( 'AUTH_SALT',        'f?XD~e BAOzU/+ed<o!R}}hH5=e [.lvh;lGG5y*/_) }B/~s&jEeEKT6z/Xh3xE' );
define( 'SECURE_AUTH_SALT', '%/x^bo+nE=H `+EZZeX{<[j=v/`l6R,%Q>RTThf`k>|5t6+X!cS9Bj~(9#OvLI:{' );
define( 'LOGGED_IN_SALT',   '5ywUJqc-oT6Z~p>cZuQGU5Tm#5tcLOr5GU]>d a5>>.I|Ydy8^.mQ:lz}fNJ8ZSo' );
define( 'NONCE_SALT',       '}IhZxEHn<.G$p Fby2`r1jWIO_b4npw;Sv3Fo:8v|lY.:t#5vLO,_@0D9)NJw4zJ' );

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
