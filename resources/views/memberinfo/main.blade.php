@extends('layouts.app')
 

<?php
    $encryptedid = encryptid($member->member_id);
?>

@section('content')

@if(session('success'))
  <div id="alert-3" class="flex max-w-screen-xl p-6 my-16 mx-auto items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-3 font-bold">
    {{ session('success') }}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
  </div>
@endif

@if(session('released'))
<div id="alert-3" class="flex max-w-screen-xl p-6 my-16 mx-auto sm:items-center items-start p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-600 dark:text-gray-50" role="alert">
    <svg class="flex-shrink-0 w-4 h-4 sm:mt-0 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    @php 
        $releasedid = encryptid(session('released_id'));
    @endphp
    <div class="ms-3 font-bold">
        <span>{{ session('released') }}</span>
        <a href="{{ route('release.print', $releasedid) }}" class="sm:ml-2 ml-0 p-2 dark:bg-gray-600 rounded-lg dark:text-grap-300 sm:border border-0 sm:no-underline underline dark:border-gray-500 hover:bg-gray-500">
            Download Release Detail
        </a>
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-gray-50 p-1.5 hover:bg-gray-50 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-500 dark:text-gray-50 dark:hover:bg-gray-400" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
@endif

<div class="flex lg:flex-row flex-col gap-6 items-start max-w-screen-xl mx-auto mt-10 mb-16">
    <div class="card w-full lg:max-w-sm max-w-full p-4 rounded-lg p-4 lg:sticky relative lg:top-28 flex flex-col lg:items-start items-center">
        <div class="flex lg:justify-start justify-center gap-2">
            <div class="me-3 shrink-0">
            @if($member->image && $member->image !== '')
                <img class="w-16 h-16 mb-3 object-cover rounded-full shadow-lg" src="{{ asset($member->image) }}" alt="Member Image">
            @else
                <img class="w-16 h-16 mb-3 object-cover rounded-full shadow-lg" src="{{ asset('public/storage/profileimg/profile_ph.jpg') }}" alt="Default Image"> 
            @endif
            </div>
            <div>
                <h3 class="text-2xl mb-1 font-bold leading-none text-gray-900 dark:text-white">
                    {{$member->Firstname}} {{$member->Lastname}}
                </h3>
                <p class="mb-3 font-normal">
                {{$member->Job}}
                </p>
                <p class="mb-4">{{$member->Address}}</p>
                <ul>
                    <li class="flex items-center mb-2">
                        <span class="me-2 font-semibold text-gray-400">
                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.8335 12.668C1.421 12.668 1.068 12.5212 0.774496 12.2277C0.480996 11.9342 0.333996 11.581 0.333496 11.168V2.16797C0.333496 1.75547 0.480496 1.40247 0.774496 1.10897C1.0685 0.815469 1.4215 0.668469 1.8335 0.667969H13.8335C14.246 0.667969 14.5992 0.814969 14.8932 1.10897C15.1872 1.40297 15.334 1.75597 15.3335 2.16797V11.168C15.3335 11.5805 15.1867 11.9337 14.8932 12.2277C14.5997 12.5217 14.2465 12.6685 13.8335 12.668H1.8335ZM7.8335 7.41797L13.8335 3.66797V2.16797L7.8335 5.91797L1.8335 2.16797V3.66797L7.8335 7.41797Z" fill="#9ca3af"/>
                        </svg>
                        </span>
                        <a href="mailto:{{ $member->Email }}" target="_blank" class="text-blue-600 dark:text-blue-500 hover:underline">{{$member->Email}}</a>
                    </li>
                    <li class="flex items-start mb-2">
                        <span class="me-2 font-semibold text-gray-400">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.38509 4.97917C2.78439 8.02571 5.27027 10.4404 8.35618 11.7506L8.85172 11.9714C9.40048 12.2158 10.0179 12.2586 10.5951 12.0923C11.1724 11.9261 11.6724 11.5615 12.0072 11.0627L12.655 10.0978C12.7564 9.9465 12.7974 9.7627 12.77 9.58264C12.7427 9.40257 12.6488 9.23929 12.5071 9.12495L10.3121 7.35412C10.2357 7.29249 10.1476 7.24694 10.0531 7.22022C9.95859 7.19349 9.85968 7.18613 9.76228 7.19859C9.66489 7.21104 9.57101 7.24306 9.48629 7.2927C9.40157 7.34234 9.32776 7.40859 9.26929 7.48748L8.59011 8.4035C6.84668 7.54245 5.4355 6.13101 4.57477 4.38743L5.49006 3.70825C5.56894 3.64978 5.6352 3.57597 5.68484 3.49125C5.73448 3.40653 5.76649 3.31265 5.77895 3.21526C5.7914 3.11786 5.78405 3.01895 5.75732 2.92446C5.7306 2.82998 5.68505 2.74187 5.62342 2.66543L3.85259 0.470474C3.73825 0.328701 3.57497 0.234883 3.3949 0.207503C3.21483 0.180122 3.03104 0.221163 2.87973 0.32254L1.90832 0.974031C1.40651 1.31055 1.04046 1.81427 0.875377 2.39548C0.71029 2.97668 0.756891 3.59762 1.00688 4.14768L1.38509 4.97917Z" fill="#9ca3af" />
                        </svg>
                        </span>
                        <span class="-mt-1">{{$member->Contact}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <button id="editmemberbtn" type="button" onClick="showEditform();" class="inline-flex items-center justify-center w-full lg:max-w-full max-w-sm px-5 py-2 me-2 text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            <svg class="mr-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.2583 3.86484C15.5833 3.53984 15.5833 2.99818 15.2583 2.68984L13.3083 0.739844C13 0.414844 12.4583 0.414844 12.1333 0.739844L10.6 2.26484L13.725 5.38984M0.5 12.3732V15.4982H3.625L12.8417 6.27318L9.71667 3.14818L0.5 12.3732Z" fill="#9ca3af"/>
            </svg>
            Edit Info
        </button>
    </div>

    <div class="max-w-screen-xl w-full flex flex-col gap-6">
        <div class="mx-auto max-w-screen-xl">
            <input type="hidden" id="totalfund" value="{{ $totalfund }}" />
            <input type="hidden" id="totalinterest" value="{{ $totalinterest }}" />
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <a href="#" class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-gray-50 mb-2">
                    Net Fund Value
                </a>
                <h1 id="netfund" class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">0.00</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">The total amount remaining in your fund after subtracting the loan balance from your total contributions and interest.</p>
                @if( $auth->role == 'admin' )
                <button onclick="checkRelease(this);" action-path="{{ route('release.process', $encryptedid) }}" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-gray-600 hover:bg-gray-500">
                    Release
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
                @endif
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                    <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                        Contributions
                    </a>
                    <h2 id="totalcontributions" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">0.00</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Your total contributions</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                    <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 mb-2">
                        Loan Balance
                    </a>
                    <h2 id="loanbal" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">0.00</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Your Total loan balance</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                    <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 mb-2">
                        Proportionate Interest
                    </a>
                    <h2 id="prointerest" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">0.00</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Your contribution percentage relative to the total contributions</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                    <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">Interest Allocation</a>
                    <h2 id="intallocation" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">0.00</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Generated interest base on your proportionate interest</p>
                </div>
            </div>
        </div>

        <div class="container max-w-screen-xl mx-auto card p-4 pb-8 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-3xl font-bold">Contributions</h2>
                <button id="newcontribbtn" type="button" onClick="showNewContrib();" class="inline-flex items-center justify-end sm:px-5 px-2 py-2 text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg outline-none hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:text-blue-400 dark:border-gray-800 dark:hover:text-white dark:hover:bg-blue-600">
                    <svg class="fill-current mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 7H9V1C9 0.4 8.6 0 8 0C7.4 0 7 0.4 7 1V7H1C0.4 7 0 7.4 0 8C0 8.6 0.4 9 1 9H7V15C7 15.6 7.4 16 8 16C8.6 16 9 15.6 9 15V9H15C15.6 9 16 8.6 16 8C16 7.4 15.6 7 15 7Z" fill=""></path>
                    </svg>
                    <span>Add New</span>
                </button>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-left rtl:text-right text-gray-300 dark:text-gray-300">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 border-b border-gray-700 dark:text-gray-200">
                        <tr>
                        <th scope="col" class="px-6 py-3 w-3/12">
                                Receipt
                            </th>
                            <th scope="col" class="px-6 py-3 w-3/12">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 w-3/12">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-end">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @php 
                        $totalcontrib = 0;
                    @endphp
                    @foreach($contributions as $contribution)
                        @if($contribution->status != 'Declined' && $contribution->status != 'Released')
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <button onclick="showReceipt('<?php if($contribution->receipt_photo) echo asset($contribution->receipt_photo); else echo asset('/public/storage/receiptimg/artworks-noreceipt.jpg'); ?>');"
                                class="inline-flex gap-1 border dark:border-gray-800 dark:bg-gray-700 hover:dark:bg-gray-600 rounded-lg px-2 py-1">
                                    <svg fill="#D1D5DB" width="24px" height="24px" viewBox="-3.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <title>view</title>
                                        <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                                    </svg>
                                    <span>View</span>
                                </button>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ date_format(date_create($contribution->date),"M j, Y") }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                @if($contribution->status == 'Pending')
                                    <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div>
                                @elseif($contribution->status == 'Posted')
                                    <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>
                                @endif
                                {{ $contribution->status }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-end">
                            {{ number_format($contribution->amount,2) }}
                            </td>
                        </tr>
                        @php 
                            if($contribution->status == 'Posted')
                                $totalcontrib = $totalcontrib + floatval($contribution->amount); 
                        @endphp
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 text-xl dark:text-gray-200">
                        <tr>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td id="totalcontrib" data-value="{{ $totalcontrib }}" class="px-6 py-4 font-bold text-end">
                        @php
                            echo number_format($totalcontrib,2);
                        @endphp
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="container max-w-screen-xl mx-auto card p-4 pb-8 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-3xl font-bold">Loans</h2>
                <button id="newloanbtn" type="button" onClick="showNewLoan();" class="inline-flex items-center justify-end sm:px-5 px-2 py-2 text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg outline-none hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:text-red-400 dark:border-gray-800 dark:hover:text-white dark:hover:bg-red-600">
                    <svg class="fill-current mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 7H9V1C9 0.4 8.6 0 8 0C7.4 0 7 0.4 7 1V7H1C0.4 7 0 7.4 0 8C0 8.6 0.4 9 1 9H7V15C7 15.6 7.4 16 8 16C8.6 16 9 15.6 9 15V9H15C15.6 9 16 8.6 16 8C16 7.4 15.6 7 15 7Z" fill=""></path>
                    </svg>
                    Add New
                </button>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-left rtl:text-right text-gray-300 dark:text-gray-300">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 border-b border-gray-700 dark:text-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-end">
                                Net Proceed
                            </th>
                            <th scope="col" class="px-6 py-3 text-end">
                                Interest (5.0%)
                            </th>
                            <th scope="col" class="px-6 py-3 text-end">
                                Principal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalloan = 0;
                    @endphp
                    @foreach($loans as $loan)
                    @if($loan->status != 'Declined' && $loan->status != 'Released')
                        @php
                        $interest = $loan->amount * 0.05;
                        $net = $loan->amount - $interest;
                        @endphp

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ date_format(date_create($loan->date),"M j, Y") }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                @if($loan->status == 'Pending')
                                    <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div>
                                @elseif($loan->status == 'Posted')
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                                @endif
                                    {{ $loan->status }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-end">
                                {{ number_format($net,2) }}
                            </td>
                            <td class="px-6 py-4 text-end">
                                {{ number_format($interest,2) }}
                            </td>
                            <td class="px-6 py-4 text-end">
                                {{ number_format($loan->amount,2) }}
                            </td>
                        </tr>
                        @php 
                            if($loan->status == 'Posted')
                                $totalloan = $totalloan + floatval($loan->amount); 
                        @endphp
                    @endif
                    @endforeach
                    </tbody>
                    <tfoot class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 text-xl dark:text-gray-200">
                        <tr>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td id="totalloan" data-value="{{ $totalloan }}" class="px-6 py-4 font-bold text-end">
                        @php
                            echo number_format($totalloan,2);
                        @endphp
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="container max-w-screen-xl mx-auto card p-4 pb-8 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-3xl font-bold">Credit Payments</h2>
                <button id="newcreditpaybtn" type="button" onClick="showCreditPay();" class="inline-flex items-center justify-end sm:px-5 px-2 py-2 text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg outline-none hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:text-green-400 dark:border-gray-800 dark:hover:text-white dark:hover:bg-green-600">
                    <svg class="fill-current mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 7H9V1C9 0.4 8.6 0 8 0C7.4 0 7 0.4 7 1V7H1C0.4 7 0 7.4 0 8C0 8.6 0.4 9 1 9H7V15C7 15.6 7.4 16 8 16C8.6 16 9 15.6 9 15V9H15C15.6 9 16 8.6 16 8C16 7.4 15.6 7 15 7Z" fill=""></path>
                    </svg>
                    <span>Add New</span>
                </button>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-left rtl:text-right text-gray-300 dark:text-gray-300">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 border-b border-gray-700 dark:text-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-3/12">
                                Receipt
                            </th>
                            <th scope="col" class="px-6 py-3 w-3/12">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 w-3/12">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-end">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalcreditpay = 0;
                    @endphp
                    @foreach($creditpays as $creditpay)
                        @if($creditpay->status != 'Declined' && $creditpay->status != 'Released')
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                            <button onclick="showReceipt('<?php if($creditpay->receipt_photo) echo asset($creditpay->receipt_photo); else echo asset('/public/storage/receiptimg/artworks-noreceipt.jpg'); ?>');"
                                class="inline-flex gap-1 border dark:border-gray-800 dark:bg-gray-700 hover:dark:bg-gray-600 rounded-lg px-2 py-1">
                                    <svg fill="#D1D5DB" width="24px" height="24px" viewBox="-3.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <title>view</title>
                                        <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                                    </svg>
                                    <span>View</span>
                                </button>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ date_format(date_create($creditpay->date),"M j, Y") }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                @if($creditpay->status == 'Pending')
                                    <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div>
                                @elseif($creditpay->status == 'Posted')
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                @endif
                                {{ $creditpay->status }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-end">
                            {{ number_format($creditpay->amount, 2) }}
                            </td>
                        </tr>
                        @php 
                            if($creditpay->status == 'Posted')
                                $totalcreditpay = $totalcreditpay + floatval($creditpay->amount);
                        @endphp
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 text-xl dark:text-gray-200">
                        <tr>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td class="px-6 py-4 font-bold">&nbsp;</td>
                            <td id="totalcreditpay" data-value="{{ $totalcreditpay }}" class="px-6 py-4 font-bold text-end">
                        @php
                            echo number_format($totalcreditpay,2);
                        @endphp
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@include('memberinfo.edit')
@include('memberinfo.popup')

<div id="viewreceipt" class="h-screen flex items-center justify-center">
    <button onClick="closeReceipt();" class="absolute right-5 top-5">
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z" fill=""></path>
      </svg>
    </button>
    <img id="receiptimg" class="receipt md:max-w-xl max-w-full" />
</div>

<div id="viewmessage" class="h-screen flex items-center justify-center">
<div class="card w-full max-w-lg p-8 sm:mx-auto mx-5 rounded-lg relative">
    <button onClick="closeMessage();" class="absolute right-5 top-5">
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z" fill=""></path>
      </svg>
    </button>
        <h2 class="text-3xl mb-4 font-bold">Message</h2>
        <p id="message_p"></p>
    </div>
</div>

@endsection

<script>
  document.addEventListener("DOMContentLoaded", function(){
    TransactionDetails();
  });
</script>