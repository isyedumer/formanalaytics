@extends('shopify-app::layouts.default')

<style>
    table,
    th,
    td {
        border: 1px solid black
    }

    #form-fields-table {
        cursor: grabbing;
    }
</style>

@section('content')
    <section></section>
    <section>
        <div style="width: 100%">
            <div class="columns one">
                <a href="{{ URL::tokenRoute('home') }}">
                    <button class="secondary icon-arrow-left"></button>
                </a>
            </div>
            <div class="columns eleven">
                <h3><b>Design Form</b></h3>
            </div>
        </div>
    </section>
    <section>
        <div class="card">
            <div class="columns twelve response"></div>
            <div class="columns twelve">
                <form id="add-fields-form" action="" method="">
                    <div class="row">
                        <div class="columns four">
                            <label><b>Enter Title</b></label>

                        </div>
                        <div class="columns eight">
                            <input type="text" name="title" value="" required placeholder="e.g Name, Email, Phone No, etc"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns four">
                            <label><b>Select Type</b></label>
                        </div>
                        <div class="columns eight">
                            <select class="custom-type" id="select-type" name="type" required>
                                <option value="text">Text</option>
                                <option value="email">Email</option>
                                <option value="number">Number</option>
                                <option value="selectbox">Dropdown</option>
                                <option value="radio">Radio Button</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>
                    </div>
                    <div class="row custom-options">
                        <div class="columns four">
                            <label><b>Options</b></label>
                            <small>Enter Comma seperated (option1,option2,option3)e.g male,female .</small>
                        </div>
                        <div class="columns eight">
                            <input type="text" name="options" value="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns twelve align-right">
                            <button type="submit" id="submit-btn">Add Field</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="card">

            <div class="row">
                <h3 style="margin-bottom:0"><b>Form View</b></h3>
                <small>Drag the rows to adjust the positioning of fields.</small>
                <div class="column twelve">
                    <table id="form-fields-table">
                        <tbody>
                            @isset($fieldsRecords)
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($fieldsRecords as $fields)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>@php
                                            echo $i;
                                        @endphp</td>
                                        <td>{{ $fields->title }}</td>
                                        <td>{{ $fields->type }}</td>
                                        <td>{{ $fields->options }}</td>
                                        <td><button id="remove-field" class="secondary icon-trash"></button></td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="columns twelve align-right">
                    <button id="save-table-records">Save</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
    
        // actions.TitleBar.create(app, { title: 'Welcome' });
        $(document).ready(function() {

// drag and drop start

$("#form-fields-table tbody").sortable({
    helper: 'clone',
    stop: function(event, ui) {
        updateRowNumbers();
    }
}).disableSelection();

function updateRowNumbers() {
    $("#form-fields-table tbody tr").each(function(index) {
        $(this).find("td:first").text(index + 1);
    });
}

$("#form-fields-table tbody").on("click", "#remove-field", function() {
    $(this).closest("tr").remove();
    updateRowNumbers();
});

// drag and drop end




$('.custom-options').hide();
$('#save-table-records').hide();
if ($("#form-fields-table tbody tr").length > 0) {
    $('#save-table-records').show();
}

$('#select-type').change(function(e) {
    var valueSelect = $(this).val();
    if (valueSelect === 'checkbox' || valueSelect === 'radio' || valueSelect === 'selectbox') {
        $('.custom-options').show();
        $("input[name='options']").attr('required', true);
    } else {
        $('.custom-options').hide();
        $("input[name='options']").attr('required', false);
    }
});



$("#add-fields-form").on("submit", function(e) {
    e.preventDefault();
    var title = $("input[name='title']").val();
    var type = $("#select-type").val();
    var options = $("input[name='options']").val();


    var id = $("#form-fields-table tbody tr").length + 1;


    $("#form-fields-table tbody").append(`
        <tr>
            <td><input type='hidden' name='id' value=''> ${id}</td>
            <td>${title}</td>
            <td>${type}</td>
            <td>${options}</td>
            <td><button id="remove-field" class="secondary icon-trash"></button></td>
        </tr>
     `);

    if ($("#form-fields-table tbody tr").length > 0) {
        $('#save-table-records').show();
    }

    // Clear the form  fields
    $("input[name='title']").val("");
    $("#select-type").val("text");
    $("input[name='options']").val("");
});

$(document).on("click", "#remove-field", function(e) {
    e.preventDefault();
    $(this).closest('tr').remove();

    if ($("#form-fields-table tbody tr").length == 0) {
        $('#save-table-records').show();
    }

});



$("#save-table-records").on("click", function() {
    // Create an array to store records
    var records = [];

    // Loop through each row in the table
    var pos = 0;
    $("#form-fields-table tbody tr").each(function() {
        pos++;
        var id = $(this).find("input[name='id']").val();
        var title = $(this).find("td:eq(1)").text();
        var type = $(this).find("td:eq(2)").text();
        var options = $(this).find("td:eq(3)").text();

        // Create an object for each record
        var record = {
            id: id,
            title: title,
            type: type,
            options: options,
            position: pos
        };

        // Push the record to the array
        records.push(record);
    });

    // Send the records via AJAX
    $.ajax({
        url: "/save-form-feilds-records",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(records),
        success: function(response) {
            if (response.status == 200) {
                console.log(response);
                $(".response").html('<div class="alert success"><dl><dt>' + response
                    .message + '</dt></dl></div>');
                $(".response").show();
                $('body').scrollTop(0);

                setTimeout(() => {
                    $('.response').fadeOut(200);
                }, 9000);
            }
        }
    });
});




});
    </script>
@endsection