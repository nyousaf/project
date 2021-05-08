@extends('layouts.admin')
@section('content')
  <div class="content-main-block  mrg-t-40">
        <div class="content-block box-body table-responsive">
                <table id="full_detail_table" class="table table-hover table-responsive">
                  <thead>
                      <th>
                            <tr class="table-heading-row">
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                      </th>
                  </thead>
                  <tbody>
                    @foreach ($comments as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                @php
                                  $work_p = App\WorkPhoto::findorfail($item->work_id); 
                                @endphp
                                
                                  <img src="{{ url('images/work/'.$work_p->images) }}" alt="" width="100px">
                            </td>
                            <td>{{ $item->works->title }}</td>
                            <td>  
                              {{substr(strip_tags($item->body),0,50)}}{{strlen(strip_tags($item->body))>50 ? "..." : ""}}
                            </td>
                            <td id="st{{ $item->id }}">
                              @if($item->status == 0)
                              <span class="label label-default">Pending</span>
                             @else
                             <span class="label label-success">Approved</span>
                             @endif
                            </td>
                            <td>
                              <select onchange="commentstatus('{{ $item->id }}')" id="cmt_status{{ $item->id }}">
                                  <option {{ $item->status == "1" ? "selected" : "" }} value="1">Approved</option>
                                  <option {{ $item->status == "0" ? "selected"  : "" }} value="0">Pending</option>
                              </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
  </div>
@endsection

@section('custom-script')
  <script>
    function commentstatus(value)
    {
      var id = value;
      var status = $('#cmt_status'+id).val();

      $.ajax({
              method : 'GET',
              url : "{{ url('admin/comment/approve/') }}/"+id,
              data : {status : status},
              success : function(data){
                
                $('#st'+id).html('');

                if(data == "0"){
                  $('#st'+id).append('<label class="label label-default">Pending</label>');
                }else{
                  $('#st'+id).append('<label class="label label-success">Approved</label>');
                }
                

              }
              
        });

    }
  </script>
@endsection