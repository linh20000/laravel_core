<?php

namespace App\Http\Controllers\Admin\LangCustom;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Repositories\LangCustomRepositoryInterface;
use App\Services\Production\FileServices;
use App\Http\Requests\Admin\LangCustom\CreateRequest;
use App\Http\Requests\Admin\LangCustom\UpdateRequest;
use Exception;
use Termwind\Components\Ul;
use Stichoza\GoogleTranslate\GoogleTranslate;
class LangCustomController extends Controller
{
    /** @var App\Repositories\{langcustom}RepositoryInterface langcustomRepository */
    /** @var App\Services\Production\FileServices FileServices */
    protected $langcustomRepository;
    protected $fileServices;
    protected $provinceRepository;
    protected $districtRepository;

    /**
     * class UserController.
     *
     * @param \{langcustom}RepositoryInterface $langcustomRepository
     * @param FileServices $fileServices
     */
    public function __construct(
        LangCustomRepositoryInterface $langcustomRepository,
        FileServices $fileServices,
    ) {
        $this->langcustomRepository = $langcustomRepository;
        $this->fileServices   = $fileServices;
        // $this->middleware('log');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(\Auth::user()->hasPermissionTo('list langcustom')) {
            $offset    = $request->get('offset', '');
            $limit     = $request->get('limit', 20);
            $order     = $request->get('order', 'id');
            $direction = $request->get('direction','ASC');

            $queryWord = $request->get('query');


            $filter = [];
            if (!empty($queryWord)) {
                $filter['query'] = $queryWord;
            }
            $langcustoms = $this->langcustomRepository->allByFilterPagination($filter, $limit, $order, $direction);
            $breadcrumbs = [
                ['title' => 'Home', 'url' => route('home.index')],
                ['title' => 'Translate', 'url' => route('langcustom.index')]
            ];
            return view('admin.langcustoms.edit', compact('breadcrumbs','langcustoms'));
        } else {
            \App::abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        if(\Auth::user()->hasPermissionTo('add langcustom')) {
            $inputs = $request->except(['_token']);
           
            $options = $inputs['option'];
            $existingModel = Lang::where('key',  'LIKE', '%'. $inputs['key'] .'%' )->first();
            if($existingModel) {
                $lang =$existingModel;
            } else {
                $lang = new Lang();
            }
            foreach ($options as  $option) {
                $googleTranslate = new GoogleTranslate();
                $googleTranslate->setSource();
                $googleTranslate->setTarget($option);
                $googleTranslate = $googleTranslate->translate($inputs['key']);
                $lang->$option = $googleTranslate;
                $lang->save();
            }
            // switch ($option) {
            //     case 'vi':
            //        $tr->setTarget('vi');
            //        $tr = $tr->translate($inputs['key']);
            //        $lang->vi = $tr;
            //         break;
            //     case 'en':
            //         $tr->setTarget('en');
            //         $tr = $tr->translate($inputs['key']);
            //         $lang->en = $tr;
            //             break;
            //     case 'ja':
            //         $tr->setTarget('ja');
            //         $tr = $tr->translate($inputs['key']);
            //         $lang->ja = $tr;
            //             break;
            //     case 'ka':
            //         $tr->setTarget('ka');
            //         $tr = $tr->translate($inputs['key']);
            //         $lang->ka = $tr;
            //             break;
            //     case 'uk':
            //         $tr->setTarget('uk');
            //         $tr = $tr->translate($inputs['key']);
            //         $lang->uk = $tr;
            //             break;
            //     case 'ko':
            //         $tr->setTarget('ko');
            //         $tr = $tr->translate($inputs['key']);
            //         $lang->ko = $tr;
            //             break;
            //     case 'zh':
            //         $tr->setTarget('zh');
            //         $tr = $tr->translate($inputs['key']);
            //         $lang->zh = $tr;
            //             break;
            //     default:
            //         $tr->setTarget('vi');
            //         $tr = $tr->translate($inputs['key']);
            //         $lang->vi = $tr;
            //         break;
            // }
            $lang->key = $inputs['key'];
            $lang->save();
            return redirect(route('langcustom.index'))->with('success', 'Tạo bản dịch thành công!');
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
        // $user = $this->langcustomRepository->findOrFail($id);
        // return view('admin.langcustom.show', compact('langcustom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
      
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
        if(\Auth::user()->hasPermissionTo('edit langcustom')) {
            $inputs = $request->except(['_token', '_method']);
            $model = $this->langcustomRepository->findOrFail($id);
            try {
                $this->langcustomRepository->update($model, $inputs);
                return back()->with('success', 'Update thanh cong');
            } catch(Exception $e) {
                var_dump($e->getMessage());
            }
        } else {
            \App::abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function destroy($id)
    {
        if(\Auth::user()->hasPermissionTo('delete langcustom')) {
            $langcustom = $this->langcustomRepository->findOrFail($id);
            if (empty($langcustom)) {
                session()->flash('error', 'Not found user.');

                return ['error' => true];
            }
            try {
                $this->langcustomRepository->delete($langcustom);

                session()->flash('success', 'Destroy successfully.');

                return ['error' => false];
            } catch (Exception $e) {
                throw new Exception($e);
            }
        } else {
            \App::abort(403);
        }
    }
}

 