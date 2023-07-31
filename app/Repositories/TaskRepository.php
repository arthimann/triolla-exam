<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Get all tasks
     * @return Collection
     */
    public function all(): Collection
    {
        return Task::orderBy(self::PRIORITY_DB_COLUMN, 'desc')
            ->orderBy(self::UPDATED_DB_COLUMN, 'desc')
            ->get();
    }

    /**
     * @param int $id
     * @return Task
     */
    public function get(int $id): Task
    {
        return Task::findOrfail($id);
    }

    /**
     * Store new task
     * @param array $data
     * @return int
     */
    public function store(array $data): int
    {
        $resource = Task::create([
            self::TITLE_DB_COLUMN => $data[self::TITLE_DB_COLUMN],
            self::DESC_DB_COLUMN => $data[self::DESC_DB_COLUMN],
            self::PRIORITY_DB_COLUMN => $this->calcPriority($data[self::DESC_DB_COLUMN]),
        ]);

        return $resource->id;
    }

    /**
     * Update existing task
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int
    {
        $resource = Task::findOrfail($id);
        $resource->fill($data);
        $resource->save();
        return $resource->id;
    }

    /**
     * Calculate priority using task description length
     * @param string $description
     * @return int
     */
    private function calcPriority(string $description): int
    {
        $count = strlen($description);
        return match (true) {
            $count >= 10 && $count <= 20 => 2,
            $count > 20 => 3,
            default => 1,
        };
    }
}
