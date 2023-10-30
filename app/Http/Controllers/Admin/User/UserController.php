<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Repositories\UserRepositoryInterface;
use App\Services\Production\FileServices;
use Exception;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\DataExporterServiceInterface;

class UserController extends Controller
{
    /** @var App\Repositories\UserRepositoryInterface UserRepository */
    /** @var App\Services\Production\FileServices FileServices */
    protected $userRepository;
    protected $fileServices;
    protected $provinceRepository;
    protected $districtRepository;
    protected $dataExporterService;
    /**
     * class UserController.
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        FileServices $fileServices,
        DataExporterServiceInterface $dataExporterService
    ) {
        $this->userRepository = $userRepository;
        $this->fileServices = $fileServices;
        $this->dataExporterService = $dataExporterService;
        $this->middleware('log');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (\Auth::user()->hasPermissionTo('list user')) {
            $offset = $request->get('offset', '');
            $limit = $request->get('limit', config('general.pagination', 20));
            $order = $request->get('order', 'id');
            $direction = $request->get('direction', 'DESC');

            $queryWord = $request->get('query');

            $filter = [];
            if (! empty($queryWord)) {
                $filter['query'] = $queryWord;
            }

            $users = $this->userRepository->allByFilterPagination($filter, $limit, $order, $direction);

            $breadcrumbs = [
                ['title' => 'Home', 'url' => route('home.index')],
                ['title' => 'User', 'url' => route('user.index')],
                ['title' => 'User', 'url' => route('user.create')]
            ];

            return view('admin.users.index', compact('users', 'breadcrumbs'));
        } else {
            \App::abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->hasPermissionTo('add user')) {
            $breadcrumbs = [
                ['title' => 'Home', 'url' => route('home.index')],
                ['title' => 'User', 'url' => route('user.index')],
                ['title' => 'User', 'url' => route('user.create')]
            ];
            $roles = Role::all();
            return view('admin.users.edit', compact('breadcrumbs','roles'));
        } else {
            \App::abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        if (\Auth::user()->hasPermissionTo('add user')) {
            $input = $request->only([
                'name',
                'email',
                'password',
                'permission',
            ]);

            try {
                $model = $this->userRepository->create($input);
                $model->assignRole($request->permission);

                // $this->logingController->log('create', $model->getTable(), $model->id);
                return redirect()->route('user.index')->with('success', 'Tạo Mới Thành Công!');
            } catch (Exception $e) {
                throw new Exception($e);
            }
        } else {
            \App::abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findOrFail($id);
        $roles = Role::all();
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'User', 'url' => route('user.create')],
            ['title' => 'User', 'url' => route('user.index')]
        ];
        return view('admin.users.show', compact('user', 'roles','breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Auth::user()->hasPermissionTo('edit user')) {
            $user = $this->userRepository->findOrFail($id);

            $breadcrumbs = [
                ['title' => 'Home', 'url' => route('home.index')],
                ['title' => 'Home', 'url' => route('user.index')],
            ];
            $roles = Role::all();
            return view('admin.users.edit', compact('user', 'breadcrumbs','roles'));
        } else {
            \App::abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        if (\Auth::user()->hasPermissionTo('edit user')) {
            if (empty($request->password)) {
                $input = $request->except([
                    'password'
                ]);
            } else {
                $input = $request->only([
                    'password'
                ]);
            }
            $user = $this->userRepository->find($id);
            if (empty($user)) {
                return Redirect::back()->with('error', 'not found.');
            }
            if($request->permission == 'resetPermission') {
                $user->syncRoles([]);
            }

            $input['phone_number'] = str_replace(['(', ')', '-', ' '], '', $request->get('phone_number'));

            $this->userRepository->update($user, $input);
            if (!empty($request->isProfile)) {
                return redirect()->route('profile', $id)->with('success', 'Update successfully');
            }

            return redirect()->route('user.index')->with('success', 'Update successfully');
        } else {
            \App::abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        if (\Auth::user()->hasPermissionTo('delete user')) {
            $user = $this->userRepository->findOrFail($id);
            if (empty($user)) {
                session()->flash('error', 'Not found user.');

                return ['error' => true];
            }
            try {
                // $this->logingController->log('delete', $user->getTable(), $id);
                $this->userRepository->delete($user);

                session()->flash('success', 'Destroy successfully.');
                activity()
                    ->causedBy($this->userRepository->getBlankModel())
                    ->performedOn($user)
                    ->withProperties(['delete' => 'Cập nhật tài khoản'])
                    ->log('delete');

                return ['error' => false];
            } catch (Exception $e) {
                throw new Exception($e);
            }
        } else {
            \App::abort(403);
        }
    }


    public function updateAvatar($id, Request $request) {

        $user  = $this->userRepository->findOrFail($id);
        if (empty($user)) {
            session()->flash('error', 'Not Found');

            return ['error' => 'true'];
        }

        try {

            if ($request->hasFile('avatar')) {
                $dataFile  = $request->file('avatar');
                $fileModel = $this->fileServices->upload('image', 'users', $dataFile);
                if (!empty($fileModel)) {
                    $input['avatar'] = $fileModel;
                }

                $input['phone_number'] = str_replace(['(', ')', '-'], '', $request->get('phone_number'));

                $this->userRepository->update($user, $input);

                return redirect()->route('profile', $id)->with('success', 'Update successfully');
            }

            return redirect()->route('profile', $id)->with('error', 'Error!');

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    /**
     * @return bool[]|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileUser($id)
    {

        $user = $this->userRepository->findOrFail($id);
        if (empty($user)) {
            session()->flash('error', 'not found user');

            return ['error' => true];
        }
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'User', 'url' => route('user.index')],
            ['title' => 'User', 'url' => route('user.create')]
        ];

        return view('admin.users.profile', compact('user', 'breadcrumbs'));
    }

    /**
     * Remove all by selected
     *
     * @param Request $request
     * @return false[]
     */
    public function deleteAll(Request $request)
    {
        $StringIds = $request->input('ids');

        $ids = explode(',', $StringIds);
        $filter = ['id' => $ids];

        $this->userRepository->deleteByFilter($filter);

        session()->flash('success', 'update successfully');

        return ['error' => false];
    }

    /**
     * @return void
     */
    public function exportUsers() {

        $users = $this->userRepository->all();
        $exporter = $this->dataExporterService;
        $exporter
            ->filename('users.xlsx')
            ->setSheetName('users')
            ->except(['password','email_verified_at', 'created_at', 'updated_at'])
            ->column('name', function($value, $row) {
                return ucfirst($value);
            })
            ->methodDownload(0) // 0 is download now, 1 is download save the file
            ->export($users->toArray());
    }
}
