<x-app-layout>

<div class="max-w-6xl mx-auto bg-white p-4 mt-8">
    <h1 class="m-8 text-sky-400">Create Entity</h1>
    <form action="{{ isset($entity) ? route('entity.update', $entity->id) : route('entity.store') }}"  method="POST">
        @if(isset($entity))
        @method('PUT')
        @csrf
    @endif
    @csrf
       
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name"  id="name" value="{{ isset($entity) ? $entity->name : old('name') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label  for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="observation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Obsevation</label>
                <textarea name="observation" id="observation" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Obsevation...">
                    {{ isset($entity) ? $entity->observation : old('observation') }}
                </textarea>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                
                @if(isset($entity))
                Modiffier
                @else
                Ajouter
                @endif
            </button>
        </div>
    </form>
</div>

    <div class="bg-white p-8 overflow-auto mt-16 h-screen">
        <h2 class="text-2xl mb-4">Entities List</h2>
        
        <!-- Classes Table -->
        <div class="relative overflow-auto">
            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full bg-white border mb-20">
                    <thead>
                        <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white">
                            <th class="p-0">
                                <span class="block py-2 px-3 border-r border-gray-300">Nom</span>
                            </th>
                            <th class="p-0">
                                <span class="block py-2 px-3 border-r border-gray-300">Observation</span>
                            </th>

                            <th class="p-4 text-xs md:text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr class="border-b text-xs md:text-sm text-center text-gray-800">
                            <td class="p-2 md:p-4">{{ $item->name }}</td>
                            <td class="p-2 md:p-4">{{ $item->obsevation }}</td>
                            <td class="relative p-2 md:p-4 flex justify-center space-x-2">
                                        <!-- editing method  -->
                                <form action="{{ route('entity.edit', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <a href="{{route('entity.edit', $item->id)}}" class="text-sky-600" 
                                        title="Modifier Incident"> <i class="fa-solid fa-edit"></i></a>

                                </form>


                                        <!-- destroy method  -->
                                <form action="{{ route('entity.delete', $item->id) }}" method="POST" onsubmit="return confirm(' Etes vous sur de vouloir supprimer cette entitée? ');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600" title="Supprimer entity">
                                        <i class="fa-solid fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




  


</x-app-layout>