<x-dashbordAdmine> </x-dashbordAdmine>
<div class="container mx-auto mt-5">

    <h2>Liste des Spécialités</h2>

    <div class="flex justify-end mb-2">
        <button id="openAddModal" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter
        </button>
    </div>

    <div class="container mx-auto mt-5 flex justify-center">
        <table class="table-auto  w-auto mt-3">
        <thead>
            <tr>
                <th class="border px-4 py-2">Nom</th>
                <th class="border px-4 py-2">Opération</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specialites as $specialite)
            <tr>
                <td class="border px-4 py-2">{{ $specialite->nom }}</td>
                <td class="border px-4 py-2 flex justify-around">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mx-4 rounded">
                        Modifier
                    </button>
                    <a  onclick="return confirm('Are you sure to delete this?')"href="{{route('delet.spesialiter',$specialite->id)}}">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                        Supprimer
                    </button>
                </a>
                </td>
            </tr>
            @endforeach
        </tbody>
       
            
            
    </table>

</div>


<!-- Pop-up Ajouter Spécialité -->
<div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-4 rounded-lg max-w-sm mx-auto">
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <label for="specialiteNom" class="block text-gray-700 text-sm font-bold mb-2">Nom de Spécialité:</label>
                <input type="text" name="nom" id="specialiteNom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    Ajouter
                </button>
                <button type="button" id="closeAddModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Fermer
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('openAddModal').addEventListener('click', function() {
        document.getElementById('addModal').classList.remove('hidden');
    });

    document.getElementById('closeAddModal').addEventListener('click', function() {
        document.getElementById('addModal').classList.add('hidden');
    });

// Ouvrir la pop-up pour Modifier
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const specialiteId = button.getAttribute('data-id');
                const specialiteNom = button.getAttribute('data-nom');
                
                formSpecialite.action = `/specialites/${specialiteId}`; // URL de mise à jour
                formSpecialite.querySelector('[name=_method]').value = 'PUT';
                formSpecialite.querySelector('[name=nom]').value = specialiteNom;
                btnSubmitForm.textContent = 'Modifier';
                
                modalSpecialite.classList.remove('hidden');
            });
        });
    </script>
</body>
