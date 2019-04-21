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
define('DB_NAME', 'kopiapi_cms');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '**8u::hQ$i8Z0I^v#*1x*)F2$3Ho {I6@3/Kx1Kzy!e`W2s&T1c6%rAb8u{MBM_w');
define('SECURE_AUTH_KEY',  '-D+>j3ko3+Ja`_>.icv>[fTX B)n5|8vR]PdTUQT(y8c=NbU[K9=Th1k^{*tZO?Z');
define('LOGGED_IN_KEY',    '9SHrV%(SW7N-<Y5o/PglPX4&.t6&%Vhi_fC}64^EZ>{]BEJpnJ%dBkVzKp-@R_{N');
define('NONCE_KEY',        '{C@Y_e#3ym;i!PKz5Hi4dkR;B`b_*EQtxahW1E7BueLx!AC7._=I6TZ 1nkA|Q4D');
define('AUTH_SALT',        'NtKEUs+3pf^ylM*YXfi-uZ:L.rz)AG} >8|ioD02or@A_{,P||Uj8O_y>XB2vY9z');
define('SECURE_AUTH_SALT', '<<Jv+7lk)kvTfyUwxQ3rw9}?d)+w>$c6yDD0&`)-fkO_Qq#<oLgB1?&Dyh]ee:^a');
define('LOGGED_IN_SALT',   '[9{u|gt3NK4@2G|K=3JS!GJ##*/DtXlvX#WE=-#j(A_GDuI>ARL&%VW4bz?c{sEe');
define('NONCE_SALT',       '|(}?_+TOo}-?4ew&)pgKX4HPJyR,>6R)Z:MlyOv6 $!)u4[EJ%d=,Ir:H5/90?g8');

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
