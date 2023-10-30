$(function() {
    $('#master_checkbox').on('click', function(e) {
        if ($(this).is(':checked',true))
        {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked',false);
        }
    });


    $('.delete_all_checkbox').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        if(allVals.length <=0)
        {
            alert("Please select row.");
        }  else {
            e.preventDefault();
            // open
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Sau khi xóa, bạn sẽ không thể khôi phục tệp, trưởng này!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var join_selected_values = allVals.join(",");

                        $.ajax({
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                "_token": $('meta[name="csrf-token"]').attr('content'),
                                "ids" : join_selected_values
                            },
                            url: $(this).data('url'),
                            success: function (data) {
                                window.location.reload();
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
                    }
                });
            // end

        }
    });

})

