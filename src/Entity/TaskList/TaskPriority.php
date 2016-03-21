<?php

namespace Todoapp\Entity\TaskList;

use function \Todoapp\functions\{lastItem};

class TaskPriority
{
    private static $priorities = [
        'none' => 0,
        'low' => 1,
        'major' => 2,
        'high' => 3,
        'critical' => 4,
    ];

    private $priority;
    private $priorityNormalized;

    private function __construct(string $priority, int $priorityNormalized)
    {
        $this->priority = $priority;
        $this->priorityNormalized = $priorityNormalized;
    }

    public static function fromString(string $priority) : TaskPriority
    {
        $priority = strtolower($priority);
        if (!isset(self::$priorities[$priority])) {
            throw new \InvalidArgumentException(sprintf(
                'Unknown priority "%s", available priorities are %s and %s',
                $priority,
                implode(', ', array_slice(array_keys(self::$priorities), 0, -1)),
                lastItem(array_keys(self::$priorities))
            ));
        }

        return new self($priority, self::$priorities[$priority]);
    }

    public function __toString()
    {
        return $this->priority;
    }

    public function compare(TaskPriority $priority)
    {
        return  $priority->priorityNormalized <=> $this->priorityNormalized;
    }
}
