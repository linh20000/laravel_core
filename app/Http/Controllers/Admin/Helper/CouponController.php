<?php

namespace App\Http\Controllers\Admin\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CouponRepositoryInterface;
use App\Constant\Coupon;
use App\Http\Requests\Admin\Helper\CreateCouponRequest;
use Illuminate\Http\Response;


class CouponController extends Controller
{
    protected $couponRepository;

    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offset    = $request->get('offset', '');
        $limit     = $request->get('limit', 20);
        $order     = $request->get('order', 'id');
        $direction = $request->get('direction');

        $queryWord = $request->get('query');
        $filter    = ['del_flag' => 0];

        if (!empty($queryWord)) {
            $filter['query'] = $queryWord;
        }
        $coupons     = $this->couponRepository->allByFilterPagination($filter, $limit, $order, $direction);

        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'User', 'url' => route('user.index')],
            ['title' => 'User', 'url' => route('user.create')]
        ];

        return view('admin.coupon.index', compact('coupons', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->only([
            'name',
            'discount',
            'duration',
            'comment',
            'discount_code',
            'total_code',
            'description',
        ]);

        $rules = array(
            'name' => 'required|string|max:100',
            'discount' => 'required|numeric',
            'duration' => 'required|date|after:' .  date('Y-m-d'),
        );
        $validator = \Validator::make($request->all(), $rules);
        // Validate the input and return correct response
        if ($validator->fails()) {

            return \Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400);
        }

        $input['discount_code'] = coupon::generate(16);
        try {
            $this->couponRepository->create($input);

            session()->flash('success', 'create successfully.');
            return ['error' => false];

        } catch (\Exception $e) {
            throw new \Exception($e);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = $this->couponRepository->findOrFail($id);
        if (empty($coupon)) {
            session()->flash('error', 'Not found.');

            return ['error' => true];
        }
        $this->couponRepository->delete($coupon);

        session()->flash('success', 'Destroy successfully.');

        return ['error' => false];
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

        $this->couponRepository->deleteByFilter($filter);

        session()->flash('success', 'update successfully');

        return ['error' => false];
    }
}
