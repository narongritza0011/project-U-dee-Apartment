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
    <h2 style="text-align: center;">บิลเก็บค่าเช่า</h2>

    <h5 style="text-align: center;">หอพัก อยู่ดีมีสุข</h5>
    <p>
        ห้อง {{$data->room_number}} เดือน {{$data->bill}} วันที่ออกบิล {{$time}}
        ผู้เช่า {{$data->full_name}}  โทร {{$data->tel}}
       
        
    </p>
    <div style="overflow-x: auto;">
        <table style="width: 100%;">
            <tr>
                <th>#</th>
                <th>มิเตอร์ครั้งนี้</th>
                <th>มิเตอร์ครั้งก่อน</th>
                <th>หน่วย</th>
                <th>หน่วยละ</th>
                <th>รวม</th>

            </tr>
            <tr>

                <td>ค่าน้ำ</td>
                <td>{{$data->water_now_meter}}</td>
                <td>{{$data->water_old_meter}}</td>
                <td>{{$data->water_unit}}</td>
                <td>{{$data->water}}</td>
                <td>{{$data->water_sum}}</td>

            </tr>
            <tr>

                <td>ค่าไฟ</td>
                <td>{{$data->electric_now_meter}}</td>
                <td>{{$data->electric_old_meter}}</td>
                <td>{{$data->electric_unit}}</td>

                
                <td>{{$data->electric}}</td>
                <td>{{$data->electric_sum}}</td>

            </tr>
            <tr>

                <td colspan="5">ค่าห้อง</td>

                <td>{{$data->rental_fee}}</td>

            </tr>
            <tr>
                <td colspan="5">รวมเป็นเงิน</td>


                <td>{{$data->total}}</td>
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
                    (คุณ {{$data->full_name}})
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
