$(document).ready(function(){

    var url = "/ajax-crud/public/keluarga";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var keluarga_id = $(this).val();

        $.get(url + '/keluarga' + keluarga_id, function (data) {
            //success data
            console.log(data);
            $('#keluarga_id').val(data.id_kk);
            $('#no_kk').val(data.no_kk);
            $('#alamat').val(data.alamat);
            $('#rt').val(data.rt);
            $('#rw').val(data.rw);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('.delete-task').click(function(){
        var keluarga_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/keluarga' + keluarga_id,
            success: function (data) {
                console.log(data);

                $("#task" + keluarga_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            no_kk: $('#no_kk').val(),
            alamat: $('#alamat').val(),
            rt: $('#rt').val(),
            rw: $('#rw').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var keluarga_id = $('#keluarga_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/keluarga' + keluarga_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var row = '<tr id="row' + data.id_kk + '"><td>' + data.id_kk + '</td><td>' + data.alamat + '</td><td>' + data.alamat + '</td><td>' + data.rt + '</td><td>' + data.rw + '</td>';
                row += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id_kk + '">Edit</button>';
                row += '<button class="btn btn-danger btn-xs btn-delete delete-row" value="' + data.id_kk + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tasks-list').append(row);
                }else{ //if user updated an existing record

                    $("#row" + keluarga_id).replaceWith( row );
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});