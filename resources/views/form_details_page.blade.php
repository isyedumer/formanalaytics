@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <section>
    </section>
    <section>
        <div style="width: 100%">
            <div class="columns one">
                <a href="{{ URL::tokenRoute('home') }}">
                    <button class="secondary icon-arrow-left"></button>
                </a>
            </div>
            <div class="columns eleven">
                <h3><b>Form Detail</b></h3>
            </div>
        </div>
    </section>
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
        <article>
            <div class="card columns six">
                <p>Total consent check</p>
                <p>{{ $totalConsentCheck }}</p>
            </div>
            <div class="card columns six">
                <p>Percentage consent check </p>
                <p>{{ $consentConversion }}%</p>
            </div>
        </article>
    </section>

    <section>
        <card class="full-width">
        <table>

            <thead>
                <tr>
                    <th>Fields</th>
                    <th>Submissions</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($fields as $key => $field)
                <tr>
                    <th>{{ $key }}</th>
                    <th>{{ $field }}</th>
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
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection