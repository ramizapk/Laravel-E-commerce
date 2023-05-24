
@extends('site.layout.master')
@section('title', 'user page')
@section('pageName')

<a href="#">User Page </a>&nbsp; / &nbsp;
<a href="#">Index </a>
@endsection


@section('content')















<div class="user-page-container">

    <div class="user-left-nav">
        <i class="user-icon fas fa-user-circle"></i>
        <ul>
            <li>
                <a href="#"><i title="My Informations" class="fas fa-address-card"></i><p> My Informations</p></a>
            </li>
            <li>
                <a href="/user/addresses"><i title=" My Adresses" class="fas fa-map-marked"></i><p> My Adresses</p></a>
            </li>
            <li>
                <a href="#"><i title="My Orders" class="fas fa-scroll"></i><p>My Orders</p></a>
            </li>
            <li>
              <a href="#"><i title="My Payment" class="fas fa-credit-card"></i><p>My Payment</p></a>
          </li>
            <li>
                <a href="#"><i title="Wish List" class="fas fa-clipboard-list"></i><p>Wish List</p></a>
            </li>
        </ul>
    </div>

    <div class="user-right-container">
        <form>
            <div class="user-form-cont">
                <div class="user-form-left">
            <label>First Name :</label>
            <input type="text" placeholder="Write your first name here...">

            <label>Last Name :</label>
            <input type="text" placeholder="Write your Last name here...">

            <label>Phone Number :</label>
            <input type="number" placeholder="Write your phone number here...">

            <label>Country :</label>
            <input type="text" placeholder="Write your country here...">
        </div>
        <div class="user-form-right">
            <label>City :</label>
            <input type="text" placeholder="Write your city here...">

            <label>State :</label>
            <input type="text" placeholder="Write your state here...">

            <label>Zip Code :</label>
            <input type="number" placeholder="Write your zip code here...">
        </div>
        </div>

            <button> SAVE</button>
        </form>
    </div>


</div>



@endsection