<!-- Edit Member Info Form -->
<div id="editmemberinfo">
    <div class="card max-w-md p-8 overflow-scroll">
        <h2 class="text-3xl mb-4 font-bold">Edit Member Info</h2>
        <form class="w-full" action="{{ route('members.update', $encryptedid) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT') <!-- Use the PUT method for updating -->
        <label class="block uppercase tracking-wide text-gray-400 font-bold mt-8 mb-2" for="address">
            Profile Photo
        </label>
        <div class="flex flex-wrap justify-center mx-1 bg-gray-700 text-gray-200 border border-gray-600 rounded py-6 px-4 mb-3 hover:bg-gray-600 hover:border-gray-500 hover:opacity-60 cursor-pointer" onClick="document.getElementById('profile').click();">
            <div class="w-full flex flex-col items-center px-3">
            @if($member->image && $member->image !== '')
            <img id="profile_selector" class="h-32 w-32 flex-none rounded-full bg-gray-50 object-cover" default-data="{{ asset($member->image) }}" src="{{ asset($member->image) }}" alt="Default Image">
            @else
            <img id="profile_selector" class="h-32 w-32 flex-none rounded-full bg-gray-50 object-cover" default-data="{{ asset($member->image) }}" src="{{ asset('public/storage/profileimg/profile_ph.jpg') }}" alt="Default Image">
            @endif
            <input type="file" accept="image/*" class="appearance-none hidden block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 resize-none h-32" onChange="displaySelectedProfile(event);" id="profile" name="Profile">
            </div>
        </div>
        <div class="flex flex-col -mx-3 mb-6">
            <div class="px-3">
            <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                Firstname
            </label>
            <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="firstname" name="Firstname" type="text" default-data="{{ $member->Firstname }}" value="{{$member->Firstname}}" placeholder="Enter Firstname">
            </div>
            <div class="px-3">
            <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                Lastname
            </label>
            <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="lastname" name="Lastname" type="text" default-data="{{ $member->Lastname }}" value="{{$member->Lastname}}" placeholder="Enter Lastname">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="relative w-full px-3">
                <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                    Birth Date
                </label>
                <div class="absolute inset-y-0 start-0 flex items-center ps-6 pt-5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input datepicker id="birthdate-datepicker" datepicker-format="yyyy-mm-dd" name="Birthdate" class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 pl-8 pr-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" type="text" default-data="{{ $member->Birthdate }}" value="{{ $member->Birthdate }}" placeholder="Select date" >
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-city">
                Gender
            </label>
            <input type="hidden" name="defaultgender" id="defaultgender" value="{{ $member->Gender }}" />
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gendermale" type="radio" value="Male" name="Gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                        @if($member->Gender == 'Male') checked @endif >
                        <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="genderfemale" type="radio" value="Female" name="Gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                        @if($member->Gender == 'Female') checked @endif >
                        <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gendersomethingelse" type="radio" value="Something Else" name="Gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                        @if($member->Gender == 'Something Else') checked @endif >
                        <label for="horizontal-list-radio-military" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Something Else</label>
                    </div>
                </li>
            </ul>
            <p class="text-base mt-2 text-gray-500">Select Gender</p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="address">
                Address
                </label>
                <textarea class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 resize-none h-32" id="address" name="Address" default-data="{{ $member->Address }}" default-data="{{ $member->Address }}" placeholder="Enter Address">{{ $member->Address }}</textarea>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                Job
                </label>
                <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="job" name="Job" type="text" default-data="{{ $member->Job }}" value="{{ $member->Job }}" placeholder="Enter Job">

            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                Contact
            </label>
            <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="contact" name="Contact" type="number" default-data="{{ $member->Contact }}" value="{{ $member->Contact }}" placeholder="Enter Contact">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full flex justify-end px-3">
            <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg cursor-pointer px-8 py-2.5 me-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" default-data="Save" value="Save" />
            <button type="button" onClick="ClearEditForm();" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg px-8 py-2.5 me-2 mb-2 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:border-gray-700">Cancel</button>
            </div>
        </div>
        </form>
    </div>
</div>