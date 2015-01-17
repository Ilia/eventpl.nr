<?php
namespace Mogilevsky\Logger;
/**
 * Describes log levels
 */
class LogLevel extends \Psr\Log\LogLevel
{
    const CREATED = 'created';
    const UPDATED = 'updated';
    const DELETED = 'deleted';
}