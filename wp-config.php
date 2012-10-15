<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '`Xc[s2+enX+ec=UV_rrX*kY2Ci]cA/2:$}YY7 ,m~Rp5e^t0q&_H6ke~GFJlPV-Q');
define('SECURE_AUTH_KEY',  '4&Ucs@,V^I[%`Z(zF=}h8Ikc.V0d*/reoz`&EH!1Z?fb=Q$y=Sm4K# .aR=Y-xEu');
define('LOGGED_IN_KEY',    'YK%:zfU(4(d,,m+BGU844fP2Cq9$:;J7Iq/U#V}9~;s7hpU8 g,u2LvL. ;XNY/<');
define('NONCE_KEY',        'C}yrFp.HG$W:iU*Ju`<m>~4SZv{` c+?XpGd3YmK^*%}o-/VDocyNWCwhs_@bw3,');
define('AUTH_SALT',        'Q+h0luPmW:=eOmNB8I?fTzQ8:#~NY0ozBukQMZYZ^8(Q?)qm;Ws+]g,.Eia<*9KG');
define('SECURE_AUTH_SALT', '>D#~d]w?zhRKgL*n]j5S:|o2s60o5SE}8hL,ByF ?YgM2>rA*@KibEBD_<MBPR0s');
define('LOGGED_IN_SALT',   'aH=Ua,NFdIZ+{gf;mj:sZqF#eC(*NUbV1_A @u]nK#T8]*vYMpLp$9A)GO{#189U');
define('NONCE_SALT',       ']Mw5uEbHG+#p%zT,Q1MNnuGBu#n;=c}{+V3ZSKf)};P;2>JU_f5xRV79;pd~8oZT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
