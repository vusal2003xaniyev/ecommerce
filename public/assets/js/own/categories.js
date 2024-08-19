window.onload = function() {
    $main_category_value = document.getElementById('category_main').value;
    if ( $main_category_value != 'none' && pages_add){
        SelectBox($main_category_value,'/posts/get-sub-catagories');
    }
};

function SelectBox(key,url){
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token,
            key:key,
        },
        success: async function (data) {
            if(data.categories.length > 0){
                document.getElementById('subCatagoriesDiv').style.display = 'block';
                let select =  document.getElementById('subCatagories');
                select.innerHTML = '';
                let option = ` <option selected disabled>Selecet Sub catagory</option>`
                for (let i = 0; i < data.categories.length; i++) {
                    const selected = oldSubCategory == data.categories[i].general_key ? "selected" : "";
                    option += `<option value="${data.categories[i].general_key}" ${selected}>${data.categories[i].title}</option>`;
                }


                select.innerHTML = option ;
            }else{
                document.getElementById('subCatagoriesDiv').style.display = 'none';
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

function categoriesStatus(general_key,key,status,url){
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token,
            general_key,
            status:status,
        },
        success: async function (data) {
            if(data.success){
                if(data.status == 1){
                    document.getElementById('statusdata'+key).innerHTML = 'Active';
                    document.getElementById('statusdata'+key).classList.remove('text-danger-500','bg-danger-500');
                    document.getElementById('statusdata'+key).classList.add('text-success-500','bg-success-500');
                    document.getElementById('status'+key).checked = true;
                    document.getElementById('status'+key).value = '0';
                }else{
                    document.getElementById('statusdata'+key).innerHTML = 'Deactive';
                    document.getElementById('statusdata'+key).classList.remove('text-success-500','bg-success-500');
                    document.getElementById('statusdata'+key).classList.add('text-danger-500','bg-danger-500');
                    document.getElementById('status'+key).checked = false;
                    document.getElementById('status'+key).value = '1';
                }
                updateAltKategoriler(data);
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

//Alt Kateqoriya aktiv edilende esas kateqoriyani yoxlayir
function updateAltKategoriler(status) {
    if (status.parent_check == false) {
        new swal("Xəta!", "Kateqoriyanın Əsas Kateqoriyası deaktiv edildiyi üçün aktivləşdirmək mümkün olmadı!", "error").then((result) => {

        });
    } else if (status.success == false) {
        new swal("Xəta!", "Xəta baş verdi. Zəhmət olmasa bir daha cəhd edin!", "error").then((result) => {

        });
    }else if(status.status == 0) {
        new swal("Uğurlu!", "Status deaktivdir!", "success").then((result) => {

        });
    }else if (status.status == 1) {
        new swal("Uğurlu!", "Status aktivdir!", "success").then((result) => {

        });
    }
}
