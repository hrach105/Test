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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'task' );

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
define( 'AUTH_KEY',         '=x&1)J;_aP%x5>m.NS+Ak|}5.<8_;[+X*,h(Hel0(8GdeC[[G{A,v(=s.n0`LR_e' );
define( 'SECURE_AUTH_KEY',  'l,j>pDbo@FB 68SE)U34.JzX-[N#<~_YZGJ~~:kK.dQ7`#us6pgKHhwXoH{(@c*]' );
define( 'LOGGED_IN_KEY',    'lb-/8oct(GZ4I/2N{ufK~R1{2X1/^t64#8;W:qfJ4WN;QnV;S1n<.k(7r85#Q@R?' );
define( 'NONCE_KEY',        ']&G`^]J]X8:AU)k /HbNEo^{PC)75%+dXg4*IO/j&1zY3]tiUmI?|A7Te[oXaNot' );
define( 'AUTH_SALT',        ')- svqtC#@O2;CZ&kW:eI^qk-/W9:`^r3N>Ko41.Yol@u8nh+3<Zl<T3p6iP<I0&' );
define( 'SECURE_AUTH_SALT', '7$T?pka|gaB4jfV}4vm4+Yg].6wQ_3,]Y,=U!e`NE^V^|4*k7UbQxft<$t<DZ[hd' );
define( 'LOGGED_IN_SALT',   'mbp+n?jD3%hhc.SrK*Ik8)k-zUQ*9?>qJHc=r</?Rx(A!-zi)YRja^-1Z8!xZ=x}' );
define( 'NONCE_SALT',       'u1|-C^`Y-A.nz|V{F%INym`OY[v>bLdh^Ya8QQ3azWm;7bJEbf^Yw3GV(>>+a0/@' );

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
