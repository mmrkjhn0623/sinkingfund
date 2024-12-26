<div class="container max-w-screen-xl mx-auto card p-4 pb-12 rounded-lg">
    <div class="flex flex-row justify-between items-center mb-8">
      <h2 class="text-3xl font-bold">Members</h2>
    </div>
    

    <form class="max-w-full mb-5" action="{{ url('/') }}" method="GET">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="text" name="s" id="default-search" class="block w-full p-4 ps-10 text-gray-900 bg-gray-700 border border-gray-600 rounded-lg focus:ring-blue-500 dark:placeholder-gray-400 dark:text-white focus:outline-none focus:bg-gray-600 focus:border-gray-500" placeholder="Search by Firstame, Lastname or Job..." value="{{ $searchkey }}" />
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
    </form>

    <ul role="list" class="grid sm:grid-cols-3 grid-col gap-4">

    @foreach($members as $member)
    <li class="bg-gray-700 border border-gray-600 rounded">
      @php
        $encryptedid = encryptid($member->member_id);
      @endphp
      <a href="memberinfo/{{$encryptedid}}" class="flex justify-center py-8 px-4 hover:bg-gray-600 hover:cursor-pointer">
        <div class="flex flex-col items-center min-w-0 gap-y-4">
          @if($member->image && $member->image !== '')
              <img class="h-24 w-24 flex-none rounded-full bg-gray-50 object-cover" src="{{ asset( $member->image ) }}" alt="Member Image">
          @else
              <img class="h-24 w-24 flex-none rounded-full bg-gray-50 object-cover" src="{{ asset('/public/storage/profileimg/profile_ph.jpg') }}" alt="Default Image"> 
          @endif
          <div class="min-w-0 flex-auto">
            <p class="font-semibold leading-6 text-center">{{$member->Lastname}}, {{$member->Firstname}} {{$member->MI}}</p>
            <p class="mt-1 truncate leading-5 text-base text-gray-400 text-center">{{$member->Job}}</p>
          </div>
        </div>
      </a>
    </li>
    @endforeach
    </ul>
    <div class="flex flex-col items-center">
        @php
          if($page == 0){
            $page = 1;
          }
          $totalpage =  intdiv($totalmembers, 15);
          if($totalmembers % 15)
            $totalpage = $totalpage + 1;
        @endphp
        <div class="inline-flex mt-6 xs:mt-0
          @if($totalmembers <= 15)
            hidden
          @endif
        ">
          <!-- Buttons -->
          <a class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 rounded-s dark:bg-gray-600 dark:border-gray-700
           @if( $page > 1 )
            hover:bg-gray-900 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-200
          @else
            dark:text-gray-400
           @endif
           "
          @php
          if( $page > 1 ){
            $prev = $page - 1;
            echo "href='?s=".$searchkey."&p=".$prev."'";
          }
          @endphp
          >
              <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
              </svg>
              Prev
          </a>
          <p class="flex items-center justify-center px-8 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-800 dark:bg-gray-600 dark:border-gray-700 dark:text-gray-200">{{ $page }} of {{ $totalpage }}</p>
          <a class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-800 rounded-e dark:bg-gray-600 dark:border-gray-700
          @if($totalmembers > $page * 15)
            hover:bg-gray-900 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-200
          @else
            dark:text-gray-400
          @endif
          "
          @php
          if( $totalmembers > $page * 15){
            $next = $page + 1;
            echo "href='?s=".$searchkey."&p=".$next."'";
          }
          @endphp
          >
              Next
              <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
        </div>
      </div>
  </div>