<?php
/************************************************************************************************
 * FLAM Player SETTINGS - Basic Databse / User / Password configuration                         *
 * Copyright (C) 2005 - DualBase Design s.e.n.c.                                                *
 ************************************************************************************************
 * Author:  DualBase Design                                                                     *
 * Email:   info@dualbase.com                                                                   *
 * Website: http://www.dualbase.com                                                             *
 * Support: http://www.dualbase.com/forum                                                       *
 ************************************************************************************************
 * FLAM Player is not Open Source, FLA and PHP codes are copyrighted and cannot be sold         *
 *                                                                                              *
 * YOU CAN :                                                                                    *
 * - Install FLAM Player where you want, for personal or commercial use                         *
 *   (The FLAM Player footer with links must stay visible)                                      *
 *                                                                                              *
 * YOU CANNOT :                                                                                 *
 * - Sell FLAM Player or any portion of it, as a product or a service                           *
 * - Copy / Modify / Rename / Decompile SWF / Redistribute FLAM Player's files wihout           *
 *   prior authorisation of Dualbase s.e.n.c.                                                   *
 * - Use FLAM Player to broadcast illegal MP3 files                                             *
 ************************************************************************************************/

//----------------------------------------------------------------------------------------------------------------------------
// MySQL Connection parameters for FLAM Player
//----------------------------------------------------------------------------------------------------------------------------
# Type="MYSQL"
# HTTP="true"

// REQUIRED !!!
// Enter here the setting for your MySQL Database connection : Hostname / Database name / Username / Password
// OBLIGATOIRE !!!
// Entrez ici les param�tres pour la connexion � la base de donn�es MySQL : Nom d'h�te / Nom de la base / Utilisateur / Mot de passe

$hostname_fp_mysql = "localhost";
$database_fp_mysql = "diviner_Register";
$username_fp_mysql = "diviner_Gofishus";
$password_fp_mysql = "quest";

//----------------------------------------------------------------------------------------------------------------------------
// FLAM Player Admin settings
//----------------------------------------------------------------------------------------------------------------------------
// REQUIRED !!!
// Enter here the Username / Password / Language for the FLAM Player Administration
// OBLIGATOIRE !!!
// Entrez ici les Nom d'utilisateur / Mot de passe / Langue pour l'administration de FLAM Player

// Enter here "yes" or "no" to enable / disable login - Entrez ici "yes" ou "no" pour activer / d�sactiver l'authentification
$login_enable = "yes";
// Choose user / password - Choisissez un nom d'utilisateur / mot de passe
$admin_user = "Gofishus";
$admin_pass = "quest";
// Language can only be "fr" or "en" - La langue ne peut �tre que "fr" ou "en"
$admin_default_lang = "en";
// Demo mode ("yes" / "no"), enable or disable limited version - Mode d�mo ("yes" / "no"), active ou d�sactive une version brid�e
$demo_mode = "no";

//----------------------------------------------------------------------------------------------------------------------------
// FLAM Player table names
//----------------------------------------------------------------------------------------------------------------------------
// OPTIONAL
// These are the two tables that will be created in your database, you can change their names
// FACULTATIF
// Ce sont les deux tables qui seront cr��es dans votre base de donn�es, vous pouvez changer leurs noms

// Musics table name / Nom de la table des musiques
$fp_musics_table = "Music";
// Artists table name / Nom de la table des artistes
$fp_artists_table = "Artists";

?>
