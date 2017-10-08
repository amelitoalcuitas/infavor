<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{
  // use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $appends = [ 'can_delete' ];
  protected $fillable = [
      'comment_content', 'comment_topic', 'comment_by', 'comment_align', 'comment_points', 'comment_deleted', 'created_at'
  ];

  public function getCanDeleteAttribute(){
    return $this->comment_by==Auth::id();
  }

  public function getCommentContentAttribute($value){
    if((int)$this->comment_deleted){
      return '[deleted]';
    }
    return $value;
  }

  public function topic(){
    return $this->belongsTo('App\Topic','comment_topic','topic_id');
  }

  public function user(){
    return $this->belongsTo('App\User','comment_by','id');
  }

  public function scopeSortCommentDate($query){
    return $query->orderBy('created_at', 'desc');
  }

  public function scopeSortCommentPoints($query){
    return $query->orderBy('comment_points', 'desc');
  }

}
