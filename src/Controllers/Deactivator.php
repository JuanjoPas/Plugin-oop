<?php

namespace MiPluginOOPReutilizable\Controllers;

use MiPluginOOPReutilizable\Traits\LoggerTrait;

/**
 * Clase Deactivator
 *
 * Esta clase es responsable de manejar la lógica de desactivación del plugin.
 * Utiliza el trait LoggerTrait para registrar logs cuando el plugin es desactivado.
 */
class Deactivator
{
    use LoggerTrait; // Utiliza el trait LoggerTrait para el registro de logs

    /**
     * Constructor de la clase
     *
     * Inicializa el logger.
     */
    public function __construct()
    {
        $this->inicializarLogger(); // Inicializa el logger
    }

    /**
     * Método para desactivar el plugin
     *
     * Este método se llama cuando el plugin es desactivado.
     * Registra un log indicando que el plugin ha sido desactivado.
     */
    public function desactivar()
    {
        $this->registrarLog('El plugin ha sido desactivado.'); // Registra un log de desactivación
    }
}
