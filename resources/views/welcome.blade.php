@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <section>
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
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection