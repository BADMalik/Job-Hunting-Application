<!DOCTYPE html>
<head>
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">

   <script src="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js"></script>
   <link href="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.css"
        rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style type="text/css">

       html, body{
           height:100%;
           padding:0px;
           margin:0px;
           overflow: hidden;
       }
   </style>
</head>
<body>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.home') }}">
                         {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.dashboard') }}">
                         {{ __('DashBoard') }}
                    </a>
                </li>
        </ul>
    </div>
</nav>

{{-- {{dd(Auth::user())}} --}}
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
   <div class="dhx_cal_navline">
       <div class="dhx_cal_prev_button">&nbsp;</div>
       <div class="dhx_cal_next_button">&nbsp;</div>
       <div class="dhx_cal_today_button"></div>
       <div class="dhx_cal_date"></div>
       <div class="dhx_cal_tab" name="day_tab"></div>
       <div class="dhx_cal_tab" name="week_tab"></div>
       <div class="dhx_cal_tab" name="month_tab"></div>
   </div>
   <div class="dhx_cal_header"></div>
   <div class="dhx_cal_data"></div>
</div>
<script type="text/javascript">

var user = {{ Auth::user()->id}}

scheduler.config.date_format = "%Y-%m-%d %H:%i:%s";
scheduler.setLoadMode("day");
scheduler.attachEvent("onEventCreated", function(id,e){
    var event = scheduler.getEvent(id);
    event.userId = user;
    return true;
});

scheduler.init("scheduler_here", new Date(), "week");

scheduler.load(`/api/events?user_id=${user}`, "json");
var dp = new dataProcessor("/api/events");
dp.init(scheduler);
dp.setTransactionMode("REST");
</script>
</body>
