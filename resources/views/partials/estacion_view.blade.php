

<div class="antialiased border bg-gray-100 text-gray-600   w-full h-full p-3 " >
   <div class="grid grid-flow-row w-full">
        <!-- Table -->
        <div class="flex  mt-2 py-2 items-center bg-gray-800">

           <div  class="w-12 text-center pl-2">
                <x-icons.home class=" text-gray-200"/>
           </div>
           <div class="ml-4 font-bold text-lg text-gray-200" >
            {{$estacion}}

           </div>


        </div>
        <div class="mt-2 font-semibold border-b">
            Posición:
            <div class="text-xs text-gray-400 indent-2.5">{{ $id}}</div>
        </div>
        <div class="mt-2 font-semibold border-b">
            Dirección:
            <div class="text-xs text-gray-400 indent-2.5">{{$direccion}}</div>
        </div>
        <div class="mt-2 font-semibold ">
            Indicaciones:
            <div class="text-xs text-gray-400 indent-2.5 text-justify font-thin"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis provident odio, voluptatem molestias harum deserunt rem laboriosam cum reiciendis suscipit sed voluptatum aspernatur modi delectus corrupti tempora libero pariatur vel!</div>
        </div>
        <div class="mt-2">
            <table class= "w-full  ">
                <thead class=" bg-gray-800">
                    <tr class=" border border-gray-800">
                      <th scope="col" class="text-sm font-medium  border border-y-gray-800 border-r-gray-200 border-l-gray-800 text-white px-2 py-4">
                        Propiedad
                      </th>
                      <th scope="col" class="text-sm font-medium text-white px-2 py-4">
                        Valor
                      </th>

                    </tr>
                  </thead>
                  <tbody >
                    <tr class="border border-gray-200">
                        <td class="p-2 border border-r-gray-200">
                            Longitud

                        </td>

                        <td class="p-2"> 9.555445</td>
                    </tr>
                    <tr class="border  border-gray-200">
                        <td class="p-2 border border-r-gray-200">
                            Latitud

                        </td>

                        <td class="p-2" > -4.25344</td>
                    </tr>
                  </tbody>
            </table>


        </div>



    </div>
</div>


