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
define('DB_NAME', 'csc');

/** MySQL database username */
define('DB_USER', 'wpuser');

/** MySQL database password */
define('DB_PASSWORD', 'Manioc224');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '~^v.-WM~WPQ^*`Ro6)L--239y:ufAgGk9#]j;#gR!|9_srQkk63;:dWI1+q]deU~');
define('SECURE_AUTH_KEY',  '/LcjI+uv,m!:Ttw>ttq~ckjj|VRJUh}5%JX$E0&|DNG+2O,S@()y?*h}k0+Zoqyx');
define('LOGGED_IN_KEY',    'BkTru}iyoM;qaT(Wzp}zHtk{4lCI|[Eg*{{Zmf7#-}E9?kPvdZ/Wz01}wXKwg7 I');
define('NONCE_KEY',        'o4|V>aOmV76^O-}orSV*%rvpWi@.Qe02|C.0+1O0ZF/$:Tn(a[*=TXL+_%eOk381');
define('AUTH_SALT',        '>+JFZce2WXkJM%=GeF<Gsg;]Gd`(Dp(iye}}?S`,|zokn^!{?YYSys$`eX@KO[9$');
define('SECURE_AUTH_SALT', 'b-i}+4JI?|gc)CO7@ij7B&SVZC.=Td`cnr(AX{2C)u*{y/t?MsQ.)ZI0UP{0TFOR');
define('LOGGED_IN_SALT',   'zNFR%1y!SZM~t;++lP8es4Nszx[Q9@kZbG.+R|m@z0HqKo|<OwONgcV}Z .0d|WN');
define('NONCE_SALT',       'lJ% 5z{AhIgHM;ivT&v{|O7ZGL=zNA4E;Ld,2LB=]|7<]~iD|W_s)U-8W&j|;6O}');

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

define('FS_METHOD', 'direct');
