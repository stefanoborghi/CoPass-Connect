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
define('DB_NAME', 'ccdb');

/** MySQL database username */
define('DB_USER', 'ccdb');

/** MySQL database password */
define('DB_PASSWORD', 'ccdb');

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
define('AUTH_KEY',         ';,V0(%mgKHU.vhUBhDVrc~ 9@6E#kP!RpaP[Y/uG~Ovn@+xaA?%f[qbsy4=J{[uh');
define('SECURE_AUTH_KEY',  '~&[{9CV$C)cfIX[J@TzL!2UMs+ ,*!Q]!YzPhnTaV@{A,~@D0 8FWyJ-MBC@jS7i');
define('LOGGED_IN_KEY',    'TkO2@i]}#O+vznvE*D#Gn^A01WEDS(FYAm+cjWi(R|Rf:SY0&4>{b^1uC}[C.28p');
define('NONCE_KEY',        '+FH)GkEpoR{X|N~Q-d-34rU1{P0(#oN!7 Ej<hB6Cuaf46f9_0i-vXw=~Y6unLh:');
define('AUTH_SALT',        'rj5<1mh$SL~Ju@Mu#AQ@s%538$z8;g}lmu5MC&&d-i_o4:VP)e>k,9U@[(? Z#J{');
define('SECURE_AUTH_SALT', ':c@huAVpVttm4[j+:k~d^UQ9u(g/,a^9Wy~))tiB(,L`.D#5mT>/QCsLuN`Q^bMO');
define('LOGGED_IN_SALT',   '~Me%,DoQBL+Q|<xiCOcjOY1`y@XpA.b7oL&o{a)b)vNYLUd;^DN@PixKvY{Gdx}-');
define('NONCE_SALT',       'I.W=-Re]jD;Ft>Y&q7&t3cet63-2miigK@b G$Xw$?Mn%<WKsE6~}vralRVtmES+');

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
