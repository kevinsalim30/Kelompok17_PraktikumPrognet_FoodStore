@extends('user')
@section('title', 'Cart')
@section('page-contents')

<style>
    .sub-footer {
        display: none;
    }

</style>
    <!-- Page Content -->
    <div class="page-heading header-text" style="padding : 120px 10px 70px 10px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                <div class="section-heading">
                    <h2 style="text-align: left">Keranjang <em>Makanan</em></h2>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="contact-information2" style="margin-top: -60px">
      @if (count($errors) > 0)
        <div class="container alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                  <form action="{{ route('cart.checkout') }}" method="post">
                    @csrf
                    @method('POST')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col" class="text-left">Makanan</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">Qty</th>
                                <th scope="col" class="text-center">Total Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(empty($cart) || count($cart) == 0)
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          @else
                            @php $grandtotal = 0 @endphp
                            @foreach ($cart as $item )
                                  @php $subtotal = $item->product->price * $item->qty @endphp
                                  @php $images = DB::table('product_images')->where('product_id', '=' , $item->product_id)->get(); @endphp
                                  @foreach ($images as $image)
                                  <tr>
                                      <td class="text-center"><input type="checkbox" name="product_id[]" value="{{ $item->product_id }}"></td>
                                      <td><img src="{{ url('storage/public_html/gambarproduct/'.$image->image_name) }}" height="45" /> </td>
                                      <td>{{ $item->product->product_name }}</td>
                                      <td class="text-center">{{ "Rp" . number_format($item->product->price, 0, ",", ",") }}</td>
                                      <td class="text-center">{{ $item->qty }}</td>
                                      <td class="text-center">{{ "Rp" . number_format($subtotal, 0, ",", ",") }}</td>
                                      <td class="text-center"><button class="btn btn-sm btn-danger"><a href="{{URL::to('cart/'.$item->product_id)}}" style="text-decoration: none; color: inherit;"><i class="fa fa-trash"></i> </a> </button> </td>
                                  </tr>
                                  @php break; @endphp
                                  @endforeach
                                  @php $grandtotal+=$subtotal @endphp
                            @endforeach
                          @endif
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="text-center"><strong>Sub-Total</strong></td>
                              <td class="text-center"><strong>@if (count($cart) > 0) {{ "Rp" . number_format($grandtotal, 0, ",", ",") }} @else Rp. 0 @endif</strong></td>
                              <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col mb-2">
                      <div class="row">
                          <div class="col-sm-3 col-md-3 text-right">
                            <button class="btn btn-lg btn-block btn-success" style="font-weight: bold;border-radius: 20px" type="submit">Bayar</button>
                          </div>
                          <div class="col-md-12 mt-5">
                              <a style="text-decoration: none; color: inherit;" href="{{ url('home') }}">Masih mau tambah makanan?</a>
                          </div>
                      </div>
                  </div>
                  </form>
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Footer Starts Here -->
    @endsection
