@extends('backend.layout.app')
@section('title','users')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
              <div class="col-8">
                  <h4 class="card-title ">Users Table</h4>
                  <p class="card-category"> Here is you can edit or delete users</p>
              </div>
              <div class="col-4 text-right">
                  <button class="btn btn-white btn-round" data-bs-toggle="modal" data-bs-target="#adduser"  onclick="adduser()">
                      Add user
                  </button>
              </div>
          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th class="text-right">
                        Control
                    </th>

                    </thead>
                    <tbody>
          @forelse($users as $user)
                    <tr>
                        <td>
                            {{$user->id}}
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td class="text-right">
                            <button data-bs-toggle="modal" data-bs-target="#adduser" onclick="edit({{$user->id}})" style="border: none" type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm " data-original-title="Edit User">
                                <i class="material-icons">edit</i>
                            </button>

                            <button onclick="deleteuser({{$user->id}})" style="border: none" type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm " data-original-title="Remove User">
                                <i class="material-icons">close</i>
                            </button>
                        </td>

                    </tr>
          @empty
              <tr>
                  <td><h3>no users yet</h3></td>
              </tr>
          @endforelse
                    </tbody>

                    <!-- Modal -->
                    <div  class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body dark-edition" id="content">

                                </div>
                            </div>
                        </div>
                    </div>
                </table>
                {!! $users->links() !!}
            </div>
        </div>
    </div>


@endsection
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });


    function adduser(){
        $.ajax({
            type: "GET",
            url: `{{route('user.create')}}`,
            success:function (response){
                $('#content').html(response)
            }

        } )
    }

    function edit(id){

        $.ajax({
            type: "GET",
            url: `{{url('/admin/user/edit')}}/${id}`,
            success:function (response){
                $('#content').html(response)
            }

        } )

    }

    function deleteuser(id){

        $.ajax({
            type: "GET",
            url: `{{route('user.delete',$user->id)}}`,
            success: function(response) {
                console.log(response)
                if(response.status == true){
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: response.msg,
                    })
                    window.location.reload()
                }else{
                    // alert(response.msg);
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: response.msg,
                    })
                }

            }

        } )

    }
</script>
