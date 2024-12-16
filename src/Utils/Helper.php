<?php

namespace MiPluginOOPReutilizable\Utils;

/**
 * Clase Helper
 *
 * Esta clase proporciona métodos de utilidad para sanitizar y escapar datos.
 */
class Helper
{
    /**
     * Método para sanitizar un dato
     *
     * Utiliza la función de WordPress sanitize_text_field para sanitizar el dato.
     *
     * @param string $dato El dato a sanitizar
     * @return string El dato sanitizado
     */
    public static function sanitizarDato($dato)
    {
        return sanitize_text_field($dato);
    }

    /**
     * Método para escapar HTML
     *
     * Utiliza la función de WordPress esc_html para escapar el HTML.
     *
     * @param string $dato El dato a escapar
     * @return string El dato con el HTML escapado
     */
    public static function escaparHtml($dato)
    {
        return esc_html($dato);
    }
}
