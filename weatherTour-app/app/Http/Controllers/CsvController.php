<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class CsvController extends Controller
{
    public function getCSVFromS3()
    {
        // Liste des fichiers CSV à récupérer
        $csvFiles = [
            'donnees_meteo_actuelles_Bordeaux.csv',
            'donnees_meteo_actuelles_Lille.csv',
            'donnees_meteo_actuelles_Lyon.csv',
            'donnees_meteo_actuelles_Marseille.csv',
            'donnees_meteo_actuelles_Montpellier.csv',
            'donnees_meteo_actuelles_Nantes.csv',
            'donnees_meteo_actuelles_Nice.csv',
            'donnees_meteo_actuelles_Paris.csv',
            'donnees_meteo_actuelles_Strasbourg.csv',
            'donnees_meteo_actuelles_Toulouse.csv',
        ];

        $csvData = [];

        // Utilisation de la façade Storage
        foreach ($csvFiles as $csvFile) {
            $contents = Storage::disk('s3')->get($csvFile);
            $lines = explode("\n", $contents);
            $data = [];

            foreach ($lines as $line) {
                $data[] = str_getcsv($line, ",");
            }

            $csvData[$csvFile] = $data;
        }

        // dd($csvData);
        
        return view('dashboard', ['csvData' => $csvData]);
    }
}
