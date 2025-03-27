<x-app-layout>
    <div class="bg-white p-8 overflow-auto mt-16 h-screen">
        <h2 class="text-2xl mb-4">Incidents List</h2>
        <!-- Classes Table -->
        <div class="relative overflow-auto">
          <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full bg-white border mb-20">
              <thead>
                <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white">
                  <th class="p-0">
                    <span class="block py-2 px-3 border-r border-gray-300">heure de debut</span>
                  </th>
                  <th class="p-0">
                    <span class="block py-2 px-3 border-r border-gray-300">heure de fin</span>
                  </th>
                  <th class="p-0">
                    <span class="block py-2 px-3 border-r border-gray-300">type panne</span>
                  </th>
                  <th class="p-0">
                    <span class="block py-2 px-3 border-r border-gray-300">Action</span>
                  </th>
                  <th class="p-0">
                    <span class="block py-2 px-3 border-r border-gray-300">Impact</span>
                  </th>
                  <th class="p-0">
                    <span class="block py-2 px-3 border-r border-gray-300">Observation</span>
                  </th>
                  <th class="p-0">
                    <span class="block py-2 px-3 border-r border-gray-300">status</span>
                  </th>
                  <th class="p-4 text-xs md:text-sm"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($incidents as $incident)
                <tr class="border-b text-xs md:text-sm text-center text-gray-800">
                  <td class="p-2 md:p-4">{{ $incident->heure_started }}</td>
                  <td class="p-2 md:p-4">{{ $incident->heure_end }}</td>
                  <td class="p-2 md:p-4">{{ $incident->type_panne }}</td>
                  <td class="p-2 md:p-4">{{ $incident->action }}</td>
                  <td class="p-2 md:p-4">{{ $incident->inpact }}</td>
                  <td class="p-2 md:p-4">{{ $incident->obsevation }}</td>
                  @if ($incident->status == 1)
                  <td class="p-2 md:p-4 text-green-600">Réalisé</td>    
                  @elseif($incident->status !== 0)
                  <td class="p-2 md:p-4 text-orange-600"> En Cours</td>
                    @else 
                    <td class="p-2 md:p-4 text-red-600">En Investigation</td>
                  @endif
                  <td class="relative p-2 md:p-4 flex justify-center space-x-2">
                    <a href="{{route('incident.edit', $incident->id)}}" class="text-sky-600" title="Modifier Incident"> <i class="fa-solid fa-edit"></i></a>
                    <form action="{{ route('incident.delete', $incident->id) }}" >
                      @csrf
                      @method('DELETE')
                     
                      <button  type="submit" class="text-red-600"  title="Supprimer Incident"><i class="fa-solid fa-trash"></i></button>
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