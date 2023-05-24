<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    public function index()
    {
        $people = Person::all();

        return response()->json($people, Response::HTTP_OK);
    }

    public function show($id)
    {
        $person = Person::findOrFail($id);

        return response()->json($person, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $oldPerson = Person::findOrFail($id);
        $person = Person::findOrFail($id);

        $person->update($request->json()->all());

        return response()->json(['' => 'Person was updated successfully', 'Old' => $oldPerson, 'Updated' => $person],
         Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);

        $person->delete();

        return response()->json(['Person was deleted successfully' => $person], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $requestData = $request->json()->all();

        $validatedData = Validator::make($requestData, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
        ])->validate();

        $person = Person::create($validatedData);

        return response()->json(['Person was added successfully' => $person], Response::HTTP_CREATED);
    }
}
