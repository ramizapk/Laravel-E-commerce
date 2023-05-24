@extends('admin.layout.master')
@section('title', 'Home')

@section('content')





       <div class="dash-first-row-cont">

        <div class="ch-dash-first-row-cont">
            <div class="orang ch"><img src="{{ asset('resources/admin/images/veiw.png') }}" height="50px" width="70px"></div>
            <div> <h6>TOTAL VEIW</h6>
                <p>565</p></div>
        </div>

        <div class="ch-dash-first-row-cont">
            <div class="blue ch">  <img  src="{{ asset('resources/admin/images/prod.png') }}" height="70px"> </div>
            <div><h6>TOTAL PRODUCTS</h6>
            <p>1500</p> </div>
        </div>
        
        <div class="ch-dash-first-row-cont">
            <div class="darkblue ch">  <img src="{{ asset('resources/admin/images/order.png') }}" height="70px"></div>
            <div><h6>TOTAL ORDERS</h6>
                <p>50</p> </div>
    </div>

   </div>
   <div class="dash-second-row-cont">

    <div class="ch1-dash-second-row-cont">
       <h2>Recent Orders</h2>
       <table>
           <thead>
              
                   <tr>
                       <th>Customer</th>
                       <th>Order Id</th>
                       <th>Order Date</th>
                       <th>Products Count</th>
                       <th>Amount</th>
                   </tr>
             
           </thead>
           <tbody>
        <tr>
            <td>ramiz ali</td>
            <td>599</td>
            <td>11/12/2021</td>
            <td>5</td>
            <td>$500</td>

        </tr>
        <tr>
            <td>ramiz ali</td>
            <td>599</td>
            <td>11/12/2021</td>
            <td>5</td>
            <td>$500</td>

        </tr>
        <tr>
            <td>ramiz ali</td>
            <td>599</td>
            <td>11/12/2021</td>
            <td>5</td>
            <td>$500</td>

        </tr>
        <tr>
            <td>ramiz ali</td>
            <td>599</td>
            <td>11/12/2021</td>
            <td>5</td>
            <td>$500</td>

        </tr>
        <tr class="last">
            <td>ramiz ali</td>
            <td>599</td>
            <td>11/12/2021</td>
            <td>5</td>
            <td>$500</td>

        </tr>
     </tbody>
       </table>
    </div>

    <div class="ch2-dash-second-row-cont">
        <h2>Top Prosucts</h2>
      

                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('resources/admin/images/phone.png') }}" height="50px">
                        </td>
                        <td>
                         
                            <h1>iphone x <p>$600</p></h1>
                           
                        </td>
                        <td> <h1>$6000
                            <p>10 Sold</p></h1></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('resources/admin/images/phone.png') }}" height="50px">
                        </td>
                        <td>
                         
                            <h1>iphone x <p>$600</p></h1>
                           
                        </td>
                        <td> <h1>$6000
                            <p>10 Sold</p></h1></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('resources/admin/images/phone.png') }}" height="50px">
                        </td>
                        <td>
                         
                            <h1>iphone x <p>$600</p></h1>
                           
                        </td>
                        <td> <h1>$6000
                            <p>10 Sold</p></h1></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('resources/admin/images/phone.png') }}" height="50px">
                        </td>
                        <td>
                         
                            <h1>iphone x <p>$600</p></h1>
                           
                        </td>
                        <td> <h1>$6000
                            <p>10 Sold</p></h1></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('resources/admin/images/phone.png') }}" height="50px">
                        </td>
                        <td>
                         
                            <h1>iphone x <p>$600</p></h1>
                           
                        </td>
                        <td> <h1>$6000
                            <p>10 Sold</p></h1></td>
                    </tr>   
                </table>

            
        </div>

   </div>




   @endsection