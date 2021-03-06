@extends('layouts/master')
@section('head')

@endsection
@section('content')
        
        <!--**********************************
            Content body start
        ***********************************-->

<cui-breadcrumb>
  <ol class="breadcrumb">
    <li class="breadcrumb-item" ng-reflect-ng-class="[object Object]">
      <a ng-reflect-router-link="/" href="#/">Home</a>
    </li>
    <li class="breadcrumb-item active" ng-reflect-ng-class="[object Object]">
      <span tabindex="0" >Task Status</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list tasks">
    <div class="row" id="section_first">
    <div class="col-lg-12">
      <div class="msg">
        <div id="success_message" style="margin: 20px 0px;"></div>
      </div>
      <ul id="update_msgList"></ul>
      <ul id="save_msgList"></ul>
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add Task</a>
            </div>
        </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Tasks
        </div>
        <div class="card-body">
          <div class="search_box">
            <div class="input-group">
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <!-- <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i> </button> -->
            </div>
          </div>
          <table class="table table-striped responsive all_table" id="table">
            <thead>
              <tr>
                <th style="width: 70px;">S No.</th>
                <th>Task Title</th>
                <th>Task Description</th>
                <th>Assign To</th>
                <!-- <th>Address</th>
                <th>Date</th> -->
                <th>Status</th>
                <th style="text-align: right;">Action</th>
              </tr>
            </thead>
            <tbody id="myTable">
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>

     <div class="row"  id="section_second" style="display:none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-primary"><i class="fa fa-list" style="margin-right: 6px;"></i>Tasks List</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Add Task
        </div>
        <div class="card-body pending_approval">
          <form id="task_status" name="postForm" method="POST">
            @csrf
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                   <input type="hidden" id="task_id" />
                  <label for="name">Task Title</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control task_title" name="task_title" id="task_title" aria-describedby="task_title" value="{{ old('task_title') }}" placeholder="Task Title" required >
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Assign to</label>
              </div>
              <div class="col-md-9">
                <select class="form-control assign_to" name="assign_to" id="assign_to" required >
                    <option value="Ward Prabhari">Ward Prabhari</option>
                    <option value="Mandal Prabhari">Mandal Prabhari</option>
                    <option value="Booth Prabhari">Booth Prabhari</option>
                    <option value="Gali Prabhari">Gali Prabhari</option>
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">Volunteer</label>
                </div>
                <div class="col-md-9">
                  <input type="text" id="volunteer" class="form-control" name="volunteer" aria-describedby="volunteer" value="{{ old('volunteer') }}" placeholder="Volunteer Name" required >
                  <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Address</label>
                </div>
                <div class="col-md-9">
                  <textarea name="address" id="address" class="form-control" placeholder="Address" required ></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Task Description</label>
                </div>
                <div class="col-md-9">
                  <textarea name="task_description" id="task_description" class="form-control task_description" placeholder="Task Description" required ></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success sub_task">Submit</button>
              <button type="submit" class="btn btn-success update_task">Update</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>

  {{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Volunteer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

  @endsection

        <!--**********************************
            Content body end
        ***********************************-->
@section('script')
<script>
  
  $("#show_second").click(function(){
    $("#section_first").hide();
    $("#section_second").show();
    $('#task_status')[0].reset();
    $('.update_task').hide();
    $('.sub_task').show();

  });

  $("#show_first").click(function(){
    $("#section_second").hide();
    $("#section_first").show();
  });

</script>
<script type="text/javascript">

  $(document).ready(function () {

        fetchtaskstatus();

        function fetchtaskstatus() {
          //alert("working");
            $.ajax({
                type: "GET",
                url: "/fetch-task-status",
                dataType: "json",
                success: function (response) {
                     console.log(response);
                    $('tbody').html("");
                    $.each(response.taskStatus, function (key, item) {
                        $('tbody').append(`<tr>
                            <td>` + item.id + `</td>
                            <td>` + item.task_title + `</td>
                            <td>` + item.task_description + `</td>
                            <td>` + item.assign_to + `</td>
                            <td>N/A</td>
                            
                            <td><button type="button" value="` + item.id + `" class="btn btn-info editbtn btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>
                            <button type="button" value="` + item.id + `" class="btn btn-danger deletebtn btn-sm" title="Delete"><i class="fa fa-trash"></i></button></td>
          </tr>`);
                    });
                }
            });
        }

       $('#task_status').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                type: "POST",
                url: "{{ url('task-status') }}",
                data: $('#task_status').serialize(),
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    } else if(response.status == 200) {
                        notification('success',response.message);

                        $('#task_status')[0].reset();
                        $('#section_second').hide();
                        $('#section_first').show();
                        fetchtaskstatus();
                    }else{
                      notification('danger',response.error,5000);
                    }
                }
            });

        });

       /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var task_id = $(this).val();
            //alert(volunteer_id);
            $('#section_second').show();
            $('#section_first').hide();
            $('.sub_task').hide();
            $('.update_task').show();
            $.ajax({
                type: "GET",
                url: "/edit-task-status/" + task_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                         //console.log(response.taskStatus.task_title);
                        $('#task_title').val(response.taskStatus.task_title);
                        $('#assign_to').val(response.taskStatus.assign_to);
                        $('#task_description').val(response.taskStatus.task_description);
                        $('#address').val(response.taskStatus.address);
                        $('#volunteer').val(response.taskStatus.volunteer_name);
                        $('#task_id').val(task_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_task', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#task_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-task-status/" + id,
                data: $('#task_status').serialize(),
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_volunteer').text('Update');
                    } else if(response.status == 200) {
                        $('#update_msgList').html("");

                        notification('success',response.message);
                        $('.update_task').text('Update');
                        $('#section_second').hide();
                        $('#section_first').show();
                        fetchtaskstatus();
                    }else{
                      notification('danger',response.error,5000);
                    }
                }
            });

        });

       /* edit ajax*/

       /* delete volunteer */

        $(document).on('click', '.deletebtn', function () {
            var task_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(task_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var task_id = $('#deleteing_id').val();
            //alert(task_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-task-status/" + task_id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchtaskstatus();
                    }
                }
            });
        });

       /* delete volunteer */

      



      

    });

</script>
 <!-- /* search function */ -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
 <!-- /* search function */ -->
@endsection