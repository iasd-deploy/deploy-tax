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
define( 'DB_NAME', $_ENV['WP_DB_NAME'] .'_pt');

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
define('AUTH_KEY',         'v145t!RBf!n&XT$ge!FHUa_W &RD D9b$f=~+$;nC]v`]tHO94WmL6m-W/TV7eEm');
define('SECURE_AUTH_KEY',  '*++%|O}s0O 1ZEtyi63z6~S%%DZo4^ -.TIjQrELn]&JdA+37uzhWqp//c4=yy,!');
define('LOGGED_IN_KEY',    'p6^@ ho<xx#_Nkv{&14O8*bB*,!V TTNBP%[K{[EkGE4)jQ<l/KWle-f*Rq|?rrD');
define('NONCE_KEY',        'hLU_WQJvY?+>{tL)2p-O(tus:5uJ7lOOn4>#f>1MWs$bYV1g-PUwAu?f7#[+]8R[');
define('AUTH_SALT',        ';mEv))3sc$~sn-c:Lt=+}-mqp&1mMv5-0D7cQ3[$k<f^60:Bvd/A+Ea&#Sh6U O}');
define('SECURE_AUTH_SALT', 'kV4.r{a6(L16)u*OW|oUZZL$wGz<+.se=-{P%2@.]TG{_f+~f#D_^fUe`b|8kSR!');
define('LOGGED_IN_SALT',   '?K[hccA{R_dS-{|c+z=IyjW%ym*g%krNxjW:3/vE<^:2g<8N+|[A42}l[NM|gH<t');
define('NONCE_SALT',       'lY8|nOx+R%zZh#j3_r/+`4hH12cV@VxOpUJF+>?6u}>wRR0u$PFWy2uS?JZJEnN.');

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
define('WPLANG', 'pt_BR');

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

