<div id="addnewmembersection" class="container relative card lg:max-w-md max-w-full p-4 rounded-lg">
    <button id="btnaddnewmembertoggle" class="addnewmembertoggle absolute right-3 top-4 text-xs leading-5 font-semibold rounded-full py-2 px-3 flex items-center space-x-2" fdprocessedid="ut9vpf">
        <svg viewBox="0 0 3 6" class="ml-1 w-auto h-4 text-slate-400 overflow-visible group-hover:text-slate-600 dark:group-hover:text-slate-300"><path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
    </button>
    <h2 class="text-3xl mb-8 font-bold">Add New Member</h2>
    <!-- <p class="text-base text-gray-500">Nam id molestie erat. Curabitur vel dictum enim. Integer ultrices auctor tempor.</p> -->
    <form class="w-full relative" action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <!-- @if($errors)
            <div class="invalid-feedback">
                <p>There is an error found</p>
            </div>
      @endif -->
      <label class="block uppercase tracking-wide text-gray-400 font-bold mt-4 mb-2" for="address">
        Profile Photo
      </label>
      <div class="flex flex-wrap justify-center mx-1 bg-gray-700 text-gray-200 border border-gray-600 rounded py-6 px-4 mb-3 hover:bg-gray-600 hover:border-gray-500 hover:opacity-60 cursor-pointer" onClick="document.getElementById('profile').click();">
        <div class="w-full flex flex-col items-center px-3">
          <img id="profile_selector" class="h-32 w-32 flex-none rounded-full bg-gray-50 object-cover" src="{{ asset('/public/storage/profileimg/profile_ph.jpg') }}" alt="Default Image">
          <input type="file" accept="image/*" class="appearance-none hidden block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 resize-none h-32" onChange="displaySelectedProfile(event);" id="profile" name="Profile">
        </div>
      </div>
      <div class="flex flex-col -mx-3 mb-6">
        <div class="px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            Firstname
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Firstname'): errorfield @enderror" onchange="this.classList.remove('errorfield');" id="firstname" name="Firstname" type="text" placeholder="Enter Firstname" value="{{ old('Firstname') }}" />
        </div>
        <div class="px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            Lastname
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Lastname'): errorfield @enderror" onchange="this.classList.remove('errorfield');setPassword();" id="lastname" name="Lastname" type="text" placeholder="Enter Lastname" value="{{ old('Lastname') }}" />
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
          <input datepicker id="birthdate-datepicker" datepicker-format="yyyy-mm-dd" name="Birthdate" class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 pl-8 pr-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Birthdate'): errorfield @enderror" onchange="this.classList.remove('errorfield');" type="text" placeholder="Select date" value="{{ old('Birthdate') }}">
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-city">
            Gender
          </label>
          <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('Gender'): errorfield @enderror">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="horizontal-list-radio-license" type="radio" value="Male" name="Gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" 
                    <?php
                    if(old('Gender') == 'Male'){
                      echo "checked";
                    } 
                    ?>
                    />
                    <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="horizontal-list-radio-id" type="radio" value="Female" name="Gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    <?php
                    if(old('Gender') == 'Female'){
                      echo "checked";
                    } 
                    ?>
                    />
                    <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="horizontal-list-radio-military" type="radio" value="Something Else" name="Gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    <?php
                    if(old('Gender') == 'Something Else'){
                      echo "checked";
                    } 
                    ?>
                    />
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
            <textarea class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 resize-none h-32 @error('Address'): errorfield @enderror" onchange="this.classList.remove('errorfield');" id="address" name="Address" placeholder="Enter Address">{{ old('Address') }}</textarea>
          </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
              Job
            </label>
            <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Job'): errorfield @enderror" onchange="this.classList.remove('errorfield');" id="job" name="Job" type="text" placeholder="Enter Job" value="{{ old('Job') }}">

          </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            Contact
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Contact'): errorfield @enderror" onchange="this.classList.remove('errorfield');setPassword();" id="contact" name="Contact" type="number" placeholder="Enter Contact" value="{{ old('Contact') }}">
        </div>
      </div>


      <div class="flex flex-col -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            Email
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Email'): errorfield @enderror" onchange="this.classList.remove('errorfield');" id="email" name="Email" type="email" placeholder="Enter Email" value="{{ old('Email') }}" >
        </div>
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
            Password
          </label>
          <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 @error('Email'): errorfield @enderror" onchange="this.classList.remove('errorfield');" id="password" name="Password" type="text" placeholder="Enter Password" value="{{ old('Password') }}" readonly />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full flex justify-end px-3">
          <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg cursor-pointer px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" value="Save" />
          <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg px-8 py-2.5 me-2 mb-2 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:border-gray-700">Clear</button>
        </div>
      </div>
    </form>
</div>