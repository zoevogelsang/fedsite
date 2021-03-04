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
define( 'DB_NAME', 'wordpress_test_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*[xMf-tCOyAQ{QF(tX@^QMd.NCX>_#7q%>&3oc@oWu}KD41N }G&=|xNKvpAiu d' );
define( 'SECURE_AUTH_KEY',  'cwg!U(/+7c,0.k]@Hy@h6[:;>:EKgaaC6+Ye+8^hNE/|Au[@oMCoM;4a6V9:=Y$W' );
define( 'LOGGED_IN_KEY',    'fhHAX4[jM`]t8?tf6&202F8{&4zJ$Rp6G)a;;2H;F[N8fg( *2-^zo*PI*,AZDQ;' );
define( 'NONCE_KEY',        '<QO2Vw^,waSpIvD+Fv!{U%(wE-~MA/Bh[3TqQX9^J>GUrRAiK03YtrBR[+dHryiI' );
define( 'AUTH_SALT',        'UVQl!NZcDy#fK2|l:R%=TFH60d8YP&gyhQjelog:KdHKr+S9n~/d+Fgb7UG/E>(I' );
define( 'SECURE_AUTH_SALT', '7NNS%Lp%g^6P;;,uS!.#4eE:=8[qo=TT|B/FS`QEx<S|e5S16@*,<aegIVQe/lPb' );
define( 'LOGGED_IN_SALT',   '{c,t!KO]:]V>!w6QY%zqX3yfVDU|lURzY5kNnQVM8;sS^~5V/K48Q-pnLXABG?7n' );
define( 'NONCE_SALT',       '3$X5;T RO>$V,42?7a_ypY_Tg`[Q=o3s.HK#[MLq[c9e:hqRgbSvW:}[c%y{iEvB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
