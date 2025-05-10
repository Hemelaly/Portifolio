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
define( 'DB_NAME', 'portifolio' );

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
define( 'AUTH_KEY',         '8$BSD[kd#INeq5;#}djc,([&Hh(,wo>=l@FS }%RZNT!#UQ N_dK~[nlqqq:9]oJ' );
define( 'SECURE_AUTH_KEY',  '8f]*,2Fk99y_PFgeq&Yij3pXlQcEjUja~Hsp^djT If<+5u@7eb<wrVFP9]E;8T=' );
define( 'LOGGED_IN_KEY',    'N,_,XF ];Ok*BLFtD)54B> @TkS=|_2-6Hs.4m9HN +f32J`7<aCL$;*%X-OSx%*' );
define( 'NONCE_KEY',        '*_GH|fXYDBEm00$LZA.[kK3u SA:6-6mraO}z0A~~QHjPKRThMoH{>8aAB(OF5fq' );
define( 'AUTH_SALT',        'c[m8Kd%vm1;={]92p?]7U09EVt06Zt.*~>[bK3O(~|mz%}reL~a&nWO||#JsTx&T' );
define( 'SECURE_AUTH_SALT', '7#:F5N`X%D?vv-XB0Nj)Q`pLxPHo.7HDHRi@YZA<EL1)5]Y65KlV7JqdD&u`:Ph2' );
define( 'LOGGED_IN_SALT',   'W<]5dM62Kb(<mhaN8>jBRU`;C{^JHJ4*169<^|IdN-7PpnNay?s])! E}#;hdL+~' );
define( 'NONCE_SALT',       'H24XBL=fzdcXp_AI4YuV!%X6(zv:5f;r# <2ZpD N;.fZ9dO/#EfG;_t5X&[zD`L' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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



define( 'SURECART_ENCRYPTION_KEY', 'N,_,XF ];Ok*BLFtD)54B> @TkS=|_2-6Hs.4m9HN +f32J`7<aCL$;*%X-OSx%*' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
