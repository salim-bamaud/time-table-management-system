<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: 'XBRiyaz' , sans-serif;
            text-align: center;
            align-content: center;
        }
        table{
            border-collapse: collapse;
        }
        th, td{
            padding: 2%;
            border: 1px solid black;
        }
    </style>
</head>
<body>

        <h1>كشف توضيحي عدد المقاعد للقاعات الدراسية كلية العلوم التطبيقية جامعة سيئون
        </h1>

    <div style="align-content: center">
        <table>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">إسم القاعة</th>
                <th scope="col"> عدد المقاعد</th>
                <th scope="col">النوع </th>
            </tr>
            </thead>
            <tbody>
                @if (!is_null($rooms))
                @foreach ($rooms as $key=>$room )
                <tr>                      
                    <td>{{$key+1}}</td>       
                    <td>{{$room->name}}</td>
                    <td>{{$room->seats_num}}</td>
                    <td>
                        @if ($room->type=='1')
                        Lap
                        @else
                        Room
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">No rooms was found!</td>
                </tr>
                @endif
                
            </tbody>
        </table>
    </div>
</body>
</html>