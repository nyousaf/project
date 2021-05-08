  @extends('layouts.admin')
  @section('content')
    <div class="content-main-block mrg-t-40">
          <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> Delete Selected</a>   
          <!-- Modal -->
          <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div class="delete-icon"></div>
                </div>
                <div class="modal-body text-center">
                  <h4 class="modal-heading">Are You Sure ?</h4>
                  <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                  {!! Form::open(['method' => 'POST', 'action' => 'ReportImageController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                    <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
          <div class="content-block box-body table-responsive">
                  <table id="full_detail_table" class="table table-hover table-responsive">
                    <thead>
                      <tr class="table-heading-row">
                        <th>
                          <div class="inline">
                            <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                            <label for="checkboxAll" class="material-checkbox"></label>
                          </div>#
                        </th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Reported By</th>
                        <th>Reported On</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      @foreach($reportfinds as $key=> $ri)
                        <tr>
                              <td>
                                      <div class="inline">
                                        <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="{{$ri->id}}" id="checkbox{{$ri->id}}">
                                        <label for="checkbox{{$ri->id}}" class="material-checkbox"></label>
                                      </div>
                                      {{$key+1}}
                              </td>
                          
                            <td>
                                @php
                                  $work_p = App\WorkPhoto::findorfail($ri->photo_id); 
                                @endphp
                              
                                <img src="{{ url('images/work/'.$work_p->images) }}" alt="" width="100px">
                            </td>

                            <td>{{ $ri->title }}</td>
                            <td>
                                @php
                                  $getusername = App\User::where('id',$ri->user_id)->first()->name;
                                @endphp

                                {{ $getusername }}
                            </td>
                            <td>
                                {{ date('d-M-y | h:i A',strtotime($ri->created_at)) }}
                            </td>
                            <td id="st{{ $ri->id }}">
                              @if($ri->status == "pending")
                               <span class="label label-default">Pending</span>
                              @elseif($ri->status == "approved")
                                <span class="label label-success">Approved</span>
                              @elseif($ri->status == "cancelled")
                               <span class="label label-danger">Cancelled</span>
                              @endif
                            </td>

                            <td>
                              <label>Status : </label>
                              <br>
                              <select onchange="updatestatus('{{ $ri->id }}')" id="status{{ $ri->id }}">
                                <option {{ $ri->status == "pending" ? "selected" : "" }} value="pending">Pending</option>
                                <option {{ $ri->status == "approved" ? "selected" : "" }} value="approved">Approved</option>
                                <option {{ $ri->status == "cancelled" ? "selected" : "" }} value="cancelled">Cancelled</option>
                              </select>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
          </div>
    </div>
  @endsection

  @section('custom-script')
      <script>
          function updatestatus(value)
          {
            var id = value;
            var status = $('#status'+id).val();

            // console.log(status);

            $.ajax({
              method : 'GET',
              url : "{{ url('admin/update/status/report/') }}/"+id,
              data : {status : status},
              success : function(data){
                
                $('#st'+id).html('');

                if(data == "pending"){
                  $('#st'+id).append('<label class="label label-default">Pending</label>');
                }else if(data == "approved"){
                  $('#st'+id).append('<label class="label label-success">Approved</label>');
                }else{
                  $('#st'+id).append('<label class="label label-danger">Cancelled</label>');
                }
                

              }
              
            });
          }
      </script>
  @endsection