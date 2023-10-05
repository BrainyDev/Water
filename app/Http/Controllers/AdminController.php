<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Object_;

class AdminController extends Controller
{
    /**
     * Public GET functions.
     * Constructor functions ? .
     * Reusable function to return a dynamic responses based on uri origin.
     *
     * @return \Illuminate\Http\Response
     */
    public function rules($origin)
    {
        if ($origin == 'Service') {
            // validator instance 
            $rules = [
                'name' => ['required', 'string', 'max:255', 'unique:services'],
                'charge' => ['required', 'string', 'max:255'],
            ];
        } elseif ($origin == 'Apply') {
            // validator instance 
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'date' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'adults' => ['required', 'string', 'max:255'],
                'kids' => ['required', 'string', 'max:255'],
            ];
        } elseif ($origin == 'Billing') {
            // validator instance 
            $rules = [
                'CompanyName' => ['required', 'string', 'max:255'],
                'UserName' => ['required', 'string', 'max:255'],
                'PassWord' => ['required', 'string', 'max:255'],
                'MeterID' => ['required', 'string', 'max:255'],
                'Amount' => ['required', 'string', 'max:255'],
            ];
        } else {
            return back()->with('danger-message', 'Opps!!, Operation failed. Try again or contact support.');
        }

        return $rules;
    }


    #ROUTE API's PUBLIC GET/POST/PATCH FUNCTIONS

    /**
     * Display a listing of the resource.
     * GET request with prefix admin/.
     * Returns dynamically based on origin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($origin)
    {
        //set function index global variables
        $bladeDatas = [];


        //return blade view dynamically based on origin.
        #DASHBOARD
        if ($origin == 'Dashboard') {
            // set return view object
            $view = 'admin.dashboard';

            // set blade objects
            $bladeData = $origin;
            // push blade data-objects to array**Constructors missing**
            array_push($bladeDatas, $bladeData);



            #ALL SERVICES
        } elseif ($origin == 'Service') {
            // set return view object
            $view = 'admin.services.index';

            //set blade objects
            $datas = Service::all();
            $bladeData = [
                $origin,
                $datas
            ];

            // push blade data-objects to array**Constructors missing**
            foreach ($bladeData as $item) {

                array_push($bladeDatas, $item);
            }
        } elseif ($origin == 'Billing') {
            // set return view object
            $view = 'admin.billing.recharge';

            // set blade objects
            $bladeData = $origin;
            // push blade data-objects to array**Constructors missing**
            array_push($bladeDatas, $bladeData);
        } else {
            // default
            return back()->with('danger-message', 'Opps!!, Operation failed. Try again or contact support.');
        }

        // re-usable return view logic
        return $this->returnView($view, $bladeDatas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($origin)
    {
        //set function create global variables
        $bladeDatas = [];
        //return dashboard view
        if ($origin && $origin == 'Service') {
            $view = 'admin.services.create';
            // set blade objects
            $bladeData = $origin;
            // push blade data-objects to array**Constructors missing**
            array_push($bladeDatas, $bladeData);
        }
        // re-usable return view logic
        return $this->returnView($view, $bladeDatas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request name createDataRows
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $origin)
    {
        // global reusable function to validate data
        $validation = $request->validate($this->rules($origin));

        try {
            //store services
            if ($validation && $origin == 'Service') {
                // scope objects
                $model = $origin;
                $message = 'Service Added Successfully.';
                $data = [
                    'name' => $request->get('name'),
                    'charge' => $request->get('charge'),
                ];
            } elseif ($validation && $origin == 'Apply') {
                // scope objects
                $model = 'Applicant';
                $message = 'Application Made Successfully.';
                $ticket_no = rand(0000, 9999);
                $data = [
                    'name' => $request->get('name'),
                    'phone_number' => $request->get('phone_number'),
                    'email' => $request->get('email'),
                    'country' => $request->get('country'),
                    'arrival_time' => $request->get('date'),
                    'home_address' => $request->get('address'),
                    'adults' => $request->get('adults'),
                    'kids' => $request->get('kids'),
                    'country' => $request->get('country'),
                    'service_id' => $request->get('service_id'),
                    'ticket_number' => $ticket_no,
                    'user_id' => 0,
                ];
            } elseif ($validation && $origin == 'Billing') {
                // scope objects
                $model = 'Billing';
                $message = 'Application Made Successfully.';
                $ticket_no = rand(0000, 9999);
                $data = [
                    "CompanyName"=> "Btest",
                    "UserName"=> "Admin075",
                    "PassWord"=> "123456",
                    "MeterId"=> "58000046506",
                    "is_vend_by_unit"=>"vending money",
                    "Amount"=> "27"
                ];
                $address = 'http://www.server-newv.stronpower.com/api/VendingMeter';

                // send get recharge json request
                $jsonString = json_encode($data);
                $arr = json_decode($jsonString);
                $response = Http::post('http://www.server-newv.stronpower.com/api/VendingMeter', $arr);
                $jsonData = $response->json();
                // $jsonObj = json_decode($jsonData);
                // $phoneNumber = $jsonObj->Customer_phone;
                dd($jsonData);
                $arrayObject = array($jsonData);
                // foreach($arrayObject as $jsonObject){
                //     foreach($jsonObject as $Item){
                //     }
                // }
            }
        } catch (\Throwable $th) {
            //throw $th;`
            $message = 'Opps!! Operation Failed. Try Again or Contact Support.';
        }
        return $this->returnStore($model, $data, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    #PRIVATE REUSABLE FUNCTIONS

    /**
     * Get function.
     * Reusable function to return a dynamic view based on uri origin.
     *
     * @return \Illuminate\Http\Response
     */
    protected function returnView($view, $bladeDatas)
    {
        if (count($bladeDatas) <= 1 &&  $view) {

            // re-usable return view logic
            return view('' . $view . '', [
                'origin' => $bladeDatas[0],
            ]);
        } elseif (count($bladeDatas) <= 2 && $view) {
            // re-usable return view logic while array length == 2
            return view('' . $view . '', [
                'origin' => $bladeDatas[0],
                'datas' => $bladeDatas[1]
            ]);
        } else {
            return back()->with('danger-message', 'Opps!!, Operation failed. Try again or contact support.');
        }
    }

    /**
     * Post function.
     * Reusable function to store a dynamic data on tables based on uri origin.
     *
     * @return \Illuminate\Http\Response
     */
    protected function returnStore($model, $data, $message)
    {
        if ($model && count($data) > 0 && $message) {
            // re-usable create data rows on dynamic tables logic
            $modelsPath = "\\App\\Models\\";
            $className = $modelsPath . $model;

            // store data
            try {
                // save data to table 
                $className::create($data);
                // return with success message
                return back()->with(
                    'success-message',
                    ' ' . $message . ' '
                );
            } catch (\Throwable $th) {
                // return with error message
                return back()->with(
                    'danger-message',
                    'Opps!! Something went wrong. Try again please. @ Error log issue#' . $th
                );
            }
        } else {
            return back()->with(
                'danger-message',
                'Opps!!, ' . $model . ' Operation Failed. Try again or contact support.'
            );
        }
    }

    // request recharge reusable protected function
    protected function getRecharge($data, $address)
    {
        $arr = json_decode($data);
        $response = Http::post('http://www.server-newv.stronpower.com/api/VendingMeter', $arr);


        $jsonData = $response->json();
        dd($jsonData);
    }
}
