<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\LanguageLine;
use App\Http\Controllers\Controller;

class AppTextsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $language_line_to_edit = null;
        if ($request->language_line_id) {
            $language_line_to_edit = LanguageLine::find($request->language_line_id);
        }

        return view('back.app_texts.index', compact('language_line_to_edit'));
    }

    /**
     * @return Response
     */
    public function create()
    {
        return view('back.app_texts.create');
    }

    public function edit($id)
    {
        return redirect()->route('back.app_texts.index', ['language_line_id' => $id]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $where = [
            'group' => $request->group,
            'key' => $request->key,
        ];

        $language_line = LanguageLine::where($where)->first();

        if ($language_line) {
            $language_line->update([
                'text' => $request->text,
            ]);
        } else {
            LanguageLine::create([
                'group' => $request->group,
                'key' => $request->key,
                'text' => $request->text,
            ]);
        }

        return redirect()->route('back.app_texts.index')->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app_text = LanguageLine::findOrFail($id);
        $app_text->delete();

        return redirect()->route('back.app_texts.index')->with('success',
            trans('og.alert.success'));
    }


    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new LanguageLine())->getTable() . '.menu_id' => $request->menu_id] : [];

        $events = LanguageLine::select((new LanguageLine)->getTable() . '.*');

        return datatables()->of($events)
            ->editColumn('id',
                '<a href="{{route(\'back.app_texts.index\', ["language_line_id" => $id])}}">{{$id}}</a>')
            ->editColumn('text', function ($model) {

                if (!$model->text) {
                    return '--';
                }

                $str = '<ul>';
                foreach ($model->text as $k => $v) {
                    $str .= '<li>' . $k . ' : ' . $v . '</li>';
                }

                return $str . '</ul>';
            })
            ->addColumn('actions',
                '<a class="btn btn-primary btn-xs" href="{{route(\'back.app_texts.edit\', $id)}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.edit') . '" data-title="' . trans('og.button.tooltip.edit') . '" ><span class="glyphicon glyphicon-pencil"></span></a>
                   <form style="display:inline" action="{{route(\'back.app_texts.destroy\', $id)}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"><input type="hidden" name="_method" value="DELETE" ><span data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.delete') . '"><button class="btn btn-danger btn-xs" type="submit"  onclick="return confirm(\'' . trans('og.alert.confirm_deletion') . '\')" ><span class="glyphicon glyphicon-trash"></button></span></a></form>'
            )
            ->rawColumns(['id', 'text', 'actions'])
            ->make(true);
    }


    // Todo: delete what's next

    /**
     * Store translation in the database from a language file under [/resources/lang/]
     */
    public function initTranslationFromFile()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('app_texts')->truncate();
        \DB::table('app_text_translations')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $tree = array_dot(trans('og'));

        foreach ($tree as $key => $value) {
            $tree_keys = explode('.', $key);
            $parent_id = null;
            foreach ($tree_keys as $counter => $tree_key) {
                $last_key = LanguageLine::firstOrCreate(['reference' => $tree_key, 'parent_id' => $parent_id]);
                $parent_id = $last_key->id;
            }
            $translation = ['app_text_id' => $last_key->id, 'locale' => 'fr'];

            $app_text_translation = AppTextTranslation::firstOrCreate($translation);
            $app_text_translation->update(['value' => $value]);
        }
    }

    function generateTranslationToFile()
    {
        $app_texts = LanguageLine::get();
        if ($app_texts) {
            $tree = $this->buildTree($app_texts->toArray());
            dd($tree);
        }
    }

    function buildTree(array $elements, int $parentId = null)
    {
        $branch = [];

        foreach ($elements as $element) {

            echo $element['reference'] . '<br>';

            if ($element['parent_id'] == $parentId) {

                $children = buildTree($elements, $element['id']);

                if ($children) {
                    $element['childrens'] = $children;
                }

                if (isset($element['value'])) {
                    $menu_item = [
                        $element['reference'] => $element['value'],
                    ];
                }

                // $menu_item['url'] = generate_menu_url($element);
                $branch[] = $menu_item;

            }
        }

        return $branch;
    }
}
