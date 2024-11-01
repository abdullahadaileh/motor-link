@extends('landingpage.layouts.master')

@section('content')
<div style="margin: 0;  margin-bottom:-7px ; padding: 0; width: 100%; position: relative;">
    <video autoplay muted loop style="width: 100%; height: auto;">
        <source src="{{asset('landing/assets/images/4042.mp4')}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <a href="{{ route('motor-link') }}" class="floating-button">BACK TO HOME PAGE</a>
</div>

<style>
    .floating-button {
        position: absolute;
        top: 85px; 
        left: 44%;
        transform: translateX(-50%);
        background-color: #96c9ab;
        color: #fff; 
        padding: 0.7% 1.4%; 
        border-radius: 200px 10px 200px 10px;
        text-decoration: none;
        font-size: 100%; 
        animation: bounce 1s infinite; 
    }
    .floating-button:hover {
        text-decoration: none;
        color: white;
        border-radius: 200px 10px 200px 10px;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }
</style>
@endsection
