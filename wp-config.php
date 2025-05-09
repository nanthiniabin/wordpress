<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '4;V{m9T!&Zy{05s9r9lJd)D{pg0OT.sqg?:m(?xXM9&vu2U-A[aagN(4Ag!~5iWm' );
define( 'SECURE_AUTH_KEY',  'd0p@D5n=:%+4NMuG1GFn5Oc`/P[_VL{Iq?DSQtao{$NLw@A-U?#Ak$&_#7bELHhG' );
define( 'LOGGED_IN_KEY',    '^:|.>m@v:1!(_p9{?a}C~O_oAHwPvr~9]sU7U*M`<T2voM#_qUFdZ~*|o5*Z:QmH' );
define( 'NONCE_KEY',        'wdTg 0T<:A|T5^Lt)S.Z(~&HyEF{PzUW.,*y];SnNL,+8+c!d9DMCttQmE;V}5J~' );
define( 'AUTH_SALT',        'l9ZQsoLU@Ct2JgrDROR76<yJhzQiQL4s.mC`.X>t-8t[M$l_Irx`.)$!Ye/ =kOB' );
define( 'SECURE_AUTH_SALT', 'sPPGN~CQ4GCV .3W{yI;AvZ_x:o*4J/>EyUSYo[:`uWzGnJ.Prq!Hf6p]TuQ3GN9' );
define( 'LOGGED_IN_SALT',   '5XRv?J4(k$iDtr@eV3:/qPJg{A:jZ,^SC mSS#J XxH-I&if[*@zt?</ajGW$s46' );
define( 'NONCE_SALT',       '^&,o6~FxnS^^.Kk5i[s3G_vW=7rY(g{)Xav${%dGCn3fE=YDW{ff%quZ(ce4,0zH' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
