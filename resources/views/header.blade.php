<section></section>
<section>
    <div style="width: 100%">
        <div class="columns seven">
            <h3><b> Form Tracking App</b></h3>
        </div>
        <div class="columns five align-right">
            {{-- <button>Plans</button> --}}
            <button>Guide</button>
        </div>
        <div class="columns twelve">
            <ul class="tabs">
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ URL::tokenRoute('home') }}">General Settings</a>
                </li>
                <li class="{{ request()->is('get-all-forms') ? 'active' : '' }}">
                    <a href="{{ URL::tokenRoute('getAllFormsData') }}">Forms </a>
                </li>
            </ul>
        </div>
    </div>
</section>
