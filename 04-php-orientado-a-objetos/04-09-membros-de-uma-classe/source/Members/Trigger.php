<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 15/04/2021
 * Time: 10:48
 */

namespace Source\Members;


class Trigger
{
    private const TRIGGER = "trigger";

    public const ACCEPT = "accept";
    public const WARNING = "warning";
    public const ERROR = "error";

    private static $message;
    private static $erroType;
    private static $error;


    public static function show($message, $erroType = null)
    {
        self::setError($message, $erroType);
        echo self::$error;
    }

    public static function push($message, $erroType = null)
    {
        self::setError($message, $erroType);
        return self::$error;
    }

    private static function setError($message, $erroType)
    {
        $reflection = new \ReflectionClass(__CLASS__);
        $erroTypes = $reflection->getConstants();

        self::$message = $message;
        self::$erroType = (!empty($erroType) || in_array($erroType, $erroTypes) ? " {$erroType}": "");
        self::$error = "<p class='".self::TRIGGER.self::$erroType."'>".self::$message."</p>";

    }
}