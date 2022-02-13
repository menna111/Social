
<div class="card " >
    <div class="card-header card-header-primary">
        <h4 class="card-title">Add User</h4>
    </div>
    <div class="card-body">
        <form id="add">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >Username</label>
                        <input type="text" class="form-control"  style="border: none"  name="name">
                    </div>
                </div>

            </div>
             <div class="row">

                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >Password</label>
                        <input type="password" class="form-control" style="border: none" name="password">
                    </div>
                </div>

             </div>
            <div class="row">

                    <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >Email address</label>
                        <input type="email" class="form-control" style="border: none"  name="email">
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary pull-right">Add User</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>


<script>

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add').submit(function (e){
        e.preventDefault();

        console.log('hi');


        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: `{{route('user.store')}}`,
            data: formData,
            contentType: false,
            processData: false,

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

    })
</script>
