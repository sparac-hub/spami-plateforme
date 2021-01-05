<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBanner;
use App\Http\Requests\UpdateBanner;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;

class BannersController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Banner';

    /**
     * @return  Response
     */
    public function index()
    {
        $banners = Banner::paginate(12);

        return view('back.banners.index', compact('banners'));
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.banners.create');
    }

    /**
     * @param \App\Http\Requests\BannerRequest $request
     * @return  Response
     */
    public function store(BannerRequest $request)
    {
        $banner = Banner::create($request->all());

        $this->setDefaultValues($request);

        return redirect()->route('back.banners.show', $banner->id)->with('success',
            trans('og.alert.success'));
    }

    public function setDefaultValues(Request $request)
    {
        if ($request->type != Banner::TYPE_IMAGE) {
            $request->request->add(['image_filepath' => null]);
        }

        if ($request->type != Banner::TYPE_VIDEO) {
            $request->request->add(['video_filepath' => null]);
        }

        if ($request->type != Banner::TYPE_SCRIPT) {
            $request->request->add(['script' => null]);
        }
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);

        return view('back.banners.show', compact('banner'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('back.banners.edit', compact('banner'));
    }

    /**
     * @param \App\Http\Requests\BannerRequest $request
     * @param int $id
     * @return Response
     */
    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::find($id);

        $this->setDefaultValues($request);

        $banner->update($request->all());

        return redirect()->route('back.banners.show', $banner->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        $banner->delete();

        return redirect()->route('back.banners.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $banners = Banner::all();
        return datatables()->of($banners)
            ->editColumn('id',
                '<a href="{{route(\'back.banners.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($banner) {
                return $banner->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            //->rawColumns(['id', 'actions'])
            // ->make(true);
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormByLinkTypeId(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $locale = $request->local;
            $banner = Banner::find($request->id);

            if ($request->link_type_id == 1) {
                return view('back.banners.form.menu', compact('locale', 'banner'));
            } else if ($request->link_type_id == 2) {
                return view('back.banners.form.internal_link', compact('locale', 'banner'));
            } elseif ($request->link_type_id == 3) {
                return view('back.banners.form.external_link', compact('locale', 'banner'));
            }
        }
    }
}
