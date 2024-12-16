<?php

namespace MiPluginOOPReutilizable\Controllers;

use MiPluginOOPReutilizable\Traits\LoggerTrait;

/**
 * Clase FinalMessageController
 *
 * Esta clase es responsable de manejar la lógica relacionada con el mensaje final del contenido.
 */
class FinalMessageController
{
    use LoggerTrait; // Utiliza el trait LoggerTrait para el registro de logs

    /**
     * Método para registrar las opciones de configuración
     *
     * Registra las opciones de configuración del mensaje final.
     */
    public function registrarOpciones()
    {
        // Registra la opción 'mi_plugin_opcion_activada'
        register_setting('mi_plugin_opciones', 'mi_plugin_opcion_activada');

        // Añade una sección de configuración
        add_settings_section(
            'mi_plugin_seccion_mensaje_final', // ID de la sección
            'Configuración del Mensaje Final', // Título de la sección
            null, // Callback para mostrar la descripción de la sección
            'mi_plugin' // Página donde se mostrará la sección
        );

        // Añade un campo de configuración
        add_settings_field(
            'mi_plugin_opcion_activada', // ID del campo
            'Activar Mensaje de Agradecimiento', // Título del campo
            [$this, 'campoOpcionActivada'], // Callback para mostrar el campo
            'mi_plugin', // Página donde se mostrará el campo
            'mi_plugin_seccion_mensaje_final' // Sección donde se mostrará el campo
        );
    }

    /**
     * Método para mostrar el campo de opción activada
     *
     * Muestra un checkbox para activar o desactivar una opción del plugin.
     */
    public function campoOpcionActivada()
    {
        // Recupera el valor actual de la opción
        $opcion = get_option('mi_plugin_opcion_activada');
?>
        <input type="checkbox" name="mi_plugin_opcion_activada" value="1" <?php checked(1, $opcion, true); ?> />
        <label for="mi_plugin_opcion_activada">Marque esta casilla para activar el mensaje de agradecimiento al final de cada publicación.</label>
<?php
    }

    /**
     * Método para agregar un mensaje al final del contenido
     *
     * @param string $content Contenido original
     * @return string Contenido modificado
     */
    public function agregarMensajeFinal($content)
    {
        $this->registrarLog('FinalMessageController::agregarMensajeFinal - Agregando mensaje al final del contenido');
        $opcion_activada = get_option('mi_plugin_opcion_activada');
        if ($opcion_activada) {
            $mensaje = 'Gracias por leer este artículo.';
            return $content . '<p>' . esc_html($mensaje) . '</p>';
        }
        return $content;
    }
}
