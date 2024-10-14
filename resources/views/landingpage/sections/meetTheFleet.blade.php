<h2 class="section2_h2">Meet the Fleet</h2>
<main>
  <div class="swiper">
    <div class="swiper-wrapper">
      @foreach($vehicleTypes as $type)
      <div class="swiper-slide">
        <div class="swiper-slide-img">
          @if($type->image)
          <img src="{{ asset($type->image) }}" alt="{{ $type->name }}">
          @else
          <img src="{{ asset('landing/assets/images/carsilhouette.jpg') }}" alt="Image"/>
          @endif
        </div>
        <div class="swiper-slide-content">
          <h2>{{ $type->name }}</h2>
          <p>{{ $type->description ?? 'Discover our selection of vehicles.' }}</p> <!-- Default description if none exists -->
          <a href="{{ route('motor-link-vehicles', ['search' => '', 'type_id' => $type->id]) }}" class="show-more">More</a> <!-- Show more button -->
        </div>
      </div>
      @endforeach
    </div>
  </div>
</main>
