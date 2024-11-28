<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '~AQJXH7[!@Fij8~t0<LM?/0B@`<9Rwe~D*? l|q?]-Hc3bgIig|cbgrwAyEdi^:?' );
define( 'SECURE_AUTH_KEY',  'J+qvza8G]yoDqAa`8wqPI@w|#:BqH>sY9cS>LK;zgId&R|:VKoG#ax3]XbH25 B#' );
define( 'LOGGED_IN_KEY',    'Wvat.PXd/(;Oe5UZO`.P0GqAa>jqzDhX)U+=8arniy3WHM`|wO0kW,cC/OxJ1?gV' );
define( 'NONCE_KEY',        'U_$flA@H.ifPj?75TTS9bk`M<j3c IQ$vprm^U2 .M$_;MFvt&`V8C^Y!o~3g(dL' );
define( 'AUTH_SALT',        'c?~*{0I&*g]foFE_MGm11?8=C(Wtb)kkgE*}J0}$R;A=}ei+WeM,:!w>K=BM0@C&' );
define( 'SECURE_AUTH_SALT', 'ZHhV)uzoV#{`ITgw16,wRL!RW8>7Ro&[btp^5)&{wP=Eu6f?sUsK}Q~J lKMPpbw' );
define( 'LOGGED_IN_SALT',   '6@|/v=/`G&eebmbXk`*{vV/[VjkI?oCV}lTuBYtefPU6!,>%@XBrI`{D:{z8ej*7' );
define( 'NONCE_SALT',       '79!NTPd$P}mA]$5Pi$Qm];Db2y}UJGZ,73%8:wZ@m|ET+2^K]E>?WMMV0SX%9V%C' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
