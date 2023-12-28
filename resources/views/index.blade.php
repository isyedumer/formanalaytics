@extends('shopify-app.layouts.default')

@section('content')
    @include('header')
    <section>
        <div class="card">
            <div class="row">
                <div class="columns twelve response">
                </div>
            </div>
            <div class="">
                <form id="product-app-setting" action="" method="">
                    <div class="row">
                        <div class="columns four">
                            <label><b>App Status</b></label>
                            <em>App Enable/Disable</em>
                        </div>
                        <div class="columns eight">
                            <select name="app_status" id="">
                                <option value="0"
                                    @isset($appSetting)@if ($appSetting->app_status == 0) selected @endif @endisset>
                                    Disable</option>
                                <option value="1"
                                    @isset($appSetting)@if ($appSetting->app_status == 1) selected @endif @endisset>
                                    Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns twelve align-right">
                            <button>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#product-app-setting').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "/save-app-settings",
                    data: formData,
                    dataType: "json",
                    success: function(response) {

                        if (response.status == "success") {
                            $(".response").html('<div class="alert success"><dl><dt>' + response
                                .message + '</dt></dl></div>');
                            $(".response").show();
                            $('html').scrollTop(0);
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
