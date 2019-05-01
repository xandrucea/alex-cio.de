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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'k37322_alexcio');

/** MySQL database username */
define('DB_USER', 'k37322_admin');

/** MySQL database password */
define('DB_PASSWORD', 'Jt9q4~7g');

/** MySQL hostname */
define('DB_HOST', '10.35.249.26:3306');

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
define('AUTH_KEY',       'h!6(Zn7ok9SILk!DJz!J&3X#(kdQ#xAPd5iExbhIp#tCv@2tlyCjoBUq06DXUV&o');
define('SECURE_AUTH_KEY',       'N)5pn#1l*VzsFq*Y^VrDdtg(KPs6q)FEwzPwfCHH8ZCDOt64)q19hOBrh(#IApCK');
define('LOGGED_IN_KEY',       'UX93VAV(x@gC^mN@4qIRZ0OVeO^Y93438ZwvbZlvvEd93C7DeVqsU&ut20qr9^dF');
define('NONCE_KEY',       'e%sCIFbFE0Fy2Jt53@RGW&w#QFZG7wV^JoL#^10bY&xd^vb2)x5IrkHr@pDpZzxZ');
define('AUTH_SALT',       'ke3VNAQUt4sshS0*7jZs3Hv)%XY%fuAsN6tpa1jWfiPxcWOAv%sdb*0D4%xGpqTB');
define('SECURE_AUTH_SALT',       'gJW()(4z9GvdRp@XJ@pVkKVX!52*aAiY9aDO8S!)^TUNjN(JrNXTlKk#IyGkMxcn');
define('LOGGED_IN_SALT',       'dAcXoAbxRCacjnCaEiSS1&UE9Q5&AJNXRZEg6N7uy7kgjKMG3b)0VB73^OEBNPB4');
define('NONCE_SALT',       'YuD3LJdgupV4rNg3Exd*z)OA6pmm9#bLSer2113di*LFA@%WC!65LeT3ojhR*c%)');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'alexciowp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
