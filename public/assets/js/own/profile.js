function updateUser(id){
    $.ajax({
        type: "POST",
        url: "/profile/profile-edit-index",
        data: {
            _token,
            id,
        },
        success: async function (data) {
            if(data.success){
                document.getElementById('edit_id').value = id;
                document.getElementById('admin_edit_name').value = data.user.name;
                document.getElementById('admin_edit_role').value = data.user.role;
                $('#userEdit').modal('show');
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
