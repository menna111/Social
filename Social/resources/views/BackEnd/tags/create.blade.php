
<div class="card " >
    <div class="card-header card-header-primary">
        <h4 class="card-title">Add tag</h4>
    </div>
    <div class="card-body">
        <form id="add">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >tag name</label>
                        <input type="text" class="form-control"  style="border: none"  name="name">
                    </div>
                </div>

            </div>


            <button type="submit" class="btn btn-primary pull-right">Add tag</button>
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

        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: `{{route('tag.store')}}`,
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
