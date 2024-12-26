@extends('layouts.app')
 
@section('content')

<div class="flex-col gap-6 items-center justify-start w-full max-w-screen-md mx-auto mt-10 mb-16">
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
<div id="changepassword" class="container relative card lg:max-w-md max-w-full p-8 mx-auto sm:mb-52 mb-12 rounded-lg">
    <h2 class="text-3xl mb-8 font-bold">Change Password</h2>
    <!-- <p class="text-base text-gray-500">Nam id molestie erat. Curabitur vel dictum enim. Integer ultrices auctor tempor.</p> -->
    <form class="w-full relative" action="{{ route('update.password')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use the PUT method for updating -->
      <!-- @if($errors)
            <div class="invalid-feedback">
                <p>There is an error found</p>
            </div>
      @endif -->
      <div class="flex flex-col -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            Current Password
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Email'): errorfield @enderror" type="password" name="current_password" id="current_password" placeholder="Enter current password" required/>
        </div>
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            New Password
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Email'): errorfield @enderror" type="password" name="password" id="password" placeholder="Enter new password" required/>
        </div>
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            Confirm New Password
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Email'): errorfield @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm new password" required/>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full flex justify-center px-3">
          <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg cursor-pointer px-8 py-2.5 me-2 mb-2 w-full dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" value="Save" />
        </div>
      </div>
    </form>
</div>
</div>

@endsection