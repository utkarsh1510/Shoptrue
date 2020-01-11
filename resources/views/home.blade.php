@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
<script src="/public/progressbarjs/dist/progressbar.min.js"></script>
<script src="/public/progressbarjs/dist/progressbar.js"></script>
<script src="/public/canvasjs/canvasjs.min.js"></script>
<!--<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>Orders</li>
                        <li>Wishlist</li>
                        <li>Recommendations</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="container-fluid">
    <h1>Dashboard</h1>

    <hr style="border: 1px solid #bdbdbd;">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="container" style="margin: :20px;width: 200px;height: 200px;position: relative;"></div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="\" style="margin: :20px;width: 200px;height: 200px;position: relative;"><h1>Empty Blocks</h1></div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="" style="margin: :20px;width: 200px;height: 200px;position: relative;"><h1>Empty Blocks</h1></div>
        </div>
    </div>
</div>
<div class="container" >
    <div style="border:1px solid dotted;padding:15px; font-size: 18px;font-weight: bolder;" class="bg-warning text-dark">
        Your Products
    </div>
    @if(count($prods) >0)
        <br><table class="table table-striped" >
            <tr><th>Product Name</th><th>Quantity</th><th></th><th></th></tr>
            @foreach($prods as $prod)
                <tr>
                    <td><a href="/product/{{$prod->id}}" style="font-weight: bolder;color: #888888;">{{$prod->product_name}}</a></td>
                    <td>{{$prod->quantity}}</td>
                    <td><a href="/product/{{$prod->id}}/edit" class="btn btn-warning">Edit</a></td>
                    <td>{!!Form::open(['action' => ['Productcontroller@destroy', $prod->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return check();'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close() !!}</td>

                    
                </tr>
            @endforeach
        </table>
    @else
        <center>
        <p style="font-size:25px;padding:50px;">Oops! You have not added any product yet..</p>
        <a href="/product/create" class="btn btn-outline-primary btn-lg">+ Add Product and Earn</a>
        </center>
    @endif
</div>
<script type="text/javascript">
  //  var ProgressBar = require('progressbar.min.js');

// Assuming we have an empty <div id="container"></div> in
// HTML
//var bar = new ProgressBar.Line('#container', {easing: 'easeInOut'});
//bar.animate(1); 
    /*var bar = new ProgressBar.Circle(container, {
  color: '#aaa',
  // This has to be the same size as the maximum width to
  // prevent clipping
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#333', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value);
    }

  }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '3rem';

bar.animate(1.0);  // Number from 0.0 to 1.0*/
/*window.onload=function(){
var chart = new CanvasJS.Chart("chartContainer", 
{
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    exportEnabled: true,
    animationEnabled: true,
    title: {
        text: "Desktop Browser Market Share in 2016"
    },
    data: [{
        type: "pie",
        startAngle: 25,
        toolTipContent: "<b>{label}</b>: {y}%",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - {y}%",
        dataPoints: [
            { y: 51.08, label: "Chrome" },
            { y: 27.34, label: "Internet Explorer" },
            { y: 10.62, label: "Firefox" },
            { y: 5.02, label: "Microsoft Edge" },
            { y: 4.07, label: "Safari" },
            { y: 1.22, label: "Opera" },
            { y: 0.44, label: "Others" }
        ]
    }]
});
chart.render();
}*/
function check()
{
    var x=confirm('Are you sure to delete this product');
    if(x)
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>
@endsection
