@extends('shopify-app::layouts.default')
<style>
   
</style>
@section('content')
    <!-- You are: (shop domain name) -->
   
    <section></section>
    <section>
        <div style="width: 100%">
            <div class="columns one">
                <a href="{{ URL::tokenRoute('getRecords') }}">
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

            <div class="row">
                <div class="column twelve">
                    <table>
                        <thead>
                            <tr>
                                <th><b>Title</b></th>
                                <th><b>Value</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @isset($sessionIdRecords)
                                @foreach ($sessionIdRecords as $record)
                                    <tr>
                                        <td>{{ $record->title }}</td>
                                        <td>{{ $record->value }}</td>
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
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection