function viewEdit(id) {
    $.ajax({
        type: "POST",
        url: "/product/view-product",
        data: {
            _token,
            id,
        },
        success: async function (data) {
            if (data.success) {
                document.getElementById("edit_id").value = data.product.id;
                document.getElementById("edit_title").value =
                    data.product.title;
                document.getElementById("edit_price").value =
                    data.product.price;
                document.getElementById("edit_stock").value =
                    data.product.stock;
                document.getElementById("edit_description").value =
                    data.product.description;
            }
        },
        error: function () {
            alert("Error... 501");
        },
        beforeSend: function () {
            showLoadingOverlay();
        },
        complete: function () {
            hideLoadingOverlay();
        },
    });
}
function viewOrder(id) {
    $.ajax({
        type: "POST",
        url: "/product/view-order",
        data: {
            _token,
            id,
        },
        success: async function (data) {
            if (data.success) {
                console.log(data.product);
                document.getElementById("order_id").value = data.product.id;
                document.getElementById("order_price").value = data.product.price;

                document.getElementById("edit_id").value = data.product.id;

                document
                    .getElementById("order_stock")
                    .setAttribute("max", data.product.stock);

                document.getElementById("view_stock").value =
                    data.product.stock;
            }
        },
        error: function () {
            alert("Error... 501");
        },
        beforeSend: function () {
            showLoadingOverlay();
        },
        complete: function () {
            hideLoadingOverlay();
        },
    });
}

function StatusProduct(id, status) {
    $.ajax({
        type: "POST",
        url: "/product/status-change",
        data: {
            _token,
            id,
            status,
        },
        success: async function (data) {
            if (data.success) {
                new swal("Uğurlu!", "Status dəyişdirildi!", "success").then(
                    (result) => {}
                );
            } else {
                new swal("Xəta!", "Status dəyşdirilmədi!", "error").then(
                    (result) => {}
                );
            }
        },
        error: function () {
            alert("Error... 501");
        },
        beforeSend: function () {
            showLoadingOverlay();
        },
        complete: function () {
            hideLoadingOverlay();
        },
    });
}
