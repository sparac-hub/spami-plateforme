<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use MedianetDev\Forum\Models\Post;

class PostForumsController extends Controller
{
    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::with('discussion')->findOrFail($id);

        $discussion_id = $post->chatter_discussion_id;

        $post->delete();

        return redirect()->route('back.gestion_forums.show', $discussion_id)
            ->with('success', trans('og.alert.success'));
    }
}
