// Delete based on ID
function myDelete(id) {
    if(confirm('Padam?')) {

        var token = $('input[name="_token"]').attr('value')
        var dataToken = { '_token':token }

        $.ajax({
            url: app_url + '/jalan/'+id,
            method: 'DELETE',
            data: dataToken,
            success: function(res) { location.reload() },
            error: function(res) { alert(res.status) }
        });

    }
}

function mDelete(id) {
    if(confirm('Padam?')) {

        var token = $('input[name="_token"]').attr('value')
        var dataToken = { '_token':token }

        $.ajax({
            url: app_url + '/taman/'+id,
            method: 'DELETE',
            data: dataToken,
            success: function(res) { location.reload() },
            error: function(res) { alert(res.status) }
        });

    }
}

function sisaDelete(id) {
    if(confirm('Padam?')) {

        var token = $('input[name="_token"]').attr('value')
        var dataToken = { '_token':token }

        $.ajax({
            url: app_url + '/sisa/'+id,
            method: 'DELETE',
            data: dataToken,
            success: function(res) { location.reload() },
            error: function(res) { alert(res.status) }
        });

    }
}

function awamDelete(id) {
    if(confirm('Padam?')) {

        var token = $('input[name="_token"]').attr('value')
        var dataToken = { '_token':token }

        $.ajax({
            url: app_url + '/awam/'+id,
            method: 'DELETE',
            data: dataToken,
            success: function(res) { location.reload() },
            error: function(res) { alert(res.status) }
        });

    }
}

function rekodDelete(id) {
    if(confirm('Padam?')) {

        var token = $('input[name="_token"]').attr('value')
        var dataToken = { '_token':token }

        $.ajax({
            url: app_url + '/rekod/'+id,
            method: 'DELETE',
            data: dataToken,
            success: function(res) { location.reload() },
            error: function(res) { alert(res.status) }
        });

    }
}

function jalanSearch(taman) {

    $.ajax({
        method: 'GET',
        url: app_url + '/jalantaman/' + taman,
        error: function() {},
        success: function(res) {
            console.log(res)
            $('#jalan').empty()
            $.each(res, function(key, value){
                $('#jalan').append('<option value="'+key+'">'+value+'</option>')
            })
        },
    })
}

function editJalan(taman) {

    $.ajax({
        method: 'GET',
        url: app_url + '/jalantaman/' + taman,
        error: function() {},
        success: function(res) {
            $.each(res, function(key, value){
                $('#jalan').append('<option value="'+value+'">'+value+'</option>')
            })
        },
    })
}
