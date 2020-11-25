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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'database' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%<$tURSr8>>3iio|NZl3@$833MyGlOl;omCGFT.^QfMzf&bipNyD$}^yf~JFW4l`' );
define( 'SECURE_AUTH_KEY',  'w`2qL9P;_~$CS[!~E18jh)Fh[SmK=1u)_LpSAxPWpoNg<GRWL;5vR6(ApBdeFhCY' );
define( 'LOGGED_IN_KEY',    '(^$_>!]u!hxaq}|(Mo%m|/kRJi>=?G!E0N{c/4D[_qYzK-%/XNo O[{DM!BW;m%t' );
define( 'NONCE_KEY',        '#6yv(7ht*{J!qi=xXwMk.kS8m8F7SAtY%`#5GI,.C1$|4y8|aa]Vl[@`{0wrj9mQ' );
define( 'AUTH_SALT',        'a7cmi90K0985}&1-7:8 Yl|W~i{jv04+x5kE|]*ZNVvge)OknXG`KFHotD_-1)w<' );
define( 'SECURE_AUTH_SALT', 'BJV0cL./3yh0c7os%Ub m[~JaS^kW8xeq?Bn#^YDXUxdcM@`sbeATM{*dlbd9X-@' );
define( 'LOGGED_IN_SALT',   '#I%]x5s=jId9,tvu5n[;-SKo.H*JU86O97R2B69tDME0IK:G8vy,xj;^*o4xgdGb' );
define( 'NONCE_SALT',       'cRG(XD+pA;Xs8vT@g?pV1RzR^<Zm[rgU.+@RBd{4zsmPnu8s3}+B3,0Vm6Z$LFeJ' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
