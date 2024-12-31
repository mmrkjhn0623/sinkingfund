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
            margin-bottom: 0px;
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
            margin-bottom: 0px;
        }
        .site, .doc-title{
            text-align: center;
        }
        .site{
            font-size: 18px;
            font-weight: 700;
        }
        .doc-title{
            font-size: 20px;
            font-weight: 700;
        }
        .name{
            font-size: 20px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="site">Piggycash</p>
        <p class="doc-title">Transaction Details</p>
        <br/>
        <p class="name">{{$member->Firstname}} {{ $member->Lastname}}</p>
        <p class="job" >{{$member->Job}}</p>
        <p class="address">{{$member->Address}}</p>
        <p class="contact-email">{{$member->Contact}} | {{$member->Email}}</p>
        <br/>
        <p class="daterelease">Release Date: {{ date_format(date_create($release->date), "M j, Y") }}</p>
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