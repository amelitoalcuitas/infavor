<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$topic->topic_title}}</h4>
      </div>
      <div class="modal-body modalDesc">
          <p>
            {{$topic->topic_content}}
          </p>
      </div>
    </div>
  </div>
</div>

<div id="textareamodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="postModalHeader">I am in favor of this...</h4>
      </div>
      <div class="modal-body modalDesc" style="margin-bottom:25px;">

          <textarea name="textPost" id="textPost" class="simpleTextarea" rows="5" maxlength="300" cols="80" focus required></textarea>
            <br>
            <div id="emptyError" style="display:none; color:#ff3a28; position:absolute;">Your message should be more than 100 characters!</div>
          <input name="topicId" id="topicID" type="hidden" value="{{$topic[0]['topic_id']}}">
          <input name="commentAlign" type="hidden" id="alignment" value="comments.{{$topic[0]['comment_align']}}">
          <input type="submit" id="submitBtn" class="pull-right simpleButton" value="Submit">
          <div id="messageCount" class="pull-right" style="margin-right:20px; margin-top:5px;">0/300</div>

      </div>
    </div>
  </div>
</div>
