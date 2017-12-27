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
define('DB_NAME', 'cmp_local');

/** MySQL database username */
define('DB_USER', 'cmp_db_user');

/** MySQL database password */
define('DB_PASSWORD', 'cmp_db_password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}kOff0XT;66`CG@Iw83iDc-naJ%sJ;dHAP:)4oxEyxA$mjt@ 4Az&za-I0@?A(R?');
define('SECURE_AUTH_KEY',  'R(i5U$&eF1W5>c6^5b#VHgUgCXKy,I$)U~^[[ep6TS17=Eg)d&n{91Vl)YtDo_Kd');
define('LOGGED_IN_KEY',    'D=}5O`wTEVtmgd?:?[zAsNRHkgb?r<t/5TL**?f#OyYwB&>Xof4wTg{5m.X{m_+u');
define('NONCE_KEY',        '%>T`4/d HjI8`E;v 4RPKz10:)/1|ywiKa2.Qcz>D_/hRafeTKR%)7v>w7@_!onZ');
define('AUTH_SALT',        'yC>3}p%gS#U<d-Q 7IA RsHU~h QZ2>cG@`fsg|B?2ufThAX@0C.08xQg51&0l83');
define('SECURE_AUTH_SALT', '4uwt2Cs(;E[JDnLA2vERB^D~_CpxzcExQ54nECeD9Eb2?/iFBuOm=:PQ7{HP_P?A');
define('LOGGED_IN_SALT',   '1|sl7wo8>3j#0BqdAE*G7v{y>=m-qSS>[qFD/82I=tNv*G>e3[RtF-Ku<dj qQ5>');
define('NONCE_SALT',       'VB#A2LYdG&>bdPZ<nfj+*LHUV5DxrR:eX}yUzULp<6vwIHWtW<jqeVwH_ZbgnyGx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
