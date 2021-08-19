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
define( 'DB_NAME', $_ENV['WP_DB_NAME'] .'_es');

/** MySQL database username */
define( 'DB_USER', $_ENV['WP_DB_USER']);

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['WP_DB_PASSWORD']);

/** MySQL hostname */
define( 'DB_HOST', $_ENV['WP_DB_HOST']);

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('SITE', 'tax');

define( 'AS3CF_SETTINGS', serialize( array(
    'provider' => 'aws',
    'access-key-id' => $_ENV['WP_S3_ACCESS_KEY'],
    'secret-access-key' => $_ENV['WP_S3_SECRET_KEY'],
	'bucket' => $_ENV['WP_S3_BUCKET']
) ) );

define('FORCE_SSL', true);
define('FORCE_SSL_ADMIN',true);
$_SERVER['HTTPS']='on';

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Oy9HDVPoM-DB`}T-aC+<Yx%QjwM`RS@Mf/wtj<T,P|u5OZ<=hf *A`mgNO7]j[DP');
define('SECURE_AUTH_KEY',  '1add~F<&`JCt+{/!mJ7](1Z#E*^WXX|>s$ozW?UUNP v;s-|.dQh9c4eQ+:{{KI?');
define('LOGGED_IN_KEY',    'e+:|>cZ<AdLlQ/sPX6{ZWAPPl-&#x+sUU-Cf|`/:t|gV+}v6NKlZt^57A`#s%<Eh');
define('NONCE_KEY',        '%`=^D3R,9&T)aPH]?okm<|(:u|A[l_rB<;xJ+;[fjp(L_fwD^%uMC2G?Fk%<tyq~');
define('AUTH_SALT',        ';dgS.mKO$AbC GJ).%d`3gJc4)b+B_>PoODXtv3D;^h+;lyH(q71s%L1C5pHKnCc');
define('SECURE_AUTH_SALT', 'LE(+/A[yb;U3Dxv7+Kj3Uqjx+*v}k&?Dop**anUKJ(.Q#bo+g3+*D[,#Y$oVyb5c');
define('LOGGED_IN_SALT',   'I4NNsGE4A:iBo>E9Pr^iT[7u-1]7`^=</GwMRB-q[Q;u+?YR($fhEb+LRjsvIC+E');
define('NONCE_SALT',       'bfDVH=p5i%48y8<0;Kr3]PBJn|]v|6~9>)&jA59sK^B2^vf&4*Ni^4nWXP#BaX+S');

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
define('WPLANG', 'es_ES');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

//The entry below were created by iThemes Security to disable the file editor
define( 'DISALLOW_FILE_EDIT', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
