<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RepositoryRoomCreateRequest;
use App\Http\Requests\RepositoryRoomUpdateRequest;
use App\Repositories\RepositoryRoomRepository;
use App\Validators\RepositoryRoomValidator;

/**
 * Class RepositoryRoomsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RepositoryRoomsController extends Controller
{
    /**
     * @var RepositoryRoomRepository
     */
    protected $repository;

    /**
     * @var RepositoryRoomValidator
     */
    protected $validator;

    /**
     * RepositoryRoomsController constructor.
     *
     * @param RepositoryRoomRepository $repository
     * @param RepositoryRoomValidator $validator
     */
    public function __construct(RepositoryRoomRepository $repository, RepositoryRoomValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $repositoryRooms = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $repositoryRooms,
            ]);
        }

        return view('repositoryRooms.index', compact('repositoryRooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RepositoryRoomCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RepositoryRoomCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $repositoryRoom = $this->repository->create($request->all());

            $response = [
                'message' => 'RepositoryRoom created.',
                'data'    => $repositoryRoom->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repositoryRoom = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $repositoryRoom,
            ]);
        }

        return view('repositoryRooms.show', compact('repositoryRoom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repositoryRoom = $this->repository->find($id);

        return view('repositoryRooms.edit', compact('repositoryRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RepositoryRoomUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RepositoryRoomUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $repositoryRoom = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'RepositoryRoom updated.',
                'data'    => $repositoryRoom->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'RepositoryRoom deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RepositoryRoom deleted.');
    }
}
