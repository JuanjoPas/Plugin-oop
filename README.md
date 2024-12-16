# Mi Plugin OOP Reutilizable

Este es un plugin de WordPress desarrollado utilizando Programación Orientada a Objetos (OOP). El plugin está diseñado para ser modular y fácil de mantener, proporcionando una base sólida para futuras mejoras y extensiones.

## Funcionalidades

- **Administración del Plugin**: Maneja la lógica de administración del plugin, incluyendo la inicialización de controladores, la configuración del menú de administración y la visualización de la página de administración.
- **Mensaje Final**: Agrega un mensaje de agradecimiento al final del contenido de las publicaciones.
- **Modificación del Título**: Modifica el título del contenido de las publicaciones.
- **Metaboxes**: Añade y guarda metaboxes personalizados en la pantalla de edición de publicaciones.
- **Shortcodes**: Define y maneja shortcodes personalizados.
- **Registro de Logs**: Utiliza Monolog para registrar logs de eventos importantes.

## Instalación

1. Clona este repositorio en el directorio de plugins de tu instalación de WordPress:

    ```sh
    git clone https://github.com/tu-usuario/mi-plugin-oop-reutilizable.git wp-content/plugins/mi-plugin-oop-reutilizable
    ```

2. Navega al directorio del plugin:

    ```sh
    cd wp-content/plugins/mi-plugin-oop-reutilizable
    ```

3. Instala las dependencias de Composer:

    ```sh
    composer install
    ```

4. Activa el plugin desde el panel de administración de WordPress.

## Uso

### Configuración del Plugin

1. Ve a la página de configuración del plugin en el panel de administración de WordPress.
2. Configura las opciones disponibles:
    - **Activar Mensaje de Agradecimiento**: Marca esta casilla para activar el mensaje de agradecimiento al final de cada publicación.
    - **Modificar Título del Contenido**: Marca esta casilla para modificar el título del contenido de las publicaciones.

### Shortcodes

- **[bienvenida]**: Utiliza este shortcode para mostrar un mensaje de bienvenida personalizado. Ejemplo:

    ```sh
    [bienvenida nombre="Juan"]
    ```

### Metaboxes

- **Información Adicional**: Añade un metabox personalizado en la pantalla de edición de publicaciones para ingresar información adicional.

## Estructura del Código

- **AdminController.php**: Maneja la lógica principal de administración del plugin.
- **FinalMessageController.php**: Maneja la lógica relacionada con el mensaje final del contenido.
- **TitleModifierController.php**: Maneja la lógica relacionada con la modificación del título del contenido.
- **MetaboxController.php**: Maneja la lógica de los metaboxes personalizados.
- **ShortcodeController.php**: Maneja la lógica de los shortcodes personalizados.
- **Deactivator.php**: Maneja la lógica de desactivación del plugin.
- **LoggerTrait.php**: Proporciona funcionalidad de registro de logs utilizando Monolog.

## Futuras Mejoras

- **Añadir más opciones de configuración**: Puedes añadir más opciones de configuración en `AdminController.php` y crear nuevos controladores para manejar la lógica de estas opciones.
- **Extender la funcionalidad de los shortcodes**: Añade más shortcodes personalizados en `ShortcodeController.php`.
- **Mejorar la gestión de metaboxes**: Añade más metaboxes personalizados en `MetaboxController.php`.
- **Integración con APIs externas**: Añade lógica para integrar el plugin con APIs externas.
- **Mejorar la interfaz de usuario**: Añade estilos y scripts personalizados para mejorar la interfaz de usuario del plugin.

## Contribuciones

Las contribuciones son bienvenidas. Si deseas contribuir, por favor sigue estos pasos:

1. Haz un fork de este repositorio.
2. Crea una nueva rama para tu funcionalidad (`git checkout -b nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Haz push a la rama (`git push origin nueva-funcionalidad`).
5. Abre un Pull Request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo LICENSE para más detalles.
