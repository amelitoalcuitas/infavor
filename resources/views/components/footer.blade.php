<div style="text-align:center; color: #7e7f8c;"> &copy; 2016 PixelateMedia </div>

<script src="{{asset('js/jquery-3.1.1.min.js')}}" charset="utf-8"></script>
<script src="{{asset('js/bootstrap.js')}}" charset="utf-8"></script>
<script src="{{asset('js/jquery.timeago.js')}}" charset="utf-8"></script>
<script src="{{asset('js/sweetalert.min.js')}}" charset="utf-8"></script>

<script type="text/javascript">
$(document).ready(function(){
// <!-- Submit Comment -->
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#registerform').submit(function(event){
    event.preventDefault();

    alert('success!');
  });

  $("#1").click(function(){
    $("#alignment").attr('value','positive');
  });
  $("#2").click(function(){
    $("#alignment").attr('value','neutral');
  });
  $("#3").click(function(){
    $("#alignment").attr('value','negative');
  });

  //Message Counter

  $('#textPost').on('input',function(){
    messLength = $(this).val().length;

    $('#messageCount').html(messLength + '/300');
  });

  $("#submitBtn").click(function(event){
    event.preventDefault();

    var message = $("#textPost").val();

    if(message && message.length > 100){
      var textPost = $("#textPost").val();
      var commentAlign = $("#alignment").val();
      var topic_id = {{$topic->topic_id}};

      $.ajax({
        type:'post',
        data: { textPost:textPost, commentAlign:commentAlign, topic_id:topic_id },
        url: "{{url('/postcomment')}}",
        success: function(result){
          refreshComments(commentAlign);
          $("#textareamodal").modal('hide');
          swal("Good job!", "Your message has been posted!", "success");
          $("#textPost").val('');
        }
      });
    }else if (message.length < 100){
      $("#emptyError").show();
      setTimeout(function(){
          $("#emptyError").fadeOut('fast');
        }, 2000);
    }
  });

// <!-- Submit Comment End -->

// <!-- Display Comments -->

    var sort_by = "comments.created_at";
    var topic_id = {{$topic->topic_id}};
    var deletediv = "";
    var usernamediv = "";
    var datediv = "";

      $.ajax({
        type:'post',
        data:{ sort_by:sort_by, topic_id:topic_id },
        url: "{{url('/displayComments')}}",
        success: function(result){

          $(result.comments).each(function(i,comment){
            if(comment.can_delete == true){
              deletediv = "<a href='javascript:void(0); deleteReply(" + comment.comment_id + ",\"" + comment.comment_align + "\");'>Delete</a>";
            }else{
              deletediv = "";
            }

            if(comment.comment_deleted == 0){
              usernamediv = comment.user.username + " says: ";
              datediv = "<time class='timeago' datetime='" + comment.created_at + "'></time>";
            }else{
              usernamediv = "[deleted]";
              datediv = "[deleted]";
              deletediv = "";
            }

            $("#ajaxComment_"+comment.comment_align).append(
              "<hr>" + usernamediv + "<div class='pull-right'>" + deletediv + "</div><div class='comment_box'>" + comment.comment_content + "</div><div class='timeplacement'> " + datediv + "</div>"
            );
          });

          $('.timeago').timeago();
        }
      });


// <!-- Display Comments End -->

