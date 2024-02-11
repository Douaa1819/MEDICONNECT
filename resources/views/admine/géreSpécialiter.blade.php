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
                    <button class="btn-edit bg-blue-500 hover:bg-blue-700 text-white  mx-4 font-bold py-1 px-2 rounded"
                    data-id="{{ $specialite->id }}"
                    data-nom="{{ $specialite->nom }}">
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
        <form action="{{ route('specialites.store') }}" method="POST">
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


<!-- Pop-up de Modification -->
<div id="modalEdit" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <form id="editForm" action="{{ route('specialites.update', ['id' => ':id']) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            @method('PUT')
            <input type="hidden" id="specialiteId" name="id">
            <div class="mb-4">
                <label for="editNom" class="block text-gray-700 text-sm font-bold mb-2">Nom de la Spécialité:</label>
                <input type="text" id="editNom" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </button>
                <button type="button" id="closeEditModal" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
    </script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.btn-edit');
        const modalEdit = document.getElementById('modalEdit');
        const closeEditModal = document.getElementById('closeEditModal');
    
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = button.getAttribute('data-id');
                const nom = button.getAttribute('data-nom'); // Assurez-vous que cette ligne utilise `nom` pour correspondre avec l'attribut.
    
                const form = document.getElementById('editForm');
                form.action = `/specialites/update/${id}`; // Met à jour l'action avec l'ID correct
                document.getElementById('editNom').value = nom; // Assurez-vous que cette ligne utilise la même variable `nom`.
    
                modalEdit.classList.remove('hidden');
            });
        });
    
        closeEditModal.addEventListener('click', function() {
            modalEdit.classList.add('hidden');
        });
    });
    </script>
    
    
    
</body>
