<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Order Mail</title>
</head>
<body>
<div>
    <div class="row">
        <h1 class="text-center" style="text-align: center; color: #198974;"><b>A new order has been placed</b></h1>
        <div class="row" style="margin-top: 10px; text-align: center;">
            <table style="border: 1px solid black">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{$data['buyer_name']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
