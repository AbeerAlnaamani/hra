<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\FirestoreClient;

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(){

    }
    public function index()
    {

        $firestore = new FirestoreClient([
            'keyFilePath' => __DIR__ . '/laravel-65896-firebase-adminsdk-v4tbf-eb7622670b.json',
            'transport' => 'rest', // استخدام REST بدلاً من gRPC
        ]);

        $collection = $firestore->collection('متاجر');
        $documents = $collection->documents();

        foreach ($documents as $document) {
               // الحصول على البيانات وتحويلها إلى UTF-8
    $data = $document->data();
    foreach ($data as $key => $value) {
        if (is_string($value)) {
            $data[$key] = mb_convert_encoding($value, 'UTF-8', 'auto'); // تحويل النصوص إلى UTF-8
        }
    }
    
    echo $document->id() . ': ' . json_encode($data, JSON_UNESCAPED_UNICODE) . PHP_EOL; // طباعة النصوص بشكل صحيح


            // echo $document->id() . ': ' . json_encode($document->data()) . PHP_EOL;
        }
    
//         $firebase = (new Factory)
//             ->withServiceAccount(base_path('laravel-65896-firebase-adminsdk-v4tbf-eb7622670b.json')); // استخدم اسم ملفك هنا
        
//         $firestore = $firebase->createFirestore(); // إنشاء اتصال مع Firestore
//         $database = $firestore->database(); // الوصول إلى قاعدة البيانات
        
//         // مثال: إضافة مستند جديد في مجموعة
//         $collection = $database->collection('dates');
//         $document = $collection->add([
//             'timestamp' => now()->toDateTimeString(),
//             'message' => 'Firestore connected successfully!',
//         ]);
        
//         // مثال: جلب جميع المستندات من المجموعة 'dates'
// $documents = $collection->documents();

// foreach ($documents as $doc) {
//     echo $doc->id() . ' => ' . json_encode($doc->data()) . PHP_EOL;
// }

// return "Firestore data retrieved successfully!";

//////////////////
    //     $firebase=(new Factory)
    //     ->withServiceAccount(__DIR__.'/laravel-65896-firebase-adminsdk-v4tbf-eb7622670b.json');
    //   //  ->withDatabaseUri('https://laravel-65896-default-rtdb.firebaseio.com/');

    //     $database=$firebase->createDatabase();
    //     $date=$database->getReference('date');

    //     return $date->getValue();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
