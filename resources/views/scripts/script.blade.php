<script src="js/jquery-3.6.0.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/spur.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/slectdropdown.js"></script>

<!-- main script area start-->
<script>
var g_is_edit_active = false;
var g_current_id;

$(document).ready(function() {
    showDatas();

    $('.usericonTigger').click(function(evt) {
        $('.topuserDropdown').toggleClass('showtopuserDropdown');
    });

    $('body').click(function(evt) {
        if ($(evt.target).closest('.usericonTigger, .topuserDropdown').length)
            return;
        $('.topuserDropdown').removeClass('showtopuserDropdown');
    });
    //token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    //diasble enter button
    $('#stationaryCombustionForm').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    //reset datas
    $('#resetDataConfirmBtn').click(function() {
        g_is_edit_active = false;
        $('#resaultArea').find('input')
            .each(function() {
                $(this).val('');
            });
        $('#inputArea').find('input')
            .each(function() {
                $(this).val('');
            });
        $("#stationaryCombustionForm select").prop("selectedIndex", 0);
        $(".select-selected").html('Seçiniz');
        $(".same-as-selected").removeClass('same-as-selected')
        var form = $('#stationaryCombustionForm').serialize();
    });

    //delete data
    $(document).on('click', '.deletebtn', function(e) {
        e.preventDefault();
        var data = $(this).val();
        deleteCalculations(data)
    });

    //show datas to be edited  
    $(document).on('click', '.editbtn', function(e) {
        e.preventDefault();
        g_is_edit_active = true;
        var data = $(this).val();
        g_current_id = data;
        var url = "{{URL::TO('getSingle')}}"
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'id': data
            },
            dataType: 'json',
            success: function(response) {
                $('#co2').val(response.CH4);
                $('#ch4').val(response.CO2);
                $('#n2o').val(response.CO2E);
                $('#co2e').val(response.N2O);
                $('#amount_of_fuel').val(response.amount_of_fuel);
                $("#facility_id").val(response.facilty_id);
                $(".select-selected:eq(0)").html(response.facilty_name);
                $("#year").val(response.year);
                $(".select-selected:eq(1)").html(response.year);
                $("#fuel").val(response.fuel_id);
                $(".select-selected:eq(2)").html(response.fuel);
                $("#units").val(response.units_id ?? "0");
                $(".select-selected:eq(3)").html(response.units);
                var form = $('#stationaryCombustionForm').serialize();
            }
        });
    });

    //store or update data when clicked button
    $('#storeFormData').click(function() {
        if (g_is_edit_active) {
            updateCalculations(isValid());
        } else {
            store(isValid());
        }
    })

    //when input or select chance check all areas filled
    //if all inputs fillec call calculate func. 
    $('input,select').change(function() {
        isValid() ? calculate(isValid()) : '';
    })

});

//this func. check all inputs an selects are filled.
function isValid() {
    var isValid = true;
    $("select").each(function() {
        var element = $(this);
        if (element.val() == 0) {
            return isValid = false;
        }
    });
    if ($("#amount_of_fuel").val() == '') {
        return isValid = false;
    }
    return isValid;
};

//delete operation
function deleteCalculations(id) {
    var url = "{{URL::TO('delete')}}"
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'id': id
        },
        dataType: 'json',
        success: function(response) {
            showDatas();
            showDeleteAlert();
        }
    });
    showDatas();
}

//show SUCCESS alert
function showSuccesAlert() {
    $("#succesAlert").show().delay(3000).fadeOut();
}

//show EDİT alert
function showEditAlert() {
    $("#editAlert").show().delay(3000).fadeOut();
}

//show DELETE alert
function showDeleteAlert() {
    $("#deleteAlert").show().delay(3000).fadeOut();
}

//when we click edit we need to get data which we think to edit 
//this func. gets editable data
function getSingle(id) {
    var url = "{{URL::TO('getSingle')}}"
    var obj;
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'id': id
        },
        dataType: 'json',
        success: function(response) {
            return response;
        }
    });

}

//this func check edit mod and update data
function updateCalculations(isValid) {

    if (isValid) {
        var form = $('#stationaryCombustionForm').serialize() + '&id=' + g_current_id;
        var url = "{{URL::TO('update')}}"
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'json',
            success: function(response) {}
        })
        showDatas();
        showEditAlert();
    }
}

//calculate datas and show resaults
function calculate(isValid) {
    if (isValid) {
        var form = $('#stationaryCombustionForm').serialize();
        var url = "{{URL::TO('calculate')}}"
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'json',
            success: function(response) {
                $('#co2').val(response.co2Value);
                $('#ch4').val(response.ch4Value);
                $('#n2o').val(response.n2oValue);
                $('#co2e').val(response.co2eValue);
            }
        })
    }
}

//store data
function store(isValid) {
    if (isValid) {
        var form = $('#stationaryCombustionForm').serialize();
        var url = "{{URL::TO('store')}}";
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'json',
            success: function(response) {
                showDatas();
                showSuccesAlert();
            }
        })
    }
}

//show,list data
function showDatas() {
    $.get("{{URL::TO('datatable')}}", function(data) {
        $('#datatable').empty().append(data);

    })
}
</script>
<!-- main script area end-->

<script src="js/jquery.basictable.min.js"></script>
<script>
$(document).ready(function() {
    $('.basicTable').basictable({
        breakpoint: 767
    });
});
</script>
<script src="js/form-data.js"></script>

<script src="js/jquery.nicescroll.min.js"></script>
<script>
$(document).ready(function() {
    $(".boxscroll").niceScroll({
        cursorborder: "",
        cursorcolor: "#0D1840",
        cursoropacitymax: 0.7,
        boxzoom: true,
        touchbehavior: true
    }); // 
});
</script>