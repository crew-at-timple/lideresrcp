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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '3E};5#`eN0i%}]Vl:<Tc>&(^+zC:AR8%!0rEKUK*H&FdLK}`5Mm*N&Vd(l[=z[D*' );
define( 'SECURE_AUTH_KEY',   ')SxsNFp$_Vxo$eodeLPMHw$2zQ<]FDUn}U4X<-5yu35=R!AP7}vSdLC/^!`Y{^:#' );
define( 'LOGGED_IN_KEY',     'vu&@WYGL;M#UC6}dEa b.jf,B-YdYMWxAe@&FES%WW2Kk;+<KGzU.Tf/~4Wo&T8_' );
define( 'NONCE_KEY',         'a85s ;jpYJ`?UVh]q]NkEJFtTdl*nu`RPVEe,uv1G_AFZCQ;I!O@:YrjG@KSx=[|' );
define( 'AUTH_SALT',         '>,?wvelb}j_fM/d%r$e.#;p<t/iS2vnr:;!x!ji/;;o38h.#HhH]#ucf~x;~s9wW' );
define( 'SECURE_AUTH_SALT',  '5< J&x!+-@x0hWy^$*-!v>KH!fK|k^O?%J&{Hd7jN!xdbqs!ngw!{h6Y]@b,Y`:7' );
define( 'LOGGED_IN_SALT',    'L>FqyUGM#YZ,.PyO*=_vB:=Q%/N7mV/=r-]LIO{ad0QuAsr!177(sjIaP)y:0U^n' );
define( 'NONCE_SALT',        'kzKlsTKzSY{5&6fvxJZ2.(64enx>xZry=Lf8`$?oSfQaWHx[c<R>ep?t(IDf<ykI' );
define( 'WP_CACHE_KEY_SALT', 'y]82G1N3hvtgR`VONb#CrkT<81/<f+PjDe/7{/HFsA<Ul5= Tv!]1wtG1m)XodG}' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
