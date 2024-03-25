@extends('shopify-app.layouts.default')

@section('content')
    @include('header')
   
        <div class="column twelve" style="width: 100%">
            <div class="column one-half">
                <div class="card">
                    <h3><b>Customer Full Form Submit Percentage</b> <br><br>76%</h3>
                </div>
            </div>
            <div class="column one-half">
                <div class="card">
                    <h3><b>Customer Half Form Submit Percentage</b><br><br>56%</h3>
                </div>
            </div>
        </div>
        {{-- <div class="column twelve" style="width: 100%">
            <div class="card">fdsf</div>
        </div> --}}
    </section>
    <section>
        <div class="card">
            <div class="column twelve"></div>
            <div class="column twelve">
                <table>
                    <thead>
                        <tr>
                            <th><b>S.N0</b></th>
                            <th><b>Forms</b></th>
                            <th><b>No Of Fields</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Home Page Form</td>
                            <td>3</td>
                            <td><button class="secondary icon-edit"></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Contact Page Form</td>
                            <td>4</td>
                            <td><button class="secondary icon-edit"></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Account Page</td>
                            <td>2</td>
                            <td><button class="secondary icon-edit"></button></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
