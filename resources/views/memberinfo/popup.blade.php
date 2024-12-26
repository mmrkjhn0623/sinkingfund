<!-- Popup forms -->
<div id="newcontrib">
    <div class="card w-full max-w-lg p-8 sm:mx-auto mx-5 rounded-lg relative">
    <button onClick="showNewContrib();" class="absolute right-5 top-5">
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z" fill=""></path>
      </svg>
    </button>
        <h2 class="text-3xl mb-4 font-bold">New Contribution</h2>
        <form class="w-full" action="{{ route('contributions.store', $encryptedid ) }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="flex flex-col -mx-3 mb-6">
                <div class="px-3">
                <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                    Date
                </label>
                <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500" id="contribdate" name="contrib_date" type="text" value="{{ date('Y-m-d'); }}" readonly />
                </div>
                <div class="px-3">
                <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                    Amount
                </label>
                <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="contribamount" name="contrib_amount" type="number" value="" placeholder="Enter Amount" required/>
                </div>
                <div class="px-3">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Receipt Photo
                    </label>
                    <input id="contribreceipt" name="contribreceipt" type="file" accept="image/png, image/gif, image/jpeg" class="block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" required />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full flex justify-end px-3">
                <input type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg cursor-pointer px-8 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" value="Submit" />
                </div>
            </div>
        </form>
    </div>
</div>
<div id="newloan">
    <div class="card w-full max-w-lg p-8 sm:mx-auto mx-5 rounded-lg relative">
    <button onClick="showNewLoan();" class="absolute right-5 top-5">
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z" fill=""></path>
      </svg>
    </button>
        <h2 class="text-3xl mb-4 font-bold">New Loan</h2>
        <form class="w-full" action="{{ route('loans.store', $encryptedid ) }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="flex flex-col -mx-3 mb-6">
                <div class="px-3">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Date
                    </label>
                    <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500" id="contribdate" name="loan_date" type="text" value="{{ date('Y-m-d'); }}" readonly />
                </div>
                <div class="px-3">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Amount
                    </label>
                    <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="loan_amount" name="loan_amount" type="number" value="" placeholder="Enter Amount" onkeyup="ComputeLoan();" required/>
                </div>
                <div class="px-3 mt-4">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Interest (5.0%)
                    </label>
                    <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500" id="loan_interest" type="number" value="0.00" readonly />
                </div>
                <div class="px-3">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Net Proceed
                    </label>
                    <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded text-xl py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500" id="loan_net" type="number" value="0.00" readonly />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full flex justify-end px-3">
                <input type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg cursor-pointer px-8 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800" value="Submit" />
                </div>
            </div>
        </form>
    </div>
</div>
<div id="creditpay">
    <div class="card w-full max-w-lg p-8 sm:mx-auto mx-5 rounded-lg relative">
    <button onClick="showCreditPay();" class="absolute right-5 top-5">
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z" fill=""></path>
      </svg>
    </button>
        <h2 class="text-3xl mb-4 font-bold">New Credit Payment</h2>
        <form class="w-full" action="{{ route('creditpay.store', $encryptedid ) }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="flex flex-col -mx-3 mb-6">
                <div class="px-3">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Date
                    </label>
                    <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500" id="contribdate" name="creditpay_date" type="text" value="{{ date('Y-m-d'); }}" readonly />
                </div>
                <div class="px-3">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Amount
                    </label>
                    <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="creditpay_amount" name="creditpay_amount" type="number" value="" placeholder="Enter Amount" onkeyup="ComputeLoan();" required/>
                </div>
                <div class="px-3">
                    <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                        Receipt Photo
                    </label>
                    <input id="creditpayreceipt" name="creditpayreceipt" type="file" accept="image/png, image/gif, image/jpeg" class="block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" required="">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full flex justify-end px-3">
                <input type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg cursor-pointer px-8 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-blue-800" value="Submit" />
                </div>
            </div>
        </form>
    </div>
</div>