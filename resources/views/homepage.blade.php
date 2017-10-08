@include('components/header')

    <div class="issueContainer">
      <div>
        <h1 class="issueHeader">Welcome to inFavor</h1>
        <p class="issueDesc">
          A place where you can express your opinion without any worries
        </p>
      </div>
    </div>

    <br>

    <div class="commentsContainer container-fluid" style="color:#7E7F8C">
      <table style="width:100%" border="0">
        <thead>
          <th width="80px">Views</th>
          <th>Topic Title</th>
          <th width="150px">Date Created</th>
        </thead>
        <tbody>
          @foreach($topic as $row)
            <tr height="50px" border="1px">
              <td>1</td>
              <td><a class="topictitle" href="{{url('/topic/'.$row->topic_id)}}">{{$row->topic_title}}</a></td>
              <td>{{$row->created_at->format('M j, Y')}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div style="text-align:center; color: #7e7f8c;"> &copy; 2016 PixelateMedia </div>
