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
                                <th>Region</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Ethnicity</th>
                                <th>Hobby</th>
                                <th>Family</th>
                                <th>CoTravellers</th>
                                @if($userDetail->two)
                                  <th>0-2</th>
                                @endif
                                @if($userDetail->five)
                                  <th>3-5</th>
                                @endif
                                @if($userDetail->twelve)
                                  <th>6-12</th>
                                @endif
                                @if($userDetail->seventeen)
                                  <th>12-17</th>
                                @endif
                                @if($userDetail->twentyfour)
                                  <th>17-24</th>
                                @endif
                                @if($userDetail->twentynine)
                                  <th>24-29</th>
                                @endif
                                @if($userDetail->thirtynine)
                                  <th>30-39</th>
                                @endif
                                @if($userDetail->fortynine)
                                  <th>40-49</th>
                                @endif
                                @if($userDetail->fiftynine)
                                  <th>50-59</th>
                                @endif
                                @if($userDetail->seventyfour)
                                  <th>60-74</th>
                                @endif
                                @if($userDetail->seventyfive)
                                  <th>75+</th>
                                @endif
                            </tr>
                            <tbody>
                            <td>{{$userDetail->first}}</td>
                            <td>{{$userDetail->last}}</td>
                            <td>{{$userDetail->dob}}</td>
                            @if($userDetail->sex == 1)
                              <td>Male</td>
                            @endif
                            @if($userDetail->sex == 0)
                              <td>Female</td>
                            @endif
                            <td>{{$userDetail->lang}}</td>
                            <td>{{$userDetail->country}}</td>
                            <td>{{$userDetail->region}}</td>
                            <td>{{$userDetail->city}}</td>
                            <td>{{$userDetail->address}}</td>
                            <td>{{$userDetail->ethnicity}}</td>
                            <td>{{$userDetail->hobby}}</td>
                            @if($userDetail->family == 1)
                              <td>Yes</td>
                            @endif
                            @if($userDetail->family == 0)
                              <td>No</td>
                            @endif
                            @if($userDetail->co_travellers == 1)
                              <td>Yes</td>
                            @endif
                            @if($userDetail->co_travellers == 0)
                              <td>No</td>
                            @endif
                            @if($userDetail->two)
                              <td>{{$userDetail->two}}</td>
                            @endif
                            @if($userDetail->five)
                              <td>{{$userDetail->five}}</td>
                            @endif
                            @if($userDetail->twelve)
                              <td>{{$userDetail->twelve}}</td>
                            @endif
                            @if($userDetail->seventeen)
                              <td>{{$userDetail->seventeen}}</td>
                            @endif
                            @if($userDetail->twentyfour)
                              <td>{{$userDetail->twentyfour}}</td>
                            @endif
                            @if($userDetail->twentynine)
                              <td>{{$userDetail->twentynine}}</td>
                            @endif
                            @if($userDetail->thirtynine)
                              <td>{{$userDetail->thirtynine}}</td>
                            @endif
                            @if($userDetail->fourtynine)
                              <td>{{$userDetail->fourtynine}}</td>
                            @endif
                            @if($userDetail->fiftynine)
                              <td>{{$userDetail->fiftynine}}</td>
                            @endif
                            @if($userDetail->seventyfour)
                              <td>{{$userDetail->seventyfour}}</td>
                            @endif
                            @if($userDetail->seventyfive)
                              <td>{{$userDetail->seventyfive}}</td>
                            @endif
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
@endsection
