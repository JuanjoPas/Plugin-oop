<?php

namespace MiPluginOOPReutilizable\Traits;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * Trait LoggerTrait
 *
 * Este trait proporciona funcionalidad de registro de logs utilizando Monolog.
 * Puede ser utilizado por cualquier clase que necesite registrar logs.
 */
trait LoggerTrait
{
    protected $logger; // Instancia del logger

    /**
     * Método para inicializar el logger
     *
     * Inicializa el logger y configura el handler y el formatter.
     *
     * @param bool $clearLog Indica si se debe limpiar el archivo de log al inicializar
     * @throws \Exception Si la constante MIPUGINOOP_PLUGIN_DIR no está definida
     */
    public function inicializarLogger($clearLog = false)
    {
        try {
            // Verificar si la constante está definida
            if (!defined('MIPUGINOOP_PLUGIN_DIR')) {
                throw new \Exception('La constante MIPUGINOOP_PLUGIN_DIR no está definida.');
            }

            $logPath = MIPUGINOOP_PLUGIN_DIR . 'logs/plugin.log'; // Ruta del archivo de log

            // Crear carpeta de logs si no existe
            if (!file_exists(MIPUGINOOP_PLUGIN_DIR . 'logs')) {
                mkdir(MIPUGINOOP_PLUGIN_DIR . 'logs', 0755, true);
            }

            // Eliminar el archivo de log si se indica
            if ($clearLog && file_exists($logPath)) {
                unlink($logPath);
            }

            // Inicializar el logger
            $this->logger = new Logger('mi_plugin_logger');
            $streamHandler = new StreamHandler($logPath, Logger::DEBUG);

            // Definir el formato del log
            $dateFormat = "Y-m-d H:i:s";
            $output = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
            $formatter = new LineFormatter($output, $dateFormat);
            $streamHandler->setFormatter($formatter);

            // Añadir el handler al logger
            $this->logger->pushHandler($streamHandler);

            // Registrar log de inicialización
            $this->registrarLog('Logger inicializado correctamente.');
        } catch (\Exception $e) {
            error_log('Error al inicializar el logger: ' . $e->getMessage());
        }
    }

    /**
     * Método para registrar un log
     *
     * Registra un mensaje de log con nivel de información.
     *
     * @param string $mensaje El mensaje a registrar
     */
    public function registrarLog($mensaje)
    {
        if ($this->logger) {
            $this->logger->info($mensaje);
        }
    }
}
