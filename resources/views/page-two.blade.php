@extends('shopify-app::layouts.default')
<style>
    /* table,
    th,
    td {
        border: 1px solid black
    } */
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
            <h3><b>Form Records</b></h3>
        </div>
    </div>
</section>
<section>
    <div class="card">
        <div class="row align-right">
            <div class="col-12" style="display: inline-flex">
                <a href="" class="button csv-btn" style="margin-right: 10px">Generate CSV</a>
               
            </div>
        </div>
        <div class="row">
            <div class="column twelve">
                <table>
                    <thead>
                        <tr>
                            <th><b>S.No</b></th>
                            <th><b>Shopify ID</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($formRecords)
                            @foreach ($formRecords as $record)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->sessionId }}</td>
                                    <td><a href="{{ URL::tokenRoute('getRecordsBySessionId', ['id' => $record->sessionId]) }}"><button
                                                class="secondary icon-edit"></button></a></td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
      
    
           

@endsection

@section('scripts')
    @parent

    <script>
        $(document).on('click', '.csv-btn', function (e) {
        e.preventDefault();

        // let filterValue = $('.lifeTimeValueFilter').val();
        $(this).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span class="sr-only">Exporting...</span>`);
        $(this).attr('disabled', true);
        let element = $(this);
        $.ajax({
            url: '/generate-csv',
            success: function (response) {
                console.log(response);
                element.html("Generate CSV");
                element.removeAttr('disabled');
                // location.href = response;
                location.href = window.location.origin + '/files/' + response;

            }
        });

    });
    </script>
@endsection