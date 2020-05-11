<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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

define( 'DB_NAME', 'huyhuynhcrm' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mKP0l<=j~=}1?uE6R56.=3E@dV4SgZ');

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-az@y%$/+REz{8&|#[B7|c,A4MxF_-k,j`Gy0%Pz8 }C-sl|K4]TFd7J9!2&fVrc');
define('SECURE_AUTH_KEY',  'VD/Pa ||WQNpHP|lwN>)(Im<*@kXi(DBTk0tXN}9F8PJr:`44lW1xw|Y{-+}>><%');
define('LOGGED_IN_KEY',    'biD/Fm-G}=2^K+_Xeq#ZIj/20{RU=vM{aK!JR-19`XG8?v]sY|_8/+,}^<m0-SIT');
define('NONCE_KEY',        'u]~ZV2m.N;H-f?Z{:)7G;d yfjv%%Y4Q#k#}6+lgaMq4()Slqf-<]bO]vURQxp t');
define('AUTH_SALT',        'M#Q^iY3*p-t]jqe)x#^4 xw#H?zptX@0-eP}SB_Tz+o:&`|:^,[|5K#1,MdHb:[S');
define('SECURE_AUTH_SALT', 's_=*|tPM>3Bo6Z {~aj-sDp@9+oVb3a#pW<&RZY7)36m u$.%r%v-.9~Bd:BmiRV');
define('LOGGED_IN_SALT',   'k#/~JvV|kpp6K`.FPdFCP,prkX3Kemo&j3(ulSN,C^w0BHSd+j,^!5{S3d{Uu~B_');
define('NONCE_SALT',       ']^)B:]MW);}mi]%L:.+K8exTSBw*H:#m/O]6-8B9-ne8th[LQjhK>>n)vg%lt3e<');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
