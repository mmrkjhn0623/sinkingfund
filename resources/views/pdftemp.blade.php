<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.4;
        }
        .daterelease{
            margin-bottom: 32px;
        }
        h1, h2, h3, h4 {
            color: #333;
        }
        p {
            text-align: justify;
            margin: 0px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            /* border: 1px solid #000; */
            padding: 8px;
        }
        .header{
            padding-bottom: 12px;
            border-bottom: 1px solid #000;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="daterelease">{{ date_format(date_create($release->date), "M j, Y") }}</p>
        <h2 class="name">{{$member->Firstname}} {{ $member->Lastname}}</h2>
        <p class="job">{{$member->Job}}</p>
        <p class="address">{{$member->Address}}</p>
        <p class="contact-email">{{$member->Contact}} | {{$member->Email}}</p>
    </div>
    <table>
        <tbody style="border-bottom: 1px solid #000;">
            <tr>
                <th colspan="6" style="text-align: left;">Contributions</th>
                <th colspan="1" style="text-align: right;">{{ number_format($release->contribution, 2) }}</th>
                <th colspan="1" style="text-align: right;">&nbsp;</th>
            </tr>
            <tr>
                <th colspan="6" style="text-align: left;">Interest Allocated</th>
                <th colspan="1" style="text-align: right;">{{ number_format($release->interest_allocation, 2) }}</th>
                <th colspan="1" style="text-align: right;">&nbsp;</th>
            </tr>
            <tr>
                <th colspan="6" style="text-align: left;">Loan Balance</th>
                <th colspan="1" style="text-align: right;">&nbsp;</th>
                <th colspan="1" style="text-align: right;">{{ number_format($release->loan_balance, 2) }}</th>
            </tr>
        </tbody>
        @php 
            $debit = $release->contribution + $release->interest_allocation;
            $net = $debit - $release->loan_balance;
        @endphp
        <tfoot>
            <tr style="border-bottom: 1px solid #000;">
                <th colspan="6" style="text-align: left;">&nbsp;</th>
                <th colspan="1" style="text-align: right;">{{ number_format($debit, 2) }}</th>
                <th colspan="1" style="text-align: right;">{{ number_format($release->loan_balance, 2) }}</th>
            </tr>
            <tr style="margin-top:32px;font-size:20px;">
                <th colspan="6" style="text-align: left;">Net Value</th>
                <th colspan="1" style="text-align: right;">&nbsp;</th>
                <th colspan="1" style="text-align: right;">{{ number_format($net, 2) }}</th>
            </tr>
        <tfoot>
    </table>
</body>
</html>