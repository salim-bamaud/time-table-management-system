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
    <h1>كشف النصاب التدريسي لأعضاء هيئة التدريس وهيئة التدريس المساعدة بقسم {{$department->name}}</h1>

    <div>
        
        <table>
            <thead>
              <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الدرجة العلمية</th>
                <th>المقرر الدراسي</th>
                <th colspan="3">ساعات الدراسة<br>
                    نظري - عملي - إشراف عملي
                </th>
                <th>القسم</th>
                <th>المستوى</th>
              </tr>
            </thead>
            <tbody>
                @if (count($lecturers))
                @foreach ($lecturers as $key=>$lecturer )
                <tr>
                    <td rowspan="{{count($lecturer->courses)}}">{{$key+1}}</td>  
                    <td rowspan="{{count($lecturer->courses)}}">{{$lecturer->name}}</td>
                    <td rowspan="{{count($lecturer->courses)}}">{{$lecturer->degree}}</td>
                    @if (count($lecturer->courses))
                        @foreach ($lecturer->courses as $course )
                            <td>{{$course->name}}</td>
                            <td> @if ($course->type==0)
                                    {{$course->time_units_in_week*2}}
                                 @else
                                    -
                                 @endif
                            </td>
                            <td> @if ($course->type==1)
                                    {{$course->time_units_in_week*2}}
                                 @else
                                        -
                                 @endif
                            </td>
                            <td>0</td>
                            <td>{{$course->department->name}}</td>
                            <th> {{$course->level->name}} </th>
                        </tr>
                        <tr>  
                        @endforeach
                    @else
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    @endif
                    
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