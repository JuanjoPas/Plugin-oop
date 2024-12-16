<?php

namespace MiPluginOOPReutilizable\Controllers;

use MiPluginOOPReutilizable\Traits\LoggerTrait;

/**
 * Clase TitleModifierController
 *
 * Esta clase es responsable de manejar la lógica relacionada con la modificación del título del contenido.
 */
class TitleModifierController
{
    use LoggerTrait; // Utiliza el trait LoggerTrait para el registro de logs

    /**
     * Método para registrar las opciones de configuración
     *
     * Registra las opciones de configuración de la modificación del título.
     */
    public function registrarOpciones()
    {
        // Registra la opción 'mi_plugin_modificar_titulo'
        register_setting('mi_plugin_opciones', 'mi_plugin_modificar_titulo');

        // Añade una sección de configuración
        add_settings_section(
            'mi_plugin_seccion_modificar_titulo', // ID de la sección
            'Configuración de Modificación del Título', // Título de la sección
            null, // Callback para mostrar la descripción de la sección
            'mi_plugin' // Página donde se mostrará la sección
        );

        // Añade un campo de configuración
        add_settings_field(
            'mi_plugin_modificar_titulo', // ID del campo
            'Modificar Título del Contenido', // Título del campo
            [$this, 'campoModificarTitulo'], // Callback para mostrar el campo
            'mi_plugin', // Página donde se mostrará el campo
            'mi_plugin_seccion_modificar_titulo' // Sección donde se mostrará el campo
        );
    }

    /**
     * Método para mostrar el campo de modificar título
     *
     * Muestra un checkbox para activar o desactivar la modificación del título del contenido.
     */
    public function campoModificarTitulo()
    {
        // Recupera el valor actual de la opción
        $opcion = get_option('mi_plugin_modificar_titulo');
?>
        <input type="checkbox" name="mi_plugin_modificar_titulo" value="1" <?php checked(1, $opcion, true); ?> />
        <label for="mi_plugin_modificar_titulo">Marque esta casilla para modificar el título del contenido.</label>
<?php
    }

    /**
     * Método para modificar el título del contenido
     *
     * @param string $title Título original
     * @param int $id ID del contenido
     * @return string Título modificado
     */
    public function modificarTitulo($title, $id)
    {
        $this->registrarLog('TitleModifierController::modificarTitulo - Modificando el título del contenido');
        $opcion_modificar_titulo = get_option('mi_plugin_modificar_titulo');
        if ($opcion_modificar_titulo) {
            return sanitize_text_field($title . ' - Modificado por Mi Plugin');
        }
        return $title;
    }
}
