<?php

namespace App\Http\Controllers\Admin\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Repositories\LogRepositoryInterface;
use App\Services\Production\FileServices;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;


class LogController extends Controller
{
    /** @var App\Repositories\{log}RepositoryInterface logRepository */
    /** @var App\Services\Production\FileServices FileServices */
    protected $logRepository;
    protected $fileServices;
    protected $provinceRepository;
    protected $districtRepository;

    /**
     * class UserController.
     *
     * @param \{log}RepositoryInterface $logRepository
     * @param FileServices $fileServices
     */
    public function __construct(
        LogRepositoryInterface $logRepository,
        FileServices $fileServices,
    ) {
        $this->logRepository = $logRepository;
        $this->fileServices   = $fileServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logs = Activity::paginate(20);

        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Log', 'url' => route('log.index')]
        ];

        return view('admin.log.index', compact('logs', 'breadcrumbs'));
    }




    public function destroy($id)
    {
        $log = $this->logRepository->findOrFail($id);
        if (empty($log)) {
            session()->flash('error', 'Not found user.');

            return ['error' => true];
        }
        try {
            $this->logRepository->delete($log);

            session()->flash('success', 'Destroy successfully.');

            return ['error' => false];
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * @param $id
     * @return bool[]|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
}

