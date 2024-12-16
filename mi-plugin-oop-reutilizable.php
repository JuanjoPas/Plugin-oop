<?php
/*
Plugin Name: Mi Plugin OOP
Plugin URI: http://ejemplo.com/mi-plugin-oop
Description: Un plugin de WordPress desarrollado usando Programación Orientada a Objetos.
Version: 1.0
Author: Tu Nombre
Author URI: http://ejemplo.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mi-plugin-oop
*/

// Evitar el acceso directo
if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

// Definir la ruta del directorio del plugin
if (!defined('MIPUGINOOP_PLUGIN_DIR')) {
    define('MIPUGINOOP_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// Incluir el autoloader de Composer
require_once MIPUGINOOP_PLUGIN_DIR . 'vendor/autoload.php';

// Usar clases necesarias
use MiPluginOOPReutilizable\Controllers\AdminController;
use MiPluginOOPReutilizable\Controllers\Deactivator;

// Verificar e incluir la clase Deactivator si no está cargada
if (!class_exists('MiPluginOOPReutilizable\Controllers\Deactivator')) {
    require_once MIPUGINOOP_PLUGIN_DIR . 'src/Controllers/Deactivator.php';
}

// Inicializar el plugin
function mi_plugin_oop_iniciar()
{
    if (class_exists('MiPluginOOPReutilizable\Controllers\AdminController')) {
        $admin = new AdminController();
        $admin->init();
    } else {
        error_log('AdminController no encontrado.');
    }
}

// Función para ejecutar al desactivar el plugin
function mi_plugin_oop_desactivar()
{
    if (class_exists('MiPluginOOPReutilizable\Controllers\Deactivator')) {
        $deactivator = new Deactivator();
        $deactivator->desactivar();
    } else {
        error_log('Deactivator no encontrado.');
    }
}

// Hooks
add_action('plugins_loaded', 'mi_plugin_oop_iniciar');
register_activation_hook(__FILE__, 'mi_plugin_oop_iniciar');
register_deactivation_hook(__FILE__, 'mi_plugin_oop_desactivar');
