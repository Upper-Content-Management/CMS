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
define('DB_NAME', 'wp_canberra');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'd{#N 9ao56#&Q[%uWDIg[RC#CG~V3F%W}jy(Ur8GP$Tj*!:P3$F`W8%K;;F/?xJ$');
define('SECURE_AUTH_KEY',  'G_og%IQ1ecvV[]C0O^:M`65j?MHqDMDj=ZF<{-~H7$Wmtg!KkZ,kH_N_~XAr69~7');
define('LOGGED_IN_KEY',    '3`]Sq&lb$e,EVpR}iy0[2uI%MkEQ98jX q|fT5.F^FQv*rQVf{-?)F1iuX0~+L# ');
define('NONCE_KEY',        'ObhHE1}A*.Ke;sHZd-#s+8~_@(Sz&UYbJD?;K}Y{!UJE!u+pWO,x)#HurY7sVTwL');
define('AUTH_SALT',        'Qzf5I&m^{amFuZD4pmkgH`[U>b?d)nxN=r4m).|Q^xdafy7kZcL*dCwJBTtqiF|#');
define('SECURE_AUTH_SALT', '5oJ*8RalGpI,m?Fd/q$d)WO?{]HC*07Wogj%;C#Rl!LI(F_nrzunMBfqk9MN-[d0');
define('LOGGED_IN_SALT',   '=L%L8ey/{ua[o:mysuEMD^T]rcDUk(o$y:s}KUlHT%g&0H(jILl]e.M~De{a/[_>');
define('NONCE_SALT',       '<RfFOmjTaUV_Dw%CF8oI(<`?!`.Ob$Ykf$s5JoqK/<:**.~;(PnLKyeSF=SYlT]>');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
