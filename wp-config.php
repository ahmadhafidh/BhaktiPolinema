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
define( 'DB_NAME', 'bhaktipolinema' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'mHsx$+*ESwunyMp1L?@jB:!ap;QTL!opJt$I#:whn=Pz$&px)(k@eNQT=kWI-BMX' );
define( 'SECURE_AUTH_KEY',  ')7-rc1mIayW6w=p4WO+{&i)D7;!XjFJN]cy@,M#gcKItte7r]zjC-T-0UGo3UmJs' );
define( 'LOGGED_IN_KEY',    ')-tHDYIpw4_dT?Lpi7:?{Y`)xFOd<f1[k6_94T&! .A@oL2w8xC&]T+}?9YHL8;A' );
define( 'NONCE_KEY',        'Z~y+i^8bQ*WR!FUkmbF`o-@3HB1#N^_*lXq5G?rx@/5J%p@fO2_J{@cs-4Ozjf<U' );
define( 'AUTH_SALT',        'AQ3?{8gB9]e}CBQ&D3Ux1:9?x3LM/9&UiFk3^:<qg6L|&z*.OO^5b^pwy-OciIA)' );
define( 'SECURE_AUTH_SALT', 'qjN}q.9Ws^(VFD59.y~Nl,dHC*IAER=p][bB!dFc=]WIb8{K0jTc1*enuSvFoC;,' );
define( 'LOGGED_IN_SALT',   '>-FW~Hr{VShAKRn*p_X!5ACujI0$d=gA![qWD{{qd|L22@lV**$z^=etsiTex9}:' );
define( 'NONCE_SALT',       'kfI0{.liDgFOTIvGlv%}+=g]:|9% H{DcJCh`35-TT+jN/{[pnK96ONK[i;OjH#;' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
