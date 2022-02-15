@extends('backend.layout.app')
@section('title','skills')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
              <div class="col-8">
                  <h4 class="card-title ">skills Table</h4>
                  <p class="card-skill"> Here is you can edit or delete skills</p>
              </div>
              <div class="col-4 text-right">
                  <button class="btn btn-white btn-round" data-bs-toggle="modal" data-bs-target="#addskill"  onclick="adduser()">
                      Add skill
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

                    <th class="text-right">
                        Control
                    </th>

                    </thead>
                    <tbody>
          @forelse($skills as $skill)
                    <tr>
                        <td>
                            {{$skill->id}}
                        </td>
                        <td>
                            {{$skill->name}}
                        </td>

                        <td class="text-right">
                            <button data-bs-toggle="modal" data-bs-target="#addskill" onclick="edit({{$skill->id}})" style="border: none" type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm " data-original-title="Edit User">
                                <i class="material-icons">edit</i>
                            </button>

                            <button onclick="deleteskill({{$skill->id}})" style="border: none" type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm " data-original-title="Remove User">
                                <i class="material-icons">close</i>
                            </button>
                        </td>

                    </tr>
          @empty
              <tr>
                  <td><h3>no skill yet</h3></td>
              </tr>
          @endforelse
                    </tbody>

                    <!-- Modal -->
                    <div  class="modal fade" id="addskill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                {!! $skills->links() !!}
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
            url: `{{route('skill.create')}}`,
            success:function (response){
                $('#content').html(response)
            }

        } )
    }

    function edit(id){

        $.ajax({
            type: "GET",
            url: `{{url('/admin/skill/edit')}}/${id}`,
            success:function (response){
                $('#content').html(response)
            }

        } )

    }

    function deleteskill(id){

        $.ajax({
            type: "GET",
            url: `{{url('/admin/skill/delete')}}/${id}`,
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
