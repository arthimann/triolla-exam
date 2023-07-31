<?php

namespace App\Repositories;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public const TITLE_DB_COLUMN = 'title';
    public const DESC_DB_COLUMN = 'description';
    public const PRIORITY_DB_COLUMN = 'priority';
    public const UPDATED_DB_COLUMN = 'updated_at';

    /**
     * Get all tasks
     * @return mixed
     */
    public function all(): Collection;

    /**
     * Get specific resource by ID
     * @param int $id
     * @return Task
     */
    public function get(int $id): Task;

    /**
     * Store new task
     * @param array $data
     * @return int
     */
    public function store(array $data): int;

    /**
     * Update existing task
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int;
}
