@extends('layouts.adminLayout')
@section('content')



<div class="compared-stocktaking-container">

    <div class="row compared-stocktaking-row" style="border-bottom:1px solid #5d5d5d;margin-bottom:20px;">
        <div class="compared-col">Ime pijače </div>
        <div class="compared-col">Enme </div>
        <div class="compared-col">Razlika </div>
    </div>

    @for($i=0;$i<=count($odstupanja)-1;$i++)

    @if($i == 0 || $i%3==0)
        <div class="row compared-stocktaking-row">
    @endif

    <div class="compared-col">{{$odstupanja[$i]}}</div>

    @if($i%3==2 || $i ==2)
        </div>
    @endif


        

    @endfor
</div>









@endsection