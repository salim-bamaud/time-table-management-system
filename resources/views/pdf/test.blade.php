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
    <h1>أعضاء هيئة التدريس وهيئة التدريس المساعدة</h1>

    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">إسم المحاضر</th>
                <th scope="col">الإسم المختصر</th>
                <th scope="col"> الكلية</th>
                <th scope="col">التخصص </th>
                <th scope="col">الدرجة العلمية </th>
            </tr>
            </thead>
            <tbody>
                @if (!is_null($lecturers))
                @foreach ($lecturers as $key=>$lecturer )
                <tr>                      
                    <td>{{$key+1}}</td>       
                    <td>{{$lecturer->name}}</td>
                    <td>{{$lecturer->short_name}}</td>
                    <td>{{$lecturer->collage}}</td>
                    <td>{{$lecturer->department->name}}</td>
                    <td>{{$lecturer->degree}} @if ($lecturer->contract_status=='1')
                        (متعاقد)
                    @endif</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">No teachers was found!</td>
                </tr>
                @endif
                
            </tbody>
        </table>
    </div>
</body>
</html>