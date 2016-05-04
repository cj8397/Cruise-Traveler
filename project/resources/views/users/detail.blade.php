@extends('layouts.scrolling')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h1>Details for {{Auth::user()->email}}</h1>
            <div class="row">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>First</th>
                            <th>Last</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>Language</th>
                            <th>Country</th>
                            <th>Ethnicity</th>
                            <th>Hobby</th>
                            <th>Family</th>
                            <th>CoTravellers</th>
                            <th>Region</th>
                            <th>City</th>
                            <th>Address</th>
                          </tr>
                          <tbody>
                            <td>{{$userDetail->first}}</td>
                            <td>{{$userDetail->last}}</td>
                            <td>{{$userDetail->dob}}</td>
                            <td>{{$userDetail->sex}}</td>
                            <td>{{$userDetail->lang}}</td>
                            <td>{{$userDetail->country}}</td>
                            <td>{{$userDetail->ethnicity}}</td>
                            <td>{{$userDetail->hobby}}</td>
                            <td>{{$userDetail->family}}</td>
                            <td>{{$userDetail->co_travellers}}</td>
                            <td>{{$userDetail->region}}</td>
                            <td>{{$userDetail->city}}</td>
                            <td>{{$userDetail->address}}</td>
                          </tr>
                        </tbody>
                      </table>

            </div>
        </div>
</div>
@endsection
