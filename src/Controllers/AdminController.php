<?php

namespace MiPluginOOPReutilizable\Controllers;

use MiPluginOOPReutilizable\Traits\LoggerTrait;
use MiPluginOOPReutilizable\Controllers\MetaboxController;
use MiPluginOOPReutilizable\Controllers\ShortcodeController;
use MiPluginOOPReutilizable\Controllers\FinalMessageController;
use MiPluginOOPReutilizable\Controllers\TitleModifierController;

/**
 * Clase AdminController
 *
 * Esta clase es responsable de manejar la lógica de administración del plugin.
 * Inicializa y configura los controladores necesarios, agrega menús de administración,
 * registra opciones y maneja acciones y filtros de WordPress.
 */
class AdminController
{
    use LoggerTrait; // Utiliza el trait LoggerTrait para el registro de logs

    protected $shortcodeController;
    protected $metaboxController;
    protected $finalMessageController;
    protected $titleModifierController;

    /**
     * Constructor de la clase
     *
     * Inicializa los controladores y el logger.
     */
    public function __construct()
    {
        $this->inicializarLogger(true); // Limpia el log al iniciar
        $this->registrarLog('AdminController::__construct - Inicializando AdminController');
        $this->shortcodeController = new ShortcodeController();
        $this->metaboxController = new MetaboxController();
        $this->finalMessageController = new FinalMessageController();
        $this->titleModifierController = new TitleModifierController();
    }

    /**
     * Método para inicializar las acciones y filtros de WordPress
     *
     * Agrega acciones y filtros de WordPress, e inicializa los controladores de shortcode y metabox.
     */
    public function init()
    {
        $this->registrarLog('AdminController::init - Agregando acciones y filtros de WordPress');

        // Agrega acciones y filtros de WordPress
        add_action('admin_menu', [$this, 'agregarMenu']);
        add_action('the_content', [$this->finalMessageController, 'agregarMensajeFinal']);
        add_filter('the_title', [$this->titleModifierController, 'modificarTitulo'], 10, 2);

        // Inicializar el Shortcode y Metabox
        $this->registrarLog('AdminController::init - Inicializando ShortcodeController');
        $this->shortcodeController->init();

        $this->registrarLog('AdminController::init - Inicializando MetaboxController');
        $this->metaboxController->init();

        // Registrar opciones
        add_action('admin_init', [$this->finalMessageController, 'registrarOpciones']);
        add_action('admin_init', [$this->titleModifierController, 'registrarOpciones']);
    }

    /**
     * Método para configurar el menú de administración
     *
     * @return array Configuración del menú de administración
     */
    private function configurarMenu()
    {
        return [
            'title' => 'Mi Plugin', // Título del menú
            'capability' => 'manage_options', // Capacidad requerida para ver el menú
            'slug' => 'mi-plugin', // Slug del menú
            'callback' => [$this, 'mostrarPaginaAdmin'], // Callback para mostrar la página de administración
        ];
    }

    /**
     * Método para agregar el menú de administración
     */
    public function agregarMenu()
    {
        $this->registrarLog('AdminController::agregarMenu - Agregando página de menú en la administración');

        $menu = $this->configurarMenu();
        add_menu_page($menu['title'], $menu['title'], $menu['capability'], $menu['slug'], $menu['callback']);
    }

    /**
     * Método para mostrar la página de administración
     */
    public function mostrarPaginaAdmin()
    {
        $this->registrarLog('AdminController::mostrarPaginaAdmin - Mostrando contenido de la página de administración');
?>
        <div class="wrap">
            <h1>Mi Plugin OOP Reutilizable</h1>
            <p>Este es un plugin desarrollado usando Programación Orientada a Objetos.</p>
            <form method="post" action="options.php">
                <?php
                settings_fields('mi_plugin_opciones');
                do_settings_sections('mi_plugin');
                submit_button();
                ?>
            </form>
        </div>
<?php
    }
}
