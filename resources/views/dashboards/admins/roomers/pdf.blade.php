<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }

        table {

            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: rgb(0, 0, 0);
            color: #fff;
        }

        th th,
        td {
            padding: 15px;
        }

    </style>

</head>

<body>
    <h2 style="text-align: center;">บิลเก็บค่ามัดจำ, ล่วงหน้า</h2>

    <h5 style="text-align: center;">หอพัก อยู่ดีมีสุข</h5>
    <p>
        ห้อง {{ $data->room_number }} วันที่พิมพ์ {{ $time }} ผู้เช่า
        {{ $data->full_name }} โทร {{ $data->tel }}
        วันที่เข้าพัก {{ $data->start_date }}
    </p>
    <div style="overflow-x: auto;">
        <table style="width: 100%;">
            <tr>
                <th>#</th>
                <th>รายการ</th>
                <th>หน่วยละ</th>
                <th>จำนวน</th>
                <th>รวม</th>
            </tr>
            <tr>
                <td>1</td>
                <td>ค่ามัดจำ</td>
                <td>{{ $data->price }}</td>
                <td>1</td>
                <td>{{ $data->price }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>ล่วงหน้า</td>
                <td>{{ $data->pay_first }}</td>
                <td>1</td>
                <td>{{ $data->pay_first }}</td>
            </tr>
            <tr>
                <td colspan="4">รวมเป็นเงิน</td>

                <td>{{ $result }}</td>
            </tr>
            <tr style="height: 150;">
                <td colspan="3" style="text-align: center;">
                    ผู้รับเงิน<br /><br />
                    .......................... <br />
                    (นายเจ้าของ หอพัก)
                </td>
                <td colspan="3" style="text-align: center;">
                    ผู้จ่ายเงิน<br /><br />
                    .......................... <br />
                    (คุณ {{ $data->full_name }})
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
