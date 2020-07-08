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
define( 'DB_NAME', 'sie2lt_du' );

/** MySQL database username */
define( 'DB_USER', 'sie2lt_du' );

/** MySQL database password */
define( 'DB_PASSWORD', 'nhGC62WJj3xAyg9H' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'xSR2p!bo7~>Vli[/r*uFg/XhO`]K<bPS.<J(PsS+?Vwbb_8ER)rJ_Zky>4~Tu^:Q' );
define( 'SECURE_AUTH_KEY',  '&A:c-m1#?1yzN`yl_^*-C48IWjHWR$|{tgKRU+O=$nPTd]n777h@<a[Pz$c3K&d;' );
define( 'LOGGED_IN_KEY',    '0W/PmSx;Fe|=:qg-@$N*kO0R)So<Viv^>Lq`dg#S}EmmOXw5X_ji`GSb_&9jkLr|' );
define( 'NONCE_KEY',        ')^U,kG Nb`@he,qc,TL92j9bD~C:X@pJ}Xg=-#|#Eu~exigGbJC64vK(wUe(wxTc' );
define( 'AUTH_SALT',        'o) CD xcAT`|{0lKiLymG(vj o(HF}^eFq98G)NsjjEt#J#MuYc{!<p)@EQG~ng)' );
define( 'SECURE_AUTH_SALT', 'Y$rRDy}z#jE(<pQMhXJL8Ro)-1:x!)/iMs.-]dWyI-W6 `4d=H0!QBMh)55v(DbY' );
define( 'LOGGED_IN_SALT',   '=RB14,Q2=aE~bgxT}yj7$N3/jBZrRa9$0(T)zA5osE/H THA[P?%k`9U,%&fS^hC' );
define( 'NONCE_SALT',       '==VQA<z%WMr}aD=FT48Q|<1<lL})Tpb@I7NXQrH$N2ws6$V[xlJQ57Y/Mx7cB;DD' );

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
