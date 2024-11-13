<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pricing Plans</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Style the pricing cards */
    .pricing-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      margin-bottom: 20px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .pricing-title {
      font-size: 1.2em;
      margin-bottom: 10px;
    }

    .pricing-amount {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .pricing-features {
      list-style: none;
      padding: 0;
      margin: 10px 0;
    }

    .pricing-features li {
      margin-bottom: 5px;
    }

    .btn-purchase {
      background-color: #33b5e5;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    .row {
      margin-right: none;
      margin-left: none;
    }
  </style>
</head>
<body>

<h1 class="text-center my-4">Choose the Right Pricing Plan</h1>

<!-- Display alert if there is a danger message -->
  <div class="alert alert-danger text-center container" style="width: 30%;">
    {{ $danger }}
  </div>

{{-- @php
$userRole = auth()->user()->role;
@endphp --}}

<section class="section-pricing">
  <div class="pricing-bg">
    <div class="container-default">
      <div class="section-header text-center mb-4">
        <h2 class="section-title">Find the Plan that Best Suits Your Needs</h2>
      </div>

      <div class="pricing-list row justify-content-center">
        @forelse ($plans as $item)
          {{-- @if(in_array($userRole, explode(',', $item->role))) --}}
            <div class="col-md-4 col-sm-6">
              <div class="pricing-card">
                <h3 class="pricing-title">{{ $item->name }}</h3>
                <p class="pricing-amount">{{ $item->price }} {{ $item->duration }}</p>
                <p class="pricing-description">{{ $item->exdetail }}</p>
                <hr class="my-4">
                <ul class="pricing-features">
                  @php
                  $features = explode(",", $item->description);
                  @endphp
                  @foreach($features as $feature)
                    <li class="feature-item">
                      <i class="fa-solid fa-star"></i> {{ $feature }}
                    </li>
                  @endforeach
                </ul>
                <form method="POST" action="{{ route('add_to_cart') }}">
                  @csrf
                  <input type="hidden" name="sub_id" value="{{ $item->id }}">
                  <input type="hidden" name="upgrade_id" value="{{ $item->upgrade_id }}">
                  <button type="submit" class="btn btn-purchase">Purchase Now</button>
                </form>
              </div>
            </div>
          {{-- @endif --}}
        @empty
          <p class="text-center text-danger">No available plans at this time.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
