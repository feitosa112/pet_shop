<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>


 <!-- Template Javascript -->
 {{-- <script src="{{ asset('js/main.js') }}"></script> --}}


    <div id="app">
       @include('partials.navbar')
       @include('flash-message')
        <main class="py-4">
            @yield('content')
            @yield('scripts')
        </main>

    </div>
