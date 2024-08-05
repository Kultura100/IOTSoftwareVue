<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CV\Face\LBPHFaceRecognizer;
use OpenCV\CascadeClassifier;
use OpenCV\Scalar;
use OpenCV\Point;
use function OpenCV\imread;
use function OpenCV\cvtColor;
use function OpenCV\equalizeHist;
use const OpenCV\COLOR_BGR2GRAY;

class ImageController extends Controller
{
   public function analyzeImage(Request $request)
{
    phpinfo();
    $imageData = $request->file('image');

    // Sprawdź, czy otrzymano plik obrazu
    if (!$imageData) {
        return response()->json(['error' => 'No image file provided.'], 400);
    }

    try {
        // Przetwarzanie obrazu
        // Inicjalizacja klasyfikatora twarzy
        $faceClassifier = new OpenCV\CascadeClassifier();
        $faceClassifier->load('models/lbpcascades/lbpcascade_frontalface.xml');

        // Inicjalizacja modelu rozpoznawania twarzy
        $faceRecognizer = LBPHFaceRecognizer::create();
        $faceRecognizer->read('results/lbph_model.xml'); // Wczytaj wytrenowany model

        // Analiza obrazu
        $src = imread($imageData);
        $gray = cvtColor($src, COLOR_BGR2GRAY);
        $faceClassifier->detectMultiScale($gray, $faces);
        equalizeHist($gray, $gray);
        $results = [];

        foreach ($faces as $face) {
            $faceImage = $gray->getImageROI($face);
            $faceLabel = $faceRecognizer->predict($faceImage, $faceConfidence);

            $results[] = [
                'label' => $faceLabel,
                'confidence' => $faceConfidence,
            ];
        }

        return response()->json([
            'results' => $results,
        ], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Image analysis failed.'], 500);
    }
}
}
