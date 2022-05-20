<main class="main-content">
    <div class="container-fluid py-4">
        @if (session()->has('message'))

            <div class="alert alert-success" role="alert">
                <span class="text-white"><strong>{{ session('message') }}</strong></span>
            </div>
        @endif
        {{-- Form Group --}}
        @include('components.forms.visi-misi-form')
    </div>
</main>
