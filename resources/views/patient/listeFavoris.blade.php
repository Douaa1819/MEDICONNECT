{{-- Liste des favoris --}}
<x-navbar></x-navbar>
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mt-4 text-gray-800 mb-8 text-center">Mes Docteurs Favoris</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($doctors as $doctor)
        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
            <a href="{{ route('Doctor.profile',['doctorID' => $doctor->id ]) }}" class="block p-6">
                <img src="{{ asset('images/doctor.jpg') }}" alt="Profile" class="w-auto h-auto object-cover">
                <h2 class="text-2xl text-center font-bold text-gray-900">{{ $doctor->user->name }}</h2>
            </a>
        </div>
        @empty
        <div class="col-span-full">
            <p class="text-gray-800 text-center">Aucun docteur trouvé dans vos favoris.</p>
        </div>
        @endforelse
    </div>
</div>
<x-footer></x-footer>
