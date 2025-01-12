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
define('DB_NAME', 'abedul_new');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'dKnL0 [#( 68ax`:3(,*Ms.v)?4l~!|Rm:FLQa:&aH~U68~t!KR#`G{Bq;]:blz5');
define('SECURE_AUTH_KEY',  '+!Z)kC}s5pN!O1<cgf;_A^z[ae/PT4i!m^?Sa.lL(`|*v7>y2EhI,A@n<nH)Jd$%');
define('LOGGED_IN_KEY',    '$Ib]DgCc!r(W2&gz=`_6okWa?3rbGy!%7L!rqVo>_,D!rsJiwj,uu-PDS5QL3[fT');
define('NONCE_KEY',        'kHl/U_Vy=:[J/ >h.Ap3CojSy8B>4DWK_~lQn<@-KE4Z_/XV`.Z;-NmIeDef/;<P');
define('AUTH_SALT',        'a5b?K67ExdT<kNjK!&d&PQ{/30to4__rsu)GXQ rez5:AzyQsRQ<Smq$I6)DuU0y');
define('SECURE_AUTH_SALT', '5$W4B1,T.X^;x})]3Fk*+m@.kQcY^H] 1Y!Ie_|RQVRbk*@7qbG8q~5x)}D}%!t@');
define('LOGGED_IN_SALT',   'RXBAixZc|<M~1Yu5Sq@XvLoA}+~=<n6H~nP0;ESYb+.>G@(/Y3F9:^iIim|{F#o(');
define('NONCE_SALT',       'Qv:ZG,D7)VfO#j5=HmMb?}8Iqd55S_W>$AqR9akfiiuvu]-V<L *R8a=Gh.!+M-n');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
