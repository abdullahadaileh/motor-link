@extends('landingpage.layouts.master')
@section('content')

<div class="Vehicles-header">
    <h1 class="Vehicles-title">
        Vehicles
    </h1>
    <div id="car-animation" style="width: 120px;"></div>

    <div class="Vehicles-filters">
        <input type="text" class="Vehicles-search" placeholder="Search vehicles...">
        <select class="Vehicles-filter">
            <option value="all">All</option>
            <option value="Economical car">Economical car</option>
            <option value="jeep car">jeep car</option>
            <option value="Luxury car">Luxury car</option>
            <option value="Pickup Turk">Pickup Turk</option>
            <option value="sport car">sport car</option>
        </select>
    </div>
</div>

{{-- grid --}}
<div class="Vehicles-container">
  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>

  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>

  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>

  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>
  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>
  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>
  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>
  <div class="Vehicles-card">
    <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="Card Image" class="Vehicles-card-image">
    <div class="Vehicles-card-content">
      <h3>Card Title</h3>
      <p>This is a description of the card. You can put any text here to explain more about the content of this card.</p>
    </div>
  </div>
</div>

@endsection
