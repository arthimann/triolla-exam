<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Tasks\StoreRequest;
use App\Http\Requests\V1\Tasks\UpdateRequest;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public const HTTP_BAD_REQUEST_MSG = 'Something went wrong!';

    /**
     * Display a listing of the resource.
     * @param TaskRepository $taskRepository
     * @return JsonResponse
     */
    public function index(TaskRepository $taskRepository): JsonResponse
    {
        $data = $taskRepository->all();
        return response()->json(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @param TaskRepository $taskRepository
     * @return JsonResponse
     */
    public function store(StoreRequest $request, TaskRepository $taskRepository): JsonResponse
    {
        $id = $taskRepository->store($request->only('title', 'description'));
        $this->abort($id);
        return response()->json(compact('id'));
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @param TaskRepository $taskRepository
     * @return JsonResponse
     */
    public function show(string $id, TaskRepository $taskRepository): JsonResponse
    {
        $data = $taskRepository->get($id);
        return response()->json(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param string $id
     * @param TaskRepository $taskRepository
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, string $id, TaskRepository $taskRepository): JsonResponse
    {
        $id = $taskRepository->update($id, $request->only('title', 'description'));
        $this->abort($id);
        return response()->json(compact('id'));
    }

    /**
     * Abort request abort with code and message
     * @param int $id
     * @return void
     */
    private function abort(int $id): void
    {
        if ($id <= 0) {
            abort(JsonResponse::HTTP_BAD_REQUEST, self::HTTP_BAD_REQUEST_MSG);
        }
    }
}
