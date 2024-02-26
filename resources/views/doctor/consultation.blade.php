<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../public/image/licon.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
</body>
</html>


<form method="POST" action="{{ route('consultation.add') }}"  class="max-w-md mx-auto mt-8">
  @csrf
  @method('PUT')
    <div class="mb-5">
      <label for="symptômes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">symptômes</label>
      <input type="text" id="symptômes"  name="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Describe symptoms" required />
     <input type="hidden" name="appointmentID" value="{{ $reservationID }}">
    </div>
    <div class="mb-5">
      <label for="nbmrJour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Jour de repos</label>
      <input type="text" name="nbmrJour"  id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" required />
      <input type="hidden" name="doctorID" value="{{ Auth::user()->doctor->id }}">
       <input type="hidden" name="patientID" value="{{ $patientID }}">
      <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Médicaments</label>
        @foreach ($medicaments as $medicament)
          <div class="flex items-center mb-1">   
            
            <input id="medicaments_{{ $medicament->id }}" type="checkbox" name="medicaments[]" value="{{ $medicament->id }}" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="medicaments_{{ $medicament->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $medicament->name }}</label>
          </div>
        @endforeach
      </div>
    <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submite</button>
  </form>