<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    protected $defaultCategories = [
        'Analgesics (Painkillers)',
        'Antipyretics (Fever Reducers)',
        'Anti-inflammatory Drugs (NSAIDs)',
        'Antibiotics (Antibacterials)',
        'Antivirals',
        'Antifungals',
        'Antimalarials',
        'Antiparasitics',
        'Antihistamines (Allergy Relief)',
        'Decongestants',
        'Antacids / Acid Reducers',
        'Laxatives',
        'Antidiarrheals',
        'Cough Suppressants & Expectorants',
        'Bronchodilators (Asthma Treatment)',
        'Antihypertensives (Blood Pressure Control)',
        'Diuretics (Water Pills)',
        'Cholesterol-lowering Drugs (Statins)',
        'Diabetes Medications (Antidiabetics)',
        'Antidepressants',
        'Antipsychotics',
        'Mood Stabilizers',
        'Sedatives / Hypnotics / Sleep Aids',
        'Anxiolytics (Anti-Anxiety)',
        'Anticonvulsants (Anti-Seizure)',
        'Contraceptives (Birth Control)',
        'Hormonal Therapies',
        'Corticosteroids',
        'Vaccines',
        'Chemotherapy Agents (Anticancer Drugs)',
        'Immunosuppressants',
        'Ophthalmic Drugs (Eye Medications)',
        'Otic Drugs (Ear Medications)',
        'Topical Medications (Skin Treatments)',
        'Local Anesthetics',
    ];

    public function index(Request $request)
    {
        $query = $request->input('query');
        $symptom = $request->input('symptom');
        $category = $request->input('category');
        $condition = $request->input('condition');

        $results = Medicine::query()
            ->when($query, function ($q) use ($query) {
                $q->where(function ($sub) use ($query) {
                    $sub->where('name_of_medicine', 'like', "%{$query}%")
                        ->orWhere('generic_name', 'like', "%{$query}%")
                        ->orWhere('diseases', 'like', "%{$query}%");
                });
            })
            ->when($symptom, function ($q) use ($symptom) {
                $q->orWhere('symptoms', 'like', "%{$symptom}%");
            })
            ->when($condition, function ($q) use ($condition) {
                $q->orWhere('diseases', 'like', "%{$condition}%");
            })
            ->when($category, function ($q) use ($category) {
                $q->where('category', $category);
            })
            ->get();

        return view('searchbar', [
            'results' => $results,
            'categories' => $this->defaultCategories,
            'selectedCategory' => $category,
            'conditions' => [],
            'symptoms' => [],
        ]);
    }
}
