<div class="p-6 bg-gray-100 flex flex-col items-center">
  <div class="w-full max-w-2xl text-center mb-6">
    <div class="bg-black text-white py-3 rounded-t-lg font-bold text-xl">
      STAGE
    </div>
  </div>
  <div class="grid grid-cols-5 gap-4 max-w-2xl w-full">
    <button class="col-span-1 bg-blue-200 hover:bg-blue-300 cursor-pointer p-4 rounded text-center font-semibold h-[200px] flex items-center justify-center">
      Left Seating
    </butt>
    <button class="col-span-3 bg-yellow-200 hover:bg-yellow-300 cursor-pointer p-8 rounded text-center font-bold text-lg h-[200px] flex items-center justify-center">
      Standing Area
    </button>
    {{-- Unavailable/booked --}}
    <button class="col-span-1 bg-gray-300 p-4 rounded text-center font-semibold h-[200px] flex items-center justify-center cursor-not-allowed">
      Right Seating
    </button>
  </div>
  <div class="mt-4 w-full max-w-2xl grid grid-cols-5 gap-4">

    {{-- Empty for alignment --}}
    <div class="col-span-1"></div>

    <button class="col-span-3 bg-blue-200 hover:bg-blue-300 cursor-pointer p-4 rounded text-center font-semibold h-[100px] flex items-center justify-center">
      Back Seating
    </button>
  </div>
  <div class="mt-4 w-full max-w-2xl">
    <button class="bg-purple-300 hover:bg-purple-400 cursor-pointer w-full h-[100px] p-6 rounded text-center font-bold text-lg shadow-lg flex items-center justify-center">
      Elevated VIP Section
    </button>
  </div>
</div>
