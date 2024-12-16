<?php

namespace MiPluginOOPReutilizable\Controllers;

use MiPluginOOPReutilizable\Utils\Helper;

/**
 * Clase MetaboxController
 *
 * Esta clase es responsable de manejar la lógica de los metaboxes del plugin.
 * Inicializa las acciones de WordPress para agregar y guardar metaboxes.
 */
class MetaboxController
{
    /**
     * Método para inicializar las acciones de WordPress
     *
     * Añade las acciones necesarias para agregar y guardar metaboxes.
     */
    public function init()
    {
        // Añadir la acción para agregar metaboxes
        add_action('add_meta_boxes', [$this, 'agregarMetabox']);
        // Añadir la acción para guardar los datos del metabox
        add_action('save_post', [$this, 'guardarMetabox']);
    }

    /**
     * Método para agregar el metabox
     *
     * Define y añade un metabox a la pantalla de edición de publicaciones.
     */
    public function agregarMetabox()
    {
        add_meta_box(
            'mi_metabox', // ID del metabox
            'Información Adicional', // Título del metabox
            [$this, 'mostrarMetabox'], // Callback para mostrar el contenido del metabox
            'post', // Pantalla donde se mostrará el metabox
            'normal', // Contexto donde se mostrará el metabox
            'high' // Prioridad del metabox
        );
    }

    /**
     * Método para mostrar el contenido del metabox
     *
     * Muestra el contenido del metabox en la pantalla de edición de publicaciones.
     *
     * @param \WP_Post $post El objeto de la publicación actual
     */
    public function mostrarMetabox($post)
    {
        // Recuperar el valor actual del metadato
        $valor = get_post_meta($post->ID, '_mi_meta_valor', true);

        // Mostrar el campo de entrada
        echo '<label for="mi_meta_valor">Valor Personalizado:</label>';
        echo '<input type="text" id="mi_meta_valor" name="mi_meta_valor" value="' . esc_attr($valor) . '" />';
    }

    /**
     * Método para guardar los datos del metabox
     *
     * Guarda los datos del metabox cuando se guarda la publicación.
     *
     * @param int $post_id El ID de la publicación actual
     */
    public function guardarMetabox($post_id)
    {
        // Verificar si el campo está presente en la solicitud
        if (isset($_POST['mi_meta_valor'])) {
            // Sanitizar el valor del campo
            $valor_sanitizado = Helper::sanitizarDato($_POST['mi_meta_valor']);
            // Guardar el valor sanitizado en el metadato de la publicación
            update_post_meta($post_id, '_mi_meta_valor', $valor_sanitizado);
        }
    }
}
