<?php

namespace MiPluginOOPReutilizable\Controllers;

use MiPluginOOPReutilizable\Utils\Helper;

/**
 * Clase ShortcodeController
 *
 * Esta clase es responsable de manejar la lógica de los shortcodes del plugin.
 * Inicializa los shortcodes y define su comportamiento.
 */
class ShortcodeController
{
    /**
     * Método para inicializar el shortcode
     *
     * Añade el shortcode 'bienvenida' y lo asocia al método 'shortcodeBienvenida'.
     */
    public function init()
    {
        // Añadir el shortcode 'bienvenida' y asociarlo al método 'shortcodeBienvenida'
        add_shortcode('bienvenida', [$this, 'shortcodeBienvenida']);
    }

    /**
     * Método para manejar el shortcode 'bienvenida'
     *
     * Define el comportamiento del shortcode 'bienvenida'.
     *
     * @param array $atts Atributos del shortcode
     * @return string Contenido generado por el shortcode
     */
    public function shortcodeBienvenida($atts)
    {
        // Atributos por defecto
        $atts = shortcode_atts(
            array(
                'nombre' => 'Visitante', // Valor por defecto para el atributo 'nombre'
            ),
            $atts,
            'bienvenida'
        );

        // Sanitizar el atributo 'nombre'
        $nombre = Helper::sanitizarDato($atts['nombre']);

        // Retornar el mensaje de bienvenida, escapando el HTML para seguridad
        return '<div class="bienvenida">¡Bienvenido, ' . Helper::escaparHtml($nombre) . '! 😊</div>';
    }
}
