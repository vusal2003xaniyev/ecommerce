let _token = $('meta[name="csrf-token"]').attr('content');

function Delete(id, url) {
    Swal.fire({
        title: 'Silmək istəyinizdən əminsinizmi?',
        showCancelButton: true,
        cancelButtonText: 'Ləğv etmək',
        confirmButtonText: 'Silmək',
        confirmButtonColor: '#cb0404',
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = url + id;
        }
    })
}
function postView(id, url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token,
            id,
        },
        success: async function (data) {
            if (data.success) {
                document.getElementById('title').value = data.data.title;
                document.getElementById('content').innerHTML =  data.data.content;
                document.getElementById('image').src = view_path+data.data.image;
                $('#modal').modal('show');
            }
        },
        error: function () {
            alert('Error... 501');
        },
        beforeSend: function () {
            showLoadingOverlay();
        },
        complete: function () {
            hideLoadingOverlay();
        },
    })
}

function Status(id, key, status, url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token,
            id,
            status: status,
        },
        success: async function (data) {
            if (data.success) {
                if (data.status == 1) {
                    document.getElementById('statusdata' + key).innerHTML = 'Aktiv';
                    document.getElementById('statusdata' + key).classList.remove('text-danger-500', 'bg-danger-500');
                    document.getElementById('statusdata' + key).classList.add('text-success-500', 'bg-success-500');
                    document.getElementById('status' + key).checked = true;
                    document.getElementById('status' + key).value = '0';
                } else {
                    document.getElementById('statusdata' + key).innerHTML = 'Deaktiv';
                    document.getElementById('statusdata' + key).classList.remove('text-success-500', 'bg-success-500');
                    document.getElementById('statusdata' + key).classList.add('text-danger-500', 'bg-danger-500');
                    document.getElementById('status' + key).checked = false;
                    document.getElementById('status' + key).value = '1';
                }
            }
        },
        error: function () {
            alert('Error... 501');
        },
        beforeSend: function () {
            showLoadingOverlay();
        },
        complete: function () {
            hideLoadingOverlay();
        },
    })
}
function StatusConfirm(id, key, status, url) {
    showLoadingOverlay();
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token,
            id,
            status: status,
        },
        success: async function (data) {
            hideLoadingOverlay();
            if (data.success) {
                if (data.status == 1) {
                    document.getElementById('status_confirm_data' + key).innerHTML = 'Aktiv';
                    document.getElementById('status_confirm_data' + key).classList.remove('text-danger-500', 'bg-danger-500');
                    document.getElementById('status_confirm_data' + key).classList.add('text-success-500', 'bg-success-500');
                    document.getElementById('status_confirm' + key).checked = true;
                    document.getElementById('status_confirm' + key).value = '0';
                } else {
                    document.getElementById('status_confirm_data' + key).innerHTML = 'Deaktiv';
                    document.getElementById('status_confirm_data' + key).classList.remove('text-success-500', 'bg-success-500');
                    document.getElementById('status_confirm_data' + key).classList.add('text-danger-500', 'bg-danger-500');
                    document.getElementById('status_confirm' + key).checked = false;
                    document.getElementById('status_confirm' + key).value = '1';
                }
            }
        },
        error: function () {
            hideLoadingOverlay();
            alert('Error... 501');
        },
        beforeSend: function () {
            showLoadingOverlay();
        },
        complete: function () {
            hideLoadingOverlay();
        },
    })
}

function StatusConfirmPost(general_key, key, confirm_status, url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token,
            general_key:general_key,
            confirm_status: confirm_status,
        },
        success: async function (data) {
            if (data.success) {
                new swal("Uğurlu!", "Status dəyişdirildi!", "success").then((result) => {

                });
            }else {
                new swal("Xəta!", "Status dəyşdirilmədi!", "error").then((result) => {

                });
            }
        },
        error: function () {
            alert('Error... 501');
        },
        beforeSend: function () {
            showLoadingOverlay();
        },
        complete: function () {
            hideLoadingOverlay();
        },
    })
}


function removeHtmlTagsWithDOMParser(inputString) {//html taglari silir
    var doc = new DOMParser().parseFromString(inputString, 'text/html');
    return doc.body.textContent || '';
}
