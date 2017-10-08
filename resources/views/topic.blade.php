@include('components/header')
@include('components/modals')

    <div class="issueContainer">
      <div>
        <h1 class="issueHeader">{{$topic->topic_title}}</h1>
        <p class="issueDesc">
          {{substr($topic->topic_content,0,300)}}...
          <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"> read more </a>
        </p>
      </div>
    </div>
    <br>
    <div class="commentsContainer container-fluid">
      <!--positive comment-->
      <div class="comments_form col-md-4">
        <h3> Positive </h3>
        <a data-toggle="modal" data-target="#textareamodal" class="showPos" id="1"> I say that... </a>

        <div class="comments_section">
          <h4> Comments </h4>

          <select class="simpleselect" id="sortBy_positive" name="order">
            <option value="created_at">Newest First</option>
            <option value="comment_points">Top Comments</option>
          </select>
          <br>

          <div id="ajaxComment_positive">
          </div>

          <hr>
        </div>
      </div>
      <!--positive comment-->

      <!--neutral comment-->
      <div class="comments_form col-md-4">
        <h3> Neutral </h3>
        <a data-toggle="modal" data-target="#textareamodal" class="showPos" id="2"> I say that... </a>

        <div class="comments_section">
          <h4> Comments </h4>

          <select class="simpleselect" id="sortBy_neutral" name="order">
            <option value="created_at">Newest First</option>
            <option value="comment_points">Top Comments</option>
          </select>
          <br>

          <div id="ajaxComment_neutral">
          </div>

          <hr>
        </div>
      </div>
      <!--neutral comment-->

      <!--negative comment-->
      <div class="comments_form col-md-4">
        <h3> Negative </h3>
        <a data-toggle="modal" data-target="#textareamodal" class="showPos" id="3"> I say that... </a>

        <div class="comments_section">
          <h4> Comments </h4>

          <select class="simpleselect" id="sortBy_negative" name="order">
            <option value="created_at">Newest First</option>
            <option value="comment_points">Top Comments</option>
          </select>
          <br>

          <div id="ajaxComment_negative">
          </div>

          <hr>
        </div>
      </div>
      <!--negative comment-->
    </div>

@include('components/footer')
