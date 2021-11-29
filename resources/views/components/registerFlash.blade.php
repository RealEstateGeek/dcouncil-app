@if(session()->has('registerSuccess'))
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right03 text-sm">
        <p>
            {{ session('registerSuccess') }}
        </p>
    </div>
@endif
