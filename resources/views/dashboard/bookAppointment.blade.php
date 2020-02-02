@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-body">
            <h5 class="card-title">Appointment</h5>
            <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row">
                    <div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero_config_length">
                        <label>Show <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                    </select> entries</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="zero_config_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control form-control-md" placeholder="" aria-controls="zero_config"></label>
                        <button style="margin-left:80px;" class="btn btn-info " data-toggle="modal" data-target="#myModal">
                            Book Appointment
                        </button>

                    </div>
            </div>
            </div>
            <div class="row"><div class="col-sm-12"><table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="zero_config" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="zero_config"  aria-label="Position: activate to sort column ascending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="zero_config" aria-label="Office: activate to sort column ascending">Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="zero_config"  aria-label="Age: activate to sort column ascending">Purpose</th>
                            <th class="sorting" tabindex="0" aria-controls="zero_config"  aria-label="Start date: activate to sort column ascending">Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="zero_config"  aria-label="Salary: activate to sort column ascending" >Modify</th>
                        </tr>
                    </thead>
                     @if(count($appointments) > 0)
            @foreach ($appointments as $appointment) 
                    <tbody>  
                         
        
                    <tr role="row" class="odd">
                            <td class="sorting_1">{{ $appointment->id }}</td>
                            <td>{{ $appointment->surname }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->purpose }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <button id="edit" data-toggle="modal" data-target="#myModalEdit" data-id="{{ $appointment->id }}"
                                     data-id="{{ $appointment->id }}"
                                    
                                class="btn btn-info" type="button">
                                    <i class="fa fa-edit"></i>
                                </button>
                             
                                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">

                                        <button  data-id="{{ $appointment->id }}" class="btn btn-danger deleteRecord" type="button">
                                                <i class="fa fa-trash"></i>
                                        </button>
                           
                            </td>
                        </tr>
                        
                    </tbody>
                    @endforeach
                    @else
                    <h2 class="text-info text-center" >No appointment found</h2>
                    @endif
                    <tfoot>
                        <tr>
                            <th >Name</th>
                            <th >Date</th>
                            <th>Purpose</th>
                            <th >Time</th>
                            <th >status</th>
                            <th >Modify</th>
                        </tr>
                    </tfoot>
                </table>
               
            </div>
        </div>
        <p > {{ $appointments->links() }}</p>
</div>
            </div>

        </div>


    </div>
            <!--modal section-->

    <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog modal-md modal-dialog-centered">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title text-uppercase text-white">Book Appointment</h4>
      </div>
      <div class="modal-body">
          
            <form id="bookapp">
                @csrf
                <div class="form-group">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">

                  <label class="text-info" for="surname">Surname:</label>
                  <input type="text" name="surname" placeholder="Surname" class=" @error('title') is-invalid @enderror form-control" id="surname" required>
                  @error('surname')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                  <label class="text-info" for="date">Date:</label>
                  <input type="date" name="date" class=" @error('title') is-invalid @enderror form-control" id="date" required>
                  @error('date')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                        <label class="text-info" for="purpose">Purpose:</label>
                        <textarea name="purpose" required placeholder="Purpose Here" class="@error('title') is-invalid @enderror form-control" rows="5" id="purpose"></textarea>
                        @error('purpose')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror  
                    </div>
                
              
      </div>
      <div class="modal-footer">
            <button onclick="move()" type="submit" id="submit" class="btn btn-info" >Book Appointment</button>
        </form>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--UPDATE DATA-->


<!-- Modal -->
<div id="myModalEdit" class="modal fade " role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title text-uppercase text-white">Update Appointment</h4>
            </div>
            <div class="modal-body">
                
                  <form id="userForm" name="userForm">
                      @csrf
                      <div class="form-group">
                            <input type="hidden" name="user_id" id="user_id">
                      {{-- <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}"> --}}
      
                        <label class="text-info" for="surname">Surname:</label>
                        <input  type="text" name="surname"
                         placeholder="Surname" 
                        class=" @error('title') is-invalid @enderror form-control" id="surname" required>
                        @error('surname')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
      
                      <div class="form-group">
                        <label class="text-info" for="date">Date:</label>
                        <input  type="date" name="date" class=" @error('title') is-invalid @enderror form-control" id="date" required>
                        @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
      
                      <div class="form-group">
                              <label class="text-info" for="purpose">Purpose:</label>
                              <textarea name="purpose" required placeholder="Purpose Here" class="@error('title') is-invalid @enderror form-control" rows="5" id="purpose"></textarea>
                              @error('purpose')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror  
                          </div>
                      
                    
            </div>
            <div class="modal-footer">
                  <button  type="submit" id="submit" class="btn btn-info" >Book Appointment</button>
              </form>
      
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      






<!--booking appointmet-->
<script>
    $(document).ready(function() {
        /**
         *  SUBMIT DATA
        */
        $('#bookapp').submit(function(event) {
            event.preventDefault();
           var surname = $('#surname').val();
           var date = $('#date').val();
           var purpose = $('#purpose').val();
           //var token = $('input[name=_token]').val();
           $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
           $.ajax({
                url: "{{ route('patient.book') }}",
                type:'POST',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'surname': surname,
                    'date': date,
                    'purpose':purpose
                },
                success: function (data) {
                    $('form').trigger('reset');
                    $('#myModal').modal('hide');
                    Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Appointment booked successfully',
                    showConfirmButton: true,
                    timer: 1500
                    }); 
                    setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
      }, 5000);                                           
                    
                },
                error: function (e) {
                    Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: 'Please fill the fields correctly!</a>'
                    });
                }
           });
        });




        /**
         *  delete DATApatient.delete
        */
        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
   
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {

        $.ajax({
                url: "appointment/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){

             }
            });

                    Swal.fire(
                    'Deleted!',
                    'Your appointment has been deleted.',
                    'success'
                    )

                    setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 5000);
                
                }
            })
    
        });


        /*
        *UPDATE APPOINTMENT
        */


        /* When click edit user */
    $('#edit').click(function () {
      var user_id = $(this).data('id');
      $.get('ajax-crud/' + user_id +'/edit', function (data) {
        //  $('#userCrudModal').html("Edit User");
        //   $('#btn-save').val("edit-user");
          //$('#ajax-crud-modal').modal('show');
          $('#username').val(data.surname);
          $('#date').val(data.date);
          $('#purpose').val(data.purpose);
      })
   });





});

</script>

@endsection