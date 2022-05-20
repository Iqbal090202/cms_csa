<main class="main-content">
    <div class="container-fluid py-4">
        @if (session()->has('message'))

            <div class="alert alert-success" role="alert">
                <span class="text-white"><strong>{{ session('message') }}</strong></span>
            </div>
        @endif
        {{-- Form Group --}}
        @include('components.forms.work-plan-form')

        {{-- Cards --}}
        @include('components.cards.work-plan-card')

        {{-- Tables --}}
        {{-- @include('components.tables.work-plan-table') --}}
    </div>
</main>
