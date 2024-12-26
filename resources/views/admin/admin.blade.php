@extends('layouts.app')

@section('content')

<?php
    $loanbalance = $totalloan - $totalcreditpay;
    $cashonhand = $totalcontrib - $loanbalance;
?>
<div class="flex lg:flex-row flex-col gap-6 items-stretch max-w-screen-xl mx-auto mt-10 mb-16">
    <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
        <a href="#" class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-gray-50 mb-2">
            Cash On Hand
        </a>
        <h1 id="netfund" class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">{{ number_format($cashonhand, 2) }}</h1>
        <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">The total amount remaining after subtracting the loan balance from your total contributions.</p>
    </div>
    <div class="mx-auto w-full max-w-screen-2xl">
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                <a href="{{ url('/contributions') }}" class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-blue-400 mb-2">
                    Contributions
                </a>
                <h2 id="totalcontributions" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">{{ number_format($totalcontrib, 2) }}</h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Total contributions from the members</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                <a href="{{ url('/loanbalance') }}" class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-red-400 mb-2">Loan Balance</a>
                <h2 id="loanbal" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">{{ number_format($loanbalance, 2) }}</h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Total loan balance from the members</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                <a href="{{ url('/generatedinterest') }}" class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-yellow-400 mb-2">
                    Generated Interest
                </a>
                <h2 id="prointerest" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">{{ number_format($totalinterest, 2) }}</h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Generated interest from the loans</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8">
                <a href="{{ url('/members') }}" class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-green-400 mb-2">Members</a>
                <h2 id="intallocation" class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">{{ $member_count }}</h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">No. of current members</p>
            </div>
        </div>
    </div>
</div>
@include('admin.pendingloan')
@include('admin.pendingcontrib')
@include('admin.pendingcreditpay')

<div id="viewreceipt" class="h-screen flex items-center justify-center">
    <button onClick="closeReceipt();" class="absolute right-5 top-5">
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z" fill=""></path>
      </svg>
    </button>
    <img id="receiptimg" class="receipt md:max-w-xl max-w-full" />
</div>

@endsection