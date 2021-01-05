<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use App\Models\Cms\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Cms\ProgramCategory;
use mysql_xdevapi\Collection;

class ProgramsController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $programs = Program::frontFilter($request, $menu->id);

        $breadcrumb = [
            'Programme de jumelage' => '',
        ];

        return view(front_dir() . '.programs.index', compact('programs', 'menu', 'breadcrumb'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByProgram(Request $request)
    {

        if ($request->ajax()) {
            if ($request->program) {
                $program_id = $request->program;
                $program = Program::find($program_id);
                $featuresIds = [];
                foreach ($program->aspims as $aspim) {
                    array_push($featuresIds, $aspim->aspim->mapamed_feature_id);
                }
                $linkedPage = Menu::find($program->page_id);

                return response()->json([
                    'status' => TRUE,
                    'data' => $featuresIds,
                    'program' => [
                        'link' => (optional($linkedPage)->slug) ? route('front.routes.index', $linkedPage->slug) : '',
                        'title' => $program->title,
                        'established' => 'Date de signature: ' .
                            ((!empty($program->established_at) && $program->established_at != '0000-00-00') ? date('d/m/Y', strtotime($program->established_at)) : ''),
                    ],
                ]);
            }
            return response()->json(['status' => FALSE, 'msg' => '']);
        }
        redirect()->route('front.home');
    }
}
