@if(session('creditpay_approve'))
  <div id="alert-3" class="flex max-w-screen-xl p-6 my-16 mx-auto items-center p-4 mb-4 text-blue-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-3 font-bold">
    {{ session('creditpay_approve') }}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
  </div>
@endif
<div class="container max-w-screen-xl mx-auto card p-4 pb-8 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl dark:text-gray-50 font-bold">Pending Credit Payments</h2>
    </div>
    <div class="relative sm:overflow-none overflow-auto">
        <table class="w-full text-left rtl:text-right text-gray-300 dark:text-gray-300">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 border-b border-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 w-2/12">
                        Receipt
                    </th>
                    <th scope="col" class="px-6 py-3 w-auto">
                        Member
                    </th>
                    <th scope="col" class="px-6 py-3 w-2/12">
                        Date
                    </th>
                    <th scope="col" class="px-6 w-2/12 py-3 text-end">
                        Amount
                    </th>
                    <th scope="col" class="px-6 w-1/12 py-3 sm:text-end text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($pending_creditpays as $creditpay)
                @php
                    $encryptedid_creditpay = encryptid($creditpay['creditpay_id']);
                @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <button onclick="showReceipt('<?php if($creditpay['receipt_photo']) echo asset($creditpay['receipt_photo']); else echo asset('/public/storage/receiptimg/artworks-noreceipt.jpg'); ?>');" class="inline-flex gap-1 border dark:border-gray-800 dark:bg-gray-700 hover:dark:bg-gray-600 rounded-lg px-2 py-1">
                            <svg fill="#D1D5DB" width="24px" height="24px" viewBox="-3.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <title>view</title>
                                <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                            </svg>
                            <span>View</span>
                        </button>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        <div class="flex gap-1 items-center justify-start">
                            <img class="w-10 h-10 rounded-full sm:inline hidden" src="{{ asset($creditpay['image']) }}" alt="Jese image">
                            <div class="sm:ps-3 ps-0">
                                <div class="text-base font-semibold">{{ $creditpay['firstname'] }} {{ $creditpay['lastname'] }}</div>
                                <div class="font-normal text-gray-500">{{ $creditpay['job'] }}</div>
                            </div>
                        </div>
                    </th>
                    <td class="px-6 py-4">{{ date_format(date_create($creditpay['date']),"M j, Y") }}</td>
                    <td class="px-6 py-4 text-end">{{ number_format($creditpay['amount'], 2) }}</td>
                    <td class="px-6 py-4 text-end">
                        <div class="action-menu relative">
                            <button class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button" onclick="this.nextElementSibling.classList.toggle('hidden');">
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"></path>
                                </svg>
                            </button>
                            <div class="dropdown z-10 hidden absolute mt-2 right-0 text-base bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-start divide-y divide-gray-600">
                                    <li>
                                        <a href="{{ route('creditpay.update', ['action' => 'approve', 'id' => $encryptedid_creditpay]) }}" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-100 dark:hover:text-white">Approve</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('creditpay.update', ['action' => 'decline', 'id' => $encryptedid_creditpay]) }}" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500 dark:hover:text-white">Decline</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 text-xl dark:text-gray-200">
                <tr>
                    <td class="px-6 py-8 font-bold">&nbsp;</td>
                    <td class="px-6 py-8 font-bold">&nbsp;</td>
                    <td class="px-6 py-8 font-bold">&nbsp;</td>
                    <td class="px-6 py-8 font-bold">&nbsp;</td>
                    <td id="totalcreditpay" class="px-6 py-4 font-bold text-end">&nbsp;</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>