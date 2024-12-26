@extends('layouts.app')

@section('content')

<div class="flex lg:flex-row flex-col gap-6 items-start max-w-screen-xl mx-auto mt-10 mb-16">
    <div class="container max-w-screen-xl mx-auto card p-4 pb-8 rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl dark:text-gray-50 font-bold">Contributions</h2>
        </div>
        <div class="relative sm:overflow-none overflow-auto">
            <table class="w-full text-left rtl:text-right text-gray-300 dark:text-gray-300">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 border-b border-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-auto">
                            Member
                        </th>
                        <th scope="col" class="px-6 w-2/12 py-3 text-end">
                            Amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                @php 
                    $totalcontrib = 0;
                @endphp
                @foreach($contributions as $contrib)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            <div class="flex gap-1 items-center justify-start">
                            @if($contrib->image && $contrib->image !== '')
                                <img class="w-10 h-10 rounded-full sm:inline hidden" src="{{ asset($contrib->image) }}" alt="Member Image">
                            @else
                                <img class="w-10 h-10 rounded-full sm:inline hidden" src="{{ asset('public/storage/profileimg/profile_ph.jpg') }}" alt="Default Image"> 
                            @endif
                                <div class="sm:ps-3 ps-0">
                                    <div class="text-base font-semibold">{{ $contrib->firstname }} {{ $contrib->lastname }}</div>
                                    <div class="font-normal text-gray-500">{{ $contrib->job }}</div>
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4 text-end">{{ number_format($contrib->total, 2) }}</td>
                    </tr>
                    @php 
                        $totalcontrib = $totalcontrib + floatval($contrib->total);
                    @endphp
                @endforeach
                </tbody>
                <tfoot class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 text-xl dark:text-gray-200">
                    <tr>
                        <td class="px-6 py-8 font-bold">&nbsp;</td>
                        <td id="totalcontrib" class="px-6 py-4 font-bold text-end">
                            &nbsp;
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card w-full lg:max-w-sm max-w-full rounded-lg p-8 lg:sticky relative lg:top-28 flex flex-col lg:items-start items-center">
        <a href="#" class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
            Contributions
        </a>
        <h2 id="totalcontributions" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">{{ number_format($totalcontrib, 2) }}</h2>
        <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Total contribution amount from the members</p>
    </div>
</div>

@endsection