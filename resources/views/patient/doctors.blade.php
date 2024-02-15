<x-navbar></x-navbar>
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mt-4 text-gray-800 mb-8 text-center">Docteurs spécialisés en : {{ $specialite->nom }}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($specialite->doctors as $doctor)
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
                <!-- Icône favoris -->
                <form action="{{ route('favoris.toggle', $doctor->id) }}" method="POST" class="absolute bottom-2 right-2">
                    @csrf
                    <!-- Bouton icône favoris -->
                    <button type="submit" class="text-red-500 hover:text-red-600">
                        <i class="{{ $doctor->isFavori(Auth::user()->id) ? 'fas' : 'far' }} fa-heart fa-lg"></i>
                    </button>
                </form>
                
                <a href="{{ route('aptient.appointment',['doctorID' =>  $doctor->id ] )}}" class="block p-6">
                    <img src="{{ asset('images/doctor.jpg') }}" alt="Profile" class="w-auto h-auto object-cover">
                    <h2 class="  text-2xl text-center font-bold text-gray-900">{{ $doctor->user->name }}</h2>
                </a>
                <div class="p-4">
                    <!--  étoiles -->
                    <div class="flex items-center">
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-gray-300"></i>
                    </div>
                    <button class="mt-4 bg-green-400 text-black px-4 py-2 rounded">Réserver</button>
                </div>
            </div>
        @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                <p class="text-gray-800 text-center">Aucun docteur trouvé pour cette spécialité.</p>
            </div>
        @endforelse
    </div>
</div>





        
        <x-footer></x-footer>



        <script>
            document.querySelectorAll('.favori-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const doctorId = this.getAttribute('data-doctor-id');
                    fetch(`/favorite/toggle/${doctorId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ doctorId: doctorId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.isFavorite) {
                            this.innerHTML = '<i class="fas fa-heart fa-lg"></i>'; // Change l'icône en cœur plein
                        } else {
                            this.innerHTML = '<i class="far fa-heart fa-lg"></i>'; // Change l'icône en cœur vide
                        }
                    });
                });
            });
        </script>
        
        