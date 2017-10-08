<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Topic;
use Auth;

class CommentsController extends Controller
{

    public function __invoke($topic_id) {
      $topic = Topic::where("topic_id",$topic_id)->first();

      if(Auth::check()){
        if(count($topic)>0){
          return view('topic')->with(compact('topic'));
        }else{
          return view('errors/topicerror');
        }
      }else{
        return redirect('/loginpage');
      }
    }

    public function postComment(Request $r){
      date_default_timezone_set('Asia/Manila');
      $date = date('Y/m/d');
      $time = date('H:i');
      $timestamp = $date.' '.$time;

      Comment::create([
        'comment_content' => htmlspecialchars($r->textPost),
        'comment_topic' => $r->topic_id,
        'comment_by' => Auth::user()->id,
        'comment_align' => $r->commentAlign,
        'comment_points' => '1',
        'comment_deleted' => false
      ]);

    }

    public function deleteComment(Request $r){
      $comment = Comment::where('comment_id',$r->comment_id)
                          ->update(['comment_deleted' => 1]);
    }

    public function displayComments(Request $r){
      $sortBy = $r->sort_by;
      $topicId = $r->topic_id;

      $topic = Topic::where('topic_id',$topicId)->with(['comments' => function($q) use($sortBy){
        if($sortBy == 'comments.created_at'){
          $q->sortCommentDate();
        }else{
          $q->sortCommentPoints();
        }
        $q->with('user');

      }])->first();

      return $topic;

    }//end of displayComments
}