// <!-- Sort -->


    var sort_by = "";
  // Positive Start
    $("#sortBy_positive").change(function(){
        var sort_by = "comments."+$("#sortBy_positive").val();
        $.ajax({
          type:'post',
          data:{ sort_by:sort_by, topic_id:topic_id, replyAlign:'positive'},
          url: "{{url('/displayComments')}}",
          success: function(result){
            $("#ajaxComment_positive").html(result['resultcomment']['positive']);
            $('.timeago').timeago();
          }
        });
    });
    // Positive End

    // Neutral Start
    $("#sortBy_neutral").change(function(){
        var sort_by = "comments."+$("#sortBy_neutral").val();
        $.ajax({
          type:'post',
          data:{ sort_by:sort_by, topic_id:topic_id, replyAlign:'neutral'},
          url: "{{url('/displayComments')}}",
          success: function(result){
            $("#ajaxComment_neutral").html(result['resultcomment']['neutral']);
            $('.timeago').timeago();
          }
        });
    });
    // Neutral End

    // Negative Start
    $("#sortBy_negative").change(function(){
        var sort_by = "comments."+$("#sortBy_negative").val();
        $.ajax({
          type:'post',
          data:{ sort_by:sort_by, topic_id:topic_id, replyAlign:'negative'},
          url: "{{url('/displayComments')}}",
          success: function(result){
            $("#ajaxComment_negative").html(result['resultcomment']['negative']);
            $('.timeago').timeago();
          }
        });
    });
    // Negative End

// <!-- Sort End -->

// <!-- Various Scripts -->

    $(".showPosold").click(function() {
      var thisId = $(this).attr('id');

      $("#showForm"+thisId).slideToggle('fast');

      if(thisId == 1){
        $("#showForm2").slideUp('fast');
        $("#showForm3").slideUp('fast');
      } else if (thisId == 2) {
        $("#showForm1").slideUp('fast');
        $("#showForm3").slideUp('fast');
      }else{
        $("#showForm1").slideUp('fast');
        $("#showForm2").slideUp('fast');
      }
    });

    $(function(){
      $("[data-toggle=popover]").popover({
          trigger: "manual",
          animation:false,
          html : true,
          content: function() {
            var content = $(this).attr("data-popover-content");
            return $(content).children(".popover-body").html();
          },
          title: function() {
            var title = $(this).attr("data-popover-content");
            return $(title).children(".popover-heading").html();
          }
      })
      .on("mouseenter", function () {
          var _this = this;
          $(this).popover("show");
          $(".popover").on("mouseleave", function () {
              $(_this).popover('hide');
          });
      }).on("mouseleave", function () {
          var _this = this;
          setTimeout(function () {
              if (!$(".popover:hover").length) {
                  $(_this).popover("hide");
              }
          }, 300);
        });
    });

// <!-- Various Scripts End-->

});

// <!-- Delete Reply -->
  function deleteReply(id,align){
    console.log(id);
    swal({
      title: "Are you sure? ",
      text: "You will not be able to recover this comment!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        type:'post',
        data:{ comment_id:id},
        url: "{{url('/deletecomment')}}",
        success: function(result){
          //refreshComments(align);
          swal("Deleted!", "Your comment has been deleted.", "success");
        }
      });
    });
  }

// <!-- Delete Reply End -->

// <!-- Refresh Comments -->

  function refreshComments(align){
    var sort_by = "comments."+$('#sortBy_'+align).val();
    var topic_id = {{$topic->topic_id}}

      $.ajax({
        type:'post',
        data:{ sort_by:sort_by, topic_id:topic_id, },
        url: "{{url('/displayComments')}}",
        success: function(result){
          $(result.comments).each(function(i,comment){
            if(comment.can_delete == true){
              deletediv = "<a href='javascript:void(0); deleteReply(" + comment.comment_id + ",\"" + comment.comment_align + "\");'>Delete</a>";
            }else{
              deletediv = "";
            }

            if(comment.comment_deleted == 0){
              usernamediv = comment.user.username + " says: ";
              datediv = "<time class='timeago' datetime='" + comment.created_at + "'></time>";
            }else{
              usernamediv = "[deleted]";
              datediv = "[deleted]";
              deletediv = "";
            }

            $("#ajaxComment_"+comment.comment_align).append(
              "<hr>" + usernamediv + "<div class='pull-right'>" + deletediv + "</div><div class='comment_box'>" + comment.comment_content + "</div><div class='timeplacement'> " + datediv + "</div>"
            );
          });

          $('.timeago').timeago();
        }
      });

  }

// <!-- Refresh Comments End -->

</script>

</body>
</html>
