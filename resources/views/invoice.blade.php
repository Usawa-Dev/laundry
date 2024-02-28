<!DOCTYPE html>
<html>
<head>
    <title>ifs</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:200px;
        height:60px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>


<div class="head-title">
    <h1 class="text-center m-0 p-0">IFS</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#1</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{ $data[0]->code}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{ $data[0]->created_at }}</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">
        {{-- <img src="{{ asset("téléchargement.png") }}" alt="Logo"> --}}
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">De</th>
            <th class="w-50">A</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Ifs,</p>
                    <p>kolwezi,</p>
                    <p>RDC</p>
                    <p>Contact: (650) 253-0000</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p> {{ $data[0]->name }}</p>
                    <p>chambre {{ $data[0]->room_name }},</p>
                    <p>Rdc</p>
                    <p>Contact: 1-206-266-1000</p>
                </div>
            </td>
        </tr>
    </table>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">nom</th>
            <th class="w-50">couleur</th>
            {{-- <th class="w-50">couleur</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Subtotal</th>
            <th class="w-50">Tax Amount</th>
            <th class="w-50">Grand Total</th> --}}
        </tr>
        @foreach ($data as $item)
                    <tr align="center">
            <td>{{ $item->pname }}</td>
            <td><a href="" style="background-color: {{ $item->color }}"><i class="fa fa-invision"></i></a></td>
            {{-- <td>$500.2</td>
            <td>3</td>
            <td>$1500</td>
            <td>$50</td>
            <td>$1550.20</td> --}}
        </tr>
        @endforeach
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p> Total</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p></p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</html>
