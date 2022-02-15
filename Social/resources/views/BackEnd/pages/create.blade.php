
<div class="card " >
    <div class="card-header card-header-primary">
        <h4 class="card-title">Add page</h4>
    </div>
    <div class="card-body">
        <form id="add">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >page name</label>
                        <input type="text" class="form-control"  style="border: none"  name="name">
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >page description</label>
                        <input type="text" class="form-control"  style="border: none"  name="description">
                    </div>
                </div>

            </div>
             <div class="row">

                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >meta_keywords</label>
                        <input type="text" class="form-control" style="border: none" name="meta_keywords">
                    </div>
                </div>

             </div>
            <div class="row">

                    <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >Meta description</label>
                        <input type="text" class="form-control" style="border: none"  name="meta_description">
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary pull-right">Add page</button>
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
            url: `{{route('page.store')}}`,
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
