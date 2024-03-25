@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <section>
    </section>
    
    <section style="padding-left: 20px">
        <div style="width: 100%">
            
            <div class="columns eleven">
                <h3><b>Dashboard</b></h3>
            </div>
        </div>
    </section>

    <div class="row align-right">
        <div class="col-12" style="display: inline-flex">
            <a href="{{ URL::tokenRoute('localTesting') }}" class="button" style="margin-right: 10px">Design Form</a>
            <a href="{{ URL::tokenRoute('form.settings.show') }}" class="button">Form Settings</a>
            <a href="{{ URL::tokenRoute('getRecords') }}" class="button" style="margin-left: 10px;">View Forms</a>
    </div>
    </div>
    <section>
      
        <article>
            <div class="card columns six">
                <p>Total form views</p>
                <p> {{ $totalFormViews }}</p>
            </div>
            <div class="card columns six">
                <p>Total form fills</p>
                <p>{{ $totalFormsFill }}</p>
            </div>
            <div class="card columns six">
                <p>Form fill conversion rate</p>
                <p>{{ $fillConversionsRate }}%</p>
            </div>
        </article>
    </section>

    <section>
        <article>
            <div class="card columns six">
                <p>Total unfinished submissions</p>
                <p>{{ $totalunfinishedSubmissions }}</p>
            </div>
            <div class="card columns six">
                <p>Total complete submissions</p>
                <p>{{ $totalFormSubmissions }}</p>
            </div>
            <div class="card columns six">
                <p>Form complete conversion Rate</p>
                <p>{{ $completeConversionsRate }}%</p>
            </div>
        </article>
    </section>

    <section>
        <card class="full-width">
        <table>

            <thead>
                <tr>
                    <th>Forms</th>
                    <th>Submissions</th>
                    <th>View</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($forms as $key => $form)
                <tr>
                    <th>{{ $key }}</th>
                    <th>{{ $form }}</th>
                    <th><a href="{{ URL::tokenRoute('form.view', ['form' => $key]) }}" class="button secondary icon-preview"></a></th>
                </tr>
            @endforeach
            </tbody>
            
        </table>
        </card>
    </section>

@endsection

@section('scripts')
    @parent

    <script>
        // actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection